<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Redirect;

class StudentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Student::all();

        $widget = [
            'data' => $data,
        ];

        return view('students', compact('widget'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'study_program' => 'required',
            'class' => 'required',
            'semester' => 'required',
        ]);

        if($request->meth == 'POST'){
            DB::table('students')->insert(
                [
                    'nim' => $request->nim,
                    'name' => $request->name,
                    'study_program'=>$request->study_program,
                    'class'=>$request->class,
                    'semester'=>$request->semester,
                ]
            );

            return Redirect::back()->with('message','Successful Create Data!');
        } else {
            $data = Student::findOrFail($request->id);
            $data->nim = $request->input('nim');
            $data->name = $request->input('name');
            $data->study_program = $request->input('study_program');
            $data->class = $request->input('class');
            $data->semester = $request->input('semester');
            $data->save();
            return Redirect::back()->with('message','Successful Updated Data!');
        }


    }

    public function delete($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students')->with('message','Successful Deleted Data!');
    }


}
