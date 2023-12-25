<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'image', 'title', 'author', 'publisher'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

}
