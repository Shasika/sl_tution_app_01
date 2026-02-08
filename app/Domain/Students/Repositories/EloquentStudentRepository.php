<?php

namespace App\Domain\Students\Repositories;

use App\Domain\Students\Models\Student;

class EloquentStudentRepository implements StudentRepositoryInterface
{
    public function paginate(int $perPage = 25): mixed
    {
        return Student::paginate($perPage);
    }
}
