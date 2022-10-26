<?php

namespace Database\Seeders;

use App\Models\MenuNavigation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Permissions
        $permissions = [
            'view role permission',
            'create role', 'view roles', 'update role', 'delete role', 
            'create permission', 'view permissions', 'update permission', 'delete permission', 
            'view assign user to role',
            'create assign user to role', 'update assign user to role',
            'view assign role to permission',
            'create assign role to permission', 'update assign role to permission',
            'view settings', 'view menu navigations',
            'create menu navigation', 'update menu navigation', 'delete menu navigation',
        ];
        foreach($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        # Roles
        $roles = ['super admin', 'web developer'];
        foreach($roles as $index => $role) {
            $role = Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);

            if($index == 0) {
                $give_permissions = [1,3,7,10,11,12,13,14,15,16,17,18,19,20];
            } elseif($index == 1) {
                $give_permissions = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
            }

            $role->givePermissionTo($give_permissions);
        }

        # Menu Navigations
        $menu_navigations = [
            [
                'parent_id' => null,
                'name' => 'Setting',
                'route_name' => null,
                'permission_name' => 'view settings'
            ],
            [
                'parent_id' => 1,
                'name' => 'Menu Navigation',
                'route_name' => 'menu-navigations.index',
                'permission_name' => 'view menu navigations'
            ],
            [
                'parent_id' => null,
                'name' => 'Role & Permission',
                'route_name' => null,
                'permission_name' => 'view role permission'
            ],
            [
                'parent_id' => 3,
                'name' => 'Roles',
                'route_name' => 'roles.index',
                'permission_name' => 'view roles'
            ],
            [
                'parent_id' => 3,
                'name' => 'Permission',
                'route_name' => 'permissions.index',
                'permission_name' => 'view permissions'
            ],
            [
                'parent_id' => 3,
                'name' => 'Assign User to Role',
                'route_name' => 'assign-roles.index',
                'permission_name' => 'view assign user to role'
            ],
            [
                'parent_id' => 3,
                'name' => 'Assign Role to Permission',
                'route_name' => 'assign-permissions.index',
                'permission_name' => 'view assign role to permission'
            ]
        ];
        foreach($menu_navigations as $menu_navigation) {
            MenuNavigation::create($menu_navigation);
        }

        # Users
        $user = User::create([
            'name' => 'Web Developer',
            'email' => 'developer@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        # Assign user Web Developer to role web developer
        $user->assignRole(2);
    }
}
