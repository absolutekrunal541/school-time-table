<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Repositories\Interface\ClassRepositoryInterface;

class ClassRepository implements ClassRepositoryInterface
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
        return Classes::all();
    }
}
