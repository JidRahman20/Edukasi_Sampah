@extends('layouts.public')

@section('title', 'Tentang Program')
@section('meta-desc', 'Kenali lebih dekat program EduSampah — misi, visi, dan tujuan edukasi pengelolaan sampah.')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span> <span>Tentang Program</span>
        </div>
        <div class="page-hero-title">Tentang Program EduSampah</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:580px;">Mengenal lebih dekat misi, visi, dan tujuan program edukasi pengelolaan sampah yang kami jalankan.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Intro -->
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;margin-bottom:80px;">
            <div>
                <div class="section-label">🌿 Siapa Kami</div>
                <h2 class="section-title">Program Edukasi Sampah untuk Indonesia Bersih</h2>
                <p style="font-size:15px;color:var(--text-muted);line-height:1.8;margin-bottom:16px;">
                    <strong>EduSampah</strong> adalah platform edukasi digital yang berfokus pada peningkatan kesadaran masyarakat tentang pentingnya pengelolaan sampah yang baik dan benar.
                </p>
                <p style="font-size:15px;color:var(--text-muted);line-height:1.8;margin-bottom:16px;">
                    Kami menyediakan materi edukasi yang mudah dipahami, konten visual yang menarik, serta evaluasi interaktif untuk membantu masyarakat memahami cara memilah dan mengelola sampah secara bertanggung jawab.
                </p>
                <p style="font-size:15px;color:var(--text-muted);line-height:1.8;">
                    Program ini terbuka untuk semua kalangan — pelajar, mahasiswa, guru, orang tua, maupun masyarakat umum — tanpa dipungut biaya apapun.
                </p>
            </div>
            <div style="background:linear-gradient(135deg,var(--green-50),var(--green-100));border-radius:var(--radius-xl);padding:48px;text-align:center;">
                <div style="font-size:80px;margin-bottom:20px;">🌱</div>
                <div style="font-family:'Nunito';font-size:22px;font-weight:900;color:var(--green-800);margin-bottom:10px;">Bersama Menjaga Bumi</div>
                <p style="font-size:14px;color:var(--text-muted);">Setiap tindakan kecil dalam mengelola sampah berkontribusi besar pada kelestarian lingkungan hidup kita.</p>
            </div>
        </div>

        <!-- Visi Misi -->
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:80px;">
            <div style="background:linear-gradient(135deg,var(--green-600),var(--green-800));border-radius:var(--radius-lg);padding:36px;color:#fff;">
                <div style="font-size:40px;margin-bottom:16px;">🎯</div>
                <h3 style="font-family:'Nunito';font-size:22px;font-weight:900;margin-bottom:12px;">Visi Kami</h3>
                <p style="font-size:14px;line-height:1.8;color:rgba(255,255,255,0.85);">
                    Mewujudkan masyarakat Indonesia yang sadar, peduli, dan mampu mengelola sampah secara mandiri demi terciptanya lingkungan yang bersih, sehat, dan berkelanjutan.
                </p>
            </div>
            <div style="background:var(--green-50);border:2px solid var(--green-200);border-radius:var(--radius-lg);padding:36px;">
                <div style="font-size:40px;margin-bottom:16px;">🚀</div>
                <h3 style="font-family:'Nunito';font-size:22px;font-weight:900;color:var(--text-dark);margin-bottom:12px;">Misi Kami</h3>
                <ul style="font-size:14px;line-height:1.9;color:var(--text-muted);padding-left:18px;">
                    <li>Menyediakan edukasi sampah yang mudah diakses dan dipahami</li>
                    <li>Mendorong penerapan prinsip 3R dalam kehidupan sehari-hari</li>
                    <li>Membangun kesadaran lingkungan sejak dini</li>
                    <li>Memfasilitasi evaluasi pemahaman pengelolaan sampah</li>
                </ul>
            </div>
        </div>

        <!-- Tujuan -->
        <div style="margin-bottom:80px;">
            <div class="section-header center">
                <div class="section-label">🎓 Tujuan Program</div>
                <h2 class="section-title">Apa yang Ingin Kami Capai</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
                @foreach([
                    ['🧠', 'Meningkatkan Pengetahuan', 'Memberikan pemahaman mendalam tentang jenis, dampak, dan cara pengelolaan sampah yang tepat.', 'var(--green-100)'],
                    ['💪', 'Mengubah Perilaku', 'Mendorong perubahan kebiasaan nyata dalam pemilahan dan pengurangan sampah di kehidupan sehari-hari.', '#dbeafe'],
                    ['🌍', 'Menjaga Lingkungan', 'Berkontribusi pada pengurangan volume sampah dan pencemaran lingkungan secara signifikan.', '#fef3c7'],
                    ['👨‍👩‍👧‍👦', 'Melibatkan Komunitas', 'Membangun gerakan bersama dari tingkat individu, keluarga, hingga masyarakat luas.', '#fce7f3'],
                    ['📊', 'Evaluasi Berkala', 'Memantau pemahaman masyarakat melalui evaluasi interaktif dan memberikan umpan balik.', '#ede9fe'],
                    ['🔄', 'Mendukung 3R', 'Mempromosikan dan menerapkan prinsip Reduce, Reuse, Recycle dalam kehidupan sehari-hari.', '#d1fae5'],
                ] as $t)
                <div class="card">
                    <div style="width:48px;height:48px;border-radius:12px;background:{{ $t[3] }};display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:14px;">{{ $t[0] }}</div>
                    <h4 style="font-family:'Nunito';font-size:16px;font-weight:800;color:var(--text-dark);margin-bottom:8px;">{{ $t[1] }}</h4>
                    <p style="font-size:13px;color:var(--text-muted);line-height:1.7;">{{ $t[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- CTA -->
        <div style="background:var(--green-50);border:1px solid var(--green-200);border-radius:var(--radius-xl);padding:48px;text-align:center;">
            <div style="font-size:48px;margin-bottom:16px;">📚</div>
            <h3 style="font-family:'Nunito';font-size:26px;font-weight:900;color:var(--text-dark);margin-bottom:10px;">Mulai Perjalanan Edukasi Anda</h3>
            <p style="font-size:15px;color:var(--text-muted);margin-bottom:24px;">Jelajahi seluruh materi edukasi sampah yang tersedia secara gratis.</p>
            <div style="display:flex;justify-content:center;gap:12px;flex-wrap:wrap;">
                <a href="{{ route('materi.index') }}" class="btn btn-primary">📚 Lihat Materi Edukasi</a>
                <a href="{{ route('evaluasi') }}" class="btn btn-outline">✏️ Ikuti Evaluasi</a>
            </div>
        </div>
    </div>
</section>

@endsection
