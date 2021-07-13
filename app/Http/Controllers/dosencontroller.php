<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\dosen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class dosencontroller extends Controller
{

    public function checkSession(Request $request){
        return $request->session()->get("sessiondosen");
    }

    public function logout(Request $request){
        $request->session()->flush();
        return "Session Removed";
    }

    public function login(Request $request){
        $dosen = dosen::where("username", $request->username)->first();
        if($dosen && Hash::check($request->password, $dosen->password)){
           $request->session()->put("sessiondosen", $dosen->kode_dosen);
           $sesi = $request->session()->get("sessiondosen");
           $res = [
               "status" => 200,
               "message" => "success login",
               "session" => $sesi
           ];
           return response($res, 200);
        }
        return response([
            "status" => 401,
            "message" => "Failed Login, Wrong username or password"
        ], 401);
    }

    public function register(Request $request){
        $newDosen = new dosen;
        $newDosen->username = $request->username;
        $newDosen->password = Hash::make($request->password);
        $newDosen->nama_dosen = $request->nama_dosen;
        $newDosen->alamat = $request->alamat;
        $newDosen->tempat_lahir = $request->tempat_lahir;
        $newDosen->tanggal_lahir = Date("Y-m-d", strtotime($request->tanggal_lahir));
        $newDosen->save();
        
        $res = [
            "status" => 200,
            "message" => "Success registration dosen"
        ];
        return response($res, 200);
    }
}
