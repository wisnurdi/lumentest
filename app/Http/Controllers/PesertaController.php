<?php

namespace App\Http\Controllers;

use App\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PesertaController extends Controller{


    public function index(){

        $parapeserta  = Peserta::all();

        return response()->json($parapeserta);

    }

    public function getPeserta($id){

        $peserta  = Peserta::find($id);

        return response()->json($peserta);
    }

    public function simpanPeserta(Request $request){

        $peserta = Peserta::create($request->all());

        return response()->json($peserta);

    }

    public function hapusPeserta($id){
        $peserta  = Peserta::find($id);

        $peserta->delete();

        return response()->json('berhasil');
    }

    public function updatePeserta(Request $request,$id){
        $peserta  = Peserta::find($id);

        $peserta->nama = $request->input('nama');
        $peserta->nip = $request->input('nip');
        $peserta->sex = $request->input('sex');
        $peserta->tgllahir = $request->input('tgllahir');
        $peserta->biodata = $request->input('biodata');

        $peserta->save();

        return response()->json($peserta);
    }

}

