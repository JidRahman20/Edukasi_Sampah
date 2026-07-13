<x-app-layout>
@section('title', 'Edit Materi')
@section('page-title', 'Edit Materi')
@section('breadcrumb', 'Beranda / Kelola Materi / Edit')

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        max-width: 900px;
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
@endpush

<div class="card">
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 24px;">Edit Materi Edukasi</h2>

    <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Judul Materi</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $material->title) }}" required>
            @error('title')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Gambar Header (Biarkan kosong jika tidak ingin mengubah)</label>
            @if($material->image_path)
                <div style="margin-bottom: 12px;">
                    <img src="{{ Storage::url($material->image_path) }}" alt="Gambar" style="max-height:100px; border-radius:6px; border:1px solid var(--border);">
                </div>
            @endif
            <input type="file" id="image" name="image" class="form-input" accept="image/*">
            @error('image')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Isi Materi</label>
            <textarea id="summernote" name="content" required>{{ old('content', $material->content) }}</textarea>
            @error('content')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" style="display:flex; align-items:center; gap:8px;">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $material->is_published) ? 'checked' : '' }} style="width:16px; height:16px;">
            <label for="is_published" style="font-size:14px; color:var(--text-primary); cursor:pointer;">Materi Dipublikasikan</label>
        </div>

        <div style="display:flex; gap:12px; margin-top:30px;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.materials.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<!-- jQuery & Summernote JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Tulis isi materi di sini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
</x-app-layout>
