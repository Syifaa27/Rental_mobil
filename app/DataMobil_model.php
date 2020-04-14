<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMobil_model extends Model
{
    protected $table="data_mobil";
    protected $primaryKey="id";
    protected $fillable = [
       'nama_mobil', 'merk', 'plat_nomor','id_jenis','keterangan'
    ];
    public $timestamps = false;
}
