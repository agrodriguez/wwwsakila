<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';
    protected $primaryKey ='customer_id';
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

    public function setLastUpdateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if($myDate > Carbon::now()){
            $this->attributes['last_update'] =  Carbon::parse($date);
        }else{
            $this->attributes['last_update'] =  Carbon::createFromFormat('Y-m-d', $date);  
        }       
    }

    public function setCreateDateAttribute($date)
    {
    	$myDate = Carbon::createFromFormat('Y-m-d', $date);
    	if($myDate > Carbon::now()){
    		$this->attributes['create_date'] =  Carbon::parse($date);
    	}else{
    		$this->attributes['create_date'] =  Carbon::createFromFormat('Y-m-d', $date);	
    	}
    }

    public function setActiveAttribute ($value)
    {
        $this->attributes['active'] = $value? 1 : 0;
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function store(){
        return $this->belongsTo('App\Store');
    }

    public function payments(){
    	return $this->hasMany('App\Payment');
    }

    public function rentals(){
    	return $this->hasMany('App\Rental');
    }


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/    
     public function getBalance(){
        $queryString='select get_customer_balance('.$this->customer_id.',NOW()) as ammount;';
        
        $ammount=\DB::select($queryString);
        return $ammount[0]->ammount;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
