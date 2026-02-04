<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ABC Children Centre') }} - @yield('title', 'Login')</title>
        <link rel="shortcut icon" href="{{ asset('img/faveicon.png') }}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Bootstrap & Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <style>
            :root {
                --primary: #FF6B9D;
                --primary-dark: #E85A8A;
                --secondary: #FFB347;
                --accent: #87CEEB;
                --dark: #2D3748;
                --light: #F7FAFC;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Nunito', sans-serif;
                min-height: 100vh;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .auth-container {
                display: flex;
                max-width: 1000px;
                width: 100%;
                background: white;
                border-radius: 24px;
                overflow: hidden;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            .auth-left {
                flex: 1;
                background: linear-gradient(135deg, var(--primary) 0%, #FF8E53 100%);
                padding: 60px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .auth-left::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
                animation: pulse 4s ease-in-out infinite;
            }

            @keyframes pulse {
                0%, 100% { transform: scale(1); opacity: 0.5; }
                50% { transform: scale(1.1); opacity: 0.8; }
            }

            .auth-left .welcome-content {
                position: relative;
                z-index: 1;
            }

            .auth-left .logo-icon {
                width: 100px;
                height: 100px;
                background: rgba(255,255,255,0.2);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 30px;
                backdrop-filter: blur(10px);
            }

            .auth-left .logo-icon i {
                font-size: 48px;
                color: white;
            }

            .auth-left h1 {
                color: white;
                font-size: 2.5rem;
                font-weight: 800;
                margin-bottom: 15px;
                text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .auth-left p {
                color: rgba(255,255,255,0.9);
                font-size: 1.1rem;
                line-height: 1.6;
                max-width: 300px;
            }

            .floating-shapes {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                pointer-events: none;
            }

            .shape {
                position: absolute;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
            }

            .shape-1 { width: 80px; height: 80px; top: 10%; left: 10%; animation: float 6s ease-in-out infinite; }
            .shape-2 { width: 60px; height: 60px; top: 70%; left: 80%; animation: float 8s ease-in-out infinite reverse; }
            .shape-3 { width: 40px; height: 40px; top: 40%; left: 70%; animation: float 5s ease-in-out infinite; }
            .shape-4 { width: 100px; height: 100px; top: 80%; left: 5%; animation: float 7s ease-in-out infinite reverse; }

            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(10deg); }
            }

            .auth-right {
                flex: 1;
                padding: 60px 50px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .auth-right .mobile-logo {
                display: none;
                text-align: center;
                margin-bottom: 30px;
            }

            .auth-right .mobile-logo h2 {
                color: var(--primary);
                font-weight: 800;
                font-size: 1.8rem;
            }

            .auth-right h2 {
                color: var(--dark);
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 10px;
            }

            .auth-right .subtitle {
                color: #718096;
                margin-bottom: 35px;
                font-size: 1rem;
            }

            .form-group {
                margin-bottom: 24px;
            }

            .form-group label {
                display: block;
                color: var(--dark);
                font-weight: 600;
                margin-bottom: 8px;
                font-size: 0.95rem;
            }

            .input-wrapper {
                position: relative;
            }

            .input-wrapper i {
                position: absolute;
                left: 18px;
                top: 50%;
                transform: translateY(-50%);
                color: #A0AEC0;
                font-size: 1.1rem;
                transition: color 0.3s;
            }

            .form-control {
                width: 100%;
                padding: 16px 18px 16px 50px;
                border: 2px solid #E2E8F0;
                border-radius: 12px;
                font-size: 1rem;
                transition: all 0.3s;
                background: #F7FAFC;
            }

            .form-control:focus {
                outline: none;
                border-color: var(--primary);
                background: white;
                box-shadow: 0 0 0 4px rgba(255, 107, 157, 0.1);
            }

            .form-control:focus + i,
            .input-wrapper:focus-within i {
                color: var(--primary);
            }

            .form-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 30px;
            }

            .remember-check {
                display: flex;
                align-items: center;
                gap: 10px;
                cursor: pointer;
            }

            .remember-check input[type="checkbox"] {
                width: 20px;
                height: 20px;
                accent-color: var(--primary);
                cursor: pointer;
            }

            .remember-check span {
                color: #4A5568;
                font-size: 0.95rem;
            }

            .forgot-link {
                color: var(--primary);
                text-decoration: none;
                font-weight: 600;
                font-size: 0.95rem;
                transition: color 0.3s;
            }

            .forgot-link:hover {
                color: var(--primary-dark);
                text-decoration: underline;
            }

            .btn-login {
                width: 100%;
                padding: 16px;
                background: linear-gradient(135deg, var(--primary) 0%, #FF8E53 100%);
                border: none;
                border-radius: 12px;
                color: white;
                font-size: 1.1rem;
                font-weight: 700;
                cursor: pointer;
                transition: all 0.3s;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(255, 107, 157, 0.4);
            }

            .btn-login:active {
                transform: translateY(0);
            }

            .divider {
                display: flex;
                align-items: center;
                margin: 30px 0;
            }

            .divider::before,
            .divider::after {
                content: '';
                flex: 1;
                height: 1px;
                background: #E2E8F0;
            }

            .divider span {
                padding: 0 20px;
                color: #A0AEC0;
                font-size: 0.9rem;
            }

            .register-link {
                text-align: center;
                color: #718096;
                font-size: 1rem;
            }

            .register-link a {
                color: var(--primary);
                text-decoration: none;
                font-weight: 700;
                transition: color 0.3s;
            }

            .register-link a:hover {
                color: var(--primary-dark);
                text-decoration: underline;
            }

            .back-home {
                text-align: center;
                margin-top: 25px;
            }

            .back-home a {
                color: #718096;
                text-decoration: none;
                font-size: 0.95rem;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                transition: color 0.3s;
            }

            .back-home a:hover {
                color: var(--primary);
            }

            .alert {
                padding: 14px 18px;
                border-radius: 10px;
                margin-bottom: 25px;
                font-size: 0.95rem;
            }

            .alert-success {
                background: #C6F6D5;
                color: #276749;
                border: 1px solid #9AE6B4;
            }

            .alert-danger {
                background: #FED7D7;
                color: #C53030;
                border: 1px solid #FEB2B2;
            }

            .input-error {
                color: #E53E3E;
                font-size: 0.85rem;
                margin-top: 6px;
                display: block;
            }

            @media (max-width: 768px) {
                .auth-container {
                    flex-direction: column;
                    max-width: 450px;
                }

                .auth-left {
                    display: none;
                }

                .auth-right {
                    padding: 40px 30px;
                }

                .auth-right .mobile-logo {
                    display: block;
                }

                .form-row {
                    flex-direction: column;
                    gap: 15px;
                    align-items: flex-start;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-container">
            <!-- Left Side - Welcome -->
            <div class="auth-left">
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>
                    <div class="shape shape-4"></div>
                </div>
                <div class="welcome-content">
                    <div class="logo-icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <h1>ABC Centre</h1>
                    <p>Welcome back! We're so happy to see you again. Your little ones are waiting!</p>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="auth-right">
                <div class="mobile-logo">
                    <h2><i class="fas fa-child me-2"></i>ABC Centre</h2>
                </div>
                
                @yield('content')
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>