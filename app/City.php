<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'city';
    protected $primaryKey ='city_id';
    public $timestamps = false;

    protected $fillable = ['city', 'country_id'];

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

    public function Addresses(){
    	return $this->hasMany('App\Address');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
