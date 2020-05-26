<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    public function jurnal()
    {
        return $this->belongsTo('App\Jurnal');
    }
}
