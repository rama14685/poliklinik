<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            [
                'nama_poli' => 'Poli Umum',
                'keterangan' => 'Pelayanan kesehatan Umum',
            ],
            [
                'nama_poli' => 'Poli Gigi',
                'keterangan' => 'Pelayanan kesehatan Gigi',
            ],
            [
                'nama_poli' => 'Poli Kulit',
                'keterangan' => 'Pelayanan kesehatan Kulit',
            ],
            [
                'nama_poli' => 'Poli Fisioterapi',
                'keterangan' => 'Pelayanan kesehatan Fisioterapi',
            ],
            [
                'nama_poli' => 'Poli Anak',
                'keterangan' => 'Pelayanan Kesehatan Anak',
            ],
        ];

        foreach ($polis as $poli) {
            Poli::create($poli);
        }
    }
}
