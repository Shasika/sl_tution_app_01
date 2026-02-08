<?php

namespace App\Http\Controllers\Api;

use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): mixed
    {
        return User::paginate(25);
    }

    public function store(Request $request): User
    {
        $data = $request->validate([
            'institute_id' => ['nullable', 'integer'],
            'branch_id' => ['nullable', 'integer'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function update(Request $request, User $user): User
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string'],
            'phone' => ['nullable', 'string'],
            'role' => ['sometimes', 'string'],
            'status' => ['sometimes', 'string'],
        ]);

        $user->update($data);

        return $user;
    }

    public function destroy(User $user): array
    {
        $user->delete();

        return ['status' => 'deleted'];
    }
}
