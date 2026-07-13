<x-app-layout>
@section('title', 'Dashboard Statistik')
@section('page-title', 'Dashboard Statistik')

<style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: transform var(--transition), border-color var(--transition);
    }
    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--border-bright);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }
    .stat-icon.blue {
        background: rgba(6,182,212,0.15);
        color: var(--accent2);
        box-shadow: 0 0 15px var(--accent2-glow);
    }
    .stat-icon.green {
        background: rgba(16,185,129,0.15);
        color: var(--success);
        box-shadow: 0 0 15px rgba(16,185,129,0.25);
    }

    .stat-info p {
        color: var(--text-muted);
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }
    .stat-info h3 {
        color: var(--text-primary);
        font-size: 32px;
        font-weight: 700;
        margin: 0;
    }

    .chart-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
    }
    .chart-card h3 {
        color: var(--text-primary);
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border);
    }
    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }

    .feedback-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        margin-bottom: 24px;
    }
    .feedback-card h3 {
        color: var(--text-primary);
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border);
    }
    
    .feedback-item {
        background: rgba(255,255,255,0.02);
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 16px;
        margin-bottom: 12px;
        transition: background var(--transition);
    }
    .feedback-item:hover {
        background: rgba(255,255,255,0.05);
    }
    .feedback-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    .feedback-name {
        color: var(--accent-light);
        font-weight: 600;
        font-size: 14px;
    }
    .feedback-time {
        color: var(--text-muted);
        font-size: 12px;
    }
    .feedback-text {
        color: var(--text-secondary);
        font-size: 14px;
        line-height: 1.5;
    }
    .empty-state {
        color: var(--text-muted);
        font-style: italic;
        font-size: 14px;
    }
</style>

<div class="dashboard-grid">
    <!-- Pengunjung -->
    <div class="stat-card">
        <div class="stat-icon blue">👁️</div>
        <div class="stat-info">
            <p>Total Pengunjung</p>
            <h3>{{ $totalVisitors }}</h3>
        </div>
    </div>

    <!-- Responden -->
    <div class="stat-card">
        <div class="stat-icon green">📝</div>
        <div class="stat-info">
            <p>Total Peserta Evaluasi</p>
            <h3>{{ $totalEvaluations }}</h3>
        </div>
    </div>
</div>

<div class="dashboard-grid">
    <!-- Understanding Chart -->
    <div class="chart-card">
        <h3>Grafik Tingkat Pemahaman</h3>
        <div class="chart-container">
            <canvas id="understandingChart"></canvas>
        </div>
    </div>

    <!-- Intention Chart -->
    <div class="chart-card">
        <h3>Niat Memilah Sampah</h3>
        <div class="chart-container">
            <canvas id="intentionChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Feedbacks -->
<div class="feedback-card">
    <h3>Rekap Saran & Masukan Terbaru</h3>
    
    @if($recentFeedbacks->isEmpty())
        <p class="empty-state">Belum ada saran dan masukan yang masuk.</p>
    @else
        @foreach($recentFeedbacks as $feedback)
            <div class="feedback-item">
                <div class="feedback-header">
                    <span class="feedback-name">{{ $feedback->name }}</span>
                    <span class="feedback-time">{{ $feedback->created_at->diffForHumans() }}</span>
                </div>
                <div class="feedback-text">{{ $feedback->feedback }}</div>
            </div>
        @endforeach
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tema terang untuk Chart.js
        Chart.defaults.color = '#4b5563';
        Chart.defaults.borderColor = '#e5e7eb';

        // Understanding Chart (Pie)
        const understandingData = @json($understandingStats);
        const ctxUnderstanding = document.getElementById('understandingChart').getContext('2d');
        new Chart(ctxUnderstanding, {
            type: 'doughnut',
            data: {
                labels: Object.keys(understandingData).length > 0 ? Object.keys(understandingData) : ['Belum ada data'],
                datasets: [{
                    data: Object.keys(understandingData).length > 0 ? Object.values(understandingData) : [1],
                    backgroundColor: [
                        '#10b981', // Sangat Paham / Paham
                        '#f59e0b', // Cukup Paham
                        '#ef4444', // Kurang Paham
                        '#e5e7eb'  // Default
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 20, font: { family: 'Inter' } } }
                },
                cutout: '70%'
            }
        });

        // Intention Chart (Bar)
        const intentionData = @json($intentionStats);
        const ctxIntention = document.getElementById('intentionChart').getContext('2d');
        new Chart(ctxIntention, {
            type: 'bar',
            data: {
                labels: Object.keys(intentionData).length > 0 ? Object.keys(intentionData) : ['Belum ada data'],
                datasets: [{
                    label: 'Jumlah Peserta',
                    data: Object.keys(intentionData).length > 0 ? Object.values(intentionData) : [0],
                    backgroundColor: '#10b981',
                    borderRadius: 6,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1, font: { family: 'Inter' } }, grid: { drawBorder: false } },
                    x: { grid: { display: false }, ticks: { font: { family: 'Inter' } } }
                }
            }
        });
    });
</script>
@endpush
</x-app-layout>
