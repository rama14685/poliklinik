<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasiens = [
            [
                'nama' => 'Aenur Hakim',
                'alamat' => 'Perum Moga Permai Blok D24',
                'no_hp' => '081234567890',
                'email' => 'aenurhakim729@gmail.com',
                'password' => Hash::make('aenurhakim729@gmail.com'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Mamat Alkatiri',
                'alamat' => 'Jl. Lancar Jaya No. 45',
                'no_hp' => '081234567891',
                'email' => 'mamat45@gmail.com',
                'password' => Hash::make('mamat45@gmail.com'),
                'role' => 'pasien',
            ],
        ];

        foreach ($pasiens as $pasien) {
            $existingPasien = User::where('email', $pasien['email'])->first();

            if (!$existingPasien) {
                User::create($pasien);
                $this->command->info('Akun pasien ' . $pasien['nama'] . ' berhasil dibuat!');
            } else {
                $this->command->info('Akun pasien ' . $pasien['nama'] . ' sudah ada.');
            }
        }
    }
}
