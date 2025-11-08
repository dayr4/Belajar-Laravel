<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kampus.test'],
            [
                'name' => 'Admin Dosen',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}
