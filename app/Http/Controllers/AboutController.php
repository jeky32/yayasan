<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index(): View
    {
        // Get active locations with full details
        $locations = DB::table('locations')
            ->where('is_active', true)
            ->orderBy('location_name')
            ->get();

        // Get organization statistics
        $stats = [
            'beneficiaries' => DB::table('beneficiaries')
                ->where('status', 'Active')
                ->count(),
            'staff' => DB::table('staff')
                ->where('employment_status', 'Active')
                ->count(),
            'programs' => DB::table('programs')
                ->where('status', 'Active')
                ->count(),
            'locations' => DB::table('locations')
                ->where('is_active', true)
                ->count(),
            'volunteers' => DB::table('staff')
                ->where('position', 'LIKE', '%volunteer%')
                ->orWhere('position', 'LIKE', '%relawan%')
                ->count(),
            'donors' => DB::table('donations')
                ->distinct('donor_email')
                ->count('donor_email'),
        ];

        // Get team members (staff with photos)
        $team = DB::table('staff')
            ->whereNotNull('photo_url')
            ->where('employment_status', 'Active')
            ->orderBy('position', 'asc')
            ->limit(8)
            ->get();

        // Get vision and mission (you can store this in a settings table)
        $about = [
            'vision' => 'Menjadi yayasan terdepan dalam memberdayakan anak-anak kurang mampu untuk mencapai kehidupan yang lebih baik melalui pendidikan dan keterampilan.',
            'mission' => [
                'Memberikan tempat tinggal yang layak dan aman bagi anak-anak terlantar',
                'Menyediakan pendidikan berkualitas dan gratis untuk semua anak asuh',
                'Mengembangkan keterampilan hidup yang diperlukan untuk kemandirian',
                'Memberikan dukungan psikologis dan emosional',
                'Memfasilitasi program kesehatan dan gizi yang memadai'
            ],
            'values' => [
                'Kasih Sayang' => 'Memberikan perhatian dan kasih sayang kepada setiap anak',
                'Integritas' => 'Menjalankan organisasi dengan transparansi dan akuntabilitas',
                'Pemberdayaan' => 'Memberdayakan anak-anak untuk mandiri di masa depan',
                'Kerjasama' => 'Bekerja sama dengan berbagai pihak untuk kesejahteraan anak'
            ]
        ];

        return view('about', compact('locations', 'stats', 'team', 'about'));
    }

    /**
     * Display organization structure.
     */
    public function structure(): View
    {
        // Get organization structure
        $structure = DB::table('staff')
            ->where('employment_status', 'Active')
            ->orderBy('department', 'asc')
            ->orderBy('position', 'asc')
            ->get()
            ->groupBy('department');

        return view('about.structure', compact('structure'));
    }

    /**
     * Display achievements and milestones.
     */
    public function achievements(): View
    {
        // Get achievements data (you might want to create a separate table for this)
        $achievements = [
            [
                'year' => '2023',
                'title' => 'Pembukaan Rumah Singgah Ketiga',
                'description' => 'Membuka rumah singgah di Bandung untuk menampung lebih banyak anak'
            ],
            [
                'year' => '2022',
                'title' => '100 Anak Asuh',
                'description' => 'Mencapai milestone 100 anak asuh yang telah diberdayakan'
            ],
            [
                'year' => '2021',
                'title' => 'Program Keterampilan Digital',
                'description' => 'Meluncurkan program pelatihan keterampilan digital untuk anak asuh'
            ]
        ];

        return view('about.achievements', compact('achievements'));
    }
}
