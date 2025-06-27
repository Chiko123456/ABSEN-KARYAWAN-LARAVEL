<?php

// app/Http/Controllers/Karyawan/PresensiController.php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function absenMasuk(Request $request)
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');
        $waktuSekarang = now();

        // Cek apakah sudah absen masuk hari ini
        $sudahAbsen = Presensi::where('user_id', $user->id)->where('tanggal_presensi', $today)->exists();
        if ($sudahAbsen) {
            return back()->with('error', 'Anda sudah melakukan absensi masuk hari ini.');
        }

        // Proses gambar selfie
        $imageData = $request->input('foto_masuk');
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = 'selfie-masuk-' . $user->id . '-' . $today . '.png';
        Storage::disk('public')->put('foto_presensi/' . $imageName, base64_decode($image));

        // Tentukan status
        $status = ($waktuSekarang->format('H:i:s') > '08:00:00') ? 'terlambat' : 'tepat_waktu';

        Presensi::create([
            'user_id' => $user->id,
            'tanggal_presensi' => $today,
            'jam_masuk' => $waktuSekarang->format('H:i:s'),
            'foto_masuk' => 'foto_presensi/' . $imageName,
            'status' => $status,
        ]);

        $message = ($status == 'terlambat') ?
            "Maaf kamu terlambat, besok jangan terlambat lagi ya!" :
            "Absen berhasil, selamat bekerja!";

        return redirect()->route('karyawan.dashboard')->with('success', $message);
    }

    public function absenPulang(Request $request)
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');
        $waktuSekarang = now();

        $presensi = Presensi::where('user_id', $user->id)->where('tanggal_presensi', $today)->first();

        // Validasi
        if (!$presensi || $presensi->jam_pulang) {
            return back()->with('error', 'Aksi tidak valid.');
        }
        if ($waktuSekarang->format('H:i:s') < '17:00:00') {
             return back()->with('error', 'Belum waktunya absen pulang.');
        }

        // Proses gambar selfie
        $imageData = $request->input('foto_pulang');
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = 'selfie-pulang-' . $user->id . '-' . $today . '.png';
        Storage::disk('public')->put('foto_presensi/' . $imageName, base64_decode($image));
        
        $presensi->update([
            'jam_pulang' => $waktuSekarang->format('H:i:s'),
            'foto_pulang' => 'foto_presensi/' . $imageName,
        ]);

        return redirect()->route('karyawan.dashboard')->with('success', 'Absen pulang berhasil, selamat beristirahat!');
    }
}
