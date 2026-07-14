@extends('layouts.public')
@section('title', 'Tips Pengelolaan')

@push('styles')
<style>
    /* ── HERO TIPS ── */
    .hero-tips {
        background: radial-gradient(circle at 100% 100%, #ecfdf5 0%, #ffffff 60%);
        padding: 100px 0 60px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #f3f4f6;
    }

    .hero-tips-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
    }

    .hero-tips-title span {
        background: linear-gradient(135deg, #059669, #34d399);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-tips-desc {
        font-size: 18px;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── TIPS GRID ── */
    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .tip-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f3f4f6;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    .tip-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -10px rgba(5, 150, 105, 0.15);
        border-color: #a7f3d0;
    }

    .tip-img-wrapper {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .tip-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tip-card:hover .tip-img {
        transform: scale(1.08);
    }

    .tip-badge {
        position: absolute;
        top: 16px; left: 16px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        color: #059669;
        font-weight: 800;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .tip-content {
        padding: 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .tip-title {
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 12px;
        line-height: 1.3;
        transition: color 0.3s;
    }

    .tip-card:hover .tip-title {
        color: #059669;
    }

    .tip-body {
        font-size: 15px;
        color: #6b7280;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .read-more-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #059669;
        font-weight: 800;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .read-more-wrapper span {
        transition: transform 0.3s;
    }

    .tip-card:hover .read-more-wrapper span {
        transform: translateX(4px);
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
<section class="hero-tips">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#ecfdf5; color:#059669; font-weight:800; font-size:14px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">LIFE HACKS LINGKUNGAN</div>
        <h1 class="hero-tips-title">
            Tips & Trik <span>Zero-Waste</span>
        </h1>
        <p class="hero-tips-desc">
            Temukan panduan praktis dan ide-ide kreatif untuk mengelola sampah dan menerapkan gaya hidup ramah lingkungan setiap harinya.
        </p>
    </div>
</section>

<!-- ── TIPS GRID ────────────────────────────────────────────────── -->
<section class="section" style="background:#f8fafc; padding: 80px 0;">
    <div class="container">
        @if($tips->count() > 0)
            <div class="tips-grid">
                @foreach($tips as $tip)
                <div class="tip-card" onclick="alert('Fitur baca selengkapnya akan diimplementasikan nanti!');">
                    <div class="tip-img-wrapper">
                        <div class="tip-badge">{{ $tip->created_at->format('d M Y') }}</div>
                        @if($tip->image_path)
                            <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="tip-img">
                        @else
                            <div class="tip-img" style="background:linear-gradient(135deg, #dcfce7, #a7f3d0); display:flex; align-items:center; justify-content:center; font-size:60px;">💡</div>
                        @endif
                    </div>
                    <div class="tip-content">
                        <h3 class="tip-title">{{ $tip->title }}</h3>
                        <div class="tip-body">
                            {!! strip_tags($tip->content) !!}
                        </div>
                        <div class="read-more-wrapper">
                            Baca Selengkapnya <span>→</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:60px; margin-bottom:20px;">💡</div>
                <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; margin-bottom:12px; color:#111827;">Belum Ada Tips</h3>
                <p style="color:#6b7280; font-size:16px;">Tips dan life hacks harian belum ditambahkan oleh admin saat ini.</p>
            </div>
        @endif

        <!-- ── CTA SECTION ────────────────────────────────────────────── -->
        <div class="modern-cta">
            <h2 class="modern-cta-title">Punya Tips Ramah Lingkungan Sendiri?</h2>
            <p style="font-size:16px; color:#9ca3af; max-width:500px; margin: 0 auto 30px; position:relative; z-index:2;">Bagikan *life hacks* andalanmu dalam mengurangi sampah dengan mengirim pesan ke tim EduSampah!</p>
            <div style="position:relative; z-index:2; display:flex; justify-content:center;">
                <a href="{{ route('kontak') }}" style="background:#059669; color:white; padding:14px 28px; border-radius:12px; font-weight:800; text-decoration:none; display:inline-flex; align-items:center; gap:8px; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4); transition: transform 0.3s;">
                    ✉️ Hubungi Kami
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
