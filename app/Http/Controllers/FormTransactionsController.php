<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Redirect;

class FormTransactionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
        $books = Book::all();
        $today = date('Y-m-d');
        $newTimestamp = time() + (7 * 24 * 60 * 60);
        $nextWeek = date('Y-m-d', $newTimestamp);

        $widget = [
            'students' => $students,
            'books' => $books,
            'loan_date' => $today,
            'return_date' => $nextWeek,
        ];

        return view('form_transactions', compact('widget'));
    }

    public function add(Request $request)
    {
        DB::table('transactions')->insert(
            [
                'student_id' => $request->student,
                'book_id' => $request->book,
                'loan_date'=>$request->loan_date,
                'return_date'=>$request->return_date,
            ]
        );

        return Redirect::back()->with('message','Successful Create Data!');
    }
}
