<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('user')
            ->orderByRaw("FIELD(status, 'pending', 'disetujui', 'ditolak')")
            ->orderBy('tanggal_pengajuan', 'desc')
            ->paginate(20);

        return view('admin.cuti.index', compact('cutis'));
    }

    public function approve(Cuti $cuti)
    {
        $cuti->update(['status' => 'disetujui']);
        return back()->with('success', 'Pengajuan cuti disetujui.');
    }

    public function tolak(Cuti $cuti)
    {
        $cuti->update(['status' => 'ditolak']);
        return back()->with('success', 'Pengajuan cuti ditolak.');
    }
    
}