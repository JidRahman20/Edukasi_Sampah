<x-app-layout>
@section('title', 'Kelola Materi')
@section('page-title', 'Kelola Materi')
@section('breadcrumb', 'Beranda / Kelola Materi')

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
    .table-responsive {
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    th, td {
        padding: 12px 16px;
        border-bottom: 1px solid var(--border);
    }
    th {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        background: var(--bg-base);
    }
    td {
        font-size: 14px;
        color: var(--text-primary);
    }
    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-success { background: #dcfce7; color: #166534; }
    .badge-secondary { background: #f3f4f6; color: #4b5563; }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Materi Edukasi</h2>
        <a href="{{ route('admin.materials.create') }}" class="btn btn-primary">+ Tambah Materi</a>
    </div>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Materi</th>
                    <th>Slug URL</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materials as $index => $materi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $materi->title }}</strong></td>
                    <td style="color:var(--text-muted);">{{ $materi->slug }}</td>
                    <td>
                        @if($materi->is_published)
                            <span class="badge badge-success">Dipublikasi</span>
                        @else
                            <span class="badge badge-secondary">Draft</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.materials.edit', $materi->id) }}" class="btn btn-warning" style="padding:6px 12px; font-size:12px;">✏️ Edit</a>
                            <form action="{{ route('admin.materials.destroy', $materi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:12px;">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:30px; color:var(--text-muted);">Belum ada materi edukasi yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
