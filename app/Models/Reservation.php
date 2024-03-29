<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'book_id', 'is_returned', 'reservation_date', 'return_date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($reservation) {
            $reservation->book->decrementAvailableCopies();
        });
        static::deleting(function ($reservation) {
            $reservation->book->increment('availableCopies');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
