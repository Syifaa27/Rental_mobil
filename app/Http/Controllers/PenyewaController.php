<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa_model;
use Validator;
use Auth;


class PenyewaController extends Controller
{
    public function store(Request $req)
    {
        if(Auth::user()->level=="admin"){
        $validator=Validator::make($req->all(),
            [
                'nama_penyewa'=>'required',
                'alamat'=>'required',
                'telp'=>'required',
                'no_ktp'=>'required',
                'foto'=>'required'

        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $simpan=Penyewa_model::create([
                'nama_penyewa'=>$req->nama_penyewa,
                'alamat'=>$req->alamat,
                'telp'=>$req->telp,
                'no_ktp'=>$req->no_ktp,
                'foto'=>$req->foto
                
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
                'nama_penyewa'=>'required',
                'alamat'=>'required',
                'telp'=>'required',
                'no_ktp'=>'required',
                'foto'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Penyewa_model::where('id',$id)->update ([
                'nama_penyewa'=>$req->nama_penyewa,
                'alamat'=>$req->alamat,
                'telp'=>$req->telp,
                'no_ktp'=>$req->no_ktp,
                'foto'=>$req->foto
        ]);
            return Response()->json(['status'=>'Data Berhasil Diubah']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }
    public function destroy($id)
    {   
        if(Auth::user()->level=="admin"){
        $hapus=Penyewa_model::where('id',$id)->delete();
            return Response()->json(['status'=>'Data Berhasil Dihapus']);
        } else {
            return Response()->json(['status'=>'anda bukan admin']);
        }
    }

    public function tampil()

    {
        if(Auth::user()->level=="admin"){
            $penyewa=Penyewa_model::get();
            return response()->json($penyewa);
        }else{
            return response()->json(['status'=>'anda bukan admin']);

        }
    }

}
