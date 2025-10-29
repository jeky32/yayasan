<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Activities
        $activities = [
            [
                'activity_id' => 1,
                'activity_name' => 'Pembelajaran Matematika Dasar',
                'activity_type' => 'Education',
                'description' => 'Kegiatan pembelajaran matematika dasar untuk anak-anak tingkat SD',
                'activity_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '11:00:00',
                'location_id' => 1,
                'instructor_id' => 1,
                'max_participants' => 15,
                'notes' => 'Membawa alat tulis dan buku catatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 2,
                'activity_name' => 'Keterampilan Menjahit',
                'activity_type' => 'Skills',
                'description' => 'Pelatihan keterampilan menjahit untuk membuat pakaian sederhana',
                'activity_date' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'location_id' => 4,
                'instructor_id' => 2,
                'max_participants' => 10,
                'notes' => 'Alat jahit disediakan oleh yayasan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 3,
                'activity_name' => 'Konseling Kelompok',
                'activity_type' => 'Counseling',
                'description' => 'Sesi konseling kelompok untuk pengembangan kepercayaan diri',
                'activity_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'location_id' => 1,
                'instructor_id' => 1,
                'max_participants' => 8,
                'notes' => 'Sesi private, tidak ada orang luar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 4,
                'activity_name' => 'Rekreasi ke Taman',
                'activity_type' => 'Recreation',
                'description' => 'Kegiatan rekreasi ke taman kota untuk refreshing',
                'activity_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '14:00:00',
                'location_id' => 1,
                'instructor_id' => 2,
                'max_participants' => 20,
                'notes' => 'Membawa bekal dan minuman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 5,
                'activity_name' => 'Pemeriksaan Kesehatan Rutin',
                'activity_type' => 'Health',
                'description' => 'Pemeriksaan kesehatan rutin bulanan untuk semua anak asuh',
                'activity_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'start_time' => '08:00:00',
                'end_time' => '12:00:00',
                'location_id' => 1,
                'instructor_id' => 1,
                'max_participants' => 30,
                'notes' => 'Bekerjasama dengan Puskesmas setempat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('activities')->insert($activities);

        // Activity Participants
        $participants = [
            // Activity 1 - Pembelajaran Matematika
            ['activity_id' => 1, 'beneficiary_id' => 1, 'participation_status' => 'Registered'],
            ['activity_id' => 1, 'beneficiary_id' => 2, 'participation_status' => 'Registered'],
            ['activity_id' => 1, 'beneficiary_id' => 3, 'participation_status' => 'Registered'],
            ['activity_id' => 1, 'beneficiary_id' => 4, 'participation_status' => 'Registered'],
            ['activity_id' => 1, 'beneficiary_id' => 5, 'participation_status' => 'Registered'],
            
            // Activity 2 - Keterampilan Menjahit
            ['activity_id' => 2, 'beneficiary_id' => 2, 'participation_status' => 'Registered'],
            ['activity_id' => 2, 'beneficiary_id' => 4, 'participation_status' => 'Registered'],
            ['activity_id' => 2, 'beneficiary_id' => 6, 'participation_status' => 'Registered'],
            
            // Activity 3 - Konseling
            ['activity_id' => 3, 'beneficiary_id' => 1, 'participation_status' => 'Registered'],
            ['activity_id' => 3, 'beneficiary_id' => 3, 'participation_status' => 'Registered'],
            ['activity_id' => 3, 'beneficiary_id' => 5, 'participation_status' => 'Registered'],
            ['activity_id' => 3, 'beneficiary_id' => 7, 'participation_status' => 'Registered'],
            
            // Activity 4 - Rekreasi (All)
            ['activity_id' => 4, 'beneficiary_id' => 1, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 2, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 3, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 4, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 5, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 6, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 7, 'participation_status' => 'Registered'],
            ['activity_id' => 4, 'beneficiary_id' => 8, 'participation_status' => 'Registered'],
            
            // Activity 5 - Kesehatan (All)
            ['activity_id' => 5, 'beneficiary_id' => 1, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 2, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 3, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 4, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 5, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 6, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 7, 'participation_status' => 'Registered'],
            ['activity_id' => 5, 'beneficiary_id' => 8, 'participation_status' => 'Registered'],
        ];

        foreach ($participants as $participant) {
            DB::table('activity_participants')->insert(array_merge($participant, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('✓ Activities and Activity Participants seeded successfully!');
    }
}
