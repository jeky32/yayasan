@extends('layouts.app')

@section('title', 'Tentang Kami - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(135deg, #FF6B9D 0%, #C44569 100%);
        padding: 6rem 2rem 4rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px),
            radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        background-position: 0 0, 25px 25px;
    }

    .about-hero-content {
        position: relative;
        z-index: 1;
    }

    .about-logo-large {
        width: 120px;
        height: 120px;
        margin: 0 auto 2rem;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .about-logo-large img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .about-hero h1 {
        color: #fff;
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.3;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .about-content {
        padding: 3rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .btn-about {
        background: #FFB74D;
        color: #fff;
        border: none;
        padding: 1rem 3rem;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        margin: 0 auto 3rem;
        display: block;
    }

    .about-text {
        background: #fff;
        padding: 3rem;
        border-radius: 8px;
        margin-bottom: 3rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .about-text h2 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .about-text p {
        color: #666;
        line-height: 1.8;
        text-align: justify;
    }

    .facility-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .facility-item {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .facility-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .facility-info {
        padding: 1.5rem;
        background: #64B5F6;
        color: #fff;
        text-align: center;
    }

    .additional-locations {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }

    .location-item {
        background: #546E7A;
        color: #fff;
        padding: 2rem 1rem;
        border-radius: 8px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .facility-grid, .additional-locations {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- About Hero -->
<section class="about-hero">
    <div class="about-hero-content">
        <div class="about-logo-large">
            <img src="{{ asset('images/logo.png') }}" alt="Astagina Logo">
        </div>
        <h1>PERESMIAN RUMAH SINGGAH<br>DAN EDUKASI YAYASAN<br>ASTAGINA ADI CAHYA</h1>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <button class="btn-about">TENTANG KAMI</button>

    <div class="about-text">
        <h2>YAYASAN ASTAGINA ADICAHYA</h2>
        <p>Astagina Adi Cahya merupakan sebuah yayasan yang bergerak pada bidang sosial dengan fokus utama untuk membantu anak-anak yang memerlukan perhatian khusus, memfasilitasi anak jalanan, dan anak terlantar untuk mendapatkan kehidupan yang lebih layak dengan memberikan pendidikan serta ketrampilan yang nantinya diharapkan agar mereka dapat mandiri di masa depan.</p>
    </div>

    <!-- Facility Images -->
    <div class="facility-grid">
        <div class="facility-item">
            <img src="{{ asset('images/rooms/room1.jpg') }}" alt="Ruang Tidur">
            <div class="facility-info">
                <h4>Ruang Tidur</h4>
                <p>Kamar Anak Putra</p>
            </div>
        </div>
        <div class="facility-item">
            <img src="{{ asset('images/rooms/room2.jpg') }}" alt="Ruang Istirahat">
            <div class="facility-info">
                <h4>Ruang Istirahat</h4>
                <p>Kamar Anak Putri</p>
            </div>
        </div>
        <div class="facility-item">
            <img src="{{ asset('images/rooms/room3.jpg') }}" alt="Ruang Belajar">
            <div class="facility-info">
                <h4>Ruang Belajar</h4>
                <p>Area Pembelajaran</p>
            </div>
        </div>
    </div>

    <!-- Additional Locations -->
    <div class="additional-locations">
        @foreach($locations as $location)
        <div class="location-item">
            <h4>{{ $location->location_name }}</h4>
            <p>{{ $location->address }}<br>{{ $location->city }}, {{ $location->province }}<br>Tel: {{ $location->phone }}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection
