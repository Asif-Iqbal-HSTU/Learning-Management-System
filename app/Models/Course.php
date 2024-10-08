<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }    

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }  
}
