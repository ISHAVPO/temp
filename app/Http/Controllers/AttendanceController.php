<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Register;
use App\Models\Subject;
use App\Models\StudentSubject;
class AttendanceController extends Controller
{
    public function attendance()
    {
        $userId = session('user_id');
        $currentDate = Carbon::now()->toDateString(); 
        $alreadyMarkedIn = Attendance::isMarkedIn($userId, $currentDate);
        $alreadyMarkedOut = Attendance::isMarkedOut($userId, $currentDate);
        return view('laravel.attendance', compact('alreadyMarkedIn', 'alreadyMarkedOut', 'currentDate'));
    }


    public function markin(){
        $attendance=new Attendance;
        $attendance->studentId=session('user_id');
        $attendance->dateIn=now()->toDateString();
        $attendance->dateOut=null;
        $attendance->markIn=now()->toTimeString();
       $attendance->markOut=null;
        $attendance->save();
        return redirect('/stu');
    }
    public function markout(){
        
        $id=session('user_id');
        $currentDate = Carbon::now()->toDateString();
        $attendance = Attendance::whereDate('dateIn', $currentDate)
                                ->where('studentId', $id)
                                ->first();
        
        $attendance->dateOut=now()->toDateString();
        $attendance->markOut=now()->toTimeString();
         $attendance->save();
         return redirect('/stu');
    }

    public function showattendance(){
        $teacherId = Session::get('user_id');
    $subjects = Subject::where('teacher_assigned', $teacherId)->get();
    foreach ($subjects as $subject) {
        $studentrecord= StudentSubject::where('subject_id', $subject->id)
            ->pluck('student_id')
            ->toArray();
        
        $students = Register::whereIn('user_id', $studentrecord)->get();  
     return view('viewattendance',compact('students'));
    }
    }

}
