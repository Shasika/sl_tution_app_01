<?php

namespace App\Domain\Students\Repositories;

interface StudentRepositoryInterface
{
    public function paginate(int $perPage = 25): mixed;
}
