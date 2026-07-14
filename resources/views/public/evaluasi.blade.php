@extends('layouts.public')
@section('title', 'Evaluasi Edukasi Sampah')

@push('styles')
<style>
    /* ── HERO EVALUASI ── */
    .hero-evaluasi {
        background: radial-gradient(circle at 50% 100%, #ecfdf5 0%, #ffffff 60%);
        padding: 100px 0 160px; /* Extra bottom padding to overlap card */
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .hero-evaluasi-title {
        font-family: 'Nunito', sans-serif;
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 900;
        color: #111827;
        margin-bottom: 16px;
    }

    .hero-evaluasi-title span {
        color: #059669;
    }

    .hero-evaluasi-desc {
        font-size: 18px;
        color: #6b7280;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── EVALUASI SECTION ── */
    .eval-wrapper {
        margin-top: -100px;
        position: relative;
        z-index: 10;
        margin-bottom: 80px;
    }

    .eval-card {
        background: white;
        border-radius: 32px;
        box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05);
        border: 1px solid #f3f4f6;
        padding: 48px;
        max-width: 800px;
        margin: 0 auto;
    }

    @media (max-width: 600px) {
        .eval-card { padding: 32px 24px; }
    }

    .form-group { margin-bottom: 24px; }
    
    .form-label {
        display: block; font-weight: 700; color: #374151; margin-bottom: 10px; font-size: 14px;
    }

    .form-input, .form-select, .form-textarea {
        width: 100%; 
        padding: 16px; 
        background: #f9fafb;
        border: 2px solid transparent; 
        border-radius: 16px;
        font-family: inherit; font-size: 15px; color: #111827; 
        transition: all 0.3s ease;
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23111827%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
        background-repeat: no-repeat;
        background-position: right 16px top 50%;
        background-size: 12px auto;
        cursor: pointer;
    }

    .form-input::placeholder, .form-textarea::placeholder, .form-select::placeholder {
        color: #9ca3af;
    }

    .form-input:focus, .form-textarea:focus, .form-select:focus {
        outline: none; 
        background: white;
        border-color: #34d399; 
        box-shadow: 0 4px 12px rgba(52, 211, 153, 0.1);
    }

    .btn-submit {
        display: inline-flex; 
        align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 18px; 
        background: #111827;
        color: white; border: none; border-radius: 16px; 
        font-size: 16px; font-weight: 800;
        cursor: pointer; transition: all 0.3s;
        margin-top: 16px;
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

    .alert-error {
        background: #fef2f2; 
        color: #991b1b; 
        padding: 16px; 
        border-radius: 16px; 
        margin-bottom: 24px; 
        border: 1px solid #fecaca; 
        display: flex; align-items: center; gap: 12px;
        font-weight: 700; font-size: 15px;
    }

    .closed-state {
        text-align: center; padding: 60px 20px;
    }

    .form-grid-3 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .form-grid-3 { grid-template-columns: 1fr; }
    }

</style>
@endpush

@section('content')

<!-- ── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-evaluasi">
    <div class="container" style="position:relative; z-index:2;">
        <div style="display:inline-block; background:#fef3c7; color:#d97706; font-weight:800; font-size:14px; padding:6px 16px; border-radius:20px; margin-bottom:20px;">KUIS & EVALUASI</div>
        <h1 class="hero-evaluasi-title">
            Uji <span>Pemahamanmu!</span>
        </h1>
        <p class="hero-evaluasi-desc">
            Bantu kami menjadi lebih baik! Isi form evaluasi singkat ini untuk mengukur efektivitas program edukasi dan memberikan masukan yang membangun.
        </p>
    </div>
</section>

<!-- ── EVALUASI FORM ────────────────────────────────────────────── -->
<section class="eval-wrapper">
    <div class="container">
        <div class="eval-card">
            
            @if(session('success'))
                <div class="alert-success">
                    <span style="font-size:20px;">🎉</span>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error">
                    <span style="font-size:20px;">⚠️</span>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @if(!$isOpen)
                <div class="closed-state">
                    <div style="font-size:60px; margin-bottom:20px;">🔒</div>
                    <h3 style="font-family:'Nunito'; font-size:28px; font-weight:900; color:#111827; margin-bottom:12px;">Form Evaluasi Ditutup</h3>
                    <p style="color:#6b7280; font-size:16px;">Mohon maaf, saat ini kami sedang tidak menerima masukan evaluasi. Silakan kembali lagi di lain waktu.</p>
                </div>
            @else
                <form action="{{ route('evaluasi.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-grid-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" placeholder="John Doe" required>
                            @error('name') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="age" class="form-label">Usia</label>
                            <input type="number" id="age" name="age" class="form-input" value="{{ old('age') }}" placeholder="Contoh: 17" required min="5" max="100">
                            @error('age') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="origin" class="form-label">Asal Instansi/Kelas <span style="font-weight:400;color:#9ca3af;">(Opsional)</span></label>
                            <input type="text" id="origin" name="origin" class="form-input" value="{{ old('origin') }}" placeholder="Contoh: Kelas 11 MIPA">
                            @error('origin') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="material_clarity" class="form-label">Apakah materi edukasi yang disampaikan mudah dipahami?</label>
                        <select id="material_clarity" name="material_clarity" class="form-select" required>
                            <option value="">-- Pilih Penilaian --</option>
                            <option value="Sangat Mudah" {{ old('material_clarity') == 'Sangat Mudah' ? 'selected' : '' }}>Sangat Mudah</option>
                            <option value="Mudah" {{ old('material_clarity') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                            <option value="Cukup" {{ old('material_clarity') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Sulit" {{ old('material_clarity') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                        </select>
                        @error('material_clarity') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="understanding_improvement" class="form-label">Apakah pemahamanmu mengenai pengelolaan sampah meningkat?</label>
                        <select id="understanding_improvement" name="understanding_improvement" class="form-select" required>
                            <option value="">-- Pilih Penilaian --</option>
                            <option value="Ya" {{ old('understanding_improvement') == 'Ya' ? 'selected' : '' }}>Ya, lebih paham</option>
                            <option value="Cukup" {{ old('understanding_improvement') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Belum" {{ old('understanding_improvement') == 'Belum' ? 'selected' : '' }}>Belum</option>
                        </select>
                        @error('understanding_improvement') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="intention_to_sort" class="form-label">Seberapa besar niatmu untuk mulai memilah sampah setelah ini?</label>
                        <select id="intention_to_sort" name="intention_to_sort" class="form-select" required>
                            <option value="">-- Pilih Niat Anda --</option>
                            <option value="Ya" {{ old('intention_to_sort') == 'Ya' ? 'selected' : '' }}>Sangat berniat, akan segera kulakukan!</option>
                            <option value="Mungkin" {{ old('intention_to_sort') == 'Mungkin' ? 'selected' : '' }}>Mungkin, aku butuh persiapan</option>
                            <option value="Belum" {{ old('intention_to_sort') == 'Belum' ? 'selected' : '' }}>Belum berniat</option>
                        </select>
                        @error('intention_to_sort') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="habit_frequency" class="form-label">Seberapa sering kamu membuang sampah pada tempatnya di sekolah/rumah?</label>
                        <select id="habit_frequency" name="habit_frequency" class="form-select" required>
                            <option value="">-- Pilih Frekuensi --</option>
                            <option value="Selalu" {{ old('habit_frequency') == 'Selalu' ? 'selected' : '' }}>Selalu</option>
                            <option value="Sering" {{ old('habit_frequency') == 'Sering' ? 'selected' : '' }}>Sering</option>
                            <option value="Kadang-kadang" {{ old('habit_frequency') == 'Kadang-kadang' ? 'selected' : '' }}>Kadang-kadang</option>
                            <option value="Jarang" {{ old('habit_frequency') == 'Jarang' ? 'selected' : '' }}>Jarang</option>
                            <option value="Tidak Pernah" {{ old('habit_frequency') == 'Tidak Pernah' ? 'selected' : '' }}>Tidak Pernah</option>
                        </select>
                        @error('habit_frequency') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="knowledge_organic" class="form-label">Apakah kamu sudah bisa membedakan sampah organik dan anorganik dengan benar?</label>
                        <select id="knowledge_organic" name="knowledge_organic" class="form-select" required>
                            <option value="">-- Pilih Jawaban --</option>
                            <option value="Ya sudah paham" {{ old('knowledge_organic') == 'Ya sudah paham' ? 'selected' : '' }}>Ya, sudah sangat paham</option>
                            <option value="Masih bingung" {{ old('knowledge_organic') == 'Masih bingung' ? 'selected' : '' }}>Masih sering tertukar/bingung</option>
                            <option value="Belum bisa" {{ old('knowledge_organic') == 'Belum bisa' ? 'selected' : '' }}>Sama sekali belum bisa</option>
                        </select>
                        @error('knowledge_organic') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="favorite_material" class="form-label">Jenis materi edukasi apa yang paling kamu sukai di website ini? <span style="font-weight:400;color:#9ca3af;">(Opsional)</span></label>
                        <select id="favorite_material" name="favorite_material" class="form-select">
                            <option value="">-- Pilih Materi Favorit --</option>
                            <option value="Video Edukasi" {{ old('favorite_material') == 'Video Edukasi' ? 'selected' : '' }}>Video Edukasi</option>
                            <option value="Artikel Teks" {{ old('favorite_material') == 'Artikel Teks' ? 'selected' : '' }}>Artikel Teks</option>
                            <option value="Gambar/Galeri" {{ old('favorite_material') == 'Gambar/Galeri' ? 'selected' : '' }}>Gambar / Galeri</option>
                            <option value="Tips Singkat" {{ old('favorite_material') == 'Tips Singkat' ? 'selected' : '' }}>Tips Singkat</option>
                        </select>
                        @error('favorite_material') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="facilities_rating" class="form-label">Apakah menurutmu fasilitas tempat sampah di sekitarmu sudah memadai?</label>
                        <select id="facilities_rating" name="facilities_rating" class="form-select" required>
                            <option value="">-- Penilaian Fasilitas --</option>
                            <option value="Sangat Memadai" {{ old('facilities_rating') == 'Sangat Memadai' ? 'selected' : '' }}>Sangat Memadai (Ada di mana-mana)</option>
                            <option value="Cukup" {{ old('facilities_rating') == 'Cukup' ? 'selected' : '' }}>Cukup (Ada tapi kadang jauh)</option>
                            <option value="Kurang Memadai" {{ old('facilities_rating') == 'Kurang Memadai' ? 'selected' : '' }}>Kurang Memadai (Sangat sulit dicari)</option>
                        </select>
                        @error('facilities_rating') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="advocacy_likelihood" class="form-label">Seberapa besar kemungkinan kamu mengajak temanmu untuk ikut peduli lingkungan?</label>
                        <select id="advocacy_likelihood" name="advocacy_likelihood" class="form-select" required>
                            <option value="">-- Pilih Jawaban --</option>
                            <option value="Sangat Mungkin" {{ old('advocacy_likelihood') == 'Sangat Mungkin' ? 'selected' : '' }}>Sangat Mungkin (Akan aku sebar luaskan!)</option>
                            <option value="Mungkin" {{ old('advocacy_likelihood') == 'Mungkin' ? 'selected' : '' }}>Mungkin (Tergantung situasi)</option>
                            <option value="Kurang Mungkin" {{ old('advocacy_likelihood') == 'Kurang Mungkin' ? 'selected' : '' }}>Kurang Mungkin</option>
                        </select>
                        @error('advocacy_likelihood') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="website_opinion" class="form-label">Apa pendapatmu tentang tampilan dan isi dari *website* ini?</label>
                        <textarea id="website_opinion" name="website_opinion" class="form-textarea" rows="4" placeholder="Kesan, tampilan, atau fitur favorit yang kamu temukan di website ini...">{{ old('website_opinion') }}</textarea>
                        @error('website_opinion') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="suggestion" class="form-label">Ada saran kegiatan atau materi seru untuk edukasi berikutnya?</label>
                        <textarea id="suggestion" name="suggestion" class="form-textarea" rows="4" placeholder="Tuliskan ide cemerlangmu di sini...">{{ old('suggestion') }}</textarea>
                        @error('suggestion') <div style="color:#ef4444; font-size:13px; margin-top:6px; font-weight:600;">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn-submit">Kirim Evaluasi Sekarang 🚀</button>
                </form>
            @endif
        </div>
    </div>
</section>

@endsection
