<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tips = Tip::latest()->get();
        return view('admin.tips.index', compact('tips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('tips', 'public');
        }

        Tip::create($data);

        return redirect()->route('admin.tips.index')->with('success', 'Tips harian berhasil ditambahkan.');
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
    public function edit(Tip $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tip $tip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('image')) {
            if ($tip->image_path) {
                Storage::disk('public')->delete($tip->image_path);
            }
            $data['image_path'] = $request->file('image')->store('tips', 'public');
        }

        $tip->update($data);

        return redirect()->route('admin.tips.index')->with('success', 'Tips harian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tip $tip)
    {
        if ($tip->image_path) {
            Storage::disk('public')->delete($tip->image_path);
        }
        $tip->delete();

        return redirect()->route('admin.tips.index')->with('success', 'Tips harian berhasil dihapus.');
    }
}
