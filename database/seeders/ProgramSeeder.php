<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'program_name' => 'Pendidikan Dasar',
                'program_code' => 'PROG001',
                'slug' => 'pendidikan-dasar',
                'description' => 'Program pendidikan dasar untuk anak usia SD dengan fokus pada mata pelajaran inti dan pengembangan karakter.',
                'objectives' => 'Memberikan pendidikan dasar berkualitas, meningkatkan kemampuan literasi dan numerasi, serta membentuk karakter yang baik.',
                'target_participants' => 20,
                'actual_participants' => 8,
                'start_date' => '2023-01-01',
                'end_date' => '2025-12-31',
                'status' => 'Active',
                'budget' => 50000000,
                'actual_cost' => 25000000,
                'location_id' => 1,
                'coordinator_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_name' => 'Keterampilan Hidup',
                'program_code' => 'PROG002',
                'slug' => 'keterampilan-hidup',
                'description' => 'Pelatihan keterampilan hidup sehari-hari seperti memasak, menjahit, dan keterampilan praktis lainnya untuk kemandirian.',
                'objectives' => 'Membekali anak dengan keterampilan praktis untuk kehidupan sehari-hari dan masa depan.',
                'target_participants' => 15,
                'actual_participants' => 8,
                'start_date' => '2023-01-01',
                'end_date' => '2025-12-31',
                'status' => 'Active',
                'budget' => 30000000,
                'actual_cost' => 15000000,
                'location_id' => 4,
                'coordinator_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_name' => 'Konseling Psikologi',
                'program_code' => 'PROG003',
                'slug' => 'konseling-psikologi',
                'description' => 'Layanan konseling dan pendampingan psikologi untuk mendukung kesehatan mental dan emosional anak asuh.',
                'objectives' => 'Memberikan dukungan psikologis, membantu anak mengatasi trauma, dan mengembangkan mental yang sehat.',
                'target_participants' => 10,
                'actual_participants' => 8,
                'start_date' => '2023-01-01',
                'end_date' => '2025-12-31',
                'status' => 'Active',
                'budget' => 20000000,
                'actual_cost' => 10000000,
                'location_id' => 1,
                'coordinator_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_name' => 'Keterampilan Digital',
                'program_code' => 'PROG004',
                'slug' => 'keterampilan-digital',
                'description' => 'Program pelatihan keterampilan digital meliputi komputer dasar, desain grafis, dan digital marketing.',
                'objectives' => 'Mempersiapkan anak menghadapi era digital dengan keterampilan teknologi yang memadai.',
                'target_participants' => 15,
                'actual_participants' => 0,
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'status' => 'Planned',
                'budget' => 35000000,
                'actual_cost' => 0,
                'location_id' => 4,
                'coordinator_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('programs')->insert($programs);
        $this->command->info('✓ Programs seeded successfully!');
    }
}
