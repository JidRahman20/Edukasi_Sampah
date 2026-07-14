@extends('layouts.public')
@section('title', 'Galeri Foto')

@push('styles')
<style>
    /* ── HERO GALERI ── */
    .hero-galeri {
        background: radial-gradient(circle at 100% 0%, #ecfdf5 0%, #ffffff 60%);
        padding: 100px 0 60px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-galeri-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
    }

    .hero-galeri-title span {
        color: #059669;
    }

    .hero-galeri-desc {
        font-size: 18px;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── GALLERY GRID ── */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .gallery-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f3f4f6;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        position: relative;
        cursor: pointer;
    }

    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -10px rgba(5, 150, 105, 0.2);
        border-color: #a7f3d0;
    }

    .gallery-img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 75%; /* 4:3 Aspect Ratio */
        overflow: hidden;
    }

    .gallery-img {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-img {
        transform: scale(1.08);
    }

    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to top, rgba(17,24,39,0.8) 0%, rgba(17,24,39,0) 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        padding: 24px;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-title-hover {
        color: white;
        font-family: 'Nunito', sans-serif;
        font-weight: 800;
        font-size: 20px;
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }

    .gallery-card:hover .gallery-title-hover {
        transform: translateY(0);
    }

    .gallery-info {
        padding: 20px 24px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .gallery-title {
        font-family: 'Nunito', sans-serif;
        font-size: 18px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border: 2px dashed #a7f3d0;
        border-radius: 32px;
        color: #059669;
    }

    /* ── CTA ── */
    .modern-cta {
        background: #111827;
        border-radius: 32px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .modern-cta::before {
        content: '';
        position: absolute;
        width: 300px; height: 300px;
        background: #059669;
        border-radius: 50%;
        filter: blur(80px);
        top: -150px; left: -50px;
        opacity: 0.5;
    }

    .modern-cta-title {
        font-family: 'Nunito', sans-serif;
        font-size: 32px;
        font-weight: 900;
        color: white;
        margin-bottom: 16px;
        position: relative; z-index: 2;
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-galeri">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#ecfdf5; color:#059669; font-weight:800; font-size:14px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">GALERI AKSI</div>
        <h1 class="hero-galeri-title">
            Potret <span>Aksi Nyata</span> Lingkungan
        </h1>
        <p class="hero-galeri-desc">
            Kumpulan dokumentasi inspiratif dari berbagai kegiatan edukasi, praktik baik, dan aksi nyata pengelolaan sampah di lingkungan sekitar kita.
        </p>
    </div>
</section>

<!-- ── GALLERY ──────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($galleries->count() > 0)
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                <div class="gallery-card">
                    <div class="gallery-img-wrapper">
                        <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="gallery-img">
                        <div class="gallery-overlay">
                            <div class="gallery-title-hover">{{ $gallery->title }}</div>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3 class="gallery-title">{{ Str::limit($gallery->title, 25) }}</h3>
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: #ecfdf5; display: flex; align-items: center; justify-content: center; color: #059669;">
                            📸
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">🖼️</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Dokumentasi</h3>
                <p style="color:#6b7280; font-size:16px;">Koleksi foto galeri aksi lingkungan saat ini masih kosong.</p>
            </div>
        @endif

        <!-- ── CTA SECTION ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Punya Saran Untuk Kami?</h2>
            <p style="font-size:16px; color:#9ca3af; max-width:500px; margin: 0 auto 30px; position:relative; z-index:2;">Kami sangat menghargai feedback dari Anda agar EduSampah terus memberikan konten edukasi yang berkualitas.</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('evaluasi') }}" style="background:#059669; color:white; padding:14px 28px; border-radius:12px; font-weight:800; text-decoration:none; display:inline-flex; align-items:center; gap:8px; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4); transition: transform 0.3s;">
                    📝 Isi Form Evaluasi
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
