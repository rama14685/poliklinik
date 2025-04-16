<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = [
            ['nama_obat' => 'Albendasol suspensi 200 mg/5 ml', 'kemasan' => 'Ktk 10 btl @ 10 ml', 'harga' => 6000],
            ['nama_obat' => 'Albendazol tablet/ tablet kunyah 400 mg', 'kemasan' => 'ktk 5 x 6 tablet', 'harga' => 16000],
            ['nama_obat' => 'Alopurinol tablet 100 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 16000],
            ['nama_obat' => 'Alopurinol tablet 300 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 33000],
            ['nama_obat' => 'Alprazolam tablet 0,25 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 64000],
            ['nama_obat' => 'Alprazolam tablet 0,5 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 77000],
            ['nama_obat' => 'Alprazolam tablet 1 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 118000],
            ['nama_obat' => 'Ambroxol sirup 15 mg/ml', 'kemasan' => 'btl 60 ml', 'harga' => 5000],
            ['nama_obat' => 'Ambroxol tablet 30 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 21000],
            ['nama_obat' => 'Amilorida tablet 5 mg', 'kemasan' => 'ktk 10 x 10 tablet', 'harga' => 12000],
            ['nama_obat' => 'Aminofilin injeksi 24 mg/ml', 'kemasan' => 'ktk 30 ampul @ 10 ml', 'harga' => 118000],
            ['nama_obat' => 'Aminofilin tablet 150 mg', 'kemasan' => 'botol 1000 tablet', 'harga' => 57000],
            ['nama_obat' => 'Aminofilin tablet 200 mg', 'kemasan' => 'botol 100 tablet', 'harga' => 15000],
            ['nama_obat' => 'Amitriptilin tablet salut 25 mg (HCI)', 'kemasan' => 'ktk 10 x 10 tablet salut', 'harga' => 16000],
            ['nama_obat' => 'Amlodipin tablet 5 mg', 'kemasan' => 'ktk 3 x 10 tablet', 'harga' => 9000],
            ['nama_obat' => 'Amlodipin tablet 10 mg', 'kemasan' => 'ktk 3 x 10 tablet', 'harga' => 8750],
            ['nama_obat' => 'Amoksisilin + As.Klavulanat 625 mg tablet', 'kemasan' => 'ktk 5 x 6 tablet', 'harga' => 209000],
            ['nama_obat' => 'Amoksisilin kapsul 250 mg', 'kemasan' => 'ktk 10 x 10 kapsul', 'harga' => 38000],
            ['nama_obat' => 'Amoksisilin Kaplet 500 mg', 'kemasan' => 'ktk 10 x 10 kapsul', 'harga' => 45000],
            ['nama_obat' => 'Amoksisilin serbuk injeksi 1000 mg', 'kemasan' => 'ktk 10 vial', 'harga' => 99000],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
