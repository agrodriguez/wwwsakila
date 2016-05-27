<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='inventory_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
    	'film_id',
    	'store_id'
    ];

    protected $dates = [
    	'last_update'
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
     * relation
     *
     * @return relation
     */
    public function film(){
        return $this->belongsTo('App\Film');
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
    public function rentals(){
        return $this->hasMany('App\Rental');
    }

    
}
