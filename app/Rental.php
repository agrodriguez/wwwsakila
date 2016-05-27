<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //
    protected $table = 'rental';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='rental_id';

    /**
     * set timestaps to false
     * @var boolean
     */
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
    public function setRentalDateAttribute($date)
    {   	
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['rental_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['rental_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}
    }

    /**
     * override the set date attribute
     * as per the example
     * 
     * @param $date
     * 
     */
    public function setReturnDateAttribute($date)
    {   	
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['return_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['return_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
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
    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function staff(){
        return $this->belongsTo('App\Staff');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function payments(){
        return $this->hasMany('App\Payment');
    }

}
