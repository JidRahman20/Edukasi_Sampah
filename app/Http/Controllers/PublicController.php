<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        // Bagikan data materi ke semua tampilan (untuk Navbar dan Footer)
        $materials = \App\Models\Material::where('is_published', true)->get();
        \Illuminate\Support\Facades\View::share('globalMaterials', $materials);
    }

    public function beranda()
    {
        $materials = \App\Models\Material::where('is_published', true)->take(4)->get();
        return view('public.beranda', compact('materials'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function materiIndex()
    {
        $materials = \App\Models\Material::where('is_published', true)->get();
        return view('public.materi.index', compact('materials'));
    }

    public function materiShow($slug)
    {
        $materi = \App\Models\Material::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('public.materi.show', compact('materi'));
    }

    public function galeri()
    {
        $galleries = \App\Models\Gallery::latest()->get();
        return view('public.galeri', compact('galleries'));
    }

    public function video()
    {
        $videos = \App\Models\Video::where('is_published', true)->latest()->get();
        return view('public.video', compact('videos'));
    }

    public function tips()
    {
        $tips = \App\Models\Tip::where('is_published', true)->latest()->get();
        return view('public.tips', compact('tips'));
    }

    public function evaluasi()
    {
        $isOpen = \Illuminate\Support\Facades\Cache::get('evaluation_form_enabled', true);
        return view('public.evaluasi', compact('isOpen'));
    }

    public function evaluasiSubmit(Request $request)
    {
        $isOpen = \Illuminate\Support\Facades\Cache::get('evaluation_form_enabled', true);
        if (!$isOpen) {
            return back()->with('error', 'Mohon maaf, form evaluasi sedang ditutup.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'understanding_level' => 'required|in:Kurang Paham,Cukup Paham,Sangat Paham',
            'intention_level' => 'required|in:Tidak,Mungkin,Ya',
            'feedback' => 'nullable|string',
        ]);

        \App\Models\Evaluation::create([
            'name' => $request->name,
            'understanding_level' => $request->understanding_level,
            'intention_level' => $request->intention_level,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Terima kasih atas partisipasi Anda dalam evaluasi ini.');
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
