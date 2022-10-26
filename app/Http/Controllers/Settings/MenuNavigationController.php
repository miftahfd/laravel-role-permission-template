<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuNavigationRequest;
use App\Models\MenuNavigation;
use Spatie\Permission\Models\Permission;

class MenuNavigationController extends Controller
{
    public function index() {
        $permissions = Permission::get();
        $parent_menu_navigations = MenuNavigation::whereNull('parent_id')->get();
        $menu_navigations = MenuNavigation::orderBy('parent_id')->get();
        $menu_navigation = new MenuNavigation;

        return view('pages.settings.menu-navigations.index', compact('permissions', 'parent_menu_navigations', 'menu_navigations', 'menu_navigation'));
    }

    public function store(MenuNavigationRequest $request) {
        MenuNavigation::create([
            'parent_id' => $request->parent ?? null,
            'permission_name' => $request->permission,
            'name' => $request->name,
            'route_name' => $request->route_name ?? null
        ]);

        return back();
    }

    public function edit(MenuNavigation $menu_navigation) {
        return view('pages.settings.menu-navigations.edit', [
            'menu_navigation' => $menu_navigation,
            'permissions' => Permission::get(),
            'parent_menu_navigations' => MenuNavigation::whereNull('parent_id')->get(),
            'menu_navigations' => MenuNavigation::orderBy('parent_id')->get()
        ]);
    }

    public function update(MenuNavigationRequest $request, MenuNavigation $menu_navigation) {
        $menu_navigation->update([
            'parent_id' => $request->parent ?? null,
            'permission_name' => $request->permission,
            'name' => $request->name,
            'route_name' => $request->route_name ?? null
        ]);

        return redirect()->route('menu-navigations.index');
    }
}
