<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Session;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function Books(): HasMany
    {
        return $this->hasMany(Book::class, 'id', 'author_id');
    }

    public static function boot()
    {
    parent::boot();

    self::deleting(function($author) {
        // mengecek apakah penulis masih punya buku
        if ($author->books->count() > 0) {
            // menyiapkan pesan error
            $html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
            $html .= '<ul>';
            foreach ($author->books as $book) {
            $html .= "<li>$book->title</li>";
            }
            $html .= '</ul>';

            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>$html
            ]);

            // membatalkan proses penghapusan
            return false;
        }
    });
    }
}
