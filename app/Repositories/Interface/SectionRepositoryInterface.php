<?php

namespace App\Repositories\Interface;

interface SectionRepositoryInterface
{
    public function all();
    public function findByClassId($classId);
}
