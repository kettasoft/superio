<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Response;
use Modules\User\Models\User;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Requests\CreateUserRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('show');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return User::paginate(100);
    }

    /**
     * Store a newly created resource in storage.
     * @param RegisterRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request, UserRepository $user)
    {
        return $user->create($request);
    }

    /**
     * Show the specified resource.
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     * @param CreateUserRequest $request
     * @param int $id
     * @param UserRepository $user
     * @return Response
     */
    public function update(CreateUserRequest $request, int $id, UserRepository $user)
    {
        return $user->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(int $id, UserRepository $user): bool
    {
        return $user->delete($id);
    }
}
