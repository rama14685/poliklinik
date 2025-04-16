<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokters = [
            [
                'nama' => 'Dr. Saman Brembo',
                'alamat' => 'Jl. Pemuda dan Pemudi No. 75',
                'no_hp' => '081234567890',
                'email' => 'sambo75@gmail.com',
                'password' => Hash::make('sambo75@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Asep Cukurukuk',
                'alamat' => 'Jl. Aja dulu ntar juga nyaman ygy No. 33',
                'no_hp' => '081234567891',
                'email' => 'asep33@gmail.com',
                'password' => Hash::make('asep33@gmail.com'),
                'role' => 'dokter',
            ],
        ];

        foreach ($dokters as $dokter) {
            $existingDokter = User::where('email', $dokter['email'])->first();

            if (!$existingDokter) {
                User::create($dokter);
                $this->command->info('Akun dokter ' . $dokter['nama'] . ' berhasil dibuat!');
            } else {
                $this->command->info('Akun dokter ' . $dokter['nama'] . ' sudah ada.');
            }
        }
    }
}
