<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table="feature";
    public function role_ids()
    {
        return $this->belongsToMany(Role_Ids::class,'feature_role__ids','role_id','feature_id');
    }
}
