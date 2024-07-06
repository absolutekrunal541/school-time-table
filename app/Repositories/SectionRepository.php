<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\Interface\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
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
        return Section::all();
    }

    public function findByClassId($classId)
    {
        return Section::where('class_id', $classId)->get();
    }
}
