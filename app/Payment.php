<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment';
    protected $primaryKey ='payment_id';
    public $timestamps = false;

    protected $dates = [
    	'last_update',
        'payment_date'
    ];

    protected $fillable = [
    	'customer_id',
    	'staff_id',
    	'rental_id',
    	'ammount'    	
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

    public function setPaymentDateAttribute($date)
    {
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['payment_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['payment_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}    	
    }


    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function rental(){
        return $this->belongsTo('App\Rental');
    }

    public function staff(){
        return $this->belongsTo('App\Staff');
    }
}
