@extends('layouts.app')

@section('title', 'Beranda - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .hero {
        padding: 3rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .hero-overlay {
        background: linear-gradient(135deg, #FFA726 0%, #FFB74D 50%, #FFE082 100%);
        border-radius: 10px;
        padding: 3rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .hero-content {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 3rem;
        align-items: center;
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
    }

    .hero-logo {
        text-align: center;
        padding: 2rem;
    }

    .logo-circle {
        width: 140px;
        height: 140px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #FF6B35, #FFA726);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(255, 107, 53, 0.3);
    }

    .logo-circle img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .hero-logo h1 {
        font-size: 2rem;
        color: #FF6B35;
        line-height: 1.2;
        font-weight: 700;
    }

    .hero-text h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .hero-text p {
        color: #666;
        line-height: 1.8;
        text-align: justify;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .btn-action {
        padding: 1.2rem;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        color: #fff;
    }

    .btn-care { background: #FFB74D; }
    .btn-love { background: #64B5F6; }
    .btn-support { background: #546E7A; }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .statistics {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: #fff;
        padding: 1.5rem;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .stat-card h3 {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: #2196F3;
    }

    .news-section, .gallery-section {
        margin-bottom: 3rem;
    }

    .news-section h2, .gallery-section h2 {
        font-size: 2rem;
        margin-bottom: 2rem;
        color: #333;
        font-weight: 600;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .news-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    .news-image {
        width: 100%;
        height: 200px;
        background: #e0e0e0;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-content h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: #333;
        line-height: 1.4;
    }

    .news-content p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .news-meta {
        font-size: 0.8rem;
        color: #999;
        margin-bottom: 1rem;
    }

    .btn-read {
        background: #2c3e50;
        color: #fff;
        border: none;
        padding: 0.6rem 2rem;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-read:hover {
        background: #34495e;
        transform: translateX(3px);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .gallery-item {
        position: relative;
        height: 250px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        background: #e0e0e0;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 1.5rem;
        color: #fff;
    }

    .locations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .location-card {
        background: linear-gradient(135deg, #546E7A 0%, #607D8B 100%);
        color: #fff;
        padding: 2rem 1.5rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transition: all 0.3s;
        min-height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        background: linear-gradient(135deg, #455A64 0%, #546E7A 100%);
    }

    .location-card h4 {
        font-size: 1.1rem;
        margin-bottom: 1rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 2px solid rgba(255,255,255,0.3);
        padding-bottom: 0.8rem;
    }

    .location-card p {
        font-size: 0.9rem;
        line-height: 1.6;
        opacity: 0.95;
        margin: 0;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #999;
        font-size: 1rem;
        grid-column: 1 / -1;
    }

    @media (max-width: 1200px) {
        .news-grid, .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .statistics {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
        }
        .action-buttons, .news-grid, .gallery-grid, .statistics, .locations-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="hero">
    <!-- Hero Section -->
    <div class="hero-overlay">
        <div class="hero-content">
            <div class="hero-logo">
                <div class="logo-circle">
                    <img src="{{ asset('images/logo.png') }}" alt="Astagina Logo" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2220%22%3ELOGO%3C/text%3E%3C/svg%3E'">
                </div>
                <h1>ASTAGINA<br>ADI CAHYA</h1>
            </div>
            <div class="hero-text">
                <h2>APA ITU<br>ASTAGINA ADI CAHYA?</h2>
                <p>Astagina Adi Cahya merupakan sebuah yayasan yang bergerak pada bidang sosial dengan fokus utama untuk membantu anak-anak yang memerlukan perhatian khusus, memfasilitasi anak jalanan, dan anak terlantar untuk mendapatkan kehidupan yang lebih layak dengan memberikan pendidikan serta ketrampilan yang nantinya diharapkan agar mereka dapat mandiri di masa depan.</p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <button class="btn-action btn-care">WE CARE</button>
        <button class="btn-action btn-love">WE LOVE</button>
        <button class="btn-action btn-support">WE SUPPORT</button>
    </div>

    <!-- Statistics -->
    <div class="statistics">
        @forelse($statistics as $stat)
        <div class="stat-card">
            <h3>{{ $stat['label'] ?? 'Statistik' }}</h3>
            <div class="stat-number">{{ $stat['value'] ?? 0 }}</div>
        </div>
        @empty
        <div class="empty-state">
            <p>Statistik belum tersedia</p>
        </div>
        @endforelse
    </div>

    <!-- News Section -->
    <div class="news-section">
        <h2>NEWS</h2>
        <div class="news-grid">
            @forelse($news as $item)
            <div class="news-card">
                <div class="news-image">
                    @if(isset($item->image) && $item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title }}"
                             onerror="this.src='{{ asset('images/news/default.jpg') }}'">
                    @else
                        <img src="{{ asset('images/news/default.jpg') }}"
                             alt="{{ $item->title }}"
                             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22200%22%3E%3Crect width=%22400%22 height=%22200%22 fill=%22%23e0e0e0%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22%3ENo Image%3C/text%3E%3C/svg%3E'">
                    @endif
                </div>
                <div class="news-content">
                    <h3>{{ Str::limit($item->title ?? 'Judul Berita', 80) }}</h3>
                    <p>{{ Str::limit(strip_tags($item->content ?? 'Konten berita...'), 150) }}</p>
                    <div class="news-meta">
                        <span>Oleh: {{ $item->author ?? 'Admin' }}</span><br>
                        <span>Pada: {{ isset($item->publish_date) && $item->publish_date ? \Carbon\Carbon::parse($item->publish_date)->format('d M Y') : (isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : date('d M Y')) }}</span>
                    </div>
                    <a href="{{ route('news.show', $item->id ?? $item->news_id) }}" class="btn-read">READ</a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <p>Belum ada berita tersedia. <a href="{{ route('news.index') }}">Lihat semua berita</a></p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-section">
        <h2>ALBUM FOTO</h2>
        <div class="gallery-grid">
            @forelse($gallery as $item)
            <div class="gallery-item">
                @if(isset($item->image) && $item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                         alt="{{ $item->title ?? 'Gallery Image' }}"
                         onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22250%22%3E%3Crect width=%22400%22 height=%22250%22 fill=%22%23e0e0e0%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22%3ENo Image%3C/text%3E%3C/svg%3E'">
                @else
                    <img src="data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22250%22%3E%3Crect width=%22400%22 height=%22250%22 fill=%22%23e0e0e0%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22%3ENo Image%3C/text%3E%3C/svg%3E"
                         alt="Default Image">
                @endif
                <div class="gallery-overlay">
                    <h4>{{ $item->title ?? 'Galeri Foto' }}</h4>
                    <p>{{ Str::limit($item->description ?? '', 50) }}</p>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <p>Belum ada galeri tersedia. <a href="{{ route('gallery.index') }}">Lihat semua galeri</a></p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Locations Grid -->
    @if(isset($locations) && count($locations) > 0)
    <div class="locations-grid">
        @foreach($locations as $location)
        <div class="location-card">
            <h4>{{ $location->location_name ?? 'Lokasi' }}</h4>
            <p>
                {{ $location->address ?? '-' }}<br>
                {{ $location->city ?? '' }}{{ isset($location->city) && isset($location->province) ? ', ' : '' }}{{ $location->province ?? '' }}
            </p>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection
