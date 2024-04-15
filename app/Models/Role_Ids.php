<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Ids extends Model
{
    use HasFactory;
    protected $table = 'role_ids';

    protected $fillables = [
        'name',
    ];

    public function feature()
    {
        return $this->belongsToMany(Feature::class,'feature_role__ids','role_id','feature_id');
      
    }
}
