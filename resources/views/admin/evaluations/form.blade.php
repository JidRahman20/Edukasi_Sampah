<x-app-layout>
@section('title', 'Kelola Form Evaluasi')
@section('page-title', 'Kelola Form Evaluasi')
@section('breadcrumb', 'Beranda / Kelola Form Evaluasi')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        max-width: 600px;
    }
    .form-group { margin-bottom: 20px; }
    .form-label {
        display: block; font-size: 14px; font-weight: 500;
        color: var(--text-primary); margin-bottom: 8px;
    }
    .btn {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 10px 20px; font-size: 14px; font-weight: 500;
        border-radius: var(--radius-sm); cursor: pointer; border: none; text-decoration: none;
    }
    .btn-primary { background: var(--accent); color: white; transition: background 0.3s; }
    .btn-primary:hover { background: var(--accent2); }
    
    /* Toggle Switch */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }
    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
    input:checked + .slider {
        background-color: var(--accent);
    }
    input:checked + .slider:before {
        transform: translateX(26px);
    }
    .status-text {
        font-weight: 700;
        font-size: 16px;
        margin-left: 16px;
        vertical-align: super;
    }
</style>

<div class="card">
    <h2 style="font-size: 18px; font-weight: 600; margin-bottom: 12px;">Pengaturan Form Evaluasi Publik</h2>
    <p style="color: var(--text-secondary); margin-bottom: 24px; font-size: 14px;">
        Gunakan sakelar di bawah ini untuk membuka atau menutup akses pengunjung terhadap pengisian form evaluasi di halaman utama.
    </p>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.evaluations.form.update') }}" method="POST">
        @csrf

        <div class="form-group" style="display: flex; align-items: center; padding: 20px; background: var(--bg-surface); border-radius: 8px; border: 1px solid var(--border);">
            <label class="switch">
                <input type="checkbox" name="is_open" value="1" {{ $isOpen ? 'checked' : '' }} id="statusSwitch" onchange="updateStatusText()">
                <span class="slider"></span>
            </label>
            <span class="status-text" id="statusText" style="color: {{ $isOpen ? 'var(--accent)' : '#ef4444' }};">
                {{ $isOpen ? 'Buka (Aktif)' : 'Tutup (Nonaktif)' }}
            </span>
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
        </div>
    </form>
</div>

<script>
    function updateStatusText() {
        const checkbox = document.getElementById('statusSwitch');
        const text = document.getElementById('statusText');
        if (checkbox.checked) {
            text.textContent = 'Buka (Aktif)';
            text.style.color = 'var(--accent)';
        } else {
            text.textContent = 'Tutup (Nonaktif)';
            text.style.color = '#ef4444';
        }
    }
</script>
</x-app-layout>
