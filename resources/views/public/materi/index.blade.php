@extends('layouts.public')
@section('title', 'Materi Edukasi')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span> <span>Materi Edukasi</span>
        </div>
        <div class="page-hero-title">Materi Edukasi Sampah</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Pelajari seluruh konten edukasi pengelolaan sampah secara terstruktur dan mudah dipahami, dari pengertian dasar hingga prinsip 3R.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:28px;">

            <a href="{{ route('materi.pengertian') }}" style="text-decoration:none;color:inherit;">
                <div style="background:linear-gradient(135deg,#fef9c3,#fef3c7);border:1px solid #fde68a;border-radius:var(--radius-lg);padding:36px;transition:all var(--transition);display:flex;gap:24px;align-items:flex-start;"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    <div style="font-size:48px;flex-shrink:0;">📖</div>
                    <div>
                        <div class="badge badge-amber" style="margin-bottom:10px;">Materi 1</div>
                        <h3 style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--text-dark);margin-bottom:8px;">Pengertian Sampah</h3>
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.7;">Memahami definisi sampah, sumber-sumbernya, serta dampak negatif yang ditimbulkan bila tidak dikelola dengan baik terhadap lingkungan dan kesehatan.</p>
                        <div style="margin-top:14px;color:var(--green-600);font-size:13px;font-weight:700;">Pelajari Sekarang →</div>
                    </div>
                </div>
            </a>

            <a href="{{ route('materi.jenis') }}" style="text-decoration:none;color:inherit;">
                <div style="background:linear-gradient(135deg,#eff6ff,#dbeafe);border:1px solid #bfdbfe;border-radius:var(--radius-lg);padding:36px;transition:all var(--transition);display:flex;gap:24px;align-items:flex-start;"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    <div style="font-size:48px;flex-shrink:0;">🗂️</div>
                    <div>
                        <div class="badge badge-blue" style="margin-bottom:10px;">Materi 2</div>
                        <h3 style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--text-dark);margin-bottom:8px;">Jenis-Jenis Sampah</h3>
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.7;">Mengenal tiga jenis sampah utama: Organik (mudah terurai), Anorganik (sulit terurai), dan B3 (Bahan Berbahaya & Beracun) beserta contoh-contohnya.</p>
                        <div style="margin-top:14px;color:var(--green-600);font-size:13px;font-weight:700;">Pelajari Sekarang →</div>
                    </div>
                </div>
            </a>

            <a href="{{ route('materi.pemilahan') }}" style="text-decoration:none;color:inherit;">
                <div style="background:linear-gradient(135deg,#f5f3ff,#ede9fe);border:1px solid #ddd6fe;border-radius:var(--radius-lg);padding:36px;transition:all var(--transition);display:flex;gap:24px;align-items:flex-start;"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    <div style="font-size:48px;flex-shrink:0;">♻️</div>
                    <div>
                        <div class="badge badge-purple" style="margin-bottom:10px;">Materi 3</div>
                        <h3 style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--text-dark);margin-bottom:8px;">Cara Pemilahan Sampah</h3>
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.7;">Panduan langkah demi langkah cara memilah sampah yang benar di rumah, sekolah, dan tempat umum menggunakan tempat sampah berwarna yang tepat.</p>
                        <div style="margin-top:14px;color:var(--green-600);font-size:13px;font-weight:700;">Pelajari Sekarang →</div>
                    </div>
                </div>
            </a>

            <a href="{{ route('materi.tiga-r') }}" style="text-decoration:none;color:inherit;">
                <div style="background:linear-gradient(135deg,var(--green-50),var(--green-100));border:1px solid var(--green-200);border-radius:var(--radius-lg);padding:36px;transition:all var(--transition);display:flex;gap:24px;align-items:flex-start;"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    <div style="font-size:48px;flex-shrink:0;">🔄</div>
                    <div>
                        <div class="badge badge-green" style="margin-bottom:10px;">Materi 4</div>
                        <h3 style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--text-dark);margin-bottom:8px;">Prinsip 3R</h3>
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.7;"><strong>Reduce</strong> (mengurangi), <strong>Reuse</strong> (menggunakan kembali), dan <strong>Recycle</strong> (mendaur ulang) — tiga strategi utama dalam pengelolaan sampah yang efektif.</p>
                        <div style="margin-top:14px;color:var(--green-600);font-size:13px;font-weight:700;">Pelajari Sekarang →</div>
                    </div>
                </div>
            </a>

        </div>

        <!-- CTA -->
        <div style="background:var(--green-600);border-radius:var(--radius-xl);padding:40px;text-align:center;margin-top:48px;">
            <h3 style="font-family:'Nunito';font-size:24px;font-weight:900;color:#fff;margin-bottom:8px;">Sudah Mempelajari Semua Materi?</h3>
            <p style="color:rgba(255,255,255,0.8);font-size:14px;margin-bottom:20px;">Uji pemahaman Anda dengan mengikuti formulir evaluasi interaktif.</p>
            <a href="{{ route('evaluasi') }}" class="btn btn-white">✏️ Mulai Evaluasi Sekarang</a>
        </div>
    </div>
</section>

@endsection
