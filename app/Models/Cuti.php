<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = ['user_id', 'tanggal_pengajuan', 'dari', 'sampai', 'alasan', 'status'];
    protected $casts = ['dari' => 'date', 'sampai' => 'date', 'tanggal_pengajuan' => 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}