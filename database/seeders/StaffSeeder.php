<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $staff = [
            [
                'employee_number' => 'EMP001',
                'full_name' => 'Bu Nia',
                'position' => 'Mentor Senior',
                'department' => 'Pendidikan',
                'email' => 'nia@astagina.ac.id',
                'phone' => '081234567890',
                'date_of_birth' => '1985-03-15',
                'address' => 'Bandung',
                'join_date' => '2023-01-15',
                'employment_status' => 'Active',
                'location_id' => 1,
                'education' => 'S1 Psikologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_number' => 'EMP002',
                'full_name' => 'Pak Budi',
                'position' => 'Mentor',
                'department' => 'Pendidikan',
                'email' => 'budi@astagina.ac.id',
                'phone' => '081234567891',
                'date_of_birth' => '1988-07-20',
                'address' => 'Bandung',
                'join_date' => '2023-03-20',
                'employment_status' => 'Active',
                'location_id' => 1,
                'education' => 'S1 Pendidikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_number' => 'EMP003',
                'full_name' => 'Ibu Sari',
                'position' => 'Koordinator Program',
                'department' => 'Program',
                'email' => 'sari@astagina.ac.id',
                'phone' => '081234567892',
                'date_of_birth' => '1983-11-10',
                'address' => 'Malang',
                'join_date' => '2022-06-10',
                'employment_status' => 'Active',
                'location_id' => 3,
                'education' => 'S2 Manajemen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_number' => 'EMP004',
                'full_name' => 'Pak Ahmad',
                'position' => 'Admin',
                'department' => 'Administrasi',
                'email' => 'ahmad@astagina.ac.id',
                'phone' => '081234567893',
                'date_of_birth' => '1990-05-25',
                'address' => 'Malang',
                'join_date' => '2023-02-01',
                'employment_status' => 'Active',
                'location_id' => 3,
                'education' => 'D3 Administrasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('staff')->insert($staff);
        $this->command->info('✓ Staff seeded successfully!');
    }
}
