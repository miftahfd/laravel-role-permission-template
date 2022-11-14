<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::get();
        $role = new Role;

        return view('pages.role-permissions.roles.index', compact('roles', 'role'));
    }

    public function store(RoleRequest $request) {
        Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return back()->with('flash', 'success|Success!|Create role');
    }

    public function edit(Role $role) {
        return view('pages.role-permissions.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(RoleRequest $request, Role $role) {
        $role->update(['name' => $request->name]);

        return redirect()->route('roles.index')->with('flash', 'success|Success!|Update role');
    }
}
