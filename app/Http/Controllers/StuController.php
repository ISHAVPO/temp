<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StuController extends Controller
{
    public function stuget(){
        return view('crud');
    }
    public function stupost(Request $request){
        // dd($request->all());
       $stu=new Student;
       $stu->name=$request->name;
       $stu->class=$request->class;
       $stu->marks=$request->marks;
       $stu->save();
       return redirect('/stuview');
}
public function view(){
    $data=Student::all();
    return view('stuview',compact('data'));
}
public function del($roll_no){
    $data=Student::find($roll_no);
    $data->delete();
    return redirect()->back();
}
public function update($roll_no){
    $data=Student::find($roll_no);
    // dd($data);
   return view('editmy',compact('data'));  
}

 public function updatepost($roll_no,Request $request)
 {
 $stu=Student::find($roll_no);
 $stu->name=$request->name;
 $stu->class=$request->class;
 $stu->marks=$request->marks;
 $stu->save();
 return redirect('/stuview');
 }
}