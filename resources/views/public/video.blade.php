@extends('layouts.public')
@section('title', 'Video Edukasi')

@section('content')
<style>
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        padding-top: 20px;
    }
    .video-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all var(--transition);
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
    }
    .video-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--green-200);
    }
    .video-player {
        width: 100%;
        height: 200px;
        background: #000;
        border-bottom: 1px solid var(--border);
    }
    .video-content {
        padding: 20px;
        flex-grow: 1;
        background: linear-gradient(to bottom, var(--white), var(--green-50));
    }
    .video-title {
        font-size: 18px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-family: 'Nunito', sans-serif;
    }
    .video-desc {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.6;
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
        <div class="page-hero-title">Video Edukasi</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Tonton berbagai video interaktif dan menarik seputar edukasi pengelolaan dan daur ulang sampah.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($videos->count() > 0)
            <div class="video-grid">
                @foreach($videos as $video)
                <div class="video-card">
                    @if(str_starts_with($video->video_url, 'http'))
                        <iframe class="video-player" src="{{ $video->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        <video class="video-player" src="{{ Storage::url($video->video_url) }}" controls controlsList="nodownload"></video>
                    @endif
                    <div class="video-content">
                        <div class="video-title">{{ $video->title }}</div>
                        @if($video->description)
                            <div class="video-desc">{{ $video->description }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div style="font-size:48px; margin-bottom:16px;">🎥</div>
                <h3 style="font-family:'Nunito'; font-size:24px; font-weight:800; margin-bottom:8px;">Belum Ada Video</h3>
                <p>Koleksi video edukasi belum ditambahkan oleh admin.</p>
            </div>
        @endif
    </div>
</section>
@endsection
