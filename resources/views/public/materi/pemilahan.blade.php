@extends('layouts.public')
@section('title', 'Cara Pemilahan Sampah')

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span>
            <a href="{{ route('materi.index') }}">Materi</a> <span>›</span>
            <span>Cara Pemilahan</span>
        </div>
        <div class="badge badge-purple" style="margin-bottom:12px;">♻️ Materi 3</div>
        <div class="page-hero-title">Cara Pemilahan Sampah</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Langkah-langkah memilah sampah dengan benar.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <p>Konten cara pemilahan sampah...</p>
    </div>
</section>
@endsection
