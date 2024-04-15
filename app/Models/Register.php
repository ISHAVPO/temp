<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    use HasFactory;
    protected $table="register";

    protected $fillables = [
        'name',
        'gender',
        'password',
        'salary',
        'email',
        'role_id',
    ];
    protected $primaryKey="user_id";
    public function subject()

    {
        return $this->belongsToMany(Subject::class,'student_subject','student_id','subject_id');
    }

    // public function student(){
    //     return $this->where('role_id',4)->get();
    // }
    // public function teachers(){
    //     $this->where('role_id',2)->get();
    // }

    // public function pendingStatus(){

    //     $this->student()->subject()->where('status','pending')->get();
    // }
  
    public function currentAttendance()
    {
        return $this->hasMany(Attendance::class,'studentId')->whereDate('dateIn', now()->toDateString());
    }
    public function allAttendance()
    {
        return $this->hasMany(Attendance::class,'studentId');
    }
    
    }
    

