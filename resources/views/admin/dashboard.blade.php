<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 rounded-2xl p-6 shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-pink-600/20 animate-pulse"></div>
            <div class="relative z-10">
                <h2 class="font-bold text-3xl bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent leading-tight animate-fade-in">
                    {{ __('Admin Dashboard') }}
                </h2>
                <p class="text-purple-200 mt-2 animate-slide-up">Kelola sistem presensi dengan mudah</p>
            </div>
            <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-purple-500/30 to-pink-500/30 rounded-full blur-xl animate-float"></div>
            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-full blur-xl animate-float-delayed"></div>
        </div>
    </x-slot>

    <div class="space-y-8 p-6">
        <!-- Kartu Ringkasan (Summary Cards) dengan Animasi Stagger -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Karyawan -->
            <div class="group bg-gradient-to-br from-white via-blue-50 to-indigo-100 p-6 rounded-2xl shadow-lg hover:shadow-2xl border border-blue-100/50 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 animate-slide-in-1 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-indigo-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center space-x-4">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.125-1.274-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.125-1.274.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600 mb-1">Total Karyawan</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $totalKaryawan }}</p>
                    </div>
                </div>
                <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 rounded-full blur-lg"></div>
            </div>

            <!-- Hadir Hari Ini -->
            <div class="group bg-gradient-to-br from-white via-emerald-50 to-green-100 p-6 rounded-2xl shadow-lg hover:shadow-2xl border border-emerald-100/50 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 animate-slide-in-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/5 to-green-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center space-x-4">
                    <div class="bg-gradient-to-br from-emerald-500 to-green-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600 mb-1">Hadir Hari Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-green-700 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $hadir }}</p>
                    </div>
                </div>
                <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-gradient-to-br from-emerald-500/10 to-green-500/10 rounded-full blur-lg"></div>
            </div>

            <!-- Tepat Waktu -->
            <div class="group bg-gradient-to-br from-white via-teal-50 to-cyan-100 p-6 rounded-2xl shadow-lg hover:shadow-2xl border border-teal-100/50 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 animate-slide-in-3 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-600/5 to-cyan-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center space-x-4">
                    <div class="bg-gradient-to-br from-teal-500 to-cyan-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600 mb-1">Tepat Waktu</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-teal-600 to-cyan-700 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $tepatWaktu }}</p>
                    </div>
                </div>
                <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-gradient-to-br from-teal-500/10 to-cyan-500/10 rounded-full blur-lg"></div>
            </div>

            <!-- Terlambat -->
            <div class="group bg-gradient-to-br from-white via-rose-50 to-red-100 p-6 rounded-2xl shadow-lg hover:shadow-2xl border border-rose-100/50 transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 animate-slide-in-4 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-rose-600/5 to-red-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center space-x-4">
                    <div class="bg-gradient-to-br from-rose-500 to-red-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 group-hover:-rotate-12 transition-all duration-300">
                        <svg class="w-7 h-7 text-white animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-600 mb-1">Terlambat</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-rose-600 to-red-700 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $terlambat }}</p>
                    </div>
                </div>
                <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-gradient-to-br from-rose-500/10 to-red-500/10 rounded-full blur-lg"></div>
            </div>
        </div>

        <!-- Tabel Rekap Presensi Harian dengan Glassmorphism Effect -->
        <div class="bg-white/80 backdrop-blur-xl overflow-hidden shadow-2xl sm:rounded-3xl border border-white/20 animate-fade-in-up">
            <div class="px-8 py-6 border-b border-slate-200/50 bg-gradient-to-r from-slate-50/50 to-white/50">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-800 to-purple-700 bg-clip-text text-transparent">
                            Rekap Presensi Hari Ini
                        </h3>
                        <p class="text-slate-600 mt-1 animate-fade-in">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    </div>
                    <a href="#" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wide hover:scale-105 active:scale-95 focus:outline-none focus:ring-4 focus:ring-emerald-300/50 disabled:opacity-25 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Download Excel
                    </a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200/50">
                    <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                        <tr>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Foto</span>
                                </div>
                            </th>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Nama Karyawan</span>
                                </div>
                            </th>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 002 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2v-8a2 2 0 012-2V8"></path>
                                    </svg>
                                    <span>Jabatan</span>
                                </div>
                            </th>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Jam Masuk</span>
                                </div>
                            </th>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Jam Pulang</span>
                                </div>
                            </th>
                            <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider hover:text-slate-800 transition-colors duration-200">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Status</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white/50 divide-y divide-slate-200/30">
                        @forelse ($presensiHariIni as $index => $presensi)
                            <tr class="hover:bg-gradient-to-r hover:from-slate-50/50 hover:to-purple-50/30 transition-all duration-300 animate-table-row" style="animation-delay: {{ $index * 0.1 }}s">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="relative group">
                                        <img src="{{ Storage::url($presensi->foto_masuk) }}" alt="selfie" class="w-12 h-12 rounded-full object-cover shadow-lg ring-2 ring-white group-hover:scale-110 group-hover:shadow-xl transition-all duration-300">
                                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-purple-400/20 to-pink-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-slate-900 hover:text-purple-600 transition-colors duration-200">{{ $presensi->user->name }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors duration-200">
                                        {{ $presensi->user->jabatan }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-slate-900 bg-gradient-to-r from-emerald-100 to-teal-100 px-3 py-1 rounded-lg inline-block">
                                        {{ $presensi->jam_masuk }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm text-slate-600 {{ $presensi->jam_pulang ? 'bg-gradient-to-r from-blue-100 to-indigo-100 px-3 py-1 rounded-lg font-semibold text-slate-800' : 'text-slate-400 italic' }}">
                                        {{ $presensi->jam_pulang ?? 'Belum Pulang' }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full shadow-md transition-all duration-300 hover:scale-105 {{ $presensi->status == 'tepat_waktu' ? 'bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-800 hover:from-emerald-200 hover:to-teal-200' : 'bg-gradient-to-r from-rose-100 to-red-100 text-red-800 hover:from-rose-200 hover:to-red-200' }}">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($presensi->status == 'tepat_waktu')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            @endif
                                        </svg>
                                        {{ $presensi->status == 'tepat_waktu' ? 'Tepat Waktu' : 'Terlambat' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr class="animate-fade-in">
                                <td colspan="6" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-gradient-to-br from-slate-100 to-slate-200 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-slate-500 text-lg font-medium">Belum ada data presensi untuk hari ini</div>
                                        <div class="text-slate-400 text-sm">Data akan muncul setelah karyawan melakukan presensi</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slide-in-1 {
            from { opacity: 0; transform: translateX(-100px) rotate(-5deg); }
            to { opacity: 1; transform: translateX(0) rotate(0deg); }
        }
        
        @keyframes slide-in-2 {
            from { opacity: 0; transform: translateX(-100px) rotate(-5deg); }
            to { opacity: 1; transform: translateX(0) rotate(0deg); }
        }
        
        @keyframes slide-in-3 {
            from { opacity: 0; transform: translateX(-100px) rotate(-5deg); }
            to { opacity: 1; transform: translateX(0) rotate(0deg); }
        }
        
        @keyframes slide-in-4 {
            from { opacity: 0; transform: translateX(-100px) rotate(-5deg); }
            to { opacity: 1; transform: translateX(0) rotate(0deg); }
        }
        
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes table-row {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(10px); }
        }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .animate-fade-in { animation: fade-in 0.8s ease-out; }
        .animate-slide-up { animation: slide-up 0.8s ease-out 0.2s both; }
        .animate-slide-in-1 { animation: slide-in-1 0.8s ease-out 0.1s both; }
        .animate-slide-in-2 { animation: slide-in-2 0.8s ease-out 0.2s both; }
        .animate-slide-in-3 { animation: slide-in-3 0.8s ease-out 0.3s both; }
        .animate-slide-in-4 { animation: slide-in-4 0.8s ease-out 0.4s both; }
        .animate-fade-in-up { animation: fade-in-up 1s ease-out 0.6s both; }
        .animate-table-row { animation: table-row 0.5s ease-out both; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-float-delayed { animation: float-delayed 3s ease-in-out infinite; }
        .animate-bounce-slow { animation: bounce-slow 2s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 4s linear infinite; }
    </style>
</x-app-layout>