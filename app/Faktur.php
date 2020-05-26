<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faktur extends Model
{
    use SoftDeletes;
    public function jurnal()
    {
        return $this->belongsTo('App\Jurnal');
    }

    public function pengirimans()
    {
        return $this->hasMany('App\Pengiriman');
    }

    public function pemesanans()
    {
        return $this->hasMany('App\Pemesanan');
    }

    public function returs()
    {
        return $this->hasMany('App\Retur');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function barangs()
    {
        return $this->belongsToMany('App\Barang', 'faktur_details');
    }
}
