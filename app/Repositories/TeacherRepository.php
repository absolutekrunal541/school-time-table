<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\Interface\TeacherRepositoryInterface;

class TeacherRepository implements TeacherRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all()
    {
        return Teacher::all();
    }

    public function getRandom()
    {
        return Teacher::inRandomOrder()->first();
    }

    public function findBySubjectId($subjectId)
    {
        // Assuming there's a relationship between subjects and teachers
        // Adjust according to your actual relationships and logic
        return Teacher::whereHas('subjects', function ($query) use ($subjectId) {
            $query->where('subjects.id', $subjectId);
        })->get();
    }
}
