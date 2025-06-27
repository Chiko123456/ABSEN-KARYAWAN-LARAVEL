<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Menampilkan halaman rekap presensi dengan filter.
     */
    public function index(Request $request)
    {
        // Ambil query builder presensi, di-join dengan user
        $query = Presensi::with('user')->select('presensis.*');

        // Filter berdasarkan tanggal jika ada input
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_presensi', $request->tanggal);
        }

        $presensi = $query->latest('tanggal_presensi')->paginate(15);

        return view('admin.presensi.index', compact('presensi'));
    }
}