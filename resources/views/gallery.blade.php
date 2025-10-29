@extends('layouts.app')

@section('title', 'Galeri - Yayasan Astagina Adi Cahya')

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

    .gallery-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .gallery-item {
        position: relative;
        height: 300px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        transform: translateY(100%);
        transition: transform 0.3s;
    }

    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }

    .gallery-overlay h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .gallery-overlay p {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h1>Galeri Kegiatan</h1>
    <p>Dokumentasi kegiatan Yayasan Astagina Adi Cahya</p>
</div>

<div class="gallery-container">
    <div class="gallery-grid">
        @forelse($items as $item)
        <div class="gallery-item" onclick="openModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
            <div class="gallery-overlay">
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->description, 100) }}</p>
            </div>
        </div>
        @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
            <p>Tidak ada galeri untuk sementara.</p>
        </div>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
function openModal(imageUrl, title) {
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 2rem;
    `;
    modal.innerHTML = `
        <div style="max-width: 90%; max-height: 90%; position: relative;">
            <img src="${imageUrl}" alt="${title}" style="max-width: 100%; max-height: 80vh; border-radius: 8px;">
            <h3 style="color: white; text-align: center; margin-top: 1rem;">${title}</h3>
            <button onclick="this.closest('div').parentElement.remove()" style="position: absolute; top: -40px; right: 0; background: transparent; border: none; color: white; font-size: 40px; cursor: pointer;">&times;</button>
        </div>
    `;
    document.body.appendChild(modal);

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            document.body.removeChild(modal);
        }
    });
}
</script>
@endpush
@endsection
