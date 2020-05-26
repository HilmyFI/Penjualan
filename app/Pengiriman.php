<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengiriman extends Model
{
    use SoftDeletes;
    public function jurnal()
    {
        return $this->belongsTo('App\Jurnal');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan');
    }

    public function faktur()
    {
        return $this->belongsTo('App\Faktur');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function barangs()
    {
        return $this->belongsToMany('App\Barang', 'pemesanan_details')  ->withPivot('jumlah_barang', 'harga')->withTimestamps();
    }
}
