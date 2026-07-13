@extends('layouts.public')

@section('title', 'Beranda')
@section('meta-desc', 'EduSampah — Platform edukasi pengelolaan sampah untuk lingkungan yang bersih dan sehat.')

@push('styles')
<style>
    /* ── HERO ── */
    .hero {
        background: linear-gradient(160deg, var(--green-50) 0%, #fff 60%, var(--green-100) 100%);
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 450px; height: 450px;
        background: radial-gradient(circle, rgba(74,222,128,0.2), transparent 70%);
        border-radius: 50%;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -60px; left: 10%;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(34,197,94,0.12), transparent 70%);
        border-radius: 50%;
    }

    .hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 64px;
        position: relative;
        z-index: 1;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--green-100);
        color: var(--green-700);
        border: 1px solid var(--green-200);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12.5px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(32px, 5vw, 52px);
        font-weight: 900;
        color: var(--text-dark);
        line-height: 1.15;
        margin-bottom: 20px;
    }

    .hero-title span {
        color: var(--green-600);
        position: relative;
        display: inline-block;
    }

    .hero-title span::after {
        content: '';
        position: absolute;
        bottom: 2px; left: 0; right: 0;
        height: 8px;
        background: var(--green-200);
        z-index: -1;
        border-radius: 4px;
    }

    .hero-desc {
        font-size: 17px;
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 32px;
    }

    .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

    .hero-stats {
        display: flex;
        gap: 32px;
        margin-top: 40px;
        padding-top: 32px;
        border-top: 1px solid var(--green-100);
    }

    .hero-stat-val {
        font-family: 'Nunito', sans-serif;
        font-size: 26px;
        font-weight: 900;
        color: var(--green-700);
    }

    .hero-stat-label {
        font-size: 12.5px;
        color: var(--text-muted);
        font-weight: 500;
    }

    /* Visual side */
    .hero-visual {
        position: relative;
    }

    .hero-visual-main {
        background: linear-gradient(135deg, var(--green-100), var(--green-50));
        border: 2px solid var(--green-200);
        border-radius: 24px;
        padding: 36px;
        text-align: center;
        position: relative;
    }

    .hero-emoji-big { font-size: 100px; display: block; margin-bottom: 16px; line-height: 1; }

    .hero-visual-tag {
        background: var(--white);
        border: 1px solid var(--green-200);
        border-radius: 12px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-dark);
        margin-top: 8px;
        box-shadow: var(--shadow-sm);
    }

    .float-card {
        position: absolute;
        background: var(--white);
        border: 1px solid var(--green-100);
        border-radius: var(--radius);
        padding: 12px 16px;
        box-shadow: var(--shadow-md);
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        animation: floatY 3s ease-in-out infinite;
    }

    .float-card-1 { top: -16px; left: -20px; animation-delay: 0s; }
    .float-card-2 { bottom: 30px; right: -24px; animation-delay: 1.5s; }

    @keyframes floatY {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* ── FEATURES ── */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .feature-card {
        background: var(--white);
        border: 1px solid var(--green-100);
        border-radius: var(--radius-lg);
        padding: 28px;
        transition: all var(--transition);
    }

    .feature-card:hover {
        border-color: var(--green-300);
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }

    .feature-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px;
        margin-bottom: 16px;
    }

    .feature-title {
        font-family: 'Nunito', sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .feature-desc {
        font-size: 13.5px;
        color: var(--text-muted);
        line-height: 1.7;
    }

    /* ── MATERI CARDS ── */
    .materi-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .materi-card {
        display: flex;
        align-items: center;
        gap: 18px;
        background: var(--white);
        border: 1px solid var(--green-100);
        border-radius: var(--radius);
        padding: 22px;
        transition: all var(--transition);
        text-decoration: none;
        color: inherit;
    }

    .materi-card:hover {
        border-color: var(--green-400);
        box-shadow: var(--shadow-md);
        transform: translateX(4px);
    }

    .materi-card-icon {
        width: 54px; height: 54px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
    }

    .materi-card-title {
        font-family: 'Nunito', sans-serif;
        font-size: 15px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .materi-card-desc {
        font-size: 12.5px;
        color: var(--text-muted);
    }

    /* ── CTA BANNER ── */
    .cta-banner {
        background: linear-gradient(135deg, var(--green-600) 0%, var(--green-800) 100%);
        border-radius: var(--radius-xl);
        padding: 60px 48px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-banner::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 300px; height: 300px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }

    .cta-banner::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -40px;
        width: 250px; height: 250px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    .cta-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 900;
        color: var(--white);
        margin-bottom: 12px;
        position: relative; z-index: 1;
    }

    .cta-desc {
        font-size: 16px;
        color: rgba(255,255,255,0.8);
        margin-bottom: 28px;
        position: relative; z-index: 1;
    }

    .cta-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        position: relative; z-index: 1;
    }

    /* ── TIPS PREVIEW ── */
    .tips-list { display: flex; flex-direction: column; gap: 14px; }

    .tip-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        padding: 16px;
        background: var(--green-50);
        border: 1px solid var(--green-100);
        border-radius: var(--radius);
        transition: all var(--transition);
    }

    .tip-item:hover { border-color: var(--green-300); background: var(--white); }

    .tip-num {
        width: 32px; height: 32px;
        border-radius: 50%;
        background: var(--green-500);
        color: var(--white);
        display: flex; align-items: center; justify-content: center;
        font-size: 13px;
        font-weight: 800;
        flex-shrink: 0;
    }

    .tip-text {
        font-size: 14px;
        font-weight: 500;
        color: var(--text-dark);
        line-height: 1.6;
    }

    @media (max-width: 900px) {
        .hero-inner { grid-template-columns: 1fr; }
        .hero-visual { display: none; }
        .features-grid { grid-template-columns: 1fr 1fr; }
        .materi-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 600px) {
        .features-grid { grid-template-columns: 1fr; }
        .hero-stats { gap: 20px; }
        .cta-banner { padding: 40px 24px; }
    }
</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero">
    <div class="hero-inner">
        <div>
            <div class="hero-tag">🌱 Program Edukasi Lingkungan</div>
            <h1 class="hero-title">
                Bersama Kelola <span>Sampah</span> untuk Bumi Lebih Bersih
            </h1>
            <p class="hero-desc">
                Pelajari cara memilah, mengelola, dan mengurangi sampah secara bertanggung jawab.
                Edukasi interaktif untuk generasi peduli lingkungan.
            </p>
            <div class="hero-actions">
                <a href="{{ route('materi.index') }}" class="btn btn-primary" style="font-size:15px;padding:13px 26px;">
                    📚 Mulai Belajar
                </a>
                <a href="{{ route('tentang') }}" class="btn btn-outline" style="font-size:15px;padding:13px 26px;">
                    Tentang Program
                </a>
            </div>
            <div class="hero-stats">
                <div>
                    <div class="hero-stat-val">5+</div>
                    <div class="hero-stat-label">Materi Edukasi</div>
                </div>
                <div>
                    <div class="hero-stat-val">3R</div>
                    <div class="hero-stat-label">Prinsip Utama</div>
                </div>
                <div>
                    <div class="hero-stat-val">100%</div>
                    <div class="hero-stat-label">Gratis & Terbuka</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="float-card float-card-1">
                <span>🌍</span> Jaga Lingkungan
            </div>
            <div class="hero-visual-main">
                <span class="hero-emoji-big">♻️</span>
                <div style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--green-800);margin-bottom:8px;">
                    Reduce · Reuse · Recycle
                </div>
                <p style="font-size:13px;color:var(--text-muted);">Tiga prinsip dasar pengelolaan sampah</p>
                <div class="hero-visual-tag" style="margin-top:16px;">
                    <span style="font-size:20px;">🗑️</span>
                    <div>
                        <div>Pilah sampah dengan benar</div>
                        <div style="font-size:11px;color:var(--text-muted);font-weight:400;">Organik · Anorganik · B3</div>
                    </div>
                </div>
            </div>
            <div class="float-card float-card-2">
                <span>✅</span> Sudah Dipilah!
            </div>
        </div>
    </div>
</section>

<!-- ── FITUR UNGGULAN ──────────────────────────────────────────── -->
<section class="section" style="background:var(--green-50);">
    <div class="container">
        <div class="section-header center">
            <div class="section-label">✨ Kenapa EduSampah?</div>
            <h2 class="section-title">Platform Edukasi Terlengkap<br>untuk Pengelolaan Sampah</h2>
            <p class="section-desc">Tersedia berbagai materi, galeri, video, dan kuis interaktif yang mudah dipahami oleh semua kalangan.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background:#dcfce7;">📚</div>
                <div class="feature-title">Materi Lengkap</div>
                <p class="feature-desc">Materi edukasi mulai dari pengertian sampah, jenis-jenisnya, cara pemilahan, hingga prinsip 3R yang mudah dipahami.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#dbeafe;">🎬</div>
                <div class="feature-title">Video Edukasi</div>
                <p class="feature-desc">Koleksi video pembelajaran menarik yang menjelaskan cara pengelolaan sampah yang baik dan benar secara visual.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#fef3c7;">✏️</div>
                <div class="feature-title">Evaluasi Mandiri</div>
                <p class="feature-desc">Uji pemahaman Anda dengan formulir evaluasi interaktif dan dapatkan hasil langsung setelah menyelesaikan kuis.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#fce7f3;">🖼️</div>
                <div class="feature-title">Galeri Foto</div>
                <p class="feature-desc">Koleksi foto inspiratif tentang kegiatan pengelolaan sampah, daur ulang, dan lingkungan bersih dari berbagai daerah.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#ede9fe;">💡</div>
                <div class="feature-title">Tips Praktis</div>
                <p class="feature-desc">Tips dan trik praktis pengelolaan sampah sehari-hari yang bisa langsung diterapkan di rumah, sekolah, and lingkungan.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:#d1fae5;">🌱</div>
                <div class="feature-title">Gratis & Terbuka</div>
                <p class="feature-desc">Seluruh konten edukasi tersedia secara gratis dan dapat diakses oleh siapa saja tanpa perlu mendaftar atau login.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── MATERI EDUKASI ──────────────────────────────────────────── -->
<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
            <div>
                <div class="section-header">
                    <div class="section-label">📖 Materi Edukasi</div>
                    <h2 class="section-title">Semua yang Perlu Anda Ketahui tentang Sampah</h2>
                    <p class="section-desc">Pelajari materi edukasi sampah secara terstruktur dari dasar hingga penerapan prinsip 3R.</p>
                </div>
                <a href="{{ route('materi.index') }}" class="btn btn-primary">Lihat Semua Materi →</a>
            </div>
            <div class="materi-grid">
                @php $icons = ['📖', '🗂️', '♻️', '🔄']; $colors = ['#fef3c7', '#dbeafe', '#ede9fe', '#fce7f3']; @endphp
                @foreach($materials as $index => $m)
                <a href="{{ route('materi.show', $m->slug) }}" class="materi-card">
                    <div class="materi-card-icon" style="background:{{ $colors[$index % count($colors)] }};">{{ $icons[$index % count($icons)] }}</div>
                    <div>
                        <div class="materi-card-title">{{ $m->title }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ── TIPS PREVIEW ────────────────────────────────────────────── -->
<section class="section" style="background:var(--green-50);">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:start;">
            <div>
                <div class="section-label">💡 Tips Harian</div>
                <h2 class="section-title">5 Tips Mudah Mengelola Sampah di Rumah</h2>
                <p class="section-desc" style="margin-bottom:24px;">Langkah-langkah sederhana yang bisa Anda mulai hari ini untuk berkontribusi pada lingkungan yang lebih bersih.</p>
                <a href="{{ route('tips') }}" class="btn btn-outline">Lihat Semua Tips →</a>
            </div>
            <div class="tips-list">
                @foreach([
                    ['Siapkan 3 tempat sampah terpisah: organik, anorganik, dan B3 di rumah Anda.', '🗑️'],
                    ['Bawa tas belanja sendiri untuk mengurangi penggunaan kantong plastik sekali pakai.', '🛍️'],
                    ['Olah sampah organik menjadi kompos untuk pupuk tanaman di halaman.', '🌱'],
                    ['Cuci dan keringkan wadah bekas sebelum membuangnya ke tempat daur ulang.', '🧹'],
                    ['Hindari membeli produk berlebihan — beli secukuhnya sesuai kebutuhan.', '✂️'],
                ] as $i => $tip)
                <div class="tip-item">
                    <div class="tip-num">{{ $i + 1 }}</div>
                    <div>
                        <div style="font-size:16px;margin-bottom:4px;">{{ $tip[1] }}</div>
                        <div class="tip-text">{{ $tip[0] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ── CTA BANNER ─────────────────────────────────────────────── -->
<section class="section">
    <div class="container">
        <div class="cta-banner">
            <div style="font-size:52px;margin-bottom:16px;">🌍</div>
            <h2 class="cta-title">Siap Menguji Pengetahuan Anda?</h2>
            <p class="cta-desc">Ikuti formulir evaluasi kami dan cek seberapa jauh Anda memahami pengelolaan sampah yang baik.</p>
            <div class="cta-actions">
                <a href="{{ route('evaluasi') }}" class="btn btn-white" style="font-size:15px;padding:13px 28px;">
                    ✏️ Mulai Evaluasi Sekarang
                </a>
                <a href="{{ route('materi.index') }}" class="btn" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.3);font-size:15px;padding:13px 28px;">
                    📚 Pelajari Materi Dulu
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
