<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //
    protected $table = 'rental';
    protected $primaryKey ='rental_id';
    public $timestamps = false;

    protected $fillable = [
    	'rental_date',
    	'inventory_id',
    	'customer_id',
    	'return_date',
    	'staff_id'
    ];

    protected $dates = [
    	'last_update',
    	'rental_date',
    	'return_date'
    ];

    public function setLastUpdateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if($myDate > Carbon::now()){
            $this->attributes['last_update'] =  Carbon::parse($date);
        }else{
            $this->attributes['last_update'] =  Carbon::createFromFormat('Y-m-d', $date);  
        }       
    }

    public function setRentalDateAttribute($date)
    {   	
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['rental_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['rental_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}
    }

    public function setReturnDateAttribute($date)
    {   	
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['return_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['return_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}
    }


    public function customer(){
        return $this->belongsTo('App\Customer');
    }


    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }


    public function staff(){
        return $this->belongsTo('App\Staff');
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }

}
