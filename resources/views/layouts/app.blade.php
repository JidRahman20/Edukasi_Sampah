<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }} - @yield('title', 'Dashboard')</title>
    <meta name="description" content="Panel dashboard pengguna premium untuk mengelola akun dan aktivitas.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        /* ============================
           CSS DESIGN SYSTEM
        ============================ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-base:        #f3f4f6;
            --bg-surface:     #ffffff;
            --bg-card:        #ffffff;
            --bg-card-hover:  #f9fafb;
            --border:         #e5e7eb;
            --border-bright:  #d1d5db;

            --accent:         #10b981;
            --accent-light:   #34d399;
            --accent-glow:    rgba(16, 185, 129, 0.2);
            --accent2:        #059669;
            --accent2-glow:   rgba(5, 150, 105, 0.2);
            --success:        #10b981;
            --warning:        #f59e0b;
            --danger:         #ef4444;

            --text-primary:   #1f2937;
            --text-secondary: #4b5563;
            --text-muted:     #6b7280;

            --sidebar-w:      260px;
            --topbar-h:       70px;
            --radius:         12px;
            --radius-sm:      8px;
            --transition:     0.2s cubic-bezier(0.4,0,0.2,1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ============================
           SIDEBAR
        ============================ */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform var(--transition);
        }

        .sidebar-logo {
            padding: 24px 20px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-logo-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            color: white;
            box-shadow: 0 4px 10px var(--accent-glow);
            flex-shrink: 0;
        }

        .sidebar-logo-text {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .sidebar-logo-sub {
            font-size: 10px;
            color: var(--text-muted);
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-section-label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 10px 10px 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all var(--transition);
            margin-bottom: 2px;
            position: relative;
        }

        .nav-link:hover {
            background: #f3f4f6;
            color: var(--text-primary);
        }

        .nav-link.active {
            background: #ecfdf5; /* emerald-50 */
            color: var(--accent2);
            font-weight: 600;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 4px; height: 60%;
            background: var(--accent);
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            width: 20px; height: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--accent);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: var(--radius-sm);
            background: #f9fafb;
            border: 1px solid var(--border);
        }

        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .user-info-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-info-role {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* ============================
           TOPBAR
        ============================ */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 90;
        }

        .topbar-left { display: flex; align-items: center; gap: 14px; }

        .topbar-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .topbar-breadcrumb {
            font-size: 12px;
            color: var(--text-muted);
        }

        .topbar-right { display: flex; align-items: center; gap: 10px; }

        .topbar-btn {
            width: 38px; height: 38px;
            border-radius: var(--radius-sm);
            background: #f9fafb;
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: all var(--transition);
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 16px;
            position: relative;
        }

        .topbar-btn:hover {
            background: #f3f4f6;
            color: var(--text-primary);
        }

        .notif-dot {
            position: absolute;
            top: 7px; right: 7px;
            width: 7px; height: 7px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid var(--bg-surface);
        }

        .topbar-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            background: #f9fafb;
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all var(--transition);
            text-decoration: none;
            color: var(--text-primary);
        }

        .topbar-profile:hover {
            background: #f3f4f6;
        }

        .topbar-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            display: flex; align-items: center; justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
        }

        .topbar-username {
            font-size: 13px;
            font-weight: 600;
        }

        /* ============================
           MAIN CONTENT
        ============================ */
        .main-content {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            min-height: 100vh;
        }

        .page-content {
            padding: 28px;
        }

        /* ============================
           MOBILE OVERLAY
        ============================ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 99;
            backdrop-filter: blur(2px);
        }

        .menu-toggle {
            display: flex;
            width: 38px; height: 38px;
            border-radius: var(--radius-sm);
            background: #f9fafb;
            border: 1px solid var(--border);
            align-items: center; justify-content: center;
            cursor: pointer;
            color: var(--text-primary);
            font-size: 18px;
        }

        body.sidebar-collapsed .sidebar { transform: translateX(-100%); }
        body.sidebar-collapsed .topbar { left: 0; }
        body.sidebar-collapsed .main-content { margin-left: 0; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.open { display: block; }
            .topbar { left: 0; }
            .main-content { margin-left: 0; }
            .page-content { padding: 20px 16px; }
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-icon">🌿</div>
            <div>
                <div class="sidebar-logo-text">Admin Panel</div>
                <div class="sidebar-logo-sub">EDUKASI SAMPAH</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               id="nav-dashboard">
                <span class="nav-icon">📊</span>
                Dashboard Statistik
            </a>

            <div class="nav-section-label" style="margin-top:12px;">Konten & Media</div>

            <a href="{{ route('admin.materials.index') }}" 
               class="nav-link {{ request()->routeIs('admin.materials.*') ? 'active' : '' }}" 
               id="nav-materials">
                <span class="nav-icon">📚</span>
                Kelola Materi
            </a>

            <a href="{{ route('admin.galleries.index') }}" 
               class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" 
               id="nav-galleries">
                <span class="nav-icon">🖼️</span>
                Kelola Galeri
            </a>

            <a href="{{ route('admin.videos.index') }}" 
               class="nav-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}" 
               id="nav-videos">
                <span class="nav-icon">🎥</span>
                Kelola Video
            </a>

            <a href="{{ route('admin.tips.index') }}" 
               class="nav-link {{ request()->routeIs('admin.tips.*') ? 'active' : '' }}" 
               id="nav-tips">
                <span class="nav-icon">💡</span>
                Kelola Tips
            </a>

            <a href="{{ route('admin.evaluations.form') }}" 
               class="nav-link {{ request()->routeIs('admin.evaluations.form') ? 'active' : '' }}" 
               id="nav-evaluations-form">
                <span class="nav-icon">📝</span>
                Kelola Form Evaluasi
            </a>

            <div class="nav-section-label" style="margin-top:12px;">Pemantauan</div>

            <a href="{{ route('admin.contacts.index') }}" 
               class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" 
               id="nav-contacts">
                <span class="nav-icon">📩</span>
                Pesan Masuk (Kontak)
                @php
                    $unreadCount = \App\Models\Contact::count(); // Could be improved if there's an 'is_read' field, but total count is okay for now
                @endphp
                @if($unreadCount > 0)
                    <span class="nav-badge">{{ $unreadCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.evaluations.index') }}" 
               class="nav-link {{ request()->routeIs('admin.evaluations.index') ? 'active' : '' }}" 
               id="nav-evaluations-results">
                <span class="nav-icon">📈</span>
                Monitoring Hasil Evaluasi
            </a>
            
            <div class="nav-section-label" style="margin-top:12px;">Pengaturan</div>

            <a href="{{ route('admin.profile.edit') }}"
               class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
               id="nav-profile">
                <span class="nav-icon">👤</span>
                Profil Saya
            </a>
        </nav>
    </aside>

    <!-- Topbar -->
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
            <div>
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-breadcrumb">@yield('breadcrumb', 'Beranda / Dashboard')</div>
            </div>
        </div>
        <div class="topbar-right">
            <a href="{{ route('admin.contacts.index') }}" class="topbar-btn" title="Pesan Masuk Baru">
                🔔
                @php $unread = \App\Models\Contact::count(); @endphp
                @if($unread > 0)
                    <span class="notif-dot" style="display: flex; align-items: center; justify-content: center; font-size: 8px; color: white; width: 14px; height: 14px; top: -2px; right: -2px;">{{ $unread }}</span>
                @endif
            </a>
            
            <!-- User Profile Dropdown / Topbar -->
            <div style="position: relative; display: inline-block;">
                <a href="{{ route('admin.profile.edit') }}" class="topbar-profile" style="margin-right: 8px;">
                    <div class="topbar-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <span class="topbar-username">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                </a>
            </div>
            
            <!-- Logout Button moved to Topbar -->
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="topbar-btn" style="color:var(--danger);" title="Keluar">
                    🚪
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-content">
            {{ $slot }}
        </div>
    </main>

    <script>
        function toggleSidebar() {
            if (window.innerWidth <= 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
