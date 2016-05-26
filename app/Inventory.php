<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';
    protected $primaryKey ='inventory_id';
    public $timestamps = false;

    protected $fillable = [
    	'film_id',
    	'store_id'
    ];

    protected $dates = [
    	'last_update'
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


    public function film(){
        return $this->belongsTo('App\Film');
    }

    public function store(){
        return $this->belongsTo('App\Store');
    }

    public function rentals(){
        return $this->hasMany('App\Rental');
    }

    
}
