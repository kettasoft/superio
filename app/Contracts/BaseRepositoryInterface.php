<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{

    public function create($request);
    public function delete(int $id);
    public function update($request, int $id);
}
