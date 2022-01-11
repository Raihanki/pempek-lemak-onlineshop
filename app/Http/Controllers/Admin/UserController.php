<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user-management', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.create', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $role = Role::findOrFail($data['role']);
        $data['role'] = $role;
        $data['password'] = bcrypt($data['password']);

        $dataCreated = User::create($data);
        $dataCreated->roles()->attach($data['role']);

        session()->flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('admin.user-management.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', compact('user','roles'));
    }

    public function update(CreateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $role = Role::where('id', $data['role'])->firstOrFail();
        $data['role'] = $role;

        $user->update($data);
        $user->roles()->sync($data['role']);

        session()->flash('message', 'Data berhasil diedit');
        return redirect()->route('admin.user-management.index');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        session()->flash('message', "Data berhasil dihapus");
        return redirect()->route('admin.user-management.index');
    }
}
