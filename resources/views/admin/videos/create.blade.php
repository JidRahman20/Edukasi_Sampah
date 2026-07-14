<x-app-layout>
@section('title', 'Tambah Video')
@section('page-title', 'Tambah Video Edukasi')
@section('breadcrumb', 'Beranda / Kelola Video / Tambah')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        max-width: 700px;
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
    .radio-group { display: flex; gap: 16px; margin-bottom: 12px; }
    .radio-label { display: flex; align-items: center; gap: 6px; font-size: 14px; cursor: pointer; }
</style>

<div class="card">
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 24px;">Tambah Video Baru</h2>

    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error('title')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label class="form-label">Sumber Video</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="video_type" value="youtube" onchange="toggleSource()" {{ old('video_type', 'youtube') == 'youtube' ? 'checked' : '' }}>
                    Link YouTube
                </label>
                <label class="radio-label">
                    <input type="radio" name="video_type" value="upload" onchange="toggleSource()" {{ old('video_type') == 'upload' ? 'checked' : '' }}>
                    Upload File (MP4)
                </label>
            </div>
            @error('video_type')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" id="youtube_input" style="display: {{ old('video_type', 'youtube') == 'youtube' ? 'block' : 'none' }};">
            <label for="youtube_url" class="form-label">Link YouTube</label>
            <input type="url" id="youtube_url" name="youtube_url" class="form-input" value="{{ old('youtube_url') }}" placeholder="https://www.youtube.com/watch?v=...">
            @error('youtube_url')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group" id="upload_input" style="display: {{ old('video_type') == 'upload' ? 'block' : 'none' }};">
            <label for="video_file" class="form-label">Upload Video (Maks. 200MB)</label>
            <input type="file" id="video_file" name="video_file" class="form-input" accept="video/mp4,video/quicktime,video/ogg">
            @error('video_file')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi Singkat (Opsional)</label>
            <textarea id="description" name="description" class="form-input" rows="4">{{ old('description') }}</textarea>
            @error('description')<div class="text-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label class="radio-label">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                Publikasikan video ini
            </label>
        </div>

        <div style="display:flex; gap:12px; margin-top:30px;">
            <button type="submit" class="btn btn-primary">Simpan Video</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
function toggleSource() {
    const isYoutube = document.querySelector('input[name="video_type"]:checked').value === 'youtube';
    document.getElementById('youtube_input').style.display = isYoutube ? 'block' : 'none';
    document.getElementById('upload_input').style.display = isYoutube ? 'none' : 'block';
    
    // Set required attribute dynamically
    if (isYoutube) {
        document.getElementById('youtube_url').setAttribute('required', 'required');
        document.getElementById('video_file').removeAttribute('required');
    } else {
        document.getElementById('video_file').setAttribute('required', 'required');
        document.getElementById('youtube_url').removeAttribute('required');
    }
}
// Run once on load
toggleSource();
</script>
</x-app-layout>
