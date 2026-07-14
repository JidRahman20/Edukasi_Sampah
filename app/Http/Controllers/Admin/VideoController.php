<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_type' => 'required|in:upload,youtube',
            'youtube_url' => 'required_if:video_type,youtube|nullable|url',
            'video_file' => 'required_if:video_type,upload|nullable|mimes:mp4,mov,ogg,qt|max:204800', // max 200MB
            'description' => 'nullable|string',
            'is_published' => 'nullable|boolean'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->video_type == 'youtube') {
            $data['video_url'] = $this->convertToEmbedUrl($request->youtube_url);
        } else {
            $data['video_url'] = $request->file('video_file')->store('videos', 'public');
        }

        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_type' => 'required|in:upload,youtube,keep',
            'youtube_url' => 'required_if:video_type,youtube|nullable|url',
            'video_file' => 'required_if:video_type,upload|nullable|mimes:mp4,mov,ogg,qt|max:204800',
            'description' => 'nullable|string',
            'is_published' => 'nullable|boolean'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->video_type == 'youtube') {
            // hapus video lama jika itu file lokal
            if (!str_starts_with($video->video_url, 'http')) {
                Storage::disk('public')->delete($video->video_url);
            }
            $data['video_url'] = $this->convertToEmbedUrl($request->youtube_url);
        } elseif ($request->video_type == 'upload') {
            // hapus video lama jika itu file lokal
            if (!str_starts_with($video->video_url, 'http')) {
                Storage::disk('public')->delete($video->video_url);
            }
            $data['video_url'] = $request->file('video_file')->store('videos', 'public');
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if (!str_starts_with($video->video_url, 'http')) {
            Storage::disk('public')->delete($video->video_url);
        }
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus.');
    }

    private function convertToEmbedUrl($url)
    {
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
            return 'https://www.youtube.com/embed/' . $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
            return $url;
        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
            return 'https://www.youtube.com/embed/' . $id[1];
        }
        return $url;
    }
}
