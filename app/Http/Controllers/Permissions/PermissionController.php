<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::get();
        $permission = new Permission;

        return view('pages.role-permissions.permissions.index', compact('permissions', 'permission'));
    }

    public function store(PermissionRequest $request) {
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return back()->with('flash', 'success|Success!|Create permission');
    }

    public function edit(Permission $permission) {
        return view('pages.role-permissions.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(PermissionRequest $request, Permission $permission) {
        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('flash', 'success|Success!|Update permission');
    }
}
