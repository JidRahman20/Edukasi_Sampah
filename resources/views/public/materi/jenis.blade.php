@extends('layouts.public')
@section('title', 'Jenis-Jenis Sampah')

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span>
            <a href="{{ route('materi.index') }}">Materi</a> <span>›</span>
            <span>Jenis Sampah</span>
        </div>
        <div class="badge badge-blue" style="margin-bottom:12px;">🗂️ Materi 2</div>
        <div class="page-hero-title">Jenis-Jenis Sampah</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Mengenali berbagai jenis sampah berdasarkan sifatnya: Organik, Anorganik, dan B3.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr;gap:32px;">
            <div style="background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius);padding:24px;">
                <h2 style="color:var(--green-800);">1. Sampah Organik</h2>
                <p>Sampah organik adalah barang yang sudah tidak terpakai dan dibuang oleh pemilik atau pemakai sebelumnya, tetapi masih bisa dipakai jika dikelola dengan prosedur yang benar.</p>
            </div>
            <div style="background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius);padding:24px;">
                <h2 style="color:var(--green-800);">2. Sampah Anorganik</h2>
                <p>Sampah anorganik adalah sampah yang sudah tidak dipakai lagi dan sulit terurai. Sampah anorganik yang tertimbun di tanah dapat menyebabkan pencemaran tanah.</p>
            </div>
            <div style="background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius);padding:24px;">
                <h2 style="color:var(--green-800);">3. Sampah B3 (Bahan Berbahaya dan Beracun)</h2>
                <p>Sampah B3 adalah sisa suatu usaha dan/atau kegiatan yang mengandung bahan berbahaya dan/atau beracun yang karena sifat dan/atau konsentrasinya dan/atau jumlahnya, baik secara langsung maupun tidak langsung, dapat mencemarkan dan/atau merusakkan lingkungan hidup, dan/atau dapat membahayakan lingkungan hidup, kesehatan, kelangsungan hidup manusia serta makhluk hidup lain.</p>
            </div>
        </div>
    </div>
</section>
@endsection
