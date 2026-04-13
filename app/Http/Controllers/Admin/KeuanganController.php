<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use App\Models\Penggajian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $bulanIni = Carbon::now()->format('Y-m');

        $keuanganBulanIni = Keuangan::where('bulan', $bulanIni)->first();

        $totalGajiBulanIni = Penggajian::where('bulan', $bulanIni)->sum('total_gaji');

        // Data 6 bulan terakhir untuk grafik
        $grafik = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i)->format('Y-m');
            $namaBulan = Carbon::now()->subMonths($i)->locale('id')->isoFormat('MMMM');
            $data = Keuangan::where('bulan', $bulan)->first();
            $grafik[] = [
                'bulan'        => $namaBulan,
                'pendapatan'   => $data?->total_pendapatan ?? 0,
                'pengeluaran'  => $data?->total_pengeluaran ?? 0,
            ];
        }

        return view('admin.keuangan.index', compact(
            'keuanganBulanIni', 'totalGajiBulanIni', 'grafik', 'bulanIni'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan'             => 'required',
            'total_pendapatan'  => 'required|numeric',
            'total_pengeluaran' => 'required|numeric',
            'catatan'           => 'nullable|string',
        ]);

        $totalGaji = Penggajian::where('bulan', $request->bulan)->sum('total_gaji');
        $keuntungan = $request->total_pendapatan - $request->total_pengeluaran - $totalGaji;

        Keuangan::updateOrCreate(
            ['bulan' => $request->bulan],
            [
                'total_pendapatan'  => $request->total_pendapatan,
                'total_pengeluaran' => $request->total_pengeluaran,
                'total_gaji'        => $totalGaji,
                'keuntungan'        => $keuntungan,
                'catatan'           => $request->catatan,
            ]
        );

        return back()->with('success', 'Data keuangan berhasil disimpan.');
    }
}