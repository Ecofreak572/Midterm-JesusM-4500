<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_access',
            ],
            [
                'id'    => 18,
                'title' => 'computer_create',
            ],
            [
                'id'    => 19,
                'title' => 'computer_edit',
            ],
            [
                'id'    => 20,
                'title' => 'computer_show',
            ],
            [
                'id'    => 21,
                'title' => 'computer_delete',
            ],
            [
                'id'    => 22,
                'title' => 'computer_access',
            ],
            [
                'id'    => 23,
                'title' => 'phone_create',
            ],
            [
                'id'    => 24,
                'title' => 'phone_edit',
            ],
            [
                'id'    => 25,
                'title' => 'phone_show',
            ],
            [
                'id'    => 26,
                'title' => 'phone_delete',
            ],
            [
                'id'    => 27,
                'title' => 'phone_access',
            ],
            [
                'id'    => 28,
                'title' => 'tablet_create',
            ],
            [
                'id'    => 29,
                'title' => 'tablet_edit',
            ],
            [
                'id'    => 30,
                'title' => 'tablet_show',
            ],
            [
                'id'    => 31,
                'title' => 'tablet_delete',
            ],
            [
                'id'    => 32,
                'title' => 'tablet_access',
            ],
            [
                'id'    => 33,
                'title' => 'laptop_create',
            ],
            [
                'id'    => 34,
                'title' => 'laptop_edit',
            ],
            [
                'id'    => 35,
                'title' => 'laptop_show',
            ],
            [
                'id'    => 36,
                'title' => 'laptop_delete',
            ],
            [
                'id'    => 37,
                'title' => 'laptop_access',
            ],
            [
                'id'    => 38,
                'title' => 'manufacturer_access',
            ],
            [
                'id'    => 39,
                'title' => 'item_manufacturer_create',
            ],
            [
                'id'    => 40,
                'title' => 'item_manufacturer_edit',
            ],
            [
                'id'    => 41,
                'title' => 'item_manufacturer_show',
            ],
            [
                'id'    => 42,
                'title' => 'item_manufacturer_delete',
            ],
            [
                'id'    => 43,
                'title' => 'item_manufacturer_access',
            ],
            [
                'id'    => 44,
                'title' => 'producthistory_create',
            ],
            [
                'id'    => 45,
                'title' => 'producthistory_edit',
            ],
            [
                'id'    => 46,
                'title' => 'producthistory_show',
            ],
            [
                'id'    => 47,
                'title' => 'producthistory_delete',
            ],
            [
                'id'    => 48,
                'title' => 'producthistory_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
