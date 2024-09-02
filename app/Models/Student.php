<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }       
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
