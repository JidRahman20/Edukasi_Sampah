<x-app-layout>
@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')
@section('breadcrumb', 'Beranda / Kelola Galeri / Edit')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        max-width: 600px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 8px;
    }
    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--border-bright);
        border-radius: var(--radius-sm);
        background: var(--bg-surface);
        color: var(--text-primary);
        font-size: 14px;
        font-family: inherit;
        transition: border-color var(--transition);
    }
    .form-input:focus {
        outline: none;
        border-color: var(--accent);
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: background var(--transition);
        border: none;
        text-decoration: none;
        font-family: inherit;
    }
    .btn-primary {
        background: var(--accent);
        color: white;
    }
    .btn-secondary {
        background: #f3f4f6;
        color: #4b5563;
        border: 1px solid #d1d5db;
    }
    .text-error {
        color: var(--danger);
        font-size: 13px;
        margin-top: 5px;
    }
</style>

<div class="card">
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 24px;">Edit Foto Galeri</h2>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Judul Foto</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $gallery->title) }}" required>
            @error('title')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label class="form-label">Foto Saat Ini</label>
            <div style="margin-bottom: 12px;">
                <img src="{{ Storage::url($gallery->image_path) }}" alt="Current Image" style="max-height:200px; border-radius:6px; border:1px solid var(--border);">
            </div>
            
            <label for="image" class="form-label">Ganti Foto (Opsional, Maks. 5MB)</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/jpeg,image/png,image/jpg,image/gif">
            @error('image')<div class="text-error">{{ $message }}</div>@enderror
            <p style="font-size: 12px; color: var(--text-muted); margin-top: 6px;">Biarkan kosong jika tidak ingin mengubah foto.</p>
        </div>

        <div style="display:flex; gap:12px; margin-top:30px;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
</x-app-layout>
