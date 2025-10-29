<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes - Yayasan Astagina Adi Cahya
|--------------------------------------------------------------------------
*/

// ============================================
// HOME
// ============================================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ============================================
// ABOUT / TENTANG KAMI
// ============================================
Route::prefix('tentang-kami')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/visi-misi', [AboutController::class, 'visionMission'])->name('vision-mission');
    Route::get('/sejarah', [AboutController::class, 'history'])->name('history');
    Route::get('/struktur-organisasi', [AboutController::class, 'organization'])->name('organization');
    Route::get('/tim-kami', [AboutController::class, 'team'])->name('team');
    Route::get('/prestasi', [AboutController::class, 'achievements'])->name('achievements');
});

// Alias untuk about (backward compatibility)
Route::get('/about', [AboutController::class, 'index'])->name('about');

// ============================================
// PROGRAMS / PROGRAM
// ============================================
Route::prefix('program')->name('programs.')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('index');
    Route::get('/pendidikan', [ProgramController::class, 'education'])->name('education');
    Route::get('/keterampilan', [ProgramController::class, 'skills'])->name('skills');
    Route::get('/konseling', [ProgramController::class, 'counseling'])->name('counseling');
    Route::get('/kesehatan', [ProgramController::class, 'health'])->name('health');
    Route::get('/{id}', [ProgramController::class, 'show'])->name('show')->where('id', '[0-9]+');
    Route::get('/{slug}', [ProgramController::class, 'showBySlug'])->name('show-slug');
});

// Alias untuk programs (backward compatibility)
Route::get('/programs', [ProgramController::class, 'index'])->name('programs');

// ============================================
// NEWS / BERITA
// ============================================
Route::prefix('berita')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/kategori/{category}', [NewsController::class, 'category'])->name('category');
    Route::get('/cari', [NewsController::class, 'search'])->name('search');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show')->where('id', '[0-9]+');
    Route::get('/{slug}', [NewsController::class, 'showBySlug'])->name('show-slug');
});

// Alias untuk news (backward compatibility)
Route::get('/news', [NewsController::class, 'index'])->name('news');

// ============================================
// GALLERY / GALERI
// ============================================
Route::prefix('galeri')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/foto', [GalleryController::class, 'photos'])->name('photos');
    Route::get('/video', [GalleryController::class, 'videos'])->name('videos');
    Route::get('/kategori/{category}', [GalleryController::class, 'category'])->name('category');
    Route::get('/{id}', [GalleryController::class, 'show'])->name('show')->where('id', '[0-9]+');
});

// Alias untuk gallery (backward compatibility)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// ============================================
// CONTACT / KONTAK
// ============================================
Route::prefix('kontak')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
    Route::get('/lokasi/{id}', [ContactController::class, 'getLocation'])->name('location');
    Route::get('/syarat-ketentuan', [ContactController::class, 'requirements'])->name('requirements');
});

// Alias untuk contact (backward compatibility)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// ============================================
// DONATION / DONASI
// ============================================
Route::prefix('donasi')->name('donation.')->group(function () {
    Route::get('/', [ContactController::class, 'donation'])->name('index');
    Route::post('/', [ContactController::class, 'storeDonation'])->name('store');
    Route::get('/konfirmasi', [ContactController::class, 'confirmDonation'])->name('confirm');
});

// ============================================
// LOCATION / LOKASI
// ============================================
Route::get('/lokasi', [ContactController::class, 'locations'])->name('locations');

// ============================================
// API ROUTES (untuk AJAX requests)
// ============================================
Route::prefix('api')->name('api.')->group(function () {
    // Statistics
    Route::get('/statistik', function () {
        return response()->json(
            DB::table('statistics')
                ->select('stat_name', 'stat_value', 'stat_unit')
                ->get()
        );
    })->name('statistics');
    
    // Latest News
    Route::get('/berita-terbaru', function () {
        return response()->json(
            DB::table('news')
                ->where('status', 'Published')
                ->orderBy('publish_date', 'desc')
                ->limit(5)
                ->get()
        );
    })->name('latest-news');
    
    // Locations
    Route::get('/lokasi', function () {
        return response()->json(
            DB::table('locations')
                ->where('is_active', true)
                ->orderBy('location_name')
                ->get()
        );
    })->name('locations');
    
    // Gallery
    Route::get('/galeri', function () {
        return response()->json(
            DB::table('gallery')
                ->orderBy('upload_date', 'desc')
                ->limit(12)
                ->get()
        );
    })->name('gallery');
    
    // Programs
    Route::get('/program', function () {
        return response()->json(
            DB::table('programs')
                ->where('status', 'Active')
                ->orderBy('start_date', 'desc')
                ->get()
        );
    })->name('programs');
    
    // Search
    Route::get('/cari', function (\Illuminate\Http\Request $request) {
        $query = $request->get('q');
        
        $news = DB::table('news')
            ->where('status', 'Published')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->orderBy('publish_date', 'desc')
            ->limit(10)
            ->get();
        
        $programs = DB::table('programs')
            ->where('status', 'Active')
            ->where(function($q) use ($query) {
                $q->where('program_name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit(10)
            ->get();
        
        return response()->json([
            'news' => $news,
            'programs' => $programs
        ]);
    })->name('search');
});

// ============================================
// SITEMAP & RSS (optional)
// ============================================
Route::get('/sitemap.xml', function () {
    $news = DB::table('news')
        ->where('status', 'Published')
        ->orderBy('publish_date', 'desc')
        ->get();
    
    return response()->view('sitemap', compact('news'))
        ->header('Content-Type', 'text/xml');
})->name('sitemap');

Route::get('/rss', function () {
    $news = DB::table('news')
        ->where('status', 'Published')
        ->orderBy('publish_date', 'desc')
        ->limit(20)
        ->get();
    
    return response()->view('rss', compact('news'))
        ->header('Content-Type', 'application/rss+xml');
})->name('rss');

// ============================================
// FALLBACK ROUTE - DIHAPUS / TIDAK DIGUNAKAN
// ============================================
// Route::fallback(function () {
//     return view('errors.404');
// });
