<?php

namespace App\Repositories;

use App\Models\Subject;
use App\Repositories\Interface\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function findByClassId($classId)
    {
        return Subject::where('class_id', $classId)->get();
    }
}
