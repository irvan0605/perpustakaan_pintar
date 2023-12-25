<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PublishersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Publisher::all();

        $widget = [
            'data' => $data,
        ];

        return view('publishers', compact('widget'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'code_publisher' => 'required',
            'name_publisher' => 'required',
        ]);

        if($request->meth == 'POST'){
            DB::table('publishers')->insert(
                [
                    'code_publisher' => $request->code_publisher,
                    'name_publisher' => $request->name_publisher,
                ]
            );

            return Redirect::back()->with('message','Successful Create Data!');
        } else {
            $data = Publisher::findOrFail($request->id);
            $data->code_publisher = $request->input('code_publisher');
            $data->name_publisher = $request->input('name_publisher');
            $data->save();
            return Redirect::back()->with('message','Successful Updated Data!');
        }


    }

    public function delete($id)
    {
        DB::table('publishers')->where('id', $id)->delete();
        return redirect()->route('publishers')->with('message','Successful Deleted Data!');
    }


}
