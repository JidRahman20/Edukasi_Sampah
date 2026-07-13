<x-app-layout>
@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')
@section('breadcrumb', 'Beranda / Kelola Galeri / Tambah')

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
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 24px;">Upload Foto Baru</h2>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Judul Foto</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" placeholder="Contoh: Kegiatan Bersih Pantai 2026" required>
            @error('title')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Pilih Foto (Maks. 5MB)</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/jpeg,image/png,image/jpg,image/gif" required>
            @error('image')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div style="display:flex; gap:12px; margin-top:30px;">
            <button type="submit" class="btn btn-primary">Upload Foto</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
</x-app-layout>
