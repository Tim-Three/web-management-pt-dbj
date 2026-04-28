<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? Carbon::now()->format('Y-m');

        // Auto-insert alpha sebelum ambil data
        $this->insertAlphaYangBelumAbsen($bulan);

        // Semua karyawan
        $karyawan = User::where('role', 'karyawan')->get();

        // Ambil semua absensi bulan ini
        $absensiList = Absensi::with('user')
            ->whereYear('tanggal', substr($bulan, 0, 4))
            ->whereMonth('tanggal', substr($bulan, 5, 2))
            ->orderBy('tanggal', 'desc')
            ->get();

        // Rekap per karyawan
        $rekap = $karyawan->map(function ($k) use ($absensiList) {
            $absenKaryawan = $absensiList->where('user_id', $k->id);
            return [
                'user'  => $k,
                'hadir' => $absenKaryawan->where('status', 'hadir')->count(),
                'telat' => $absenKaryawan->where('status', 'telat')->count(),
                'izin'  => $absenKaryawan->where('status', 'izin')->count(),
                'alpha' => $absenKaryawan->where('status', 'alpha')->count(),
                'total' => $absenKaryawan->count(),
            ];
        });

        // Summary total bulan ini
        $summary = [
            'hadir' => $absensiList->where('status', 'hadir')->count(),
            'telat' => $absensiList->where('status', 'telat')->count(),
            'izin'  => $absensiList->where('status', 'izin')->count(),
            'alpha' => $absensiList->where('status', 'alpha')->count(),
        ];

        // Detail absensi harian (untuk tabel bawah)
        $absensiHarian = Absensi::with('user')
            ->whereYear('tanggal', substr($bulan, 0, 4))
            ->whereMonth('tanggal', substr($bulan, 5, 2))
            ->orderBy('tanggal', 'desc')
            ->paginate(20);

        return view('admin.absensi.index', compact(
            'bulan',
            'rekap',
            'summary',
            'absensiHarian'
        ));
    }

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
