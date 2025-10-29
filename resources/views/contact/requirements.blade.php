@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - Yayasan Astagina Adi Cahya')

@section('content')
<style>
    .requirements-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }

    .requirements-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .requirements-container {
        max-width: 900px;
        margin: 3rem auto;
        padding: 0 2rem;
    }

    .requirements-content {
        background: white;
        padding: 3rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .requirements-content h2 {
        color: #667eea;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .requirements-content h3 {
        color: #333;
        margin-top: 1.5rem;
        margin-bottom: 0.8rem;
        font-size: 1.3rem;
    }

    .requirements-content p {
        line-height: 1.8;
        color: #666;
        margin-bottom: 1rem;
    }

    .requirements-content ul {
        padding-left: 2rem;
        margin-bottom: 1.5rem;
    }

    .requirements-content li {
        line-height: 1.8;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .highlight-box {
        background: #f0f4ff;
        border-left: 4px solid #667eea;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 8px;
    }

    .btn-back {
        display: inline-block;
        margin-top: 2rem;
        padding: 1rem 2rem;
        background: #667eea;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-back:hover {
        background: #5568d3;
    }
</style>

<div class="requirements-hero">
    <h1>Syarat & Ketentuan</h1>
    <p>Panduan lengkap untuk berdonasi dan berkontribusi</p>
</div>

<div class="requirements-container">
    <div class="requirements-content">
        <h2>Syarat & Ketentuan Donasi</h2>
        
        <p>Terima kasih atas niat baik Anda untuk berdonasi kepada Yayasan Astagina Adi Cahya. Berikut adalah syarat dan ketentuan yang berlaku:</p>

        <h3>1. Ketentuan Umum</h3>
        <ul>
            <li>Donasi bersifat sukarela dan tidak mengikat</li>
            <li>Donasi yang telah diberikan tidak dapat ditarik kembali</li>
            <li>Yayasan berhak menggunakan donasi sesuai kebutuhan program yang sedang berjalan</li>
            <li>Semua donasi akan dikelola dengan transparan dan akuntabel</li>
        </ul>

        <h3>2. Metode Donasi</h3>
        <ul>
            <li><strong>Transfer Bank:</strong> Transfer ke rekening resmi yayasan</li>
            <li><strong>Donasi Online:</strong> Melalui platform pembayaran digital</li>
            <li><strong>Donasi Tunai:</strong> Langsung ke kantor yayasan</li>
            <li><strong>Donasi Barang:</strong> Dengan konfirmasi terlebih dahulu</li>
        </ul>

        <h3>3. Bukti Donasi</h3>
        <ul>
            <li>Setiap donatur akan menerima bukti penerimaan donasi</li>
            <li>Bukti donasi dapat digunakan untuk keperluan administrasi dan perpajakan</li>
            <li>Nomor referensi donasi harus disimpan untuk tracking</li>
        </ul>

        <div class="highlight-box">
            <strong>📌 Penting:</strong> Pastikan Anda menggunakan rekening resmi yayasan yang tertera di website ini. Waspadai penipuan yang mengatasnamakan yayasan.
        </div>

        <h3>4. Rekening Resmi Yayasan</h3>
        <p><strong>Bank BCA</strong><br>
        No. Rekening: 1234567890<br>
        Atas Nama: Yayasan Astagina Adi Cahya</p>

        <p><strong>Bank Mandiri</strong><br>
        No. Rekening: 0987654321<br>
        Atas Nama: Yayasan Astagina Adi Cahya</p>

        <h3>5. Donasi Rutin</h3>
        <ul>
            <li>Donatur dapat memilih program donasi rutin bulanan</li>
            <li>Dapat dibatalkan kapan saja dengan pemberitahuan</li>
            <li>Akan mendapat laporan perkembangan program secara berkala</li>
        </ul>

        <h3>6. Donasi Barang</h3>
        <ul>
            <li>Barang yang didonasikan harus dalam kondisi layak pakai</li>
            <li>Konfirmasi terlebih dahulu jenis barang yang dibutuhkan</li>
            <li>Yayasan berhak menolak donasi barang yang tidak sesuai</li>
        </ul>

        <h3>7. Privasi & Data Pribadi</h3>
        <ul>
            <li>Data pribadi donatur akan dijaga kerahasiaannya</li>
            <li>Tidak akan dibagikan kepada pihak ketiga tanpa izin</li>
            <li>Hanya digunakan untuk keperluan internal yayasan</li>
        </ul>

        <h3>8. Pelaporan & Transparansi</h3>
        <ul>
            <li>Yayasan akan mempublikasikan laporan keuangan secara berkala</li>
            <li>Donatur dapat meminta informasi penggunaan dana</li>
            <li>Laporan kegiatan dapat diakses melalui website</li>
        </ul>

        <h3>9. Kontak & Pertanyaan</h3>
        <p>Jika Anda memiliki pertanyaan mengenai donasi atau program yayasan, silakan hubungi kami:</p>
        <ul>
            <li>Email: info@astagina.ac.id</li>
            <li>Telepon: 0341-234567</li>
            <li>WhatsApp: 081234567890</li>
        </ul>

        <div class="highlight-box">
            <strong>🙏 Terima Kasih</strong><br>
            Setiap kontribusi Anda sangat berarti bagi anak-anak asuh kami. Semoga Allah SWT membalas kebaikan Anda.
        </div>

        <a href="{{ route('contact.index') }}" class="btn-back">← Kembali ke Halaman Kontak</a>
    </div>
</div>
@endsection
