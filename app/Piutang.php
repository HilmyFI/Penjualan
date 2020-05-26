<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function pembayarans()
    {
        return $this->belongsToMany('App\Pembayaran', 'pembayaran_piutang_details');
    }
}
