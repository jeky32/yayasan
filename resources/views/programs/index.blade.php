@extends('layouts.app')

@section('title', 'Program Kami - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .programs-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
        margin-bottom: 3rem;
    }

    .programs-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .programs-hero p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
    }

    .programs-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem 4rem;
    }

    .programs-tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .tab-btn {
        padding: 0.8rem 2rem;
        border: 2px solid #667eea;
        background: white;
        color: #667eea;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .tab-btn:hover,
    .tab-btn.active {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .programs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .program-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s;
    }

    .program-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .program-image {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        position: relative;
        overflow: hidden;
    }

    .program-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .program-image .icon {
        font-size: 4rem;
        opacity: 0.3;
    }

    .program-content {
        padding: 2rem;
    }

    .program-badge {
        display: inline-block;
        padding: 0.3rem 1rem;
        background: #667eea;
        color: white;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .program-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }

    .program-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .program-meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
    }

    .meta-label {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 0.3rem;
    }

    .meta-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #667eea;
    }

    .program-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .program-status {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-active {
        background: #d4edda;
        color: #155724;
    }

    .status-planned {
        background: #fff3cd;
        color: #856404;
    }

    .status-completed {
        background: #d1ecf1;
        color: #0c5460;
    }

    .btn-detail {
        padding: 0.6rem 1.5rem;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-detail:hover {
        background: #5568d3;
        transform: translateX(3px);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #999;
        grid-column: 1 / -1;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    @media (max-width: 768px) {
        .programs-hero h1 {
            font-size: 2rem;
        }

        .programs-grid {
            grid-template-columns: 1fr;
        }

        .programs-tabs {
            flex-direction: column;
        }

        .tab-btn {
            width: 100%;
        }
    }
</style>

<div class="programs-hero">
    <h1>Program Yayasan</h1>
    <p>Berbagai program yang kami jalankan untuk memberdayakan dan meningkatkan kualitas hidup anak-anak asuh</p>
</div>

<div class="programs-container">
    <!-- Tabs -->
    <div class="programs-tabs">
        <button class="tab-btn active" onclick="filterPrograms('all')">Semua Program</button>
        <button class="tab-btn" onclick="filterPrograms('education')">Pendidikan</button>
        <button class="tab-btn" onclick="filterPrograms('skills')">Keterampilan</button>
        <button class="tab-btn" onclick="filterPrograms('counseling')">Konseling</button>
        <button class="tab-btn" onclick="filterPrograms('health')">Kesehatan</button>
        <button class="tab-btn" onclick="filterPrograms('other')">Lainnya</button>
    </div>

    <!-- All Programs -->
    <div class="programs-section" data-category="all">
        <div class="programs-grid">
            @forelse($programs as $program)
                @php
                    // Determine category type berdasarkan nama program
                    $programName = strtolower($program->program_name ?? '');
                    $categoryType = 'other'; // default
                    
                    if (str_contains($programName, 'pendidikan') || str_contains($programName, 'edukasi') || str_contains($programName, 'belajar')) {
                        $categoryType = 'education';
                    } elseif (str_contains($programName, 'keterampilan') || str_contains($programName, 'skill') || str_contains($programName, 'pelatihan')) {
                        $categoryType = 'skills';
                    } elseif (str_contains($programName, 'konseling') || str_contains($programName, 'psikologi') || str_contains($programName, 'pendampingan')) {
                        $categoryType = 'counseling';
                    } elseif (str_contains($programName, 'kesehatan') || str_contains($programName, 'medis')) {
                        $categoryType = 'health';
                    }
                @endphp
                
                <div class="program-card" data-type="{{ $categoryType }}">
                    <div class="program-image">
                        @if(isset($program->image_url) && $program->image_url)
                            <img src="{{ asset('storage/' . $program->image_url) }}" 
                                 alt="{{ $program->program_name }}"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <div class="icon" style="display:none;">📚</div>
                        @else
                            <div class="icon">📚</div>
                        @endif
                    </div>
                    <div class="program-content">
                        <span class="program-badge">{{ $program->program_code ?? 'PROG' }}</span>
                        <h3 class="program-title">{{ $program->program_name }}</h3>
                        <p class="program-description">
                            {{ Str::limit($program->description ?? 'Deskripsi program tidak tersedia', 150) }}
                        </p>

                        <div class="program-meta">
                            <div class="meta-item">
                                <span class="meta-label">Target Peserta</span>
                                <span class="meta-value">{{ $program->target_participants ?? 0 }} Anak</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Peserta Aktif</span>
                                <span class="meta-value">{{ $program->actual_participants ?? 0 }} Anak</span>
                            </div>
                        </div>

                        <div class="program-footer">
                            <span class="program-status status-{{ strtolower($program->status ?? 'active') }}">
                                {{ $program->status ?? 'Active' }}
                            </span>
                            <a href="{{ route('programs.show', $program->program_id) }}" class="btn-detail">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">📋</div>
                    <h3>Belum Ada Program</h3>
                    <p>Program akan segera hadir. Silakan cek kembali nanti.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
function filterPrograms(category) {
    // Update active tab
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');

    // Filter cards
    const cards = document.querySelectorAll('.program-card');
    cards.forEach(card => {
        if (category === 'all') {
            card.style.display = 'block';
        } else {
            const cardType = card.getAttribute('data-type');
            card.style.display = cardType === category ? 'block' : 'none';
        }
    });
}
</script>
@endsection
