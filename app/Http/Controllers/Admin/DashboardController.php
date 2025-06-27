<?php

// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        
        $totalKaryawan = User::where('role', 'karyawan')->count();
        
        $presensiHariIni = Presensi::with('user')
            ->where('tanggal_presensi', $today)
            ->get();
            
        $hadir = $presensiHariIni->count();
        $tepatWaktu = $presensiHariIni->where('status', 'tepat_waktu')->count();
        $terlambat = $presensiHariIni->where('status', 'terlambat')->count();

        return view('admin.dashboard', compact('totalKaryawan', 'hadir', 'tepatWaktu', 'terlambat', 'presensiHariIni'));
    }
}
