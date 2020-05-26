<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public function jurnal()
    {
        return $this->belongsTo('App\Jurnal');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function piutangs()
    {
        return $this->belongsToMany('App\Piutang', 'pembayaran_piutang_details');
    }
}
