<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
