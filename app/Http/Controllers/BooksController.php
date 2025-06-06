<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\BorrowLog;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\BookException;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request, Builder $htmlBuilder)
        {
        if ($request->ajax()) {
            $books = Book::with('authors');
            return Datatables::of($books)->addColumn('action', function($book){
                return view('datatable._action', [
                'model'=> $book,
                'form_url' => route('books.destroy', $book->id),
                'edit_url' => route('books.edit', $book->id),
                'confirm_message' => 'Yakin mau menghapus ' . $book->title . '?'
                ]);
            })->make(true);
        }
        
        $html = $htmlBuilder->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])->addColumn(['data' => 'amount', 'name'=>'amount', 'title'=>'Jumlah'])->addColumn(['data' => 'authors.name', 'name'=>'authors.name', 'title'=>'Penulis'])->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('books.index')->with(compact('html'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->except('cover'));

        // isi field cover jika ada cover yang diupload
        if ($request->hasFile('cover')) {

            // Mengambil file yang diupload
            $uploaded_cover = $request->file('cover');

            // mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            // membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);

            // mengisi field cover di book dengan filename yang baru dibuat
            $book->cover = $filename;
            $book->save();
        }

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $book->title"
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit')->with(compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id)
    {
            $book = Book::find($id);
            if(!$book->update($request->all())) return redirect()->back();
            if ($request->hasFile('cover')) {
                // menambil cover yang diupload berikut ekstensinya
                $filename = null;
                $uploaded_cover = $request->file('cover');
                $extension = $uploaded_cover->getClientOriginalExtension();

                // membuat nama file random dengan extension
                $filename = md5(time()) . '.' . $extension;
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

                // memindahkan file ke folder public/img
                $uploaded_cover->move($destinationPath, $filename);

                // hapus cover lama, jika ada
                if ($book->cover) {
                    $old_cover = $book->cover;
                    $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'. DIRECTORY_SEPARATOR . $book->cover;

                    try {
                        File::delete($filepath);
                    } catch (FileNotFoundException $e) {
                        // File sudah dihapus/tidak ada
                    }
                }

                // ganti field cover dengan cover yang baru
                $book->cover = $filename;
                $book->save();
            }

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan $book->title"
            ]);

            return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $cover = $book->cover;
        if(!$book->delete()) return redirect()->back();

        // hapus cover lama, jika ada
        if ($cover) {
            $old_cover = $book->cover;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
            . DIRECTORY_SEPARATOR . $book->cover;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Buku berhasil dihapus"
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Untuk Peminjaman Buku.
     */
    public function borrow(string $id)
    {
        try {
            $book = Book::findOrFail($id);

            Auth::user()->borrow($book);
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil meminjam $book->title"
            ]);
        } catch (BookException $e) {
            Session::flash("flash_notification", [
            "level" => "danger",
            "message" => $e->getMessage()
            ]);
        } catch (ModelNotFoundException $e) {
                Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"Buku tidak ditemukan."
            ]);
        }

        return redirect('/');
    }

    /**
     * Untuk Pengembalian Buku.
     */
    public function returnBack($book_id)
    {
        $borrowLog = BorrowLog::where('user_id', Auth::user()->id)->where('book_id', $book_id)->where('is_returned', 0)->first();
        if ($borrowLog) {
            $borrowLog->is_returned = true;
            $borrowLog->save();
            
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil mengembalikan " . $borrowLog->book->title
            ]);
        }
        
        return redirect('/home');
    }
}
