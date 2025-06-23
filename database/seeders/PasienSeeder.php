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
                'nama' => 'Rama Eka',
                'alamat' => 'Jl. Semangka. 1',
                'no_ktp' => '1234567890357924',
                'no_hp' => '087700027855',
                'no_rm' => '2025-06-001',
                'email' => 'ramaeka@gmail.com',
                'password' => Hash::make('ramaeka@gmail.com'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Ashifa Fadhila',
                'alamat' => 'Jl. kiwi No. 3',
                'no_ktp' => '1234134520123457',
                'no_hp' => '087700027866',
                'no_rm' => '2025-06-002',
                'email' => 'ashifafadhila@gmail.com',
                'password' => Hash::make('ashifafadhila@gmail.com'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Azahra Fauziah',
                'alamat' => 'Jl. pisang No. 5',
                'no_ktp' => '0987657890123458',
                'no_hp' => '087700027877',
                'no_rm' => '2025-06-003',
                'email' => 'azahrafauziah@gmail.com',
                'password' => Hash::make('azahrafauziah@gmail.com'),
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
