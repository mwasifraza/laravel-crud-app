<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "student_id";

    public function setFullnameAttribute($value){
        $this->attributes['fullname'] = ucwords($value);
    }

    // public function getGenderAttribute($value){
    //     return ucwords($value);
    // }
}
