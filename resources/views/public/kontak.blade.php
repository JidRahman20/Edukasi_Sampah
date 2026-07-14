@extends('layouts.public')
@section('title', 'Kontak Kami')

@push('styles')
<style>
    /* ── HERO KONTAK ── */
    .hero-kontak {
        background: radial-gradient(circle at 50% 100%, #ecfdf5 0%, #ffffff 60%);
        padding: 100px 0 160px; /* Extra bottom padding to overlap card */
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .hero-kontak-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
    }

    .hero-kontak-title span {
        color: #059669;
    }

    .hero-kontak-desc {
        font-size: 18px;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── CONTACT SECTION ── */
    .contact-wrapper {
        margin-top: -100px;
        position: relative;
        z-index: 10;
        margin-bottom: 80px;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        background: white;
        border-radius: 32px;
        box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05);
        border: 1px solid #f3f4f6;
        overflow: hidden;
    }

    @media (max-width: 800px) {
        .contact-container { grid-template-columns: 1fr; }
    }

    /* Left Side: Info */
    .contact-info {
        background: linear-gradient(135deg, #064e3b, #059669);
        color: white;
        padding: 48px;
        position: relative;
        overflow: hidden;
    }

    .contact-info::after {
        content: '';
        position: absolute;
        bottom: -50px; right: -50px;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .info-title {
        font-family: 'Nunito', sans-serif;
        font-size: 28px;
        font-weight: 900;
        margin-bottom: 16px;
    }

    .info-desc {
        font-size: 15px;
        color: #d1fae5;
        line-height: 1.6;
        margin-bottom: 40px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        font-size: 15px;
        font-weight: 500;
        color: #ecfdf5;
    }

    .info-icon {
        width: 48px; height: 48px;
        background: rgba(255,255,255,0.15);
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
    }

    /* Right Side: Form */
    .contact-form-wrap {
        padding: 48px;
        background: white;
    }

    .form-group { margin-bottom: 24px; }
    
    .form-label {
        display: block; font-weight: 700; color: #374151; margin-bottom: 8px; font-size: 14px;
    }

    .form-input, .form-textarea {
        width: 100%; 
        padding: 16px; 
        background: #f9fafb;
        border: 2px solid transparent; 
        border-radius: 16px;
        font-family: inherit; font-size: 15px; color: #111827; 
        transition: all 0.3s ease;
    }

    .form-input::placeholder, .form-textarea::placeholder {
        color: #9ca3af;
    }

    .form-input:focus, .form-textarea:focus {
        outline: none; 
        background: white;
        border-color: #34d399; 
        box-shadow: 0 4px 12px rgba(52, 211, 153, 0.1);
    }

    .btn-submit {
        display: inline-flex; 
        align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 16px; 
        background: #111827;
        color: white; border: none; border-radius: 16px; 
        font-size: 16px; font-weight: 800;
        cursor: pointer; transition: all 0.3s;
    }

    .btn-submit:hover { 
        background: #059669; 
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -10px rgba(5, 150, 105, 0.4);
    }

    .alert-success {
        background: #ecfdf5; 
        color: #065f46; 
        padding: 16px; 
        border-radius: 16px; 
        margin-bottom: 24px; 
        border: 1px solid #a7f3d0; 
        display: flex; align-items: center; gap: 12px;
        font-weight: 700; font-size: 15px;
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-kontak">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#ecfdf5; color:#059669; font-weight:800; font-size:14px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">SAPA KAMI</div>
        <h1 class="hero-kontak-title">
            Mari Berbincang <span>Lebih Dekat</span>
        </h1>
        <p class="hero-kontak-desc">
            Punya ide cemerlang, pertanyaan, atau ingin berkolaborasi terkait edukasi lingkungan? Jangan ragu untuk mengirimkan pesan!
        </p>
    </div>
</section>

<!-- ── CONTACT FORM ─────────────────────────────────────────────── -->
<section class="contact-wrapper">
    <div class="container">
        <div class="contact-container">
            
            <!-- INFO SIDE -->
            <div class="contact-info">
                <h2 class="info-title">Informasi Kontak</h2>
                <p class="info-desc">Kami selalu terbuka untuk saran dan diskusi yang membangun ekosistem lebih hijau.</p>
                
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Lokasi Kami</div>
                        <div>Balai Desa Pakuhaji, Jawa Barat</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Email Resmi</div>
                        <div>halo@edusampah.desa.id</div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:12px; opacity:0.8; margin-bottom:2px;">Media Sosial</div>
                        <div>@knpakuhaji_2026</div>
                    </div>
                </div>
            </div>

            <!-- FORM SIDE -->
            <div class="contact-form-wrap">
                @if(session('success'))
                    <div class="alert-success">
                        <span style="font-size:20px;">🎉</span>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('kontak.submit') }}" method="POST">
                    @csrf
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-input" value="{{ old('nama') }}" placeholder="" required>
                            @error('nama') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="" required>
                            @error('email') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjek" class="form-label">Subjek Pesan</label>
                        <input type="text" id="subjek" name="subjek" class="form-input" value="{{ old('subjek') }}" placeholder="Apa yang ingin Anda bicarakan?" required>
                        @error('subjek') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pesan" class="form-label">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" class="form-textarea" rows="6" placeholder="Tuliskan pesan, saran, atau pertanyaan Anda di sini..." required>{{ old('pesan') }}</textarea>
                        @error('pesan') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn-submit">
                        Kirim Pesan Sekarang 🚀
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
