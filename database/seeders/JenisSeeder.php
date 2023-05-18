<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_jenis = [
            ['nama_jenis' => 'Standar'],
            ['nama_jenis' => 'Khusus'],

        ];
        foreach ($data_jenis as $row) {
            Jenis::create($row);
        }
    }
}
