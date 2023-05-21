<?php

namespace Modules\User\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Modules\User\Models\User;

class UserRepository extends BaseRepositoryInterface
{
    public function create($request): User
    {
        return User::create($request->validated());
    }

    public function update($request, int $id): User
    {
        return User::find($id)->update($request);
    }

    public function delete($id): bool
    {
        return User::find($id)->delete();
    }
}
