<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function create(Request $request, User $user)
    {
        return $user->create($request->all());
    }

    public function read(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all())->saveOrFail();
        return $user;
    }

    public function delete(User $user)
    {
        $user->deleteOrFail();
        return $user;
    }

    public function find(User $user)
    {
        return $user->get();
    }
}
