<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
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

        if($request->meth == 'POST'){
            DB::table('books')->insert(
                [
                    'image' => $request->image,
                    'title' => $request->title,
                    'author'=>$request->author,
                    'publisher'=>$request->publisher,
                ]
            );

            return Redirect::back()->with('message','Successful Create Data!');
        } else {
            $user = Book::findOrFail($request->id);
            $user->image = $request->input('image');
            $user->title = $request->input('title');
            $user->author = $request->input('author');
            $user->publisher = $request->input('publisher');
            $user->save();
            return Redirect::back()->with('message','Successful Updated Data!');
        }


    }

    public function delete($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books')->with('message','Successful Deleted Data!');
    }


}
