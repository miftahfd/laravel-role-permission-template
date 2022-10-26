<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    public function index() {
        $roles = Role::get();
        $users = User::get();

        return view('pages.role-permissions.assign-roles.index', compact('roles', 'users'));
    }

    public function store(AssignRoleRequest $request) {
        $user = User::find($request->user);
        $user->assignRole($request->roles);

        return back()->with('success', "Roles has been asigned to the user $user->name");
    }

    public function edit(User $user) {
        return view('pages.role-permissions.assign-roles.sync', [
            'user' => $user,
            'users' => User::get(),
            'roles' => Role::get()
        ]);
    }

    public function update(AssignRoleRequest $request, User $user) {
        $user->syncRoles($request->roles);

        return redirect()->route('assign-roles.index')->with('success', 'The roles has been synced.');
    }
}
