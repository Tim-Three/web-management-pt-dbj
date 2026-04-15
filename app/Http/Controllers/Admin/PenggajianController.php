<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penggajian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index(Request $request)
    {
        $bulanIni = $request->bulan ?? Carbon::now()->format('Y-m');

        $penggajian = Penggajian::with('user')
            ->where('bulan', $bulanIni)
            ->paginate(15);

        $karyawan = User::where('role', 'karyawan')->get();

        $semuaGajiBulan = Penggajian::where('bulan', $bulanIni)->get();
        $totalSudahDibayar  = $semuaGajiBulan->where('status', 'sudah_dibayar')->sum('total_gaji');
        $totalBelumDibayar  = $semuaGajiBulan->where('status', 'belum_dibayar')->sum('total_gaji');
        $jumlahSudahDibayar = $semuaGajiBulan->where('status', 'sudah_dibayar')->count();
        $jumlahBelumDibayar = $semuaGajiBulan->where('status', 'belum_dibayar')->count();
        $totalGaji          = $semuaGajiBulan->sum('total_gaji');

        return view('admin.penggajian.index', compact(
            'penggajian',
            'karyawan',
            'bulanIni',
            'totalGaji',
            'totalSudahDibayar',
            'totalBelumDibayar',
            'jumlahSudahDibayar',
            'jumlahBelumDibayar'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'bulan'      => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan'  => 'nullable|numeric',
            'potongan'   => 'nullable|numeric',
        ]);

        $total = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        Penggajian::updateOrCreate(
            ['user_id' => $request->user_id, 'bulan' => $request->bulan],
            [
                'gaji_pokok' => $request->gaji_pokok,
                'tunjangan'  => $request->tunjangan ?? 0,
                'potongan'   => $request->potongan ?? 0,
                'total_gaji' => $total,
            ]
        );

        return back()->with('success', 'Data penggajian berhasil disimpan.');
    }

    public function bayar(Penggajian $penggajian)
    {
        $penggajian->update(['status' => 'sudah_dibayar']);
        return back()->with('success', 'Gaji berhasil ditandai sudah dibayar.');
    }
}
