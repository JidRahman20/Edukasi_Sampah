@extends('layouts.public')
@section('title', 'Video Edukasi')

@push('styles')
<style>
    /* ── HERO VIDEO ── */
    .hero-video {
        background: radial-gradient(circle at 0% 100%, #ecfdf5 0%, #ffffff 60%);
        padding: 100px 0 60px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-video-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
    }

    .hero-video-title span {
        background: linear-gradient(135deg, #059669, #34d399);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-video-desc {
        font-size: 18px;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── VIDEO GRID ── */
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .video-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f3f4f6;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
    }

    .video-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -10px rgba(5, 150, 105, 0.15);
        border-color: #a7f3d0;
    }

    .video-player-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        background: #000;
        overflow: hidden;
    }

    .video-player {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border: none;
    }

    .video-content {
        padding: 24px;
        flex-grow: 1;
        background: white;
        display: flex;
        flex-direction: column;
    }

    .video-title {
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .video-desc {
        font-size: 15px;
        color: #6b7280;
        line-height: 1.6;
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
<section class="hero-video">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#ecfdf5; color:#059669; font-weight:800; font-size:14px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">VIDEO EDUKASI</div>
        <h1 class="hero-video-title">
            Tonton & <span>Pelajari</span>
        </h1>
        <p class="hero-video-desc">
            Visualisasikan wawasan barumu! Tonton berbagai video animasi edukatif seputar daur ulang dan pengelolaan sampah yang asik dan mudah dipahami.
        </p>
    </div>
</section>

<!-- ── VIDEO GRID ────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($videos->count() > 0)
            <div class="video-grid">
                @foreach($videos as $video)
                <div class="video-card">
                    <div class="video-player-wrapper">
                        @if(str_starts_with($video->video_url, 'http'))
                            <iframe class="video-player" src="{{ $video->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <video class="video-player" src="{{ Storage::url($video->video_url) }}" controls controlsList="nodownload"></video>
                        @endif
                    </div>
                    <div class="video-content">
                        <div style="display:inline-block; background:#ecfdf5; color:#059669; font-size:12px; font-weight:800; padding:4px 10px; border-radius:12px; margin-bottom:12px; align-self:flex-start;">Edukasi</div>
                        <h3 class="video-title">{{ $video->title }}</h3>
                        @if($video->description)
                            <p class="video-desc">{{ $video->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">🎬</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Video</h3>
                <p style="color:#6b7280; font-size:16px;">Koleksi video edukasi lingkungan saat ini masih kosong.</p>
            </div>
        @endif

        <!-- ── CTA SECTION ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Sudah Selesai Menonton?</h2>
            <p style="font-size:16px; color:#9ca3af; max-width:500px; margin: 0 auto 30px; position:relative; z-index:2;">Uji seberapa jauh pemahaman yang sudah kamu dapatkan dari video-video di atas melalui form evaluasi singkat.</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('evaluasi') }}" style="background:#059669; color:white; padding:14px 28px; border-radius:12px; font-weight:800; text-decoration:none; display:inline-flex; align-items:center; gap:8px; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4); transition: transform 0.3s;">
                    📝 Mulai Evaluasi
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
