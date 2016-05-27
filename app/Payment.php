<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payment';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='payment_id';

    /**
     * set timestaps to false
     * @var boolean
     */
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

    /**
     * override the set date attribute
     * as per the example
     * 
     * @param $date
     * 
     */
    public function setLastUpdateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if($myDate > Carbon::now()){
            $this->attributes['last_update'] =  Carbon::parse($date);
        }else{
            $this->attributes['last_update'] =  Carbon::createFromFormat('Y-m-d', $date);  
        }       
    }

    /**
     * override the set date attribute
     * as per the example
     * 
     * @param $date
     * 
     */
    public function setPaymentDateAttribute($date)
    {
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['payment_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['payment_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}    	
    }

    /**
     * relation
     *
     * @return relation
     */
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function rental(){
        return $this->belongsTo('App\Rental');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function staff(){
        return $this->belongsTo('App\Staff');
    }
}
