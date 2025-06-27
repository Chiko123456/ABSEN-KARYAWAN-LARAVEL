<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman/form registrasi.
     * Ini adalah fungsi yang hilang sebelumnya.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi yang masuk setelah form di-submit.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi semua input, termasuk field kustom
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jabatan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'max:15'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // 2. Proses upload file foto profil jika ada
        $pathFotoProfil = null;
        if ($request->hasFile('foto_profil')) {
            // Simpan foto ke folder storage/app/public/foto_profil
            $pathFotoProfil = $request->file('foto_profil')->store('public/foto_profil');
        }

        // 3. Buat user baru di database dengan semua data yang sudah divalidasi
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto_profil' => $pathFotoProfil,
            // 'role' akan otomatis 'karyawan' karena itu default di migrasi
        ]);

        // 4. Picu event bahwa user baru telah terdaftar
        event(new Registered($user));

        // 5. Login-kan user yang baru saja dibuat
        Auth::login($user);

        // 6. Arahkan ke halaman dashboard
        return redirect(route('dashboard', absolute: false));
    }
}