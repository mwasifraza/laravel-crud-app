<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fullname', 'email', 'username', 'password', 'role', 'gender', 'avatar'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => 'user',
        'avatar' => 'storage/user.png',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function setFullnameAttribute($value){
        $this->attributes['fullname'] = ucwords($value);
    }

    // public function getGenderAttribute($value){
    //     return ucwords($value);
    // }
}
