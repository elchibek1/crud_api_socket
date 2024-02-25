<?php

namespace Database\Seeders;

use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\Editor\EditorSeeder;
use Database\Seeders\Permission\PermissionSeeder;
use Database\Seeders\Product\ProductSeeder;
use Database\Seeders\Role\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            EditorSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
