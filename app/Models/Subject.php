<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table="subject";
    public function register()

    {
        return $this->belongsToMany(Register::class,'student_subject','student_id','subject_id')->withPivot('status');
    }
}
