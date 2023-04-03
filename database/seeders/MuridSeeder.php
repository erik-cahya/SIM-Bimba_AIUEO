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
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],
            [
                'nama_murid' => $faker->name, 'tanggal_lahir' => $faker->dateTime(), 'tanggal_masuk' => $faker->dateTime(), 'alamat' => $faker->address, 'nama_ortu' => $faker->name, 'no_telp' => $faker->numerify('+628##########'), 'nama_paket' => 'standard 0' . $faker->randomDigitNot(0)
            ],

        ];
        foreach ($data_murid as $row) {
            Murid::create($row);
        }
    }
}
