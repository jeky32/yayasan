<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Kegiatan Pembelajaran Bersama',
                'description' => 'Anak-anak sedang mengikuti kegiatan pembelajaran bersama di ruang kelas',
                'image' => 'gallery/pembelajaran.jpg',
                'image_url' => 'gallery/pembelajaran.jpg',
                'category' => 'Pendidikan',
                'type' => 'photo',
                'upload_date' => now()->subDays(5),
                'location_id' => 1,
                'is_featured' => true,
                'display_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Workshop Keterampilan Menjahit',
                'description' => 'Pelatihan menjahit untuk anak-anak perempuan',
                'image' => 'gallery/menjahit.jpg',
                'image_url' => 'gallery/menjahit.jpg',
                'category' => 'Keterampilan',
                'type' => 'photo',
                'upload_date' => now()->subDays(10),
                'location_id' => 4,
                'is_featured' => true,
                'display_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rekreasi ke Taman',
                'description' => 'Kegiatan rekreasi bersama ke taman kota',
                'image' => 'gallery/rekreasi.jpg',
                'image_url' => 'gallery/rekreasi.jpg',
                'category' => 'Rekreasi',
                'type' => 'photo',
                'upload_date' => now()->subDays(3),
                'location_id' => 1,
                'is_featured' => true,
                'display_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peresmian Rumah Singgah',
                'description' => 'Acara peresmian rumah singgah baru di Bandung',
                'image' => 'gallery/peresmian.jpg',
                'image_url' => 'gallery/peresmian.jpg',
                'category' => 'Event',
                'type' => 'photo',
                'upload_date' => now()->subDays(15),
                'location_id' => 1,
                'is_featured' => true,
                'display_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kegiatan Memasak Bersama',
                'description' => 'Anak-anak belajar memasak di dapur',
                'image' => 'gallery/memasak.jpg',
                'image_url' => 'gallery/memasak.jpg',
                'category' => 'Keterampilan',
                'type' => 'photo',
                'upload_date' => now()->subDays(7),
                'location_id' => 1,
                'is_featured' => false,
                'display_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Perpustakaan Mini',
                'description' => 'Fasilitas perpustakaan mini untuk anak-anak',
                'image' => 'gallery/perpustakaan.jpg',
                'image_url' => 'gallery/perpustakaan.jpg',
                'category' => 'Fasilitas',
                'type' => 'photo',
                'upload_date' => now()->subDays(12),
                'location_id' => 1,
                'is_featured' => true,
                'display_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('gallery')->insert($galleries);
        $this->command->info('✓ Gallery seeded successfully!');
    }
}
