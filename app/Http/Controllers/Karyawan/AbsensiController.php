<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absenMasuk(Request $request)
    {
        $user = auth()->user();
        $today = Carbon::today();

        // Blokir weekend
        if ($today->isSaturday() || $today->isSunday()) {
            return back()->with('error', 'Absensi tidak tersedia pada hari Sabtu & Minggu.');
        }

        // Blokir sebelum jam shift
        if (!$user->isWaktuShift()) {
            $jamMulai = $user->shift === 'malam' ? '14:00' : '08:00';
            return back()->with('error', "Shift {$user->shift} Anda dimulai pukul {$jamMulai}. Tombol absensi belum tersedia.");
        }

        $cutiAktif = Cuti::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->where('dari', '<=', $today)
            ->where('sampai', '>=', $today)
            ->first();

        if ($cutiAktif) {
            return back()->with('error', 'Anda sedang dalam masa cuti, tidak perlu absen.');
        }

        $existing = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', $today)
            ->first();

        if ($existing) {
            return back()->with('error', 'Anda sudah melakukan absen masuk hari ini.');
        }

        $jamMasuk  = Carbon::now();
        $batasTepat = Carbon::today()->setTimeFromTimeString($user->getJamMulaiShift());
        $status = $jamMasuk->gt($batasTepat) ? 'telat' : 'hadir';

        Absensi::create([
            'user_id'   => $user->id,
            'tanggal'   => $today,
            'jam_masuk' => $jamMasuk->format('H:i:s'),
            'status'    => $status,
        ]);

        return back()->with('success', 'Absen masuk berhasil!');
    }

    public function absenPulang(Request $request)
    {
        $user = auth()->user();
        $today = Carbon::today();

        // Blokir weekend
        if ($today->isSaturday() || $today->isSunday()) {
            return back()->with('error', 'Absensi tidak tersedia pada hari Sabtu & Minggu.');
        }

        $absensi = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', $today)
            ->first();

        if (!$absensi) {
            return back()->with('error', 'Anda belum melakukan absen masuk.');
        }

        if ($absensi->jam_pulang) {
            return back()->with('error', 'Anda sudah melakukan absen pulang hari ini.');
        }

        $absensi->update([
            'jam_pulang' => Carbon::now()->format('H:i:s'),
        ]);

        return back()->with('success', 'Absen pulang berhasil!');
    }

    public function riwayat()
    {
        $riwayat = Absensi::where('user_id', auth()->id())
            ->orderBy('tanggal', 'desc')
            ->paginate(15);

        return view('karyawan.riwayat-absen', compact('riwayat'));
    }
}
