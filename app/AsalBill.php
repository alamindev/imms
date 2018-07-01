<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class asalBill extends Model
{
    use SoftDeletes;

     protected $dates = ['deleted_at']; 

      public function asal()
    {
        return $this->belongsTo('App\Asal');
    }   
}
