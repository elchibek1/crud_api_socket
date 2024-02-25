<?php

namespace Database\Seeders\Permission;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'create_category', 'update_category', 'delete_category', 'update_user', 'update_product',
            'create_product', 'delete_product', 'view_product', 'view_category', 'view_user', 'create_user', 'delete_user',
            'view_passport', 'create_passport', 'update_passport', 'delete_passport'
        ];

        foreach ($permissions as $permission)
        {
            Permission::firstOrCreate(['name' => $permission]);
        }

    }
}
