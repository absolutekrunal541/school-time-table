<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_id'];

    // Define relationship with Classes
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    // Define relationship with Teachers (if needed)
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
