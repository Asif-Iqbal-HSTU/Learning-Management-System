<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }
}
