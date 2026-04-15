<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{

    private function listPosisi(): array
    {
        return [
            'PSA'        => 'PSA : Pemilik Sarana Apotek',
            'APJ'        => 'APJ : Apoteker Penanggung Jawab',
            'AA'         => 'AA : Asisten Apoteker',
            'Admin'      => 'Admin',
            'Gudang'     => 'Gudang',
            'OB'         => 'OB',
            'Keamanan'   => 'Keamanan',
            'Juru Racik' => 'Juru Racik',
        ];
    }

    public function index()
    {
        $today = \Carbon\Carbon::today();

        $totalKaryawan = User::where('role', 'karyawan')->count();

        $absensiHariIni = \App\Models\Absensi::whereDate('tanggal', $today)->get();
        $hadir = $absensiHariIni->whereIn('status', ['hadir', 'telat'])->count();
        $telat  = $absensiHariIni->where('status', 'telat')->count();
        $izin   = $absensiHariIni->where('status', 'izin')->count();

        $karyawan = User::where('role', 'karyawan')
            ->with(['absensis' => fn($q) => $q->whereDate('tanggal', $today)])
            ->paginate(15);

        $listPosisi = $this->listPosisi(); // ← INI YANG KURANG!

        return view('admin.karyawan.index', compact(
            'karyawan',
            'totalKaryawan',
            'hadir',
            'telat',
            'izin',
            'listPosisi'
        ));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nip'      => 'nullable|unique:users',
            'posisi'   => 'nullable|string',
            'no_telp'  => 'nullable|string',
            'domisili' => 'nullable|string',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto-karyawan', 'public');
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'karyawan',
            'nip'      => $request->nip,
            'posisi'   => $request->posisi,
            'no_telp'  => $request->no_telp,
            'domisili' => $request->domisili,
            'foto'     => $fotoPath,
        ]);

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(User $karyawan)
    {
        $listPosisi = $this->listPosisi(); // ← tambah
        return view('admin.karyawan.edit', compact('karyawan', 'listPosisi'));
    }

    public function update(Request $request, User $karyawan)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $karyawan->id,
            'posisi'   => 'nullable|string',
            'no_telp'  => 'nullable|string',
            'domisili' => 'nullable|string',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'posisi', 'no_telp', 'domisili']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($karyawan->foto) {
                \Storage::disk('public')->delete($karyawan->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto-karyawan', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $karyawan->update($data);

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(User $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan berhasil dihapus.');
    }
}
