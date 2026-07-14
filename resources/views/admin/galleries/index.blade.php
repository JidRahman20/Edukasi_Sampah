<x-app-layout>
@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')
@section('breadcrumb', 'Beranda / Kelola Galeri')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
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
    .btn-primary:hover {
        background: var(--accent2);
    }
    .btn-danger {
        background: var(--danger);
        color: white;
    }
    .btn-warning {
        background: #f59e0b;
        color: white;
    }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    .gallery-item {
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        overflow: hidden;
        transition: transform var(--transition);
    }
    .gallery-item:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-sm);
    }
    .gallery-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-bottom: 1px solid var(--border);
    }
    .gallery-content {
        padding: 16px;
    }
    .gallery-title {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .gallery-actions {
        display: flex;
        gap: 8px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Foto Galeri</h2>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">+ Tambah Foto</a>
    </div>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($galleries->count() > 0)
        <div class="gallery-grid">
            @foreach($galleries as $gallery)
            <div class="gallery-item">
                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="gallery-img">
                <div class="gallery-content">
                    <div class="gallery-title" title="{{ $gallery->title }}">{{ $gallery->title }}</div>
                    <div class="gallery-actions">
                        <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning" style="padding:6px 12px; font-size:12px; flex:1;">✏️ Edit</a>
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');" style="margin:0; flex:1; display:flex;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:12px; width:100%;">🗑️ Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div style="text-align:center; padding:40px; border: 2px dashed var(--border); border-radius: var(--radius-sm); color:var(--text-muted);">
            <div style="font-size:32px; margin-bottom:12px;">🖼️</div>
            <div style="font-size:16px; font-weight:600; color:var(--text-primary); margin-bottom:8px;">Belum ada foto galeri</div>
            <p style="margin-bottom:16px;">Tambahkan foto pertama Anda untuk ditampilkan ke pengunjung.</p>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Tambah Foto Sekarang</a>
        </div>
    @endif
</div>
</x-app-layout>
