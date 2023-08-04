<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

        // $data_user = [
        //     [
        //         'nama_user' => $faker->name, 'username' => $faker->freeEmail(), 'password' => bcrypt('password'), 'hak_akses' => $faker->randomElement(['guru', 'kepala_staff'])
        //     ],
        //     [
        //         'nama_user' => $faker->name, 'username' => $faker->freeEmail(), 'password' => bcrypt('password'), 'hak_akses' => $faker->randomElement(['guru', 'kepala_staff'])
        //     ],
        //     [
        //         'nama_user' => $faker->name, 'username' => $faker->freeEmail(), 'password' => bcrypt('password'), 'hak_akses' => $faker->randomElement(['guru', 'kepala_staff'])
        //     ],
        //     [
        //         'nama_user' => $faker->name, 'username' => $faker->freeEmail(), 'password' => bcrypt('password'), 'hak_akses' => $faker->randomElement(['guru', 'kepala_staff'])
        //     ],

        // ];
        // foreach ($data_user as $row) {
        //     User::insert($row);
        // }


        $data_jenis = [
            [
                'nama_user' => 'master',
                'username' => 'master',
                'password' => bcrypt('master'),
                'hak_akses' => 'kepala_staff'
            ],
            [
                'nama_user' => 'guru',
                'username' => 'guru',
                'password' => bcrypt('guru'),
                'hak_akses' => 'guru'
            ]

        ];
        foreach ($data_jenis as $row) {
            User::create($row);
        }
    }
}
