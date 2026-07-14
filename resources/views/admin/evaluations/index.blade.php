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
    $pahamYa = $evaluations->where('understanding_improvement', 'Ya')->count();
    $niatYa = $evaluations->where('intention_to_sort', 'Ya')->count();
@endphp

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-value">{{ $total }}</div>
        <div class="stat-label">Total Responden</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $total > 0 ? round(($pahamYa/$total)*100) : 0 }}%</div>
        <div class="stat-label">Meningkat Pemahamannya</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $total > 0 ? round(($niatYa/$total)*100) : 0 }}%</div>
        <div class="stat-label">Berniat Pasti Memilah Sampah</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Hasil Evaluasi Pengunjung</h2>
        <a href="{{ route('admin.evaluations.export') }}" style="padding: 8px 16px; background: var(--green-600, #16a34a); color: white; border-radius: var(--radius); text-decoration: none; font-size: 14px; font-weight: 600;">Unduh Laporan (CSV)</a>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama & Asal</th>
                    <th>Kejelasan Materi</th>
                    <th>Peningkatan Pemahaman</th>
                    <th>Niat Memilah</th>
                    <th width="25%">Pendapat & Saran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($evaluations as $eval)
                <tr>
                    <td style="white-space: nowrap;">{{ $eval->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <strong style="color: var(--text-primary);">{{ $eval->name }}</strong><br>
                        <span style="font-size:12px; color:var(--text-secondary);">Usia: {{ $eval->age }} | Asal: {{ $eval->origin ?? '-' }}</span>
                    </td>
                    <td>
                        <span class="badge {{ $eval->material_clarity == 'Sangat Mudah' || $eval->material_clarity == 'Mudah' ? 'badge-paham' : 'badge-kurang' }}">
                            {{ $eval->material_clarity }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $eval->understanding_improvement == 'Ya' ? 'badge-paham' : 'badge-cukup' }}">
                            {{ $eval->understanding_improvement }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $eval->intention_to_sort == 'Ya' ? 'badge-ya' : ($eval->intention_to_sort == 'Mungkin' ? 'badge-mungkin' : 'badge-tidak') }}">
                            {{ $eval->intention_to_sort }}
                        </span>
                    </td>
                    <td style="font-size: 13px;">
                        <strong>Pendapat:</strong> {{ $eval->website_opinion ?? '-' }}<br>
                        <strong style="margin-top:4px;display:block;">Saran:</strong> {{ $eval->suggestion ?? '-' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:40px; color:var(--text-muted);">
                        Belum ada pengunjung yang mengisi form evaluasi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
