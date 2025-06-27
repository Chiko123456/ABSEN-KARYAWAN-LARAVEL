<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Animasi sederhana */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        /* Custom styling for camera modal */
        .camera-modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .camera-modal-content {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            text-align: center;
        }
        #video, #canvas {
            border-radius: 0.5rem;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Karyawan') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Session Messages -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 fade-in" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                     <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 fade-in" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg fade-in">
                    <div class="p-6 text-gray-900 flex items-center space-x-6">
                        <img src="{{ $user->foto_profil ? Storage::url($user->foto_profil) : 'https://via.placeholder.com/100' }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border-4 border-indigo-200">
                        <div>
                            <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                            <p class="text-gray-600 text-lg">{{ $user->jabatan }}</p>
                            <p class="text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Kartu Absen Masuk -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 fade-in" style="animation-delay: 0.2s;">
                        <h3 class="text-xl font-bold mb-4">Absen Masuk</h3>
                        @if (!$presensiHariIni)
                            <p class="text-gray-600 mb-4">Anda belum melakukan absensi masuk hari ini. Silakan ambil foto selfie untuk absen.</p>
                            <button id="btn-absen-masuk" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                                AMBIL FOTO & ABSEN MASUK
                            </button>
                        @elseif ($presensiHariIni && !$presensiHariIni->jam_pulang)
                            <div class="bg-green-100 text-green-800 p-4 rounded-lg">
                                <p class="font-semibold">Anda sudah absen masuk hari ini pada pukul:</p>
                                <p class="text-2xl font-bold">{{ date('H:i', strtotime($presensiHariIni->jam_masuk)) }} WIB</p>
                                <p class="mt-2">Status: <span class="font-bold">{{ $presensiHariIni->status == 'tepat_waktu' ? 'Tepat Waktu' : 'Terlambat' }}</span></p>
                            </div>
                        @else
                             <div class="bg-gray-100 text-gray-800 p-4 rounded-lg">
                                <p class="font-semibold">Absensi hari ini telah selesai.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Kartu Absen Pulang -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 fade-in" style="animation-delay: 0.4s;">
                        <h3 class="text-xl font-bold mb-4">Absen Pulang</h3>
                        @if ($presensiHariIni && !$presensiHariIni->jam_pulang)
                            <p class="text-gray-600 mb-4">Waktu pulang adalah pukul 17:00. Tombol akan aktif setelahnya.</p>
                            <button id="btn-absen-pulang" {{ !$bisaPulang ? 'disabled' : '' }} class="w-full bg-red-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-700 transition duration-300 transform hover:scale-105 disabled:bg-gray-400 disabled:cursor-not-allowed">
                                AMBIL FOTO & ABSEN PULANG
                            </button>
                        @elseif ($presensiHariIni && $presensiHariIni->jam_pulang)
                            <div class="bg-blue-100 text-blue-800 p-4 rounded-lg">
                                <p class="font-semibold">Anda sudah absen pulang hari ini pada pukul:</p>
                                <p class="text-2xl font-bold">{{ date('H:i', strtotime($presensiHariIni->jam_pulang)) }} WIB</p>
                            </div>
                        @else
                             <div class="bg-gray-100 text-gray-800 p-4 rounded-lg">
                                <p class="font-semibold">Silakan absen masuk terlebih dahulu.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Kamera -->
        <div id="cameraModal" class="camera-modal-backdrop hidden">
            <div class="camera-modal-content">
                <h2 id="modalTitle" class="text-2xl font-bold mb-4">Ambil Foto Selfie</h2>
                <video id="video" width="400" height="300" autoplay></video>
                <button id="snap" class="mt-4 bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">Ambil Gambar</button>
                <canvas id="canvas" width="400" height="300" class="hidden"></canvas>
                <div id="preview-container" class="hidden mt-4">
                     <img id="photo-preview" src="" alt="Preview" class="mx-auto rounded border" />
                     <button id="retake" class="mt-2 bg-yellow-500 text-white font-bold py-2 px-4 rounded hover:bg-yellow-600">Ulangi</button>
                     <button id="submit-photo" class="mt-2 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Kirim Absen</button>
                </div>
                <button id="closeModal" class="absolute top-4 right-4 text-white text-3xl">×</button>
            </div>
        </div>

        <!-- Forms for submitting data -->
        <form id="form-masuk" action="{{ route('karyawan.presensi.masuk') }}" method="POST" class="hidden">
            @csrf
            <input type="hidden" name="foto_masuk" id="foto_masuk_input">
        </form>
         <form id="form-pulang" action="{{ route('karyawan.presensi.pulang') }}" method="POST" class="hidden">
            @csrf
            <input type="hidden" name="foto_pulang" id="foto_pulang_input">
        </form>

    </x-app-layout>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cameraModal = document.getElementById('cameraModal');
            const btnAbsenMasuk = document.getElementById('btn-absen-masuk');
            const btnAbsenPulang = document.getElementById('btn-absen-pulang');
            const closeModal = document.getElementById('closeModal');
            
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const snap = document.getElementById('snap');
            const retake = document.getElementById('retake');
            const submitPhoto = document.getElementById('submit-photo');
            const previewContainer = document.getElementById('preview-container');
            const photoPreview = document.getElementById('photo-preview');

            let currentStream;
            let currentFormId;

            // Fungsi untuk membuka kamera
            async function openCamera(formId) {
                currentFormId = formId;
                cameraModal.classList.remove('hidden');
                video.classList.remove('hidden');
                snap.classList.remove('hidden');
                previewContainer.classList.add('hidden');
                
                try {
                    currentStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
                    video.srcObject = currentStream;
                } catch (err) {
                    console.error("Error accessing camera: ", err);
                    alert('Tidak bisa mengakses kamera. Pastikan Anda memberikan izin.');
                    closeCamera();
                }
            }

            // Fungsi untuk menutup kamera
            function closeCamera() {
                if (currentStream) {
                    currentStream.getTracks().forEach(track => track.stop());
                }
                cameraModal.classList.add('hidden');
            }

            // Event listener tombol
            if(btnAbsenMasuk) btnAbsenMasuk.addEventListener('click', () => openCamera('form-masuk'));
            if(btnAbsenPulang) btnAbsenPulang.addEventListener('click', () => openCamera('form-pulang'));
            if(closeModal) closeModal.addEventListener('click', closeCamera);

            // Ambil gambar dari video
            snap.addEventListener('click', () => {
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                const dataUrl = canvas.toDataURL('image/png');
                
                photoPreview.src = dataUrl;
                video.classList.add('hidden');
                snap.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            });
            
            // Ulangi pengambilan gambar
            retake.addEventListener('click', () => {
                video.classList.remove('hidden');
                snap.classList.remove('hidden');
                previewContainer.classList.add('hidden');
            });

            // Kirim foto
            submitPhoto.addEventListener('click', () => {
                const dataUrl = photoPreview.src;
                if (currentFormId === 'form-masuk') {
                    document.getElementById('foto_masuk_input').value = dataUrl;
                    document.getElementById('form-masuk').submit();
                } else if (currentFormId === 'form-pulang') {
                    document.getElementById('foto_pulang_input').value = dataUrl;
                    document.getElementById('form-pulang').submit();
                }
                closeCamera();
            });

        });
    </script>
</body>
</html>