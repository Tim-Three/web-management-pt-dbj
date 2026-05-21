<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nip',
        'posisi',
        'shift',
        'no_telp',
        'domisili',
        'foto',
    ];

    /**
     * Kembalikan jam mulai shift dalam format H:i:s
     */
    public function getJamMulaiShift(): string
    {
        return $this->shift === 'malam' ? '14:00:00' : '08:00:00';
    }

    /**
     * Kembalikan jam selesai shift dalam format H:i:s
     */
    public function getJamSelesaiShift(): string
    {
        return $this->shift === 'malam' ? '20:00:00' : '14:00:00';
    }

    /**
     * Apakah sekarang sudah masuk waktu shift?
     */
    public function isWaktuShift(): bool
    {
        $now = \Carbon\Carbon::now()->format('H:i:s');
        return $now >= $this->getJamMulaiShift();
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isKaryawan(): bool
    {
        return $this->role === 'karyawan';
    }

    public function absensis()
    {
        return $this->hasMany(\App\Models\Absensi::class);
    }

    public function cutis()
    {
        return $this->hasMany(\App\Models\Cuti::class);
    }

    public function penggajians()
    {
        return $this->hasMany(\App\Models\Penggajian::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
