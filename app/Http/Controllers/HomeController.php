<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Get statistics from database
        $statistics = DB::table('statistics')
            ->select('stat_name', 'stat_value')
            ->get()
            ->map(function($stat) {
                return [
                    'label' => $this->formatStatLabel($stat->stat_name),
                    'value' => $stat->stat_value
                ];
            });

        // Get latest news (3 items) - SESUAI STRUKTUR SQL
        $news = DB::table('news')
            ->select(
                'news_id',
                'news_id as id',      // Alias untuk kompatibilitas
                'title',
                // 'slug',            // ❌ DIHAPUS - tidak ada di SQL
                'content',
                // 'excerpt',         // ❌ DIHAPUS - tidak ada di SQL
                'image_url as image', // ✅ PERBAIKAN: image_url -> image (alias)
                'author',
                'category',
                'status',
                'publish_date',
                // 'published_at',   // ❌ DIHAPUS - tidak ada di SQL (pakai publish_date)
                'created_at',
                'updated_at',
                'views'
            )
            ->where('status', 'Published')
            ->orderBy('publish_date', 'desc')
            ->limit(3)
            ->get();

        // Get gallery items (6 items) - SESUAI STRUKTUR SQL
        $gallery = DB::table('gallery')
            ->select(
                'gallery_id',
                'title',
                'description',
                'image_url as image',  // ✅ PERBAIKAN: pakai image_url langsung dengan alias
                'category',
                // 'type',            // ❌ DIHAPUS - tidak ada di SQL
                'upload_date',
                'location_id',
                'is_featured'
            )
            ->orderBy('upload_date', 'desc')
            ->limit(6)
            ->get();

        // Get active locations
        $locations = DB::table('locations')
            ->select(
                'location_id',
                'location_name',
                'location_type',
                'address',
                'city',
                'province',
                'phone',
                'email',
                'capacity',
                'is_active'
            )
            ->where('is_active', true)
            ->orderBy('location_name')
            ->get();

        return view('home', compact('statistics', 'news', 'gallery', 'locations'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        // Get active locations with full details
        $locations = DB::table('locations')
            ->select(
                'location_id',
                'location_name',
                'location_type',
                'address',
                'city',
                'province',
                'postal_code',
                'phone',
                'email',
                'capacity',
                'facilities',
                'is_active'
            )
            ->where('is_active', true)
            ->orderBy('location_name')
            ->get();

        // Get beneficiaries count
        $beneficiariesCount = DB::table('beneficiaries')
            ->where('status', 'Active')
            ->count();

        // Get staff count
        $staffCount = DB::table('staff')
            ->where('employment_status', 'Active')
            ->count();

        // Get programs count
        $programsCount = DB::table('programs')
            ->where('status', 'Active')
            ->count();

        $stats = [
            'beneficiaries' => $beneficiariesCount,
            'staff' => $staffCount,
            'programs' => $programsCount,
        ];

        return view('about', compact('locations', 'stats'));
    }

    /**
     * Display programs page.
     */
    public function programs()
    {
        // Get active programs from database - SESUAI STRUKTUR SQL
        $programs = DB::table('programs')
            ->select(
                'program_id',
                'program_name',
                'program_code',
                // 'slug',           // ❌ DIHAPUS jika tidak ada di SQL
                'description',
                'objectives',
                'target_participants',
                'actual_participants',
                'start_date',
                'end_date',
                'status',
                'budget',
                'actual_cost',
                'location_id',
                'coordinator_id',
                'image_url'
            )
            ->where('status', 'Active')
            ->orderBy('start_date', 'desc')
            ->get();

        // Group programs by type if needed
        $groupedPrograms = [
            'education' => $programs->filter(function($program) {
                return stripos($program->program_name, 'pendidikan') !== false || 
                       stripos($program->program_name, 'edukasi') !== false ||
                       stripos($program->program_name, 'belajar') !== false;
            }),
            'skills' => $programs->filter(function($program) {
                return stripos($program->program_name, 'keterampilan') !== false ||
                       stripos($program->program_name, 'skill') !== false ||
                       stripos($program->program_name, 'pelatihan') !== false;
            }),
            'counseling' => $programs->filter(function($program) {
                return stripos($program->program_name, 'konseling') !== false ||
                       stripos($program->program_name, 'pendampingan') !== false ||
                       stripos($program->program_name, 'psikologi') !== false;
            }),
            'health' => $programs->filter(function($program) {
                return stripos($program->program_name, 'kesehatan') !== false ||
                       stripos($program->program_name, 'medis') !== false;
            }),
            'other' => $programs->filter(function($program) {
                return stripos($program->program_name, 'pendidikan') === false &&
                       stripos($program->program_name, 'keterampilan') === false &&
                       stripos($program->program_name, 'konseling') === false &&
                       stripos($program->program_name, 'kesehatan') === false;
            }),
        ];

        return view('programs', compact('programs', 'groupedPrograms'));
    }

    /**
     * Format statistics label.
     */
    private function formatStatLabel($statName)
    {
        $labels = [
            'jumlah_mentor' => 'Jumlah Mentor',
            'jumlah_anak' => 'Jumlah Anak',
            'keseluruhan_biaya_anak' => 'Keseluruhan Biaya Anak',
            'quota_rutin' => 'Kuota Rutin',
            'total_donatur' => 'Total Donatur',
            'total_program' => 'Total Program'
        ];

        return $labels[$statName] ?? ucfirst(str_replace('_', ' ', $statName));
    }
}
