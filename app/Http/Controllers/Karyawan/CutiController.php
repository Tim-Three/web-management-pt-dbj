<?php
namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function ajukan(Request $request)
    {
        $request->validate([
            'dari'   => 'required|date|after_or_equal:today',
            'sampai' => 'required|date|after_or_equal:dari',
            'alasan' => 'required|string|min:10',
        ]);

        Cuti::create([
            'user_id'           => auth()->id(),
            'tanggal_pengajuan' => Carbon::today(),
            'dari'              => $request->dari,
            'sampai'            => $request->sampai,
            'alasan'            => $request->alasan,
            'status'            => 'pending',
        ]);

        return back()->with('success', 'Pengajuan cuti berhasil dikirim!');
    }

    public function riwayat()
    {
        $riwayat = Cuti::where('user_id', auth()->id())
            ->orderBy('tanggal_pengajuan', 'desc')
            ->paginate(15);

        return view('karyawan.riwayat-cuti', compact('riwayat'));
    }
}