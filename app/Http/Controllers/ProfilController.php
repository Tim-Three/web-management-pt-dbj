<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'no_telp'              => 'nullable|string|max:20',
            'email'                => 'required|email|unique:users,email,' . $user->id,
            'password'             => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable',
        ]);

        $user->email   = $request->email;
        $user->no_telp = $request->no_telp;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                \Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('foto-karyawan', 'public');
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
