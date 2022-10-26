<?php

namespace App\View\Components\layouts;

use App\Models\MenuNavigation;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $roles = Role::get();
        $menu_navigations = MenuNavigation::with('childrens')->whereNull('parent_id')->get();
        return view('components.layouts.navigation', compact('roles', 'menu_navigations'));
    }
}
