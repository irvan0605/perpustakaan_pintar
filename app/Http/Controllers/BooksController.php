<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $widget = [
            'users'=> [],
            'title' => 'Books',
        ];

        return view('books', compact('widget'));
    }
}
