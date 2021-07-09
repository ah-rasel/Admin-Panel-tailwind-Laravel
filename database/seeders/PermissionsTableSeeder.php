<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'dashboard_access',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_access',
            ],
            [
                'id'    => 4,
                'title' => 'permission_create',
            ],
            [
                'id'    => 5,
                'title' => 'permission_read',
            ],
            [
                'id'    => 6,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 7,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 8,
                'title' => 'role_access',
            ],
            [
                'id'    => 9,
                'title' => 'role_create',
            ],
            [
                'id'    => 10,
                'title' => 'role_read',
            ],
            [
                'id'    => 11,
                'title' => 'role_edit',
            ],
            [
                'id'    => 12,
                'title' => 'role_delete',
            ],
            [
                'id'    => 13,
                'title' => 'user_access',
            ],
            [
                'id'    => 14,
                'title' => 'user_create',
            ],
            [
                'id'    => 15,
                'title' => 'user_read',
            ],
            [
                'id'    => 16,
                'title' => 'user_edit',
            ],
            [
                'id'    => 17,
                'title' => 'user_delete',
            ],
            [
                'id'    => 18,
                'title' => 'profile_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
