<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;

use Illuminate\Http\Request;

class matakuliahcontroller extends Controller
{

    public function remove($id){
        Matakuliah::destroy($id);
        $res = [
            "status" => 200,
            "message" => "Success remove matkul.".$id,
        ];
        return response($res);
    }

    public function create(Request $request){
        $matkul = new Matakuliah;
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->sks = $request->sks;
        $matkul->pengajar = $request->kode_dosen;
        $matkul->save();
        $res = [
            "status" => 200,
            "message" => "Success create matkul",
            "data" => $matkul
        ];
        return response($res);
    }

    public function update($id, Request $request){
        $updateMatkul = Matakuliah::find($id);
        $updateMatkul->nama_matkul = $request->nama_matkul;
        $updateMatkul->sks = $request->sks;
        $updateMatkul->pengajar = $request->kode_dosen;
        $updateMatkul->save();
        $res = [
            "status" => 200,
            "message" => "Success update matkul",
            "data" => $updateMatkul
        ];
        return response($res);
    }


    public function collections(){
        $matkuls = Matakuliah::select("id", "nama_matkul", "nama_dosen", "sks")
        ->join('dosens', 'matakuliahs.pengajar', '=', 'dosens.kode_dosen')->get();
        $response = [
            "status" => 200,
            "message" => "Success get collections",
            "data" => $matkuls
        ];
        return response($response);
    }

    public function get($id){
        $matkul = Matakuliah::select("id", "nama_matkul", "nama_dosen", "sks")
        ->where("id", $id)
        ->join('dosens', 'matakuliahs.pengajar', '=', 'dosens.kode_dosen')->first();
        $response = [
            "status" => 200,
            "message" => "Success get matakuliah.".$id,
            "data" => $matkul
        ];
        return response($response);
    }
}
