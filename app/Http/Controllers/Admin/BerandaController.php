<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Keuangan;
use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $bulanIni = $today->format('Y-m');

        $totalKaryawan = User::where('role', 'karyawan')->count();

        $absensiHariIni = Absensi::whereDate('tanggal', $today)->get();
        $hadir = $absensiHariIni->whereIn('status', ['hadir', 'telat'])->count(); // hanya yang benar-benar datang
        $telat = $absensiHariIni->where('status', 'telat')->count();
        $izin  = $absensiHariIni->where('status', 'izin')->count();

        $kehadiranTerkini = Absensi::with('user')
            ->whereDate('tanggal', $today)
            ->whereIn('status', ['hadir', 'telat']) // ← tambahkan ini, exclude 'izin' dan 'alpha'
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $karyawanList = User::where('role', 'karyawan')
            ->with(['absensis' => function ($q) use ($today) {
                $q->whereDate('tanggal', $today);
            }])
            ->paginate(10);

        return view('admin.beranda', compact(
            'totalKaryawan',
            'hadir',
            'telat',
            'izin',
            'kehadiranTerkini',
            'karyawanList',
            'today'
        ));
    }
}
