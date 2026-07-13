@extends('layouts.public')
@section('title', 'Pengertian Sampah')

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom:10px;">
            <a href="{{ route('beranda') }}">Beranda</a> <span>›</span>
            <a href="{{ route('materi.index') }}">Materi</a> <span>›</span>
            <span>Pengertian Sampah</span>
        </div>
        <div class="badge badge-amber" style="margin-bottom:12px;">📖 Materi 1</div>
        <div class="page-hero-title">Pengertian Sampah</div>
        <p style="color:var(--text-muted);font-size:15px;max-width:600px;">Memahami definisi, sumber, and dampak sampah terhadap lingkungan dan kesehatan manusia.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:2fr 1fr;gap:48px;align-items:start;">

            <!-- Konten Utama -->
            <div>
                <div style="background:var(--green-50);border-left:4px solid var(--green-500);border-radius:0 var(--radius) var(--radius) 0;padding:20px 24px;margin-bottom:32px;">
                    <h3 style="font-family:'Nunito';font-size:16px;font-weight:800;color:var(--green-800);margin-bottom:6px;">📌 Definisi Sampah</h3>
                    <p style="font-size:14px;color:var(--text-body);line-height:1.8;">
                        <strong>Sampah</strong> adalah sisa kegiatan manusia dan/atau proses alam yang berbentuk padat, yang tidak diinginkan atau tidak digunakan lagi dan dibuang ke lingkungan. Sampah merupakan konsekuensi dari berbagai aktivitas manusia dalam kehidupan sehari-hari.
                    </p>
                </div>

                <h2 style="font-family:'Nunito';font-size:22px;font-weight:900;color:var(--text-dark);margin-bottom:16px;">Definisi Menurut Para Ahli</h2>

                @foreach([
                    ['WHO (World Health Organization)', 'Sampah adalah sesuatu yang tidak digunakan, tidak dipakai, tidak disenangi, atau sesuatu yang dibuang berasal dari kegiatan manusia dan tidak terjadi dengan sendirinya.'],
                    ['UU No. 18 Tahun 2008', 'Sampah adalah sisa kegiatan sehari-hari manusia dan/atau proses alam yang berbentuk padat.'],
                    ['Azwar (1990)', 'Sampah adalah sebagian dari benda-benda atau hal-hal yang dipandang tidak digunakan, tidak diinginkan dan harus dibuang.'],
                ] as $def)
                <div style="background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius);padding:20px;margin-bottom:14px;box-shadow:var(--shadow-sm);">
                    <div style="font-size:12px;font-weight:700;text-transform:uppercase;color:var(--green-600);margin-bottom:6px;letter-spacing:0.5px;">{{ $def[0] }}</div>
                    <p style="font-size:14px;color:var(--text-body);line-height:1.8;font-style:italic;">"{{ $def[1] }}"</p>
                </div>
                @endforeach

                <h2 style="font-family:'Nunito';font-size:22px;font-weight:900;color:var(--text-dark);margin:32px 0 16px;">Sumber-Sumber Sampah</h2>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:32px;">
                    @foreach([
                        ['🏠', 'Rumah Tangga', 'Sisa makanan, kertas, plastik, kain bekas', '#dcfce7'],
                        ['🏭', 'Industri', 'Limbah produksi, bahan kimia, logam', '#dbeafe'],
                        ['🏪', 'Perdagangan', 'Kemasan produk, kardus, plastik belanja', '#fef3c7'],
                        ['🏫', 'Sekolah/Kantor', 'Kertas, ATK bekas, sisa makanan', '#fce7f3'],
                        ['🚗', 'Transportasi', 'Oli bekas, ban rusak, onderdil', '#ede9fe'],
                        ['🌳', 'Alam', 'Daun gugur, ranting pohon', '#d1fae5'],
                    ] as $s)
                    <div style="background:{{ $s[3] }};border-radius:var(--radius);padding:16px;display:flex;gap:12px;align-items:flex-start;">
                        <div style="font-size:24px;">{{ $s[0] }}</div>
                        <div>
                            <div style="font-weight:700;font-size:14px;color:var(--text-dark);">{{ $s[1] }}</div>
                            <div style="font-size:12.5px;color:var(--text-muted);margin-top:2px;">{{ $s[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h2 style="font-family:'Nunito';font-size:22px;font-weight:900;color:var(--text-dark);margin-bottom:16px;">Dampak Negatif Sampah</h2>
                <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:32px;">
                    @foreach([
                        ['🦟', 'Masalah Kesehatan', 'Sampah menjadi tempat berkembang biak kuman, bakteri, virus, dan nyamuk yang menyebabkan berbagai penyakit seperti diare, tifus, dan demam berdarah.', 'var(--danger)'],
                        ['🌊', 'Pencemaran Lingkungan', 'Sampah yang tidak dikelola mencemari tanah, air sungai, laut, dan udara sehingga merusak ekosistem dan biodiversitas.', '#1d4ed8'],
                        ['🌡️', 'Perubahan Iklim', 'Sampah organik yang membusuk menghasilkan gas metana (CH₄) yang merupakan gas rumah kaca dan berkontribusi pada pemanasan global.', '#d97706'],
                        ['😞', 'Menurunkan Kualitas Hidup', 'Lingkungan yang kotor akibat sampah mengurangi kenyamanan, keindahan, dan nilai estetika suatu wilayah.', '#7c3aed'],
                    ] as $d)
                    <div style="display:flex;gap:16px;background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius);padding:18px;">
                        <div style="font-size:28px;flex-shrink:0;">{{ $d[0] }}</div>
                        <div>
                            <div style="font-weight:700;font-size:14px;color:{{ $d[3] }};margin-bottom:4px;">{{ $d[1] }}</div>
                            <p style="font-size:13.5px;color:var(--text-muted);line-height:1.7;">{{ $d[2] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div style="position:sticky;top:90px;">
                <div style="background:var(--green-50);border:1px solid var(--green-200);border-radius:var(--radius-lg);padding:24px;margin-bottom:20px;">
                    <h4 style="font-family:'Nunito';font-size:15px;font-weight:800;color:var(--text-dark);margin-bottom:14px;">📚 Materi Lainnya</h4>
                    <div style="display:flex;flex-direction:column;gap:8px;">
                        <a href="{{ route('materi.jenis') }}" style="padding:10px 14px;background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius-sm);font-size:13px;font-weight:600;color:var(--text-body);text-decoration:none;transition:all var(--transition);" onmouseover="this.style.borderColor='var(--green-400)';this.style.color='var(--green-700)'" onmouseout="this.style.borderColor='var(--green-100)';this.style.color='var(--text-body)'">🗂️ Jenis Sampah</a>
                        <a href="{{ route('materi.pemilahan') }}" style="padding:10px 14px;background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius-sm);font-size:13px;font-weight:600;color:var(--text-body);text-decoration:none;transition:all var(--transition);" onmouseover="this.style.borderColor='var(--green-400)';this.style.color='var(--green-700)'" onmouseout="this.style.borderColor='var(--green-100)';this.style.color='var(--text-body)'">♻️ Cara Pemilahan</a>
                        <a href="{{ route('materi.tiga-r') }}" style="padding:10px 14px;background:var(--white);border:1px solid var(--green-100);border-radius:var(--radius-sm);font-size:13px;font-weight:600;color:var(--text-body);text-decoration:none;transition:all var(--transition);" onmouseover="this.style.borderColor='var(--green-400)';this.style.color='var(--green-700)'" onmouseout="this.style.borderColor='var(--green-100)';this.style.color='var(--text-body)'">🔄 Prinsip 3R</a>
                    </div>
                </div>
                <div style="background:var(--green-600);border-radius:var(--radius-lg);padding:24px;text-align:center;">
                    <div style="font-size:36px;margin-bottom:12px;">✏️</div>
                    <h4 style="font-family:'Nunito';font-size:16px;font-weight:900;color:#fff;margin-bottom:8px;">Uji Pemahaman Anda!</h4>
                    <p style="font-size:12.5px;color:rgba(255,255,255,0.8);margin-bottom:16px;">Ikuti evaluasi interaktif setelah mempelajari semua materi.</p>
                    <a href="{{ route('evaluasi') }}" class="btn btn-white" style="width:100%;justify-content:center;">Mulai Evaluasi</a>
                </div>
            </div>
        </div>

        <!-- Next Materi -->
        <div style="border-top:1px solid var(--green-100);margin-top:48px;padding-top:32px;display:flex;justify-content:flex-end;">
            <a href="{{ route('materi.jenis') }}" class="btn btn-primary">Materi Berikutnya: Jenis Sampah →</a>
        </div>
    </div>
</section>

@endsection
