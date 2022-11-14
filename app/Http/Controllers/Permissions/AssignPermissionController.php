<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPermissionRequest;
use Spatie\Permission\Models\{Permission, Role};

class AssignPermissionController extends Controller
{
    public function index() {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('pages.role-permissions.assign-permissions.index', compact('roles', 'permissions'));
    }

    public function store(AssignPermissionRequest $request) {
        $role = Role::find($request->role);
        $role->givePermissionTo($request->permissions);

        return back()->with('flash', "success|Success!|Permmissions has been asigned to the role $role->name");
    }

    public function edit(Role $role) {
        return view('pages.role-permissions.assign-permissions.sync', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get()
        ]);
    }

    public function update(AssignPermissionRequest $request, Role $role) {
        $role->syncPermissions($request->permissions);

        return redirect()->route('assign-permissions.index')->with('flash', 'success|Success!|The permission has been synced.');
    }
}
