<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;
use Modules\User\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserRepository $user)
    {
        return $user->create($request);
    }
}
