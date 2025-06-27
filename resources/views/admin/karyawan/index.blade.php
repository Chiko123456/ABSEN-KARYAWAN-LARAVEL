<x-app-layout>
    {{-- ====================================================== --}}
    {{-- ============ BLOK CSS KHUSUS HALAMAN INI ============= --}}
    {{-- ====================================================== --}}
    @push('styles')
    <style>
        .karyawan-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .karyawan-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(99, 102, 241, 0.05) 0%, rgba(168, 85, 247, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .karyawan-card:hover::before {
            opacity: 1;
        }
        
        .karyawan-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 30%, #f093fb 100%);
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }
        
        .karyawan-card:hover .card-header::before {
            opacity: 1;
            animation: shimmer 1.5s ease-in-out;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .card-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            margin-top: -45px;
            position: relative;
            z-index: 10;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px -8px rgba(0, 0, 0, 0.3);
        }
        
        .karyawan-card:hover .card-avatar {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 35px -8px rgba(0, 0, 0, 0.4);
        }
        
        .card-body {
            padding: 1.5rem;
            text-align: center;
            position: relative;
            z-index: 5;
        }
        
        .card-footer {
            border-top: 1px solid rgba(229, 231, 235, 0.5);
            padding: 1.5rem;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
            position: relative;
            z-index: 5;
        }
        
        .action-link {
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        
        .action-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }
        
        .action-link:hover::before {
            left: 100%;
        }
        
        .edit-link {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            box-shadow: 0 4px 15px -3px rgba(99, 102, 241, 0.4);
        }
        
        .edit-link:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -3px rgba(99, 102, 241, 0.6);
        }
        
        .delete-link {
            background: linear-gradient(135deg, #ef4444 0%, #f97316 100%);
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px -3px rgba(239, 68, 68, 0.4);
        }
        
        .delete-link:hover {
            background: linear-gradient(135deg, #dc2626 0%, #ea580c 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -3px rgba(239, 68, 68, 0.6);
        }
        
        .card-enter {
            animation: cardEnter 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
            transform: translateY(30px) scale(0.9);
        }
        
        @keyframes cardEnter {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .success-alert {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            border-radius: 16px;
            color: white;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.3);
            animation: slideInDown 0.5s ease-out;
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .empty-state {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 24px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            }
            50% { 
                box-shadow: 0 0 30px rgba(99, 102, 241, 0.6);
            }
        }
    </style>
    @endpush

    {{-- ====================================================== --}}
    {{-- ============= HEADER HALAMAN (Slot) ================== --}}
    {{-- ====================================================== --}}
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 rounded-3xl p-8 shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 via-pink-600/20 to-indigo-600/20 animate-pulse"></div>
            <div class="relative z-10 flex justify-between items-center">
                <div>
                    <h2 class="font-bold text-4xl bg-gradient-to-r from-white via-purple-200 to-pink-200 bg-clip-text text-transparent leading-tight">
                        {{ __('Manajemen Karyawan') }}
                    </h2>
                    <p class="text-purple-200 mt-2 text-lg">Kelola data karyawan dengan mudah dan efisien</p>
                </div>
                {{-- Tombol Tambah Karyawan yang sebelumnya di sini TELAH DIHAPUS --}}
                {{-- Karena sudah dipindahkan ke layouts/app.blade.php di pojok kanan atas --}}
            </div>
            <div class="absolute -top-4 -right-4 w-32 h-32 bg-gradient-to-br from-purple-500/30 to-pink-500/30 rounded-full blur-xl floating-icon"></div>
            <div class="absolute -bottom-4 -left-4 w-40 h-40 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-full blur-xl floating-icon" style="animation-delay: 1.5s;"></div>
        </div>
    </x-slot>

    {{-- ====================================================== --}}
    {{-- ================== KONTEN UTAMA ====================== --}}
    {{-- ====================================================== --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="success-alert" role="alert">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-bold text-lg">Sukses!</p>
                            <p class="text-emerald-100">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($karyawan as $index => $item)
                    <div class="karyawan-card card-enter" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="card-header"></div>
                        <div class="flex justify-center">
                             <img class="card-avatar" 
                                  src="{{ $item->foto_profil ? Storage::url($item->foto_profil) : 'https://ui-avatars.com/api/?name='.urlencode($item->name).'&background=667eea&color=fff&size=200' }}" 
                                  alt="Foto {{ $item->name }}">
                        </div>
                        <div class="card-body">
                            <h3 class="text-xl font-bold bg-gradient-to-r from-slate-800 to-purple-700 bg-clip-text text-transparent mb-2">
                                {{ $item->name }}
                            </h3>
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-100 to-indigo-100 text-purple-800 mb-3">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 002 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2v-8a2 2 0 012-2V8"></path>
                                </svg>
                                {{ $item->jabatan }}
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center justify-center text-sm text-slate-600">
                                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    {{ $item->email }}
                                </div>
                                <div class="flex items-center justify-center text-sm text-slate-600">
                                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    {{ $item->no_telp }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.karyawan.edit', $item->id) }}" class="action-link edit-link">
                                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.karyawan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link delete-link">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full empty-state">
                        <div class="flex flex-col items-center space-y-6">
                            <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-200 rounded-full flex items-center justify-center floating-icon">
                                <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.125-1.274-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.125-1.274.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-2xl font-bold text-slate-700 mb-2">Belum Ada Karyawan</h3>
                                <p class="text-slate-500 text-lg">Mulai dengan menambahkan karyawan pertama Anda</p>
                            </div>
                            <a href="{{ route('admin.karyawan.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Karyawan Sekarang
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($karyawan->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        {{ $karyawan->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>