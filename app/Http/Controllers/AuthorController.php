<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $authors = Author::select(['id', 'name']);
            return Datatables::of($authors)->addColumn('action', function($author){
                return view('datatable._action', [
                'model' => $author,
                'form_url'=> route('authors.destroy', $author->id),
                'edit_url' => route('authors.edit', $author->id),
                'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                ]);
                })->make(true);
        }
        $html = $htmlBuilder->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('authors.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:authors']);
        $author = Author::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $author->name"
            ]);
        return redirect()->route('authors.index');
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
        $author = Author::find($id);
        return view('authors.edit')->with(compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['name' => 'required|unique:authors,name,'. $id]);
        $author = Author::find($id);
        $author->update($request->only('name'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $author->name"
        ]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Author::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
        ]);
        return redirect()->route('authors.index');
    }
}
