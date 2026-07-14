<x-app-layout>
@section('title', 'Kelola Tips Harian')
@section('page-title', 'Kelola Tips Harian')
@section('breadcrumb', 'Beranda / Kelola Tips')

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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }
    th {
        font-weight: 600;
        color: var(--text-primary);
        background: var(--bg-surface);
        font-size: 14px;
    }
    td {
        color: var(--text-secondary);
        font-size: 14px;
    }
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-success { background: #dcfce7; color: #166534; }
    .badge-secondary { background: #f3f4f6; color: #4b5563; }
    .img-preview { width: 60px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border); }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Tips Harian</h2>
        <a href="{{ route('admin.tips.create') }}" class="btn btn-primary">+ Tambah Tips</a>
    </div>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th width="80">Gambar</th>
                    <th>Judul Tips</th>
                    <th>Status</th>
                    <th>Tgl Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tips as $tip)
                <tr>
                    <td>
                        @if($tip->image_path)
                            <img src="{{ Storage::url($tip->image_path) }}" alt="{{ $tip->title }}" class="img-preview">
                        @else
                            <div style="width:60px; height:60px; background:#f3f4f6; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#9ca3af; font-size:12px; border:1px dashed #d1d5db;">Kosong</div>
                        @endif
                    </td>
                    <td style="font-weight: 500; color: var(--text-primary);">{{ $tip->title }}</td>
                    <td>
                        @if($tip->is_published)
                            <span class="badge badge-success">Dipublikasikan</span>
                        @else
                            <span class="badge badge-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $tip->created_at->format('d M Y') }}</td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.tips.edit', $tip->id) }}" class="btn btn-warning" style="padding:6px 12px; font-size:12px;">Edit</a>
                            <form action="{{ route('admin.tips.destroy', $tip->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tips ini?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:12px;">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:32px; color:var(--text-muted);">
                        Belum ada data tips.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
