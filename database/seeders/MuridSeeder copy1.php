<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use App\Models\Murid;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $data_murid = [
            [
                'id_user' => 1, 'nama_murid' => 'I Gede Radika Damendra', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => '2019-02-21', 'tanggal_masuk' => '2022-09-01', 'alamat' => 'Jl. Waturenggong Gg 22 No 10', 'nama_ortu' => 'I Gede Saka Dharma', 'no_telp' => '081916288266', 'nama_paket' => 1
            ],
            [
                'id_user' => 1, 'nama_murid' => 'Aksa Delvin Arin', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => '2018-09-11', 'tanggal_masuk' => '2022-09-01', 'alamat' => 'Dusun Kerajan RT 2 RW 6', 'nama_ortu' => 'Dedy Kustanto', 'no_telp' => '0819755467', 'nama_paket' => 1
            ],
            [
                'id_user' => 1, 'nama_murid' => 'Komang Baskara Dharma Putra', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => '2016-04-11', 'tanggal_masuk' => '2022-09-19', 'alamat' => 'Jl. Tukad Pakerisan', 'nama_ortu' => 'Ketut Darsana', 'no_telp' => '08165352432', 'nama_paket' => 1
            ],
            [
                'id_user' => 1, 'nama_murid' => 'I Putu Kevin Arya Putra', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => '2016-02-13', 'tanggal_masuk' => '2022-10-03', 'alamat' => 'Jl. Tukad Yeh Aya No 05', 'nama_ortu' => 'Ni Komang Ayu Setianingsih', 'no_telp' => '08953472548364', 'nama_paket' => 1
            ],
            [
                'id_user' => 1, 'nama_murid' => 'Ni Made Nari Widyani', 'tempat_lahir' => 'Denpasar', 'tanggal_lahir' => '2017-09-19', 'tanggal_masuk' => '2022-09-20', 'alamat' => 'Jl. Tukad Banyu Sari Gg 4', 'nama_ortu' => 'I wayan Suparse', 'no_telp' => '0898897657655', 'nama_paket' => 1
            ],
        ];
        foreach ($data_murid as $row) {
            Murid::create($row);
        }
    }
}
