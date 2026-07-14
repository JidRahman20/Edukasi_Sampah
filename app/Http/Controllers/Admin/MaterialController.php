<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::latest()->get();
        return view('admin.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content']);
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('materials', 'public');
        }

        Material::create($data);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil ditambahkan.');
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
    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'content']);
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($material->image_path) {
                Storage::disk('public')->delete($material->image_path);
            }
            $data['image_path'] = $request->file('image')->store('materials', 'public');
        }

        $material->update($data);

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        if ($material->image_path) {
            Storage::disk('public')->delete($material->image_path);
        }
        $material->delete();

        return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dihapus.');
    }
}
