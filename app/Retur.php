<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur extends Model
{
    use SoftDeletes;
    public function jurnal()
    {
        return $this->belongsTo('App\Jurnal');
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
        return $this->belongsToMany('App\Barang', 'retur_details');
    }
}
