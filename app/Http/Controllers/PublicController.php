<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function beranda()
    {
        return view('public.beranda');
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function materiIndex()
    {
        return view('public.materi.index');
    }

    public function pengertian()
    {
        return view('public.materi.pengertian');
    }

    public function jenis()
    {
        return view('public.materi.jenis');
    }

    public function pemilahan()
    {
        return view('public.materi.pemilahan');
    }

    public function tigaR()
    {
        return view('public.materi.tiga-r');
    }

    public function galeri()
    {
        return view('public.galeri');
    }

    public function video()
    {
        return view('public.video');
    }

    public function tips()
    {
        return view('public.tips');
    }

    public function evaluasi()
    {
        return view('public.evaluasi');
    }

    public function evaluasiSubmit(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|max:100',
            'jawaban'  => 'required|array',
        ]);

        // Hitung skor evaluasi
        $kunciJawaban = [
            'q1' => 'c', // organik = mudah terurai
            'q2' => 'b', // B3 = bahan berbahaya
            'q3' => 'a', // reduce = mengurangi
            'q4' => 'c', // sampah anorganik = tidak mudah terurai
            'q5' => 'b', // reuse = menggunakan kembali
        ];

        $skor = 0;
        foreach ($kunciJawaban as $soal => $jawaban) {
            if (isset($request->jawaban[$soal]) && $request->jawaban[$soal] === $jawaban) {
                $skor++;
            }
        }

        $nilai = ($skor / count($kunciJawaban)) * 100;

        return redirect()->route('evaluasi')
            ->with('hasil_evaluasi', [
                'nama'  => $request->nama,
                'skor'  => $skor,
                'total' => count($kunciJawaban),
                'nilai' => $nilai,
            ]);
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function kontakSubmit(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subjek'  => 'required|string|max:200',
            'pesan'   => 'required|string|max:2000',
        ]);

        return redirect()->route('kontak')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
