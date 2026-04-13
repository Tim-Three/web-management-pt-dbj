<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $fillable = ['user_id', 'bulan', 'gaji_pokok', 'tunjangan', 'potongan', 'total_gaji', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}