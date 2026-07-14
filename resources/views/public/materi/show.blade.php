@extends('layouts.public')
@section('title', $materi->title)

@section('content')

<!-- HEADER MATERI -->
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span> 
            <a href="{{ route('materi.index') }}">Materi Edukasi</a> <span>›</span> 
            <span>{{ $materi->title }}</span>
        </div>
        <h1 class="page-hero-title">{{ $materi->title }}</h1>
    </div>
</div>

<!-- KONTEN MATERI -->
<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 300px;gap:40px;align-items:start;">
            
            <!-- MAIN CONTENT -->
            <div style="background:var(--white);padding:40px;border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);border:1px solid var(--border);">
                
                @if($materi->image_path)
                <img src="{{ Storage::url($materi->image_path) }}" alt="{{ $materi->title }}" style="width:100%; border-radius:var(--radius-md); margin-bottom: 30px;">
                @endif

                <div class="article-content" style="line-height: 1.8; color: var(--text-body);">
                    {!! $materi->content !!}
                </div>

                <hr style="border:none;border-top:1px solid var(--border);margin:40px 0;">

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <a href="{{ route('materi.index') }}" class="btn btn-primary" style="background:#f3f4f6;color:var(--text-body);border:1px solid #d1d5db;">← Kembali ke Daftar Materi</a>
                    <a href="{{ route('evaluasi') }}" class="btn btn-primary">Lanjut ke Evaluasi →</a>
                </div>
            </div>

            <!-- SIDEBAR MATERI -->
            <div style="position:sticky;top:100px;">
                <div style="background:var(--white);padding:24px;border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);border:1px solid var(--border);margin-bottom:24px;">
                    <h3 style="font-family:'Nunito';font-weight:800;font-size:18px;margin-bottom:16px;color:var(--text-dark);">Daftar Materi Edukasi</h3>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:8px;">
                        @foreach($globalMaterials as $navMateri)
                        <li>
                            <a href="{{ route('materi.show', $navMateri->slug) }}" style="display:block;padding:10px 14px;background:{{ request()->segment(2) == $navMateri->slug ? 'var(--green-50)' : 'var(--white)' }};border:1px solid {{ request()->segment(2) == $navMateri->slug ? 'var(--green-200)' : 'var(--border)' }};border-radius:var(--radius-sm);font-size:14px;font-weight:600;color:{{ request()->segment(2) == $navMateri->slug ? 'var(--green-700)' : 'var(--text-body)' }};text-decoration:none;transition:all var(--transition);" onmouseover="this.style.borderColor='var(--green-400)';this.style.color='var(--green-700)'" onmouseout="this.style.borderColor='{{ request()->segment(2) == $navMateri->slug ? 'var(--green-200)' : 'var(--border)' }}';this.style.color='{{ request()->segment(2) == $navMateri->slug ? 'var(--green-700)' : 'var(--text-body)' }}'">
                                {{ request()->segment(2) == $navMateri->slug ? '📍' : '📖' }} {{ $navMateri->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .article-content h2 { font-family: 'Nunito'; font-size: 24px; font-weight: 800; color: var(--text-dark); margin: 30px 0 15px; }
    .article-content h3 { font-family: 'Nunito'; font-size: 20px; font-weight: 700; color: var(--text-dark); margin: 25px 0 10px; }
    .article-content p { margin-bottom: 16px; }
    .article-content ul, .article-content ol { margin-bottom: 20px; padding-left: 20px; }
    .article-content li { margin-bottom: 8px; }
    .article-content strong { color: var(--text-dark); }
</style>

@endsection
