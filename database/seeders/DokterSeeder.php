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
                'nama' => 'Dr. Dina',
                'alamat' => 'Jl. bersama orang yang salah No. 13',
                'no_hp' => '081236297643',
                'email' => 'dina@gmail.com',
                'id_poli' => 1, // Asumsi Poli Umum memiliki ID 1
                'password' => Hash::make('dina@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Novita',
                'alamat' => 'Jl. yang ati ati. 2',
                'no_hp' => '081234098123',
                'id_poli' => 2, // Asumsi Poli Anak memiliki ID 2
                'email' => 'novita@gmail.com',
                'password' => Hash::make('novita@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Sari',
                'alamat' => 'Jl. bersma orang yang tepat No. 1',
                'no_hp' => '081234943289',
                'id_poli' => 3, // Asumsi Poli Gigi memiliki ID 3
                'email' => 'sari@gmail.com',
                'password' => Hash::make('sari@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Nur',
                'alamat' => 'Jl. yang mungkin kamu tempuh No. 35',
                'no_hp' => '081234456984',
                'id_poli' => 4, // Asumsi Poli Kandungan memiliki ID 4
                'email' => 'nur@gmail.com',
                'password' => Hash::make('nur@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. haryadi',
                'alamat' => 'Jl. kedamaian No. 2',
                'no_hp' => '080983457894',
                'id_poli' => 5, // Asumsi Poli THT memiliki ID 5
                'email' => 'haryadi@gmail.com',
                'password' => Hash::make('haryadi@gmail.com'),
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
