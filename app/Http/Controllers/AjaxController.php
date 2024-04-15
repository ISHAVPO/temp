<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajaxdb;
use DB;

class AjaxController extends Controller
{
    public function ajaxpost(Request $request){
    // //   print_r($request);
    // $data=new Ajaxdb;
    // $data->name=$request->name;
    // $data->address=$request->address;
    // $data->{'phone-no'}=$request->input('phone');
    // $data->save();
    // return response()->json(['success' => true, 'message' => 'Data inserted successfully']);
    DB::table('ajaxdb')->insert([
        'name' => $request->name,
        'address' => $request->address,
        'phone-no' => $request->input('phone'),
    ]);
    return response()->json(['success' => true, 'message' => 'Data inserted successfully']);
}
    
    public function ajaxget(){
        return view('laravel.Ajaxadd');

    }
}
