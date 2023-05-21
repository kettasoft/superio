<?php

namespace Modules\User\Services;

use Modules\User\Models\User;

class GenerateNewPersonalAccessToken
{
    public function generate(User $user): string
    {
        return $user->createToken('web')->plainTextToken;
    }
}
