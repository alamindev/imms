<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Asal extends Model
{
   		use SoftDeletes;

     protected $dates = ['deleted_at']; 

     public function employee(){
     	return $this->hasOne('App\Employee','id','employee_id');
     }
    public function asalbill()
    {
        return $this->hasMany('App\AsalBill');
    }

}
