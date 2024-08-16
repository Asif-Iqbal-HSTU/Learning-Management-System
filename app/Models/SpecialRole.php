<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialRole extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
