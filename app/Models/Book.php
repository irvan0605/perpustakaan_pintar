<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'image', 'title', 'author', 'number_of_books', 'publisher_id'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}
