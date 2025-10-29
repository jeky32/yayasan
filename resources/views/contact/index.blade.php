@extends('layouts.app')

@section('title', 'Hubungi Kami - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .contact-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .contact-form {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: #5568d3;
        transform: translateY(-2px);
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .info-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .info-card h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: #667eea;
    }

    .info-item {
        display: flex;
        align-items: start;
        margin-bottom: 1rem;
        gap: 1rem;
    }

    .info-icon {
        font-size: 1.5rem;
        color: #667eea;
    }

    .locations-section {
        margin-top: 3rem;
    }

    .locations-section h2 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 2rem;
        color: #333;
    }

    .locations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .location-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .location-card h4 {
        color: #667eea;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .location-detail {
        margin-bottom: 0.8rem;
        color: #666;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="contact-hero">
    <h1>Hubungi Kami</h1>
    <p>Kami siap membantu Anda. Jangan ragu untuk menghubungi kami</p>
</div>

<div class="contact-container">
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="subject">Subjek *</label>
                    <input type="text" id="subject" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Pesan *</label>
                    <textarea id="message" name="message" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Kirim Pesan</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-card">
                <h3>Informasi Kontak</h3>
                <div class="info-item">
                    <span class="info-icon">📧</span>
                    <div>
                        <strong>Email</strong><br>
                        info@astagina.ac.id
                    </div>
                </div>
                <div class="info-item">
                    <span class="info-icon">📱</span>
                    <div>
                        <strong>Telepon</strong><br>
                        0341-234567
                    </div>
                </div>
                <div class="info-item">
                    <span class="info-icon">📍</span>
                    <div>
                        <strong>Alamat</strong><br>
                        Jl. Merah Delima No 27, Malang, Jawa Timur
                    </div>
                </div>
            </div>

            <div class="info-card">
                <h3>Jam Operasional</h3>
                <p><strong>Senin - Jumat:</strong> 08:00 - 16:00 WIB</p>
                <p><strong>Sabtu:</strong> 08:00 - 12:00 WIB</p>
                <p><strong>Minggu & Libur:</strong> Tutup</p>
            </div>

            <div class="info-card">
                <a href="{{ route('contact.requirements') }}" style="text-decoration: none; color: #667eea; font-weight: 600;">
                    📋 Syarat & Ketentuan Donasi →
                </a>
            </div>
        </div>
    </div>

    <!-- Locations -->
    <div class="locations-section">
        <h2>Lokasi Kami</h2>
        <div class="locations-grid">
            @foreach($locations as $location)
            <div class="location-card">
                <h4>{{ $location->location_name }}</h4>
                <p class="location-detail">
                    <strong>Tipe:</strong> {{ $location->location_type }}
                </p>
                <p class="location-detail">
                    <strong>Alamat:</strong><br>
                    {{ $location->address }}<br>
                    {{ $location->city }}, {{ $location->province }}
                </p>
                @if($location->phone)
                <p class="location-detail">
                    <strong>Telepon:</strong> {{ $location->phone }}
                </p>
                @endif
                @if($location->email)
                <p class="location-detail">
                    <strong>Email:</strong> {{ $location->email }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
