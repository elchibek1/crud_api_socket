<?php

namespace Database\Seeders\Editor;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EditorSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => Hash::make('password'),
        ])->assignRole('editor');
    }
}
