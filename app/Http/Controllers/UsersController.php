<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users =  User::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->where('is_admin', 0)
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'can' => [
                    'edit' => Auth::user()->can('edit', $user)
                ]
            ]);

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => $request->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class),
            ]
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,except,id'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $this->authorize('edit', User::class);
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($attributes);

        return redirect('/users');
    }
}
