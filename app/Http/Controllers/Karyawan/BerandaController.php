<?php
namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $today = Carbon::today();

        $absensiHariIni = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', $today)
            ->first();

        $cutiAktif = Cuti::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->where('dari', '<=', $today)
            ->where('sampai', '>=', $today)
            ->first();

        $riwayatAbsen = Absensi::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->limit(6)
            ->get();

        $riwayatCuti = Cuti::where('user_id', $user->id)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->limit(6)
            ->get();

        return view('karyawan.beranda', compact(
            'user', 'absensiHariIni', 'cutiAktif',
            'riwayatAbsen', 'riwayatCuti', 'today'
        ));
    }
}