<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

     protected $dates = ['deleted_at']; 
     
		public function scopeIdentiy($query, $identiy){
		 return $query->where('identification_card_no', '=', $identiy); 
		}

 	public function scopeCompany($query, $company){
		 return $query->where('company_reg_no', '=', $company);
		}
	public function scopeApplication($query, $application){
		 return $query->where('application_number', '=', $application); 
		}

 	public function asal(){
 		return $this->belongsTo('App\Asal','id','employee_id');
 	}

}
