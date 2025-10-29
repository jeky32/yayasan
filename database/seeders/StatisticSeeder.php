<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'stat_name' => 'jumlah_mentor',
                'stat_value' => 2,
                'stat_unit' => 'orang',
                'description' => 'Total mentor aktif di yayasan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stat_name' => 'jumlah_anak',
                'stat_value' => 8,
                'stat_unit' => 'orang',
                'description' => 'Total anak asuh aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stat_name' => 'keseluruhan_biaya_anak',
                'stat_value' => 1,
                'stat_unit' => 'unit',
                'description' => 'Total biaya per anak per bulan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stat_name' => 'quota_rutin',
                'stat_value' => 1,
                'stat_unit' => 'unit',
                'description' => 'Kuota rutin bulanan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stat_name' => 'total_donatur',
                'stat_value' => 45,
                'stat_unit' => 'orang',
                'description' => 'Total donatur terdaftar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stat_name' => 'total_program',
                'stat_value' => 3,
                'stat_unit' => 'program',
                'description' => 'Total program aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('statistics')->insert($statistics);
        $this->command->info('✓ Statistics seeded successfully!');
    }
}
