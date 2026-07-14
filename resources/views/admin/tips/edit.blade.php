<x-app-layout>
@section('title', 'Edit Tips Harian')
@section('page-title', 'Edit Tips Harian')
@section('breadcrumb', 'Beranda / Kelola Tips / Edit')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        max-width: 900px;
    }
    .form-group { margin-bottom: 20px; }
    .form-label {
        display: block; font-size: 14px; font-weight: 500;
        color: var(--text-primary); margin-bottom: 8px;
    }
    .form-input {
        width: 100%; padding: 10px 12px;
        border: 1px solid var(--border-bright); border-radius: var(--radius-sm);
        background: var(--bg-surface); color: var(--text-primary);
        font-size: 14px; font-family: inherit; transition: border-color var(--transition);
    }
    .form-input:focus { outline: none; border-color: var(--accent); }
    .btn {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 10px 20px; font-size: 14px; font-weight: 500;
        border-radius: var(--radius-sm); cursor: pointer; border: none; text-decoration: none;
    }
    .btn-primary { background: var(--accent); color: white; }
    .btn-secondary { background: #f3f4f6; color: #4b5563; border: 1px solid #d1d5db; }
    .text-error { color: var(--danger); font-size: 13px; margin-top: 5px; }
    .radio-label { display: flex; align-items: center; gap: 6px; font-size: 14px; cursor: pointer; }
    
    .current-image-preview {
        margin-top: 10px;
        border: 1px solid var(--border);
        border-radius: 8px;
        max-width: 200px;
        display: block;
    }
</style>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<div class="card">
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 24px;">Edit Tips Harian</h2>

    <form action="{{ route('admin.tips.update', $tip->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Judul Tips</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $tip->title) }}" required>
            @error('title')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Gambar Ilustrasi Baru (Maks. 5MB, Opsional jika tidak ingin mengganti)</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/jpeg,image/png,image/jpg,image/gif">
            @error('image')<div class="text-error">{{ $message }}</div>@enderror
            
            @if($tip->image_path)
                <div style="margin-top: 10px;">
                    <label class="form-label" style="font-size: 12px; color: var(--text-secondary);">Gambar Saat Ini:</label>
                    <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="current-image-preview">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Isi Konten Tips</label>
            <textarea id="summernote" name="content" required>{{ old('content', $tip->content) }}</textarea>
            @error('content')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label class="radio-label">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $tip->is_published) ? 'checked' : '' }}>
                Publikasikan tips ini
            </label>
        </div>

        <div style="display:flex; gap:12px; margin-top:30px;">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.tips.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<!-- jQuery and Summernote JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Tulis isi konten tips harian di sini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
</x-app-layout>
