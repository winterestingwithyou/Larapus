<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Session;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'amount'];

    public function Authors(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function borrowLogs(): HasMany
    {
        return $this->hasMany(BorrowLog::class);
    }

    public function getStockAttribute()
    {
        $borrowed = $this->borrowLogs()->borrowed()->count();
        $stock = $this->amount - $borrowed;
        return $stock;
    }

    public static function boot()
    {
        parent::boot();

        self::updating(function($book)
        {
            if ($book->amount < $book->borrowed) {
                Session::flash("flash_notification", [
                    "level"=>"danger",
                    "message"=>"Jumlah buku $book->title harus >= " . $book->borrowed
                ]);
                return false;
            }
        });

        self::deleting(function($book)
        {
            if ($book->borrowLogs()->count() > 0) {
                Session::flash("flash_notification", [
                    "level"=>"danger",
                    "message"=>"Buku $book->title sudah pernah dipinjam."
                ]);
                return false;
            }
        });
    }

    public function getBorrowedAttribute()
    {
        return $this->borrowLogs()->borrowed()->count();
    }
}
