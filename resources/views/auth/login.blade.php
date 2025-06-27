<x-guest-layout>
    <style>
        /* Modern Color Variables */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --cyber-gradient: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 25%, #45B7D1 50%, #96CEB4 75%, #FECA57 100%);
            --dark-bg: #0a0a0a;
            --dark-card: #1a1a2e;
            --dark-purple: #16213e;
            --neon-cyan: #00f5ff;
            --neon-pink: #ff0080;
            --neon-purple: #8a2be2;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        /* Global Animations - Hanya yang tidak bergerak */
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 20px var(--neon-cyan),
                           0 0 40px var(--neon-cyan),
                           0 0 60px var(--neon-cyan);
            }
            50% { 
                box-shadow: 0 0 30px var(--neon-pink),
                           0 0 60px var(--neon-pink),
                           0 0 90px var(--neon-pink);
            }
        }

        @keyframes slide-in-left {
            0% { 
                transform: translateX(-100px) scale(0.8);
                opacity: 0;
                filter: blur(10px);
            }
            100% { 
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        @keyframes slide-in-right {
            0% { 
                transform: translateX(100px) scale(0.8);
                opacity: 0;
                filter: blur(10px);
            }
            100% { 
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        @keyframes fade-in-up {
            0% { 
                transform: translateY(50px) scale(0.9);
                opacity: 0;
                filter: blur(5px);
            }
            100% { 
                transform: translateY(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        @keyframes fade-in-down {
            0% { 
                transform: translateY(-50px) scale(0.9);
                opacity: 0;
                filter: blur(5px);
            }
            100% { 
                transform: translateY(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes neon-flicker {
            0%, 100% { text-shadow: 0 0 5px currentColor, 0 0 10px currentColor, 0 0 15px currentColor; }
            50% { text-shadow: 0 0 2px currentColor, 0 0 5px currentColor, 0 0 8px currentColor; }
        }

        /* Body and Background */
        body {
            background: var(--dark-bg);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Static Background - Tanpa animasi float */
        .login-container {
            position: relative;
            min-height: 100vh;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 107, 107, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(78, 205, 196, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(69, 183, 209, 0.1) 0%, transparent 50%),
                linear-gradient(135deg, var(--dark-bg) 0%, var(--dark-card) 50%, var(--dark-purple) 100%);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(90deg, transparent, transparent 98px, rgba(0, 245, 255, 0.03) 100px),
                repeating-linear-gradient(0deg, transparent, transparent 98px, rgba(255, 0, 128, 0.03) 100px);
            animation: shimmer 8s linear infinite;
            pointer-events: none;
        }

        /* Left Panel - Form */
        .form-panel {
            background: rgba(26, 26, 46, 0.8);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border);
            position: relative;
            overflow: hidden;
            animation: slide-in-left 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .form-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(45deg, transparent 30%, rgba(0, 245, 255, 0.05) 50%, transparent 70%),
                linear-gradient(-45deg, transparent 30%, rgba(138, 43, 226, 0.05) 50%, transparent 70%);
            animation: shimmer 6s ease-in-out infinite alternate;
            pointer-events: none;
        }

        /* Form Container */
        .form-container {
            position: relative;
            z-index: 10;
            max-width: 420px;
            width: 100%;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            animation: fade-in-up 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
        }

        /* Header Icon - Tanpa animasi float */
        .header-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            background: var(--cyber-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            animation: pulse-glow 3s ease-in-out infinite;
        }

        .header-icon::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: var(--cyber-gradient);
            border-radius: 50%;
            z-index: -1;
            filter: blur(10px);
            opacity: 0.7;
        }

        .header-icon svg {
            width: 40px;
            height: 40px;
            color: white;
            /* Animasi float dihapus */
        }

        /* Typography */
        .main-title {
            font-size: 2.5rem;
            font-weight: 900;
            background: var(--cyber-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 1rem;
            animation: fade-in-down 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.5s both;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            animation: fade-in-down 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.7s both;
        }

        /* Form Controls */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .modern-input {
            width: 100%;
            padding: 1.25rem 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            color: white;
            font-size: 1.1rem;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            backdrop-filter: blur(10px);
        }

        .modern-input:focus {
            outline: none;
            border-color: var(--neon-cyan);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 0 20px rgba(0, 245, 255, 0.3),
                0 0 40px rgba(0, 245, 255, 0.1);
            /* Scale transform dihapus */
        }

        .modern-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Checkbox */
        .modern-checkbox {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 2rem 0;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            margin-right: 0.75rem;
            position: relative;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
        }

        .checkbox-wrapper input[type="checkbox"]:checked {
            background: var(--success-gradient);
            border-color: var(--neon-cyan);
        }

        .checkbox-wrapper input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
        }

        .forgot-link {
            color: var(--neon-cyan);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-link:hover {
            color: var(--neon-pink);
            text-shadow: 0 0 10px currentColor;
        }

        /* Login Button - Tanpa animasi gerakan */
        .login-button {
            width: 100%;
            padding: 1.25rem;
            background: var(--success-gradient);
            border: none;
            border-radius: 16px;
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.7s ease;
        }

        .login-button:hover {
            /* Transform translateY dan scale dihapus */
            box-shadow: 0 20px 40px rgba(79, 172, 254, 0.4);
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:active {
            /* Scale transform dihapus */
        }

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .register-link a {
            color: var(--neon-pink);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--neon-cyan);
            text-shadow: 0 0 10px currentColor;
        }

        /* Right Panel - Branding */
        .branding-panel {
            background: 
                linear-gradient(135deg, var(--dark-card) 0%, var(--dark-purple) 100%),
                radial-gradient(circle at center, rgba(0, 245, 255, 0.1) 0%, transparent 70%);
            position: relative;
            overflow: hidden;
            animation: slide-in-right 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.2s both;
        }

        .branding-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                repeating-linear-gradient(45deg, transparent, transparent 2px, rgba(0, 245, 255, 0.02) 2px, rgba(0, 245, 255, 0.02) 4px),
                repeating-linear-gradient(-45deg, transparent, transparent 2px, rgba(255, 0, 128, 0.02) 2px, rgba(255, 0, 128, 0.02) 4px);
            animation: shimmer 10s linear infinite;
            pointer-events: none;
        }

        .branding-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            padding: 4rem;
            animation: fade-in-up 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.8s both;
        }

        .branding-title {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 2rem;
            background: var(--cyber-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: neon-flicker 4s ease-in-out infinite alternate;
        }

        .branding-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3rem;
            animation: fade-in-up 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 1s both;
        }

        /* Decorative Elements - Tanpa animasi gerakan */
        .floating-orbs {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            background: var(--cyber-gradient);
            opacity: 0.1;
            /* Animasi float dihapus */
        }

        .orb:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
        }

        .orb:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
        }

        .orb:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
        }

        /* Animation Classes */
        .animate-fade-in { animation: fade-in-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both; }
        .animate-fade-in-down { animation: fade-in-down 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both; }
        .animate-fade-in-up { animation: fade-in-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both; }
        .animate-fade-in-right { animation: slide-in-right 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both; }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .branding-panel {
                display: none;
            }
            .form-panel {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .form-container {
                padding: 2rem;
                margin: 1rem;
            }
            .main-title {
                font-size: 2rem;
            }
            .branding-title {
                font-size: 2.5rem;
            }
        }
    </style>

    <div class="login-container flex">
        <!-- Floating Orbs -->
        <div class="floating-orbs">
            <div class="orb"></div>
            <div class="orb"></div>
            <div class="orb"></div>
        </div>

        <!-- Bagian Kiri: Form Login -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 form-panel">
            <div class="form-container">
                <!-- Header Form -->
                <div class="text-center mb-8">
                    <div class="header-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h2 class="main-title">
                        Selamat Datang Kembali
                    </h2>
                    <p class="subtitle">
                        Silakan login untuk melakukan absensi.
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group animate-fade-in" style="animation-delay: 0.2s;">
                        <x-input-label for="email" value="Alamat Email" class="sr-only" />
                        <input id="email" class="modern-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Alamat Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group animate-fade-in" style="animation-delay: 0.4s;">
                        <x-input-label for="password" value="Password" class="sr-only" />
                        <input id="password" class="modern-input" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="modern-checkbox animate-fade-in" style="animation-delay: 0.6s;">
                        <div class="checkbox-wrapper">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span style="color: rgba(255, 255, 255, 0.7);">{{ __('Remember me') }}</span>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Login -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.8s;">
                        <button type="submit" class="login-button">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <!-- Link ke Register -->
                    <div class="register-link animate-fade-in-up" style="animation-delay: 1s;">
                        Belum punya akun?
                        <a href="{{ route('register') }}">
                            Daftar di sini
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bagian Kanan: Gambar -->
        <div class="hidden lg:flex w-1/2 items-center justify-center branding-panel">
            <div class="branding-content">
                <h1 class="branding-title">Aplikasi Absensi PT.Equity World Futures</h1>
                <p class="branding-subtitle">Efisiensi, Akurasi, dan Kemudahan dalam satu genggaman.</p>
                
                <!-- Decorative Tech Elements -->
                <div style="margin-top: 3rem; opacity: 0.3;">
                    <div style="width: 200px; height: 2px; background: var(--cyber-gradient); margin: 0 auto 2rem; animation: shimmer 3s ease-in-out infinite;"></div>
                    <div style="display: flex; justify-content: center; gap: 1rem;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: var(--neon-cyan); animation: pulse-glow 2s ease-in-out infinite;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: var(--neon-pink); animation: pulse-glow 2s ease-in-out infinite 0.5s;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: var(--neon-purple); animation: pulse-glow 2s ease-in-out infinite 1s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>