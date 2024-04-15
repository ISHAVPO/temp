<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\StudentSubject;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Subject;

class CrudController extends Controller
{
    
public function createsub()
{
    $url = url('/create/subject');
    $title = "Create Subject";
    $teacher = Register::where('role_id', 2)->get(); // Fetch all teachers
    $data = compact('url', 'title', 'teacher');
    return view('laravel.createsub')->with($data);
}

public function createsubpost(Request $request)
{
    $subject = new Subject;
    $subject->sub_name = $request['subject'];
    $subject->sub_desc = $request['desc'];
    $subject->teacher_assigned = $request['teacher'];
    $subject->save();

    return redirect('/dash');
}
    public function subview(){
        
        $subject = Subject::all();
        return view('laravel.subview',compact('subject'));
    }
    public function del($id)
    {
        $data = Subject::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $subject = Subject::find($id);
    
        if (is_null($subject)) {
            return redirect('dash')->with('error', 'Subject not found.');
        } else {
            $title = "UPDATE Subject";
            $url = url('/subjectupdate') . "/" . $id;
            $teacher = Register::where('role_id', 2)->get(); // Fetch all teachers
            $data = compact('subject', 'url', 'title', 'teacher');
            return view('laravel.createsub')->with($data);
        }
    }
    
    public function update($id, Request $request)
    {
        $subject = Subject::find($id);
    
        if (is_null($subject)) {
            return redirect('dash')->with('error', 'Subject not found.');
        }
    
        $subject->sub_name = $request['subject'];
        $subject->sub_desc = $request['desc'];
        $subject->teacher_assigned = $request['teacher'];
        $subject->save();
    
        return redirect('/subjectview');
    }
        public function subjectoffered()
    {
        $student_id = Session::get('user_id');
        $subjects = StudentSubject::where('student_id', $student_id)->get();
    
        $subject_names = [];
        foreach ($subjects as $subject) {
            $subject_names[] = Subject::where('id', $subject->subject_id)->value('sub_name');
        }
    
        return view('laravel.suboffer', compact('subjects', 'subject_names'));
    }
    
    public function subjectstatus(){
        $subjects = Subject::all();
        return view('laravel.submodal',compact('subjects'));
    }
    public function subjectstatuspost(Request $request){
  
        $selectedSubjects = $request->input('subject');
        
    
        foreach ($selectedSubjects as $subjectId) {
            $selectedSubject = new StudentSubject;
            $selectedSubject->subject_id = $subjectId;
            $selectedSubject->student_id = session()->get('user_id');
            $selectedSubject->status = 'pending';
            $selectedSubject->save();
          
        }
        return redirect('/stu');
    }
//    public function studentRequest(){
        
//     $teacher_id = Session::get('user_id');
//     // dd($teacher_id);
//     $subject_assigned=Subject::where('teacher_assigned', $teacher_id)->get();
//    dd($subject_assigned);
   
//     // $subjectIds = $subject_assigned->pluck('id')->toArray();
//     // dd($subjectIds);
//     foreach($subject_assigned as $subject){
//         // dd($subject);
//         $students = StudentSubject::where('subject_id', $subject->id)->get(); 
//     }   
    
//     // dd($students);
//     $student_ids = $students->pluck('student_id')->toArray();
   

//     $student_data = Register::whereIn('user_id', $student_ids)->get(['user_id', 'name']);

// //    dd($student_data);
    
    
//     // foreach ($students as $student) {
//     //     $studentId = $student->student_id;
//     //     dump($studentId);
//     // }
//         return view('laravel.provideStatus',compact('subject_assigned','student_data','students'));
//    }
//    public function approve($student, $subject) {

//     $result = StudentSubject::where('student_id', $student)
//                             ->where('subject_id', $subject)
//                             ->first();

    
//     if ($result) {
//         $result->update(['status' => 'approved']);
//     }
    
//     return redirect('/student/request');
// }


// public function reject($student, $subject,$reason) {

//     $result = StudentSubject::where('student_id', $student)
//                              ->where('subject_id', $subject)
//                              ->first(); 

//     if ($result) {
//         $result->update(['status' => 'rejected:'.$reason]);
//     }

//     return redirect('/student/request');
// }

// 
public function studentRequest() {
    $teacherId = Session::get('user_id');
    $subjects = Subject::where('teacher_assigned', $teacherId)->get();
    $studentData = [];
    $noMoreRequests = true; 
    foreach ($subjects as $subject) {
        $pendingStudentIds = StudentSubject::where('subject_id', $subject->id)
            ->where('status', 'pending')
            ->pluck('student_id')
            ->toArray();
        
        $students = Register::whereIn('user_id', $pendingStudentIds)->get();

        if ($students->isNotEmpty()) {
            $noMoreRequests = false; 
            $studentData[] = [
                'subject' => $subject,
                'students' => $students,
            ];
        }
    }
    if ($noMoreRequests) {
        $message = "No more pending student requests.";
        return view('laravel.provideStatus', compact('message', 'studentData'));
    }

    return view('laravel.provideStatus', compact('studentData'));
}





public function approve($student_id, $subject_id) {
    $result = StudentSubject::where('student_id', $student_id)
                            ->where('subject_id', $subject_id)
                            ->first();

    if ($result) {
        $result->update(['status' => 'approved']);
    }
    
    return redirect('/student/request');
}

public function reject($student_id, $subject_id,$reason) {
    $result = StudentSubject::where('student_id', $student_id)
                            ->where('subject_id', $subject_id)
                            ->first(); 


    if ($result) {
        $result->update(['status' => 'rejected:'.$reason]);
    }
    

    return redirect('/student/request');
}

}


