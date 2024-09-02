<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function dean()
    {
        return $this->hasOne(User::class);
    }    

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }  

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
