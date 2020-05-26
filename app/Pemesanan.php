<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    public function penawarans()
    {
        return $this->hasMany('App\Penawaran');
    }

    public function pengirimans()
    {
        return $this->hasMany('App\Pengiriman');
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
        return $this->belongsToMany('App\Barang', 'pemesanan_details')->withTimestamps()->withPivot('jumlah_barang', 'harga');
    }
}
