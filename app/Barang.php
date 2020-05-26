<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
    public function penawarans()
    {
        return $this->belongsToMany('App\Penawaran', 'penawaran_details')->withPivot('jumlah_barang', 'harga')->withTimestamps();
    }

    public function pemesanans()
    {
        return $this->belongsToMany('App\Pemesanan', 'pemesanan_details')->withTimestamps()->withPivot('jumlah_barang', 'harga');
    }

    public function pengirimans()
    {
        return $this->belongsToMany('App\Pengiriman', 'pengiriman_details')->withPivot('jumlah_barang', 'harga')->withTimestamps();
    }

    public function fakturs()
    {
        return $this->belongsToMany('App\Faktur', 'faktur_details');
    }

    public function returs()
    {
        return $this->belongsToMany('App\Retur', 'retur_details');
    }
}
