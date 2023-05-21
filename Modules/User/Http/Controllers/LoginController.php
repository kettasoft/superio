<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Services\GenerateNewPersonalAccessToken;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, GenerateNewPersonalAccessToken $accessToken)
    {
        if ($this->attempt($request->validated())) {
            return $accessToken->generate(auth()->user());
        }

        return response()->json('User not found');
    }

    private function attempt(array $request)
    {
        return Auth::attempt($request);
    }
}
