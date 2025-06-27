<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Karyawan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.karyawan.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div class="space-y-6">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="email" :value="__('Alamat Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="jabatan" :value="__('Jabatan')" />
                                    <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan')" required />
                                    <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="no_telp" :value="__('No. Telepon')" />
                                    <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required />
                                    <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                                </div>
                            </div>
                            <!-- Kolom Kanan -->
                            <div class="space-y-6">
                                <div>
                                    <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                                    <textarea id="alamat" name="alamat" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('alamat') }}</textarea>
                                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="foto_profil" :value="__('Foto Profil')" />
                                    <input id="foto_profil" type="file" name="foto_profil" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                                    <x-input-error :messages="$errors->get('foto_profil')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="border-t pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end pt-6 border-t">
                             <a href="{{ route('admin.karyawan.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button>
                                {{ __('Simpan Karyawan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>