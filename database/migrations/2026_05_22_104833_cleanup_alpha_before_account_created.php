<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Hapus record alpha yang tanggalnya sebelum akun karyawan dibuat.
     */
    public function up(): void
    {
        // Ambil semua karyawan beserta tanggal created_at-nya
        $karyawan = DB::table('users')->where('role', 'karyawan')->get(['id', 'created_at']);

        foreach ($karyawan as $k) {
            $tglDibuat = \Carbon\Carbon::parse($k->created_at)->startOfDay()->toDateString();

            DB::table('absensis')
                ->where('user_id', $k->id)
                ->where('status', 'alpha')
                ->whereNull('jam_masuk')
                ->whereNull('jam_pulang')
                ->where('tanggal', '<', $tglDibuat)
                ->delete();
        }
    }

    public function down(): void
    {
        // Tidak bisa di-rollback karena data sudah dihapus
    }
};