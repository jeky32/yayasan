<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            [
                'location_name' => 'Rumah Singgah Bandung',
                'location_type' => 'Rumah Singgah',
                'address' => 'Jl. Jawa Barat No. 177',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40123',
                'phone' => '022-1234567',
                'email' => 'rumahsinggah@astagina.ac.id',
                'capacity' => 20,
                'facilities' => 'Kamar tidur, Ruang belajar, Dapur, Area bermain, Perpustakaan',
                'latitude' => -6.9175,
                'longitude' => 107.6191,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'K-seal Advokasi Jakarta',
                'location_type' => 'Advokasi',
                'address' => 'Menara Sudirman Lantai 23',
                'city' => 'Jakarta Pusat',
                'province' => 'DKI Jakarta',
                'postal_code' => '10220',
                'phone' => '021-9876543',
                'email' => 'advokasi@astagina.ac.id',
                'capacity' => 10,
                'facilities' => 'Ruang meeting, Ruang konsultasi, Kantor administrasi',
                'latitude' => -6.2088,
                'longitude' => 106.8456,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Kantor Pusat Malang',
                'location_type' => 'Kantor',
                'address' => 'Jl. Merah Delima No 27',
                'city' => 'Malang',
                'province' => 'Jawa Timur',
                'postal_code' => '65141',
                'phone' => '0341-234567',
                'email' => 'info@astagina.ac.id',
                'capacity' => 15,
                'facilities' => 'Ruang kerja, Meeting room, Arsip',
                'latitude' => -7.9666,
                'longitude' => 112.6326,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Edukasi Center Surabaya',
                'location_type' => 'Edukasi Center',
                'address' => 'Jl. Ahmad Yani No. 89',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'postal_code' => '60234',
                'phone' => '031-8765432',
                'email' => 'edukasi@astagina.ac.id',
                'capacity' => 30,
                'facilities' => 'Ruang kelas, Lab komputer, Perpustakaan, Workshop',
                'latitude' => -7.2575,
                'longitude' => 112.7521,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Perpustakaan Bunda Laras',
                'location_type' => 'Perpustakaan',
                'address' => 'Jalan Mahoni 17',
                'city' => 'Semarang',
                'province' => 'Jawa Tengah',
                'postal_code' => '50132',
                'phone' => '024-8765432',
                'email' => 'perpustakaan@astagina.ac.id',
                'capacity' => 25,
                'facilities' => 'Koleksi buku, Ruang baca, Area multimedia',
                'latitude' => -6.9667,
                'longitude' => 110.4167,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('locations')->insert($locations);
        $this->command->info('✓ Locations seeded successfully!');
    }
}
