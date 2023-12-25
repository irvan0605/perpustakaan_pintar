<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'code_publisher', 'name_publisher'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
