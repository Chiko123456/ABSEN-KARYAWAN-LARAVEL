<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ====================================================== --}}
    {{-- ============= BLOK CSS KHUSUS LAYOUT INI ============= --}}
    {{-- ====================================================== --}}
    @stack('styles') {{-- Ini adalah tempat CSS dari halaman lain akan diinjeksikan --}}
    <style>
        /* Global Variables for Modern Color Scheme */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0f172a;
            --dark-card: #1e293b;
            --dark-border: #334155;
            --accent-purple: #8b5cf6;
            --accent-cyan: #06b6d4;
            --accent-pink: #ec4899;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
        }

        /* Global Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.3); }
            50% { box-shadow: 0 0 30px rgba(139, 92, 246, 0.6); }
        }

        @keyframes slide-in-left {
            0% { transform: translateX(-100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        @keyframes slide-in-right {
            0% { transform: translateX(100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        @keyframes fade-in-up {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        /* Body Styling */
        body {
            background: var(--dark-bg);
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden; /* Mencegah scrollbar horizontal yang tidak diinginkan */
        }

        /* Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(6, 182, 212, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(236, 72, 153, 0.05) 0%, transparent 50%);
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }

        /* Sidebar Modern Design */
        .modern-sidebar {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(148, 163, 184, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: slide-in-left 0.8s ease-out;
            position: relative;
            overflow-y: auto; /* Agar sidebar bisa di-scroll jika isinya panjang */
            overflow-x: hidden; /* Mencegah scroll horizontal di sidebar */
        }

        /* Efek di samping sidebar */
        .modern-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 100%;
            background: var(--primary-gradient);
            animation: pulse-glow 3s ease-in-out infinite;
        }

        /* Logo Enhanced Animation */
        .logo-container {
            position: relative;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
            background: rgba(139, 92, 246, 0.1);
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            flex-shrink: 0; /* Mencegah logo container mengecil */
        }

        .logo-hover-effect {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            padding: 0.75rem;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            display: inline-block; /* Agar transform bekerja lebih baik */
        }

        .logo-hover-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
        }

        .logo-hover-effect:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 20px 40px rgba(139, 92, 246, 0.3);
            border-color: rgba(139, 92, 246, 0.4);
        }

        .logo-hover-effect:hover::before {
            left: 100%;
        }

        /* Navigation Links Modern Style */
        .nav-container {
            padding: 1.5rem 1rem;
            flex-grow: 1; /* Memungkinkan container navigasi mengambil ruang sisa */
        }

        .nav-link-modern {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            margin-bottom: 0.5rem;
            border-radius: 12px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .nav-link-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .nav-link-modern:hover {
            color: var(--text-light);
            transform: translateX(8px);
            border-color: rgba(139, 92, 246, 0.3);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.2);
        }

        .nav-link-modern:hover::before {
            left: 0;
            opacity: 0.1;
        }

        .nav-link-modern.active {
            color: var(--text-light);
            background: var(--primary-gradient);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
            transform: translateX(4px);
        }

        .nav-link-modern .nav-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            transition: transform 0.3s ease;
            flex-shrink: 0; /* Mencegah icon mengecil */
        }

        .nav-link-modern:hover .nav-icon {
            transform: scale(1.2) rotate(5deg);
        }

        /* Main Header Ultra Modern */
        .main-header {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 50;
            animation: slide-in-right 0.8s ease-out;
            padding: 0 1.5rem; /* Padding horizontal konsisten */
            height: 4rem; /* Tinggi default h-16 */
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: nowrap; /* Default: jangan wrap di desktop */
        }

        .main-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--success-gradient);
            animation: shimmer 3s linear infinite;
            background-size: 1000px 100%;
        }

        /* Header Content Wrapper */
        .header-content-wrapper {
            flex-grow: 1;
            animation: fade-in-up 1s ease-out 0.3s both;
            max-width: calc(100% - 200px); /* Contoh, sesuaikan jika perlu */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; /* Ini akan diubah di mobile */
            min-width: 0;
            /* Pastikan di desktop, judul ada di kiri dekat hamburger (jika desktop) */
            margin-right: auto;
        }

        /* Ultra Modern Add Button */
        .add-karyawan-button {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            padding: 0.875rem 2rem;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: var(--success-gradient);
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3);
            flex-shrink: 0; /* Mencegah tombol mengecil */
            margin-right: 1.5rem; /* Jarak antara tombol add dan dropdown profil */
        }

        .add-karyawan-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.7s ease;
        }

        .add-karyawan-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .add-karyawan-button:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow: 0 15px 35px rgba(79, 172, 254, 0.4);
        }

        .add-karyawan-button:hover::before {
            left: 100%;
        }

        .add-karyawan-button:hover::after {
            width: 300px;
            height: 300px;
        }

        .add-karyawan-button:active {
            transform: scale(0.98);
        }

        .add-karyawan-button .svg-icon {
            transition: transform 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .add-karyawan-button:hover .svg-icon {
            transform: rotate(180deg) scale(1.1);
        }

        /* Profile Dropdown Ultra Modern */
        .profile-dropdown-button {
            position: relative;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            flex-shrink: 0; /* Mencegah tombol mengecil */
            white-space: nowrap; /* Mencegah nama pengguna wrapping */
        }

        .profile-dropdown-button:hover {
            background: rgba(139, 92, 246, 0.1);
            border-color: rgba(139, 92, 246, 0.3);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.2);
            transform: translateY(-2px);
        }

        .profile-dropdown-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.3);
        }

        /* Main Content Area */
        .main-content {
            background: transparent;
            animation: fade-in-up 1s ease-out 0.5s both;
            position: relative;
            padding: 1.5rem; /* Tailwind p-6 adalah 1.5rem */
            flex-grow: 1; /* Pastikan konten mengisi ruang yang tersedia */
        }

        .content-card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            width: 100%; /* Pastikan kartu mengambil lebar penuh dari parent */
            max-width: 100%; /* Mencegah kartu meluber */
            box-sizing: border-box; /* Pastikan padding dan border termasuk dalam lebar */
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px -12px rgba(0, 0, 0, 0.35);
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(30, 41, 59, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .modern-sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 100;
                transition: transform 0.3s ease-in-out;
                width: 70%;
                max-width: 280px;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .modern-sidebar.mobile-open {
                transform: translateX(0);
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 90;
                display: none;
            }

            .sidebar-overlay.mobile-open {
                display: block;
            }

            /* PERUBAHAN BESAR PADA MAIN-HEADER UNTUK MOBILE */
            .main-header {
                flex-direction: column; /* Ubah ke kolom agar elemen bisa di baris berbeda */
                align-items: flex-start; /* Elemen akan rata kiri */
                /* ----- PERUBAHAN UTAMA DI SINI UNTUK PADDING & HEIGHT ----- */
                padding: 1rem 1rem 1.75rem 1rem; /* Padding lebih longgar di bawah (1.75rem = 28px) */
                height: auto; /* Izinkan tinggi menyesuaikan konten secara otomatis */
                min-height: auto; /* Hapus batasan tinggi minimum agar bisa expand */
                /* ----------------------------------------------------------- */
                justify-content: flex-start;
            }

            /* Container untuk hamburger dan profil dropdown (baris atas) */
            .top-header-row {
                width: 100%;
                display: flex;
                justify-content: space-between; /* Dorong ke ujung kiri dan kanan */
                align-items: center;
                margin-bottom: 0.5rem; /* Jarak antara baris atas dan judul */
            }

            /* Container untuk judul halaman (baris bawah) */
            .header-content-wrapper {
                flex-grow: 1;
                max-width: 100%; /* Pastikan mengambil lebar penuh */
                overflow: visible; /* Izinkan konten meluber jika perlu, tapi kita akan pakai wrap */
                text-overflow: clip; /* Tidak lagi memotong dengan ellipsis */
                white-space: normal; /* **PENTING: Izinkan teks wrap ke baris baru** */
                min-width: 0;
                margin-left: 0;
                order: 2;
                width: 100%;
            }

            /* Targetkan elemen judul di dalam header-content-wrapper */
            .header-content-wrapper h1,
            .header-content-wrapper h2,
            .header-content-wrapper .text-2xl,
            .header-content-wrapper .text-xl,
            .header-content-wrapper .font-semibold {
                font-size: 1.2rem !important; /* Diperkecil lagi sedikit */
                line-height: 1.4rem !important;
            }
            .header-content-wrapper p,
            .header-content-wrapper .text-sm {
                font-size: 0.8rem !important; /* Diperkecil lagi */
            }


            /* Mengatur ulang tampilan tombol dan dropdown di mobile */
            /* Ini sekarang ada di dalam .top-header-row */
            .main-header .flex.items-center.sm\:ms-6 {
                margin-left: auto; /* Dorong ke kanan sejauh mungkin */
                width: auto;
                justify-content: flex-end;
                margin-top: 0;
                order: 1; /* Di dalam .top-header-row, dia di kanan */
                display: flex !important;
                align-items: center;
                flex-wrap: nowrap;
            }

            /* Sembunyikan Tombol Tambah Karyawan di mobile */
            .add-karyawan-button {
                display: none !important;
            }

            /* Sesuaikan ukuran font dropdown profile di mobile */
            .profile-dropdown-button {
                font-size: 0.75rem; /* Lebih kecil lagi */
                padding: 0.4rem 0.6rem; /* Padding lebih kecil */
                white-space: nowrap; /* Penting agar teks "Administrator" tidak pecah */
                margin-right: 0;
            }

            /* Tombol Hamburger */
            .hamburger-button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 44px;
                height: 44px;
                min-width: 44px;
                min-height: 44px;
                margin-right: 0.5rem;
                flex-shrink: 0;
                order: 0;
                background: rgba(255, 255, 255, 0.08);
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.15);
                transition: all 0.2s ease;
                padding: 0.5rem;
            }

            .hamburger-button:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: scale(1.05);
            }

            .hamburger-button svg {
                width: 26px;
                height: 26px;
                stroke-width: 2.5;
            }
        }

        /* Untuk layar yang sangat kecil (misal iPhone SE, kurang dari 375px) */
        @media (max-width: 375px) {
            .main-header {
                padding: 0.5rem 0.75rem 1.5rem 0.75rem; /* Padding lebih kecil dan tetap longgar di bawah */
                min-height: auto; /* Tetap auto */
            }

            .top-header-row {
                margin-bottom: 0.4rem; /* Jarak lebih rapat */
            }

            .hamburger-button {
                width: 40px;
                height: 40px;
                min-width: 40px;
                min-height: 40px;
                padding: 0.4rem;
            }

            .hamburger-button svg {
                width: 24px;
                height: 24px;
            }

            /* Font judul di layar sangat kecil */
            .header-content-wrapper h1,
            .header-content-wrapper h2,
            .header-content-wrapper .text-2xl,
            .header-content-wrapper .text-xl,
            .header-content-wrapper .font-semibold {
                font-size: 1rem !important; /* Paling kecil, misal text-base */
                line-height: 1.3rem !important;
            }
            .header-content-wrapper p,
            .header-content-wrapper .text-sm {
                font-size: 0.7rem !important; /* Paling kecil untuk deskripsi */
            }

            .profile-dropdown-button {
                font-size: 0.65rem; /* Lebih kecil lagi */
                padding: 0.25rem 0.4rem; /* Padding paling kecil */
            }
        }

        /* Loading States */
        .loading-shimmer {
            background: linear-gradient(90deg,
                rgba(255,255,255,0.1) 25%,
                rgba(255,255,255,0.2) 50%,
                rgba(255,255,255,0.1) 75%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        /* Interactive Elements */
        .interactive-element {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .interactive-element:hover {
            transform: scale(1.02);
        }

        /* Custom Dropdown Styling */
        .dropdown-content {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .dropdown-item {
            color: var(--text-muted);
            transition: all 0.2s ease;
            padding: 0.75rem 1rem;
        }

        .dropdown-item:hover {
            color: var(--text-light);
            background: rgba(139, 92, 246, 0.1);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="flex h-screen">
        {{-- ====================================================== --}}
        {{-- ================== SIDEBAR (Kiri) ==================== --}}
        {{-- ====================================================== --}}
        <div class="fixed inset-y-0 left-0 w-64 modern-sidebar z-50 md:relative md:translate-x-0 transform -translate-x-full md:flex md:flex-col" id="sidebar">
            <div class="logo-container">
                <a href="{{ route('dashboard') }}" class="logo-hover-effect">
                    {{-- Pastikan path gambar logo benar --}}
                    <img class="h-10 w-auto" src="{{ asset('images/logo-perusahaan.jpeg') }}" alt="Logo Perusahaan">
                </a>
            </div>
            <div class="flex flex-col flex-grow nav-container">
                <nav class="flex flex-col flex-grow space-y-2">
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link-modern {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            {{ __('Dashboard') }}
                        </a>
                        <a href="{{ route('admin.karyawan.index') }}" class="nav-link-modern {{ request()->routeIs('admin.karyawan.*') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ __('Manajemen Karyawan') }}
                        </a>
                        <a href="{{ route('admin.presensi.index') }}" class="nav-link-modern {{ request()->routeIs('admin.presensi.*') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ __('Rekap Presensi') }}
                        </a>
                    @endif

                    @if(Auth::user()->role == 'karyawan')
                        <a href="{{ route('karyawan.dashboard') }}" class="nav-link-modern {{ request()->routeIs('karyawan.dashboard') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ __('Dashboard') }}
                        </a>
                    @endif
                </nav>
            </div>
        </div>

        {{-- Overlay untuk sidebar mobile --}}
        <div class="sidebar-overlay hidden" id="sidebar-overlay"></div>

        {{-- ====================================================== --}}
        {{-- ================ KONTEN UTAMA (Kanan) ================ --}}
        {{-- ====================================================== --}}
        <div class="flex flex-col flex-1 overflow-y-auto">
            {{-- ====================================================== --}}
            {{-- ============= TOP BAR (HEADER LAYOUT) ================ --}}
            {{-- ====================================================== --}}
            <div class="flex flex-col px-6 main-header"> {{-- flex-col untuk mobile --}}
                {{-- Baris Paling Atas (Hamburger & Profil) --}}
                <div class="flex items-center justify-between w-full top-header-row">
                    {{-- Hamburger Menu untuk Mobile --}}
                    <button id="hamburger-button" class="md:hidden text-white focus:outline-none hamburger-button">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    {{-- Tombol "Tambah Karyawan" hanya muncul jika role adalah admin DAN sedang di halaman Manajemen Karyawan (Desktop only) --}}
                    {{-- Di mobile akan disembunyikan via CSS --}}
                    @if(Auth::user()->role == 'admin' && request()->routeIs('admin.karyawan.index'))
                        <a href="{{ route('admin.karyawan.create') }}"
                           class="hidden md:inline-flex items-center add-karyawan-button">
                            <svg class="w-5 h-5 mr-2 svg-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Karyawan
                        </a>
                    @endif

                    {{-- Dropdown Profil --}}
                    <div class="flex items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center border border-transparent text-sm leading-4 font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 profile-dropdown-button">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="dropdown-content">
                                    <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                                         this.closest('form').submit();"
                                                         class="dropdown-item">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                {{-- Baris Judul Halaman (di bawah hamburger/profil di mobile) --}}
                <div class="flex items-center header-content-wrapper">
                    @if (isset($header))
                        {{ $header }}
                    @endif
                </div>
            </div>

            {{-- ====================================================== --}}
            {{-- ================== KONTEN SLOT (@slot) ============== --}}
            {{-- ====================================================== --}}
            <main class="flex-1 p-6 main-content">
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- Script untuk Toggle Sidebar Mobile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const hamburgerButton = document.getElementById('hamburger-button');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            if (hamburgerButton) {
                hamburgerButton.addEventListener('click', function() {
                    sidebar.classList.toggle('mobile-open');
                    sidebarOverlay.classList.toggle('mobile-open');
                });
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.remove('mobile-open');
                    sidebarOverlay.classList.remove('mobile-open');
                });
            }

            // Close sidebar if window resized to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint in Tailwind
                    if (sidebar.classList.contains('mobile-open')) {
                        sidebar.classList.remove('mobile-open');
                        sidebarOverlay.classList.remove('mobile-open');
                    }
                }
            });
        });
    </script>
</body>
</html>