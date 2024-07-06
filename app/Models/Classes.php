<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';  // Use 'classes' instead of default 'classeses' pluralization
    protected $fillable = ['name'];

    // Define relationship with Sections
    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id');
    }

    // Define relationship with Subjects
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}
