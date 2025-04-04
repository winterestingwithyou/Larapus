<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowLog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample penulis
        $author1 = Author::create(['name'=>'Mohammad Fauzil Adhim']);
        $author2 = Author::create(['name'=>'Salim A. Fillah']);
        $author3 = Author::create(['name'=>'Aam Amiruddin']);

        // Sample buku
        $book1 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah', 'amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Jalan Cinta Para Pejuang', 'amount'=>2, 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'Membingkai Surga dalam Rumah Tangga', 'amount'=>4, 'author_id'=>$author3->id]);
        $book4 = Book::create(['title'=>'Cinta & Seks Rumah Tangga Muslim', 'amount'=>3, 'author_id'=>$author3->id]);

         // Sample peminjaman buku
        $member = User::where('email', 'member@gmail.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1]);
    }
}
