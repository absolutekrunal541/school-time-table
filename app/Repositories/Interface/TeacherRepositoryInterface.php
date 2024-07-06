<?php

namespace App\Repositories\Interface;

interface TeacherRepositoryInterface
{
    public function all();
    public function getRandom();
    public function findBySubjectId($subjectId);
}
