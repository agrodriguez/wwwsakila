<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = 'store';
    protected $primaryKey ='store_id';
    public $timestamps = false;

    protected $fillable = ['manager_staff_id'];

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

    public function address(){
        return $this->belongsTo('App\Address');
    }

    public function manager(){
        return $this->belongsTo('App\Staff','staff_id', 'manager_staff_id');
    }

    public function inventories(){
        return $this->hasMany('App\Inventory');
    }

    public function getStoreName()
    {
        return $this->address->city->city.', '.$this->address->city->country->country;
    }

}
