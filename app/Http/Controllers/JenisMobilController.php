<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisMobil_model;
use Validator;
use Auth;

class JenisMobilController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
            [
                'jenis_mobil'=>'required',
                'harga'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=JenisMobil_model::create([
                'jenis_mobil'=>$req->jenis_mobil,
                'harga'=>$req->harga

                
        ]);
            return Response()->json(['status'=>'Data Berhasil Ditambahkan']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }

    public function update($id,Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
        [
            'jenis_mobil'=>'required',
            'harga'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=JenisMobil_model::where('id',$id)->update ([
            'jenis_mobil'=>$req->jenis_mobil,
                'harga'=>$req->harga
        ]);
            return Response()->json(['status'=>'Data Berhasil Diubah']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }
    public function destroy($id)
    {   
        if(Auth::user()->level=="admin"){
        $hapus=JenisMobil_model::where('id',$id)->delete();
            return Response()->json(['status'=>'Data Berhasil Dihapus']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }

    public function tampil()

    {
        if(Auth::user()->level=="admin"){
            $jenis_mobil=JenisMobil_model::get();
            return response()->json($jenis_mobil);
        }else{
            return response()->json(['status'=>'anda bukan admin']);

        }
    }
}
