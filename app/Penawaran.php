<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penawaran extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function barangs()
    {
        return $this->belongsToMany('App\Barang', 'penawaran_details')->withPivot('jumlah_barang', 'harga')->withTimestamps();
    }
}
