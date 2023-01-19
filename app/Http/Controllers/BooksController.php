<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Book::all();

        $widget = [
            'data' => $data,
        ];

        return view('books', compact('widget'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
        ]);

        DB::table('books')->insert(
            [
                'image' => $request->image,
                'title' => $request->title,
                'author'=>$request->author,
                'publisher'=>$request->publisher,
            ]
        );

        return Redirect::back()->with('message','Successful Create Data!');
    }

    public function edit()
    {
        $this->mode = 'edit';
    }

}
