<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Afsar Fakhri H',
            'email'    => 'karyawan@gmail.com',
            'password' => Hash::make('password'),
            'role'     => 'karyawan',
            'nip'      => '321404832984',
            'posisi'   => 'Staff Operasional',
            'no_telp'  => '0821-4295-2954',
            'domisili' => 'Subang, Jawa Barat',
        ]);
    }
}