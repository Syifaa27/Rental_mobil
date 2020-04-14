<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataMobil_model;
use Validator;
use Auth;

class DataMobilController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
            [
                'nama_mobil'=>'required',
                'merk'=>'required',
                'plat_nomor'=>'required',
                'id_jenis'=>'required',
                'keterangan'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=DataMobil_model::create([
                'nama_mobil'=>$req->nama_mobil,
                'merk'=>$req->merk,
                'plat_nomor'=>$req->plat_nomor,
                'id_jenis'=>$req->id_jenis,
                'keterangan'=>$req->keterangan

                
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
                'nama_mobil'=>'required',
                'merk'=>'required',
                'plat_nomor'=>'required',
                'id_jenis'=>'required',
                'keterangan'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=DataMobil_model::where('id',$id)->update ([
            'nama_mobil'=>$req->nama_mobil,
            'merk'=>$req->merk,
            'plat_nomor'=>$req->plat_nomor,
            'id_jenis'=>$req->id_jenis,
            'keterangan'=>$req->keterangan
        ]);
            return Response()->json(['status'=>'Data Berhasil Diubah']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }
    public function destroy($id)
    {   
        if(Auth::user()->level=="admin"){
        $hapus=DataMobil_model::where('id',$id)->delete();
            return Response()->json(['status'=>'Data Berhasil Dihapus']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }

    public function tampil()

    {
        if(Auth::user()->level=="admin"){
            $data_mobil=DataMobil_model::get();
            return response()->json($data_mobil);
        }else{
            return response()->json(['status'=>'anda bukan admin']);

        }
    }
}
