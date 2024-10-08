<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_id'];

    // Define relationship with Classes
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
