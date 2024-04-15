<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';

    public static function isMarkedIn($userId, $date)
    {
        return self::where('studentId', $userId)
                   ->whereDate('dateIn', $date)
                   ->exists();
    }
    public static function isMarkedOut($userId, $date)
    {
        return self::where('studentId', $userId)
                   ->whereDate('dateOut', $date)
                   ->exists();
    }


}
