<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class dosenseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lahir = strtotime('10/16/1992');
        DB::table('dosens')->insert([
            "kode_dosen" => 1,
            "username" => "zamroni@dosen",
            "password" => Hash::make("dosen"),
            "nama_dosen" => "zamroni S.Kom",
            "alamat" => "lamongan",
            "tempat_lahir" => "lamongan",
            "tanggal_lahir" => Date("Y-m-d", $lahir)
        ]);

        $lahir = strtotime('10/12/1991');
        DB::table('dosens')->insert([
            "kode_dosen" => 2,
            "username" => "faruq@dosen",
            "password" => Hash::make("dosen"),
            "nama_dosen" => "faruq S.Kom",
            "alamat" => "lamongan",
            "tempat_lahir" => "lamongan",
            "tanggal_lahir" => Date("Y-m-d", $lahir)
        ]);

        $lahir = strtotime('08/12/1991');
        DB::table('dosens')->insert([
            "kode_dosen" => 3,
            "username" => "bambang@dosen",
            "password" => Hash::make("dosen"),
            "nama_dosen" => "bambang S.Kom",
            "alamat" => "lamongan",
            "tempat_lahir" => "lamongan",
            "tanggal_lahir" => Date("Y-m-d", $lahir)
        ]);
    }
}
