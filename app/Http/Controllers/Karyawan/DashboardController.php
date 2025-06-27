<?php

// app/Http/Controllers/Karyawan/DashboardController.php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');

        // Cek apakah karyawan sudah absen masuk hari ini
        $presensiHariIni = Presensi::where('user_id', $user->id)
            ->where('tanggal_presensi', $today)
            ->first();

        // Cek apakah sudah jam pulang
        $bisaPulang = now()->format('H:i:s') >= '17:00:00';

        return view('karyawan.dashboard', compact('user', 'presensiHariIni', 'bisaPulang'));
    }
}