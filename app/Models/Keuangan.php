<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = ['bulan', 'total_pendapatan', 'total_pengeluaran', 'total_gaji', 'keuntungan', 'catatan'];
}