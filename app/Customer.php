<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='customer_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
    	'store_id',
		'first_name',
		'last_name',
		'email',
		'address_id',
		'active',
    ];

    protected $dates = [
    	'last_update',
        'create_date'
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
    public function setCreateDateAttribute($date)
    {
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['create_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['create_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}
    }

    /**
     * set the active attribute
     *
     * @return void
     */
    public function setActiveAttribute ($value)
    {
        $this->attributes['active'] = $value? 1 : 0;
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function store(){
        return $this->belongsTo('App\Store');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function payments(){
    	return $this->hasMany('App\Payment');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function rentals(){
    	return $this->hasMany('App\Rental');
    }


    /**
     * get the balance for the customer
     *
     * @return decimal
     **/    
     public function getBalance(){
        $queryString='select get_customer_balance('.$this->customer_id.',NOW()) as ammount;';        
        $ammount=\DB::select($queryString);
        return $ammount[0]->ammount;
    }

    /**
     * get the full name of the customer
     *
     * @return string
     **/
    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
