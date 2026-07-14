<x-app-layout>
@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')
@section('breadcrumb', 'Beranda / Profil Saya')

<style>
    .profile-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        max-width: 800px;
    }
    .profile-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
    }
    .profile-header {
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border);
    }
    .profile-header h2 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 4px 0;
    }
    .profile-header p {
        font-size: 13px;
        color: var(--text-muted);
        margin: 0;
    }
    
    .form-group {
        margin-bottom: 16px;
    }
    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-secondary);
        margin-bottom: 6px;
    }
    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--border-bright);
        border-radius: var(--radius-sm);
        background: var(--bg-surface);
        color: var(--text-primary);
        font-size: 14px;
        font-family: inherit;
        transition: border-color var(--transition);
    }
    .form-input:focus {
        outline: none;
        border-color: var(--accent);
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        font-size: 14px;
        font-weight: 500;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: background var(--transition);
        border: none;
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
    .btn-danger:hover {
        background: #dc2626;
    }
    .text-error {
        color: var(--danger);
        font-size: 12px;
        margin-top: 4px;
    }
    .text-success {
        color: var(--success);
        font-size: 13px;
        font-weight: 500;
        margin-left: 12px;
    }
</style>

<div class="profile-container">
    
    <!-- Informasi Profil -->
    <div class="profile-card">
        <div class="profile-header">
            <h2>Informasi Profil</h2>
            <p>Perbarui informasi profil dan alamat email akun Anda.</p>
        </div>
        
        <form method="post" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('patch')
            
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" required autofocus>
                @error('name')<div class="text-error">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                @error('email')<div class="text-error">{{ $message }}</div>@enderror
            </div>
            
            <div style="display: flex; align-items: center; margin-top: 24px;">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                @if (session('status') === 'profile-updated')
                    <span class="text-success">Tersimpan.</span>
                @endif
            </div>
        </form>
    </div>

    <!-- Ubah Password -->
    <div class="profile-card">
        <div class="profile-header">
            <h2>Ubah Password</h2>
            <p>Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>
        </div>
        
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            
            <div class="form-group">
                <label for="current_password" class="form-label">Password Saat Ini</label>
                <input type="password" id="current_password" name="current_password" class="form-input">
                @error('current_password', 'updatePassword')<div class="text-error">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" id="password" name="password" class="form-input">
                @error('password', 'updatePassword')<div class="text-error">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input">
                @error('password_confirmation', 'updatePassword')<div class="text-error">{{ $message }}</div>@enderror
            </div>
            
            <div style="display: flex; align-items: center; margin-top: 24px;">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
                @if (session('status') === 'password-updated')
                    <span class="text-success">Tersimpan.</span>
                @endif
            </div>
        </form>
    </div>

    <!-- Logout Area -->
    <div class="profile-card">
        <div class="profile-header">
            <h2>Sesi Akun</h2>
            <p>Keluar dari panel admin Edukasi Sampah.</p>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                🚪 Keluar / Logout
            </button>
        </form>
    </div>
    
</div>
</x-app-layout>
