<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class KaryawanController extends Controller
{
    /**
     * Menampilkan daftar semua karyawan.
     */
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->latest()->paginate(10);
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Menampilkan form untuk menambah karyawan baru.
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Menyimpan karyawan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jabatan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'max:15'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $pathFotoProfil = null;
        if ($request->hasFile('foto_profil')) {
            $pathFotoProfil = $request->file('foto_profil')->store('public/foto_profil');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto_profil' => $pathFotoProfil,
            'role' => 'karyawan',
        ]);

        return redirect()->route('admin.karyawan.index')->with('success', 'Karyawan baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data karyawan.
     */
    public function edit(User $karyawan)
    {
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    /**
     * Memperbarui data karyawan di database.
     */
    public function update(Request $request, User $karyawan)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$karyawan->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'jabatan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'max:15'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $data = $request->except('password', 'foto_profil');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($karyawan->foto_profil) {
                Storage::delete($karyawan->foto_profil);
            }
            $data['foto_profil'] = $request->file('foto_profil')->store('public/foto_profil');
        }

        $karyawan->update($data);

        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Menghapus data karyawan dari database.
     */
    public function destroy(User $karyawan)
    {
        if ($karyawan->foto_profil) {
            Storage::delete($karyawan->foto_profil);
        }
        $karyawan->delete();
        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}