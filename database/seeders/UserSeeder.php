<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'name' => 'Super Administrator',
                'email' => 'admin@astagina.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'Super Admin',
                'staff_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'nia',
                'name' => 'Bu Nia',
                'email' => 'nia@astagina.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'Staff',
                'staff_id' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'budi',
                'name' => 'Pak Budi',
                'email' => 'budi@astagina.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'Staff',
                'staff_id' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'sari',
                'name' => 'Ibu Sari',
                'email' => 'sari@astagina.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'Admin',
                'staff_id' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
        
        $this->command->info('✓ Users seeded successfully!');
        $this->command->warn('  Default password: password123');
    }
}
