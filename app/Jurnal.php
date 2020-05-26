<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    public function akuns()
    {
        return $this->hasMany('App\Akun');
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

    public function pembayarans()
    {
        return $this->hasMany('App\Pembayaran');
    }
}
