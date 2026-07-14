<x-app-layout>
@section('title', 'Pesan Kontak')
@section('page-title', 'Pesan Kontak Masuk')
@section('breadcrumb', 'Beranda / Pesan Kontak')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        margin-bottom: 24px;
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

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }
    th {
        font-weight: 600;
        color: var(--text-primary);
        background: var(--bg-surface);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    td {
        color: var(--text-secondary);
        font-size: 14px;
        vertical-align: top;
    }
    
    .btn-danger {
        background: #fee2e2;
        color: #ef4444;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-danger:hover {
        background: #fca5a5;
    }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Pesan Masuk dari Pengunjung</h2>
    </div>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:16px; border-radius:8px; margin-bottom:24px; border:1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th width="15%">Waktu</th>
                    <th width="20%">Nama / Email</th>
                    <th width="20%">Subjek</th>
                    <th width="40%">Isi Pesan</th>
                    <th width="5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    <td style="white-space: nowrap;">{{ $contact->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <strong style="color: var(--text-primary);">{{ $contact->name }}</strong><br>
                        <a href="mailto:{{ $contact->email }}" style="font-size:12px; color:var(--accent); text-decoration:none;">{{ $contact->email }}</a>
                    </td>
                    <td style="font-weight: 600; color: var(--text-primary);">{{ $contact->subject }}</td>
                    <td style="font-size: 13px; line-height: 1.5;">{{ $contact->message }}</td>
                    <td>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:40px; color:var(--text-muted);">
                        Belum ada pesan masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
