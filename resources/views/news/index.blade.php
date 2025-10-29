@extends('layouts.app')

@section('title', 'Berita - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 2rem;
        text-align: center;
        color: #fff;
    }

    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .news-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 3rem 2rem;
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
        height: 250px;
        background: #e0e0e0;
        overflow: hidden;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .news-card:hover .news-image img {
        transform: scale(1.05);
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-content h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: #333;
        line-height: 1.4;
    }

    .news-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .news-meta {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 1rem;
    }

    .news-meta i {
        margin-right: 0.3rem;
    }

    .btn-read {
        background: #2c3e50;
        color: #fff;
        padding: 0.6rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-read:hover {
        background: #1a252f;
        transform: translateX(3px);
    }

    .empty-state {
        grid-column: 1/-1;
        text-align: center;
        padding: 4rem 2rem;
        color: #999;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .pagination {
        margin-top: 3rem;
        text-align: center;
    }

    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h1>Berita & Kegiatan</h1>
    <p>Informasi terbaru dari Yayasan Astagina Adi Cahya</p>
</div>

<div class="news-container">
    <div class="news-grid">
        @forelse($items as $item)
        <div class="news-card">
            <div class="news-image">
                @if(isset($item->image) && $item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" 
                         alt="{{ $item->title ?? 'Berita' }}"
                         onerror="this.src='{{ asset('images/news/default.jpg') }}'">
                @else
                    <img src="{{ asset('images/news/default.jpg') }}" 
                         alt="{{ $item->title ?? 'Berita' }}">
                @endif
            </div>
            <div class="news-content">
                <h3>{{ Str::limit($item->title ?? 'Judul Berita', 80) }}</h3>
                <p>{{ Str::limit(strip_tags($item->content ?? 'Konten tidak tersedia'), 150) }}</p>
                <div class="news-meta">
                    <i class="far fa-calendar"></i> 
                    {{ isset($item->publish_date) && $item->publish_date 
                        ? \Carbon\Carbon::parse($item->publish_date)->format('d M Y') 
                        : (isset($item->created_at) && $item->created_at 
                            ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') 
                            : date('d M Y')) 
                    }}
                    @if(isset($item->author) && $item->author)
                    | <i class="far fa-user"></i> {{ $item->author }}
                    @endif
                </div>
                <a href="{{ route('news.show', $item->id ?? $item->news_id) }}" class="btn-read">
                    Baca Selengkapnya →
                </a>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-state-icon">📰</div>
            <h3>Belum Ada Berita</h3>
            <p>Berita akan segera hadir. Silakan cek kembali nanti.</p>
        </div>
        @endforelse
    </div>

    @if(isset($items) && $items->hasPages())
    <div class="pagination">
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection
