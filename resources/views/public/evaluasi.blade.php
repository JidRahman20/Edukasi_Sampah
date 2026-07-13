@extends('layouts.public')
@section('title', 'Evaluasi Edukasi Sampah')

@section('content')
<style>
    .eval-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        padding: 40px;
        max-width: 600px;
        margin: -40px auto 40px;
        position: relative;
        z-index: 10;
        border: 1px solid var(--border);
    }
    .form-group { margin-bottom: 24px; }
    .form-label {
        display: block; font-weight: 700; color: var(--text-dark); margin-bottom: 8px; font-size: 15px;
    }
    .form-input, .form-select, .form-textarea {
        width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: var(--radius);
        font-family: inherit; font-size: 15px; color: var(--text-dark); transition: border-color var(--transition);
    }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none; border-color: var(--green-500); box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
    }
    .btn-submit {
        display: inline-block; width: 100%; padding: 14px; background: var(--green-600);
        color: white; border: none; border-radius: var(--radius); font-size: 16px; font-weight: 700;
        cursor: pointer; transition: background var(--transition);
    }
    .btn-submit:hover { background: var(--green-700); }
    .closed-state {
        text-align: center; padding: 40px 20px;
    }
</style>

<div class="page-hero">
    <div class="container">
        <div class="page-hero-title">Evaluasi Edukasi</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Bantu kami menjadi lebih baik! Isi form evaluasi singkat ini mengenai pemahaman Anda tentang pengelolaan sampah.</p>
    </div>
</div>

<section class="section" style="padding-top: 0; background: #f8fafc;">
    <div class="container">
        <div class="eval-card">
            
            @if(session('success'))
                <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; border:1px solid #bbf7d0; text-align:center; font-weight:600;">
                    🎉 {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background:#fee2e2; color:#991b1b; padding:16px; border-radius:8px; margin-bottom:24px; border:1px solid #fecaca; text-align:center; font-weight:600;">
                    {{ session('error') }}
                </div>
            @endif

            @if(!$isOpen)
                <div class="closed-state">
                    <div style="font-size:48px; margin-bottom:16px;">🔒</div>
                    <h3 style="font-size:20px; font-weight:800; color:var(--text-dark); margin-bottom:8px;">Form Evaluasi Ditutup</h3>
                    <p style="color:var(--text-secondary); font-size:15px;">Mohon maaf, saat ini kami sedang tidak menerima masukan evaluasi. Silakan kembali lagi nanti.</p>
                </div>
            @else
                <form action="{{ route('evaluasi.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required>
                        @error('name') <div style="color:red; font-size:13px; margin-top:5px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="understanding_level" class="form-label">Seberapa paham Anda tentang memilah sampah setelah membaca materi kami?</label>
                        <select id="understanding_level" name="understanding_level" class="form-select" required>
                            <option value="">-- Pilih Tingkat Pemahaman --</option>
                            <option value="Kurang Paham" {{ old('understanding_level') == 'Kurang Paham' ? 'selected' : '' }}>Kurang Paham</option>
                            <option value="Cukup Paham" {{ old('understanding_level') == 'Cukup Paham' ? 'selected' : '' }}>Cukup Paham</option>
                            <option value="Sangat Paham" {{ old('understanding_level') == 'Sangat Paham' ? 'selected' : '' }}>Sangat Paham</option>
                        </select>
                        @error('understanding_level') <div style="color:red; font-size:13px; margin-top:5px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="intention_level" class="form-label">Apakah Anda berniat untuk mulai memilah sampah dari rumah Anda sendiri?</label>
                        <select id="intention_level" name="intention_level" class="form-select" required>
                            <option value="">-- Pilih Niat Anda --</option>
                            <option value="Tidak" {{ old('intention_level') == 'Tidak' ? 'selected' : '' }}>Tidak, terlalu merepotkan</option>
                            <option value="Mungkin" {{ old('intention_level') == 'Mungkin' ? 'selected' : '' }}>Mungkin, saya akan coba</option>
                            <option value="Ya" {{ old('intention_level') == 'Ya' ? 'selected' : '' }}>Ya, saya pasti akan memilah sampah!</option>
                        </select>
                        @error('intention_level') <div style="color:red; font-size:13px; margin-top:5px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="feedback" class="form-label">Kritik, Saran, atau Kesan Pesan (Opsional)</label>
                        <textarea id="feedback" name="feedback" class="form-textarea" rows="4" placeholder="Tuliskan pendapat Anda mengenai website edukasi ini...">{{ old('feedback') }}</textarea>
                        @error('feedback') <div style="color:red; font-size:13px; margin-top:5px;">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn-submit">Kirim Evaluasi</button>
                </form>
            @endif
        </div>
    </div>
</section>
@endsection
