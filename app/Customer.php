<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    public function sales()
    {
        return $this->hasMany('App\Sales');
    }

    public function penawaran()
    {
        return $this->hasMany('App\Penawaran');
    }

    public function pemesanans()
    {
        return $this->hasMany('App\Pemesanan');
    }

    public function pengirimans()
    {
        return $this->hasMany('App\Pengiriman');
    }

    public function fakturs()
    {
        return $this->hasMany('App\Faktur');
    }

    public function returs()
    {
        return $this->hasMany('App\Retur');
    }

    public function piutang()
    {
        return $this->hasOne('App\Piutang');
    }

    public function pembayarans()
    {
        return $this->hasMany('App\Pembayaran');
    }

    public function barangs()
    {
        return $this->hasMany('App\Barang');
    }
}
