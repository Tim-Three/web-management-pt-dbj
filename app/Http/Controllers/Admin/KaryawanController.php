<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->paginate(15);
        return view('admin.karyawan.index', compact('karyawan'));
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
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'karyawan',
            'nip'      => $request->nip,
            'posisi'   => $request->posisi,
            'no_telp'  => $request->no_telp,
            'domisili' => $request->domisili,
        ]);

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(User $karyawan)
    {
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, User $karyawan)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $karyawan->id,
            'posisi'  => 'nullable|string',
            'no_telp' => 'nullable|string',
            'domisili'=> 'nullable|string',
        ]);

        $data = $request->only(['name', 'email', 'posisi', 'no_telp', 'domisili']);
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