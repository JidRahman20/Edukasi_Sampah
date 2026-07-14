<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduSampah Admin') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-50:   #f0fdf4;
            --green-100:  #dcfce7;
            --green-200:  #bbf7d0;
            --green-500:  #22c55e;
            --green-600:  #16a34a;
            --green-700:  #15803d;
            --green-800:  #166534;
            
            --white:      #ffffff;
            --text-dark:  #1a3c1a;
            --text-body:  #374151;
            --text-muted: #6b7280;
            
            --danger:     #ef4444;
            --success:    #10b981;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--green-50), #fff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated background orbs */
        .bg-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: floatOrb 8s ease-in-out infinite;
            pointer-events: none;
        }
        .bg-orb-1 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(34,197,94,0.15), transparent);
            top: -150px; left: -150px;
            animation-delay: 0s;
        }
        .bg-orb-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(22,163,74,0.1), transparent);
            bottom: -100px; right: -100px;
            animation-delay: 4s;
        }
        .bg-orb-3 {
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(34,197,94,0.08), transparent);
            top: 50%; right: 20%;
            animation-delay: 2s;
        }

        @keyframes floatOrb {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(20px, -20px) scale(1.05); }
        }

        .auth-card {
            background: var(--white);
            border: 1px solid var(--green-100);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
            box-shadow: 0 20px 40px rgba(34,197,94,0.08);
            animation: cardIn 0.5s cubic-bezier(0.4,0,0.2,1) both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .auth-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            justify-content: center;
        }

        .auth-logo-icon {
            width: 46px; height: 46px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--green-500), var(--green-700));
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            color: #fff;
            box-shadow: 0 4px 12px rgba(34,197,94,0.3);
        }

        .auth-logo-name {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: 900;
            color: var(--green-800);
        }

        /* Form elements */
        .form-group { margin-bottom: 18px; }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-body);
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            padding: 11px 14px;
            background: var(--white);
            border: 1px solid var(--green-200);
            border-radius: 10px;
            color: var(--text-dark);
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            outline: none;
        }

        .form-input::placeholder { color: var(--text-muted); }

        .form-input:focus {
            border-color: var(--green-500);
            box-shadow: 0 0 0 3px rgba(34,197,94,0.15);
        }

        .form-input.is-error {
            border-color: var(--danger);
        }

        .form-error {
            font-size: 12px;
            color: var(--danger);
            margin-top: 5px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-body);
        }

        .form-check input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--green-600);
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--green-500), var(--green-600));
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
            box-shadow: 0 4px 14px rgba(34,197,94,0.25);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--green-600), var(--green-700));
            box-shadow: 0 6px 20px rgba(34,197,94,0.3);
            transform: translateY(-1px);
        }

        .btn-primary:active { transform: translateY(0); }

        .auth-link {
            color: var(--green-600);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-link:hover { color: var(--green-800); }

        .auth-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0;
            color: var(--text-muted);
            font-size: 12px;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--green-100);
        }

        /* Status message */
        .status-msg {
            background: var(--green-50);
            border: 1px solid var(--green-200);
            border-radius: 10px;
            padding: 12px 14px;
            color: var(--green-700);
            font-size: 13px;
            margin-bottom: 18px;
        }

        .auth-title {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 6px;
            text-align: center;
        }

        .auth-subtitle {
            font-size: 13.5px;
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 28px;
        }

        /* Input Group with Icon */
        .input-group-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-group-icon .form-input {
            padding-left: 40px;
            padding-right: 40px;
        }
        .input-group-icon .input-icon-left {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            pointer-events: none;
        }
        .input-group-icon .input-icon-right {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            padding: 0;
            transition: color 0.2s;
        }
        .input-group-icon .input-icon-right:hover {
            color: var(--green-600);
        }
    </style>
</head>
<body>
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>

    <div class="auth-card">
        <div class="auth-logo">
            <div class="auth-logo-icon">🌿</div>
            <div class="auth-logo-name">EduSampah</div>
        </div>
        {{ $slot }}
    </div>
    
    <a href="{{ route('beranda') }}" style="position:absolute;top:24px;left:24px;color:var(--green-700);text-decoration:none;font-size:14px;font-weight:600;display:flex;align-items:center;gap:6px;">
        ← Kembali ke Beranda
    </a>
</body>
</html>
