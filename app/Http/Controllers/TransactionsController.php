<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Student;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Redirect;

class TransactionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Transaction::all();

        foreach ($data as $transaction) {
            if($transaction->original_return_date){
                $originalReturnDate = $transaction->original_return_date;
                $returnDate = $transaction->return_date;

                $originalReturnDate = new \DateTime($originalReturnDate);
                $returnDateObj = new \DateTime($returnDate);
                $dateInterval = $originalReturnDate->diff($returnDateObj);

                if ($dateInterval->invert === 0) {
                    $dateDifference = 0;
                } else {
                    $dateDifference = $dateInterval->days;
                }
                $transaction->late = $dateDifference;

            } else {
                $today = date('Y-m-d');
                $returnDate = $transaction->return_date;

                $today = new \DateTime($today);
                $returnDateObj = new \DateTime($returnDate);
                $dateInterval = $today->diff($returnDateObj);

                if ($dateInterval->invert === 0) {
                    $dateDifference = 0;
                } else {
                    $dateDifference = $dateInterval->days;
                }
                $transaction->late = $dateDifference;

            }
        };

        $widget = [
            'data' => $data,
        ];

        return view('transactions', compact('widget'));
    }

    public function return(Request $request)
    {
        $today = date('Y-m-d');

        $data = Transaction::findOrFail($request->id);
        $data->original_return_date = $today;
        $data->save();
        return Redirect::back()->with('message','Successful Returned Book!');
    }

    public function extend(Request $request)
    {
        $today = date('Y-m-d');
        $returnDate = $request->return_date;

        $today = new \DateTime($today);
        $returnDateObj = new \DateTime($returnDate);
        $dateInterval = $today->diff($returnDateObj);

        if ($dateInterval->invert === 0) {
            $dateDifference = $dateInterval->days + $request->number_of_days;
        } else {
            $dateDifference = 0 + $request->number_of_days;
        }

        $newTimestamp = time() + ($dateDifference * 24 * 60 * 60);
        $returnDate = date('Y-m-d', $newTimestamp);

        $data = Transaction::findOrFail($request->id);
        $data->return_date = $returnDate;
        $data->save();
        return Redirect::back()->with('message','Successful Extended Book!');
    }
}
