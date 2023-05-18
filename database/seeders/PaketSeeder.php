<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_paket = [
            ['nama_paket' => 'Standar 3', 'id_jenis' => 1, 'harga' => 250000],
            ['nama_paket' => 'Standar 4', 'id_jenis' => 1, 'harga' => 310000],
            ['nama_paket' => 'Standar 5', 'id_jenis' => 1, 'harga' => 360000],
            ['nama_paket' => 'Standar 6', 'id_jenis' => 1, 'harga' => 410000],
            ['nama_paket' => 'Khusus 2', 'id_jenis' => 2, 'harga' => 360000],
            ['nama_paket' => 'Khusus 3', 'id_jenis' => 2, 'harga' => 410000],
            ['nama_paket' => 'Khusus 4', 'id_jenis' => 2, 'harga' => 460000],
            ['nama_paket' => 'Khusus 5', 'id_jenis' => 2, 'harga' => 510000],
        ];
        foreach ($data_paket as $paket) {
            Paket::create($paket);
        }
    }
}
