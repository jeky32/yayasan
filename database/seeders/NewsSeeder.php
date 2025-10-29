<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Peresmian Rumah Singgah Astagina Adi Cahya di Bandung',
                // 'slug' => 'peresmian-rumah-singgah-astagina-adi-cahya-di-bandung',
                'excerpt' => 'Yayasan Astagina Adi Cahya meresmikan rumah singgah baru di Bandung untuk menampung lebih banyak anak yang membutuhkan.',
                'content' => '<p>Bandung - Yayasan Astagina Adi Cahya dengan bangga mengumumkan peresmian rumah singgah terbaru yang berlokasi di Jl. Jawa Barat No. 177, Bandung. Fasilitas seluas 500 meter persegi ini mampu menampung hingga 20 anak asuh dengan fasilitas lengkap dan nyaman.</p>

<p>Peresmian dihadiri oleh Ketua Yayasan, perwakilan Dinas Sosial Kota Bandung, dan para donatur yang telah mendukung pembangunan rumah singgah ini. "Ini adalah wujud komitmen kami untuk memberikan tempat yang layak dan nyaman bagi anak-anak yang membutuhkan," ujar Ibu Nia, Ketua Yayasan Astagina Adi Cahya.</p>

<p>Rumah singgah ini dilengkapi dengan:</p>
<ul>
<li>Kamar tidur nyaman dengan kapasitas 20 anak</li>
<li>Ruang belajar dengan fasilitas multimedia</li>
<li>Dapur dan ruang makan</li>
<li>Area bermain dan taman</li>
<li>Perpustakaan mini</li>
<li>Ruang konseling</li>
</ul>

<p>Program yang akan dijalankan meliputi pendidikan formal, keterampilan hidup, konseling psikologi, dan berbagai kegiatan pengembangan karakter.</p>',
                'image' => 'news/peresmian-rumah-singgah.jpg',
                'category' => 'Kegiatan',
                'author' => 'Tim Redaksi',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(2),
                'published_at' => Carbon::now()->subDays(2),
                'views' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Program Pendidikan Gratis untuk 8 Anak Asuh Baru',
                'excerpt' => 'Yayasan Astagina Adi Cahya menerima 8 anak asuh baru yang akan mendapatkan pendidikan gratis hingga lulus SMA.',
                'content' => '<p>Jakarta - Yayasan Astagina Adi Cahya kembali menerima 8 anak asuh baru yang berasal dari keluarga kurang mampu dan anak terlantar. Mereka akan mendapatkan fasilitas pendidikan lengkap mulai dari SD hingga SMA secara gratis.</p>

<p>Program pendidikan ini mencakup:</p>
<ul>
<li>Biaya sekolah penuh</li>
<li>Seragam dan perlengkapan sekolah</li>
<li>Buku pelajaran</li>
<li>Bimbingan belajar tambahan</li>
<li>Les keterampilan</li>
</ul>

<p>"Kami ingin memastikan bahwa setiap anak mendapatkan kesempatan yang sama untuk meraih pendidikan berkualitas, terlepas dari latar belakang ekonomi mereka," kata Pak Budi, Koordinator Program Pendidikan.</p>

<p>Selain pendidikan formal, anak-anak juga akan mendapatkan pelatihan keterampilan seperti menjahit, kerajinan tangan, dan komputer dasar untuk mempersiapkan mereka menghadapi masa depan.</p>',
                'image' => 'news/program-pendidikan.jpg',
                'category' => 'Program',
                'author' => 'Pak Budi',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(5),
                'published_at' => Carbon::now()->subDays(5),
                'views' => 230,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kegiatan Bakti Sosial: Berbagi Kebahagiaan dengan Anak-Anak',
                'excerpt' => 'Yayasan mengadakan kegiatan bakti sosial dengan memberikan bantuan kepada anak-anak di sekitar rumah singgah.',
                'content' => '<p>Bandung - Dalam rangka memperingati hari jadi Yayasan Astagina Adi Cahya yang ke-5, kami mengadakan kegiatan bakti sosial dengan membagikan paket sembako dan perlengkapan sekolah kepada 50 anak di lingkungan sekitar rumah singgah.</p>

<p>Kegiatan yang berlangsung seharian ini dihadiri oleh para relawan, donatur, dan staff yayasan. Anak-anak juga diajak bermain games dan mendapatkan doorprize menarik.</p>

<p>"Kegiatan seperti ini bukan hanya tentang memberi bantuan materi, tapi juga berbagi kebahagiaan dan membuat anak-anak merasa diperhatikan," ungkap Ibu Sari, Koordinator Kegiatan.</p>

<p>Paket bantuan yang dibagikan meliputi:</p>
<ul>
<li>Sembako (beras, minyak, gula, dll)</li>
<li>Tas sekolah</li>
<li>Alat tulis lengkap</li>
<li>Buku bacaan</li>
<li>Mainan edukatif</li>
</ul>',
                'image' => 'news/bakti-sosial.jpg',
                'category' => 'Kegiatan',
                'author' => 'Bu Sari',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(7),
                'published_at' => Carbon::now()->subDays(7),
                'views' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peluncuran Program Keterampilan Digital untuk Anak Asuh',
                'excerpt' => 'Yayasan meluncurkan program pelatihan keterampilan digital untuk mempersiapkan anak asuh menghadapi era digital.',
                'content' => '<p>Surabaya - Yayasan Astagina Adi Cahya meluncurkan program pelatihan keterampilan digital di Edukasi Center Surabaya. Program ini bertujuan untuk membekali anak asuh dengan kemampuan teknologi yang diperlukan di era digital.</p>

<p>Program yang akan berlangsung selama 6 bulan ini mencakup:</p>
<ul>
<li>Dasar-dasar komputer</li>
<li>Microsoft Office</li>
<li>Desain grafis dasar</li>
<li>Video editing</li>
<li>Digital marketing dasar</li>
<li>Pemrograman web dasar</li>
</ul>

<p>"Di era digital ini, keterampilan teknologi menjadi sangat penting. Kami ingin memastikan anak-anak kami siap bersaing di dunia kerja," kata Ahmad, Instruktur Program Digital.</p>

<p>Fasilitas yang disediakan meliputi 15 unit komputer, proyektor, dan software desain profesional. Anak-anak akan dibimbing langsung oleh instruktur bersertifikat.</p>',
                'image' => 'news/program-digital.jpg',
                'category' => 'Program',
                'author' => 'Ahmad',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(10),
                'published_at' => Carbon::now()->subDays(10),
                'views' => 195,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Apresiasi untuk Para Donatur Setia Yayasan',
                'excerpt' => 'Yayasan mengucapkan terima kasih kepada para donatur yang telah mendukung program-program sosial.',
                'content' => '<p>Jakarta - Yayasan Astagina Adi Cahya mengadakan acara apresiasi untuk para donatur setia yang telah mendukung berbagai program yayasan selama ini.</p>

<p>Acara yang digelar di kantor pusat Malang ini dihadiri oleh lebih dari 50 donatur dari berbagai kalangan, mulai dari individu, perusahaan, hingga organisasi.</p>

<p>"Tanpa dukungan dari para donatur, kami tidak akan bisa menjalankan program-program untuk membantu anak-anak ini. Terima kasih atas kepercayaan dan dukungan yang luar biasa," ucap Ibu Nia, Ketua Yayasan.</p>

<p>Dalam acara ini, donatur juga berkesempatan untuk berinteraksi langsung dengan anak asuh, melihat fasilitas yayasan, dan mendengar laporan perkembangan program.</p>

<p>Para donatur yang hadir sangat antusias dan berkomitmen untuk terus mendukung misi yayasan dalam memberdayakan anak-anak kurang mampu.</p>',
                'image' => 'news/apresiasi-donatur.jpg',
                'category' => 'Ucapan',
                'author' => 'Tim Redaksi',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(12),
                'published_at' => Carbon::now()->subDays(12),
                'views' => 165,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kerjasama dengan Puskesmas untuk Pemeriksaan Kesehatan Rutin',
                'excerpt' => 'Yayasan menjalin kerjasama dengan Puskesmas setempat untuk pemeriksaan kesehatan anak asuh secara rutin.',
                'content' => '<p>Bandung - Yayasan Astagina Adi Cahya menandatangani MoU dengan Puskesmas Bandung Timur untuk program pemeriksaan kesehatan rutin bagi seluruh anak asuh.</p>

<p>Program ini akan mencakup:</p>
<ul>
<li>Pemeriksaan kesehatan umum bulanan</li>
<li>Pemeriksaan gigi</li>
<li>Pemeriksaan mata</li>
<li>Vaksinasi lengkap</li>
<li>Konsultasi gizi</li>
<li>Penanganan kesehatan darurat</li>
</ul>

<p>"Kesehatan adalah hal yang sangat penting. Dengan kerjasama ini, kami memastikan setiap anak mendapatkan pelayanan kesehatan yang optimal," kata Dr. Fitri, Dokter Puskesmas.</p>

<p>Pemeriksaan kesehatan akan dilakukan setiap bulan di rumah singgah dengan didampingi tim medis dari Puskesmas.</p>',
                'image' => 'news/kerjasama-puskesmas.jpg',
                'category' => 'Kerjasama',
                'author' => 'Tim Medis',
                'status' => 'Published',
                'publish_date' => Carbon::now()->subDays(15),
                'published_at' => Carbon::now()->subDays(15),
                'views' => 142,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($newsData as $data) {
            DB::table('news')->insert($data);
        }

        $this->command->info('✓ News seeded successfully!');
    }
}
