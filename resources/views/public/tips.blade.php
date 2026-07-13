@extends('layouts.public')
@section('title', 'Tips Harian')

@section('content')
<style>
    .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding-top: 20px;
    }
    .tip-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition);
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
    }
    .tip-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--green-200);
    }
    .tip-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid var(--border);
    }
    .tip-content {
        padding: 24px;
        flex-grow: 1;
    }
    .tip-title {
        font-size: 20px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-family: 'Nunito', sans-serif;
        line-height: 1.3;
    }
    .tip-meta {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .tip-body {
        font-size: 15px;
        color: var(--text-secondary);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .read-more {
        margin-top: 16px;
        display: inline-block;
        color: var(--green-600);
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
    }
    .read-more:hover {
        color: var(--green-800);
        text-decoration: underline;
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
        <div class="page-hero-title">Tips Harian</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Temukan berbagai tips dan trik praktis untuk mengelola sampah dan menjaga lingkungan setiap harinya.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($tips->count() > 0)
            <div class="tips-grid">
                @foreach($tips as $tip)
                <div class="tip-card">
                    @if($tip->image_path)
                        <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="tip-img">
                    @else
                        <div class="tip-img" style="background:var(--green-50); display:flex; align-items:center; justify-content:center; color:var(--green-600); font-size:48px;">💡</div>
                    @endif
                    <div class="tip-content">
                        <div class="tip-meta">
                            <span>📅 {{ $tip->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="tip-title">{{ $tip->title }}</h3>
                        <div class="tip-body">
                            {!! strip_tags($tip->content) !!}
                        </div>
                        <a href="#" class="read-more" onclick="alert('Fitur baca selengkapnya akan segera hadir!'); return false;">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">💡</div>
                <h3 style="font-family:'Nunito'; font-size:24px; font-weight:800; margin-bottom:8px;">Belum Ada Tips</h3>
                <p>Tips harian pengelolaan sampah belum ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>
</section>
@endsection
