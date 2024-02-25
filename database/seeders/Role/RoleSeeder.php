<?php

namespace Database\Seeders\Role;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin'])
            ->syncPermissions(
                [
                    'create_category', 'update_category', 'delete_category', 'update_user', 'update_product',
                    'create_product', 'delete_product', 'view_product', 'view_category', 'view_user', 'create_user', 'delete_user',
                    'view_passport', 'create_passport', 'update_passport', 'delete_passport'
                ]);

        Role::create(['name' => 'editor'])
            ->syncPermissions(
                [
                    'create_category', 'update_category', 'delete_category', 'view_category',
                    'update_product', 'create_product', 'delete_product', 'view_product',
                ]);

    }
}
