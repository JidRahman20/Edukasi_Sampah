@extends('layouts.public')
@section('title', 'Galeri Foto')

@section('content')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding-top: 20px;
    }
    .gallery-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition);
        box-shadow: var(--shadow-sm);
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--green-200);
    }
    .gallery-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-bottom: 1px solid var(--border);
    }
    .gallery-title {
        padding: 16px 20px;
        font-size: 16px;
        font-weight: 700;
        color: var(--text-dark);
        text-align: center;
        background: linear-gradient(to bottom, var(--white), var(--green-50));
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: var(--green-50);
        border: 2px dashed var(--green-200);
        border-radius: var(--radius-lg);
        color: var(--green-700);
    }
</style>

<div class="page-hero">
    <div class="container">
        <div class="page-hero-title">Galeri Edukasi</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Dokumentasi kegiatan edukasi dan praktik baik dalam pengelolaan sampah di lingkungan sekitar kita.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($galleries->count() > 0)
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                <div class="gallery-card">
                    <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="gallery-img">
                    <div class="gallery-title">{{ $gallery->title }}</div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">🖼️</div>
                <h3 style="font-family:'Nunito'; font-size:24px; font-weight:800; margin-bottom:8px;">Belum Ada Foto</h3>
                <p>Koleksi foto galeri belum ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>
</section>
@endsection
