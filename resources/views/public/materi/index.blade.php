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

            @php 
                $icons = ['📖', '🗂️', '♻️', '🔄']; 
                $bg_colors = ['#fef3c7', '#dbeafe', '#ede9fe', 'var(--green-100)']; 
                $border_colors = ['#fde68a', '#bfdbfe', '#ddd6fe', 'var(--green-200)']; 
            @endphp
            @foreach($materials as $index => $m)
            <a href="{{ route('materi.show', $m->slug) }}" style="text-decoration:none;color:inherit;">
                <div style="background:linear-gradient(135deg,rgba(255,255,255,0.5),{{ $bg_colors[$index % count($bg_colors)] }});border:1px solid {{ $border_colors[$index % count($border_colors)] }};border-radius:var(--radius-lg);padding:36px;transition:all var(--transition);display:flex;gap:24px;align-items:flex-start;"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    <div style="font-size:48px;flex-shrink:0;">{{ $icons[$index % count($icons)] }}</div>
                    <div>
                        <div class="badge" style="background:{{ $border_colors[$index % count($border_colors)] }}; margin-bottom:10px;">Materi {{ $index + 1 }}</div>
                        <h3 style="font-family:'Nunito';font-size:20px;font-weight:900;color:var(--text-dark);margin-bottom:8px;">{{ $m->title }}</h3>
                        <p style="font-size:14px;color:var(--text-muted);line-height:1.7;">Pelajari materi selengkapnya mengenai {{ strtolower($m->title) }} di sini.</p>
                        <div style="margin-top:14px;color:var(--green-600);font-size:13px;font-weight:700;">Pelajari Sekarang </div>
                    </div>
                </div>
            </a>
            @endforeach

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
