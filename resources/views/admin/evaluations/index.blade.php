<x-app-layout>
@section('title', 'Monitoring Hasil Evaluasi')
@section('page-title', 'Monitoring Hasil Evaluasi')
@section('breadcrumb', 'Beranda / Monitoring Evaluasi')

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
    
    /* Stats Row */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }
    .stat-card {
        background: var(--bg-surface);
        padding: 20px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        text-align: center;
    }
    .stat-value {
        font-size: 32px;
        font-weight: 800;
        color: var(--accent);
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 14px;
        color: var(--text-secondary);
        font-weight: 500;
    }

    /* Table */
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
    
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    .badge-paham { background: #dcfce7; color: #166534; }
    .badge-cukup { background: #fef08a; color: #854d0e; }
    .badge-kurang { background: #fee2e2; color: #991b1b; }
    
    .badge-ya { background: #dcfce7; color: #166534; }
    .badge-mungkin { background: #e0e7ff; color: #3730a3; }
    .badge-tidak { background: #f3f4f6; color: #4b5563; }
</style>

@php
    $total = $evaluations->count();
    $sangatPaham = $evaluations->where('understanding_level', 'Sangat Paham')->count();
    $niatYa = $evaluations->where('intention_level', 'Ya')->count();
@endphp

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-value">{{ $total }}</div>
        <div class="stat-label">Total Responden</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $total > 0 ? round(($sangatPaham/$total)*100) : 0 }}%</div>
        <div class="stat-label">Sangat Paham Materi</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $total > 0 ? round(($niatYa/$total)*100) : 0 }}%</div>
        <div class="stat-label">Berniat Memilah Sampah</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Hasil Evaluasi Pengunjung</h2>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Waktu Pengisian</th>
                    <th>Nama Pengunjung</th>
                    <th>Tingkat Pemahaman</th>
                    <th>Niat Memilah Sampah</th>
                    <th width="30%">Kritik / Saran / Kesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($evaluations as $eval)
                <tr>
                    <td style="white-space: nowrap;">{{ $eval->created_at->format('d M Y, H:i') }}</td>
                    <td style="font-weight: 600; color: var(--text-primary);">{{ $eval->name }}</td>
                    <td>
                        @if($eval->understanding_level == 'Sangat Paham')
                            <span class="badge badge-paham">Sangat Paham</span>
                        @elseif($eval->understanding_level == 'Cukup Paham')
                            <span class="badge badge-cukup">Cukup Paham</span>
                        @else
                            <span class="badge badge-kurang">Kurang Paham</span>
                        @endif
                    </td>
                    <td>
                        @if($eval->intention_level == 'Ya')
                            <span class="badge badge-ya">Ya, Pasti</span>
                        @elseif($eval->intention_level == 'Mungkin')
                            <span class="badge badge-mungkin">Mungkin</span>
                        @else
                            <span class="badge badge-tidak">Tidak</span>
                        @endif
                    </td>
                    <td style="font-style: italic; color: #6b7280; font-size: 13px;">
                        "{{ $eval->feedback ?? 'Tidak ada komentar' }}"
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:40px; color:var(--text-muted);">
                        Belum ada pengunjung yang mengisi form evaluasi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
