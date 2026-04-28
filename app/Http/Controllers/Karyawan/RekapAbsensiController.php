<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekapAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $user  = auth()->user();
        $bulan = $request->bulan ?? Carbon::now()->format('Y-m');

        // Auto-insert alpha sebelum ambil data
        $this->insertAlphaYangBelumAbsen($bulan);

        // Absensi bulan yang dipilih
        $absensiList = Absensi::where('user_id', $user->id)
            ->whereYear('tanggal', substr($bulan, 0, 4))
            ->whereMonth('tanggal', substr($bulan, 5, 2))
            ->orderBy('tanggal', 'asc')
            ->get();

        // Rekap hitungan
        $rekap = [
            'hadir' => $absensiList->where('status', 'hadir')->count(),
            'telat' => $absensiList->where('status', 'telat')->count(),
            'izin'  => $absensiList->where('status', 'izin')->count(),
            'alpha' => $absensiList->where('status', 'alpha')->count(),
        ];

        // Hitung hari kerja di bulan itu (Senin-Sabtu, bisa disesuaikan)
        $hariKerja = 0;
        $start = Carbon::parse($bulan . '-01');
        $end   = $start->copy()->endOfMonth();
        for ($d = $start->copy(); $d->lte($end); $d->addDay()) {
            if (!$d->isSunday()) $hariKerja++;
        }

        $totalAbsen = $rekap['hadir'] + $rekap['telat'] + $rekap['izin'] + $rekap['alpha'];
        $persentaseHadir = $hariKerja > 0
            ? round((($rekap['hadir'] + $rekap['telat']) / $hariKerja) * 100)
            : 0;

        return view('karyawan.rekap-absensi', compact(
            'bulan',
            'absensiList',
            'rekap',
            'hariKerja',
            'persentaseHadir',
            'totalAbsen'
        ));
    }

    // Tambahkan method ini di kedua controller
    private function insertAlphaYangBelumAbsen(string $bulan): void
    {
        $tahun  = substr($bulan, 0, 4);
        $bln    = substr($bulan, 5, 2);
        $start  = \Carbon\Carbon::createFromDate($tahun, $bln, 1)->startOfMonth();
        $end    = $start->copy()->endOfMonth();

        // Jangan proses hari yang belum lewat
        if ($end->isFuture()) {
            $end = \Carbon\Carbon::yesterday();
        }

        $karyawan = \App\Models\User::where('role', 'karyawan')->get();

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            // Skip Sabtu & Minggu
            if ($date->isSaturday() || $date->isSunday()) continue;

            foreach ($karyawan as $k) {
                \App\Models\Absensi::firstOrCreate(
                    [
                        'user_id' => $k->id,
                        'tanggal' => $date->toDateString(),
                    ],
                    [
                        'jam_masuk'  => null,
                        'jam_pulang' => null,
                        'status'     => 'alpha',
                    ]
                );
            }
        }
    }
}
