<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class matakuliahseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliahs')->insert([
           "nama_matkul" => "Pemrogaman WEB",
           "sks" => 3,
           "pengajar" => 1
        ]);

        DB::table('matakuliahs')->insert([
            "nama_matkul" => "Pemrogaman Dasar",
            "sks" => 3,
            "pengajar" => 2
         ]);

         DB::table('matakuliahs')->insert([
            "nama_matkul" => "Kecerdasan Buatan",
            "sks" => 3,
            "pengajar" => 3
         ]);
    }
}
