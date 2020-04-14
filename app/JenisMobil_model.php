<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMobil_model extends Model
{
    protected $table="jenis_mobil";
    protected $primaryKey="id";
    protected $fillable = [
       'jenis_mobil', 'harga'
    ];
    public $timestamps = false;
}
