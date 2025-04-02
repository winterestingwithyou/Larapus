<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowLog extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'is_returned'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'is_returned' => 'boolean',
    ];

    public function scopeReturned($query)
    {
        return $query->where('is_returned', 1);
    }
    
    public function scopeBorrowed($query)
    {
        return $query->where('is_returned', 0);
    }
}
