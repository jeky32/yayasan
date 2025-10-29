@extends('layouts.app')

@section('title', ($item->title ?? 'Berita') . ' - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .article-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .article-header {
        margin-bottom: 2rem;
    }

    .article-header h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .article-meta {
        color: #999;
        font-size: 0.9rem;
        margin-bottom: 2rem;
    }

    .article-meta i {
        margin-right: 0.3rem;
    }

    .article-image {
        width: 100%;
        height: 500px;
        margin-bottom: 2rem;
        border-radius: 8px;
        overflow: hidden;
        background: #e0e0e0;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-content {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        line-height: 1.8;
        color: #444;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content h2, .article-content h3 {
        margin: 2rem 0 1rem;
        color: #333;
    }

    .article-content ul, .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .article-content li {
        margin-bottom: 0.5rem;
    }

    .back-button {
        display: inline-block;
        margin-bottom: 2rem;
        padding: 0.7rem 1.5rem;
        background: #546E7A;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s;
    }

    .back-button:hover {
        background: #455A64;
        transform: translateX(-3px);
    }

    .article-footer {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .article-category {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #667eea;
        color: white;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .article-views {
        color: #999;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .article-header h1 {
            font-size: 1.8rem;
        }

        .article-image {
            height: 300px;
        }

        .article-content {
            padding: 1.5rem;
        }
    }
</style>

<div class="article-container">
    <a href="{{ route('news.index') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Berita
    </a>

    <article>
        <div class="article-header">
            <h1>{{ $item->title ?? 'Judul Berita' }}</h1>
            <div class="article-meta">
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
                @if(isset($item->views) && $item->views > 0)
                | <i class="far fa-eye"></i> {{ $item->views }} views
                @endif
            </div>
        </div>

        @if(isset($item->image) && $item->image)
        <div class="article-image">
            <img src="{{ asset('storage/' . $item->image) }}" 
                 alt="{{ $item->title ?? 'Gambar Berita' }}"
                 onerror="this.parentElement.style.display='none';">
        </div>
        @endif

        <div class="article-content">
            {!! $item->content ?? '<p>Konten tidak tersedia.</p>' !!}
        </div>

        <div class="article-footer">
            @if(isset($item->category) && $item->category)
            <div>
                <span class="article-category">{{ $item->category }}</span>
            </div>
            @endif
            
            <div class="article-views">
                <i class="far fa-clock"></i>
                Terakhir diupdate: {{ isset($item->updated_at) ? \Carbon\Carbon::parse($item->updated_at)->diffForHumans() : '-' }}
            </div>
        </div>
    </article>
</div>
@endsection
