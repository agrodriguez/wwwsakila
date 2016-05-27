<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'city';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='city_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['city', 'country_id'];

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
    public function Addresses(){
    	return $this->hasMany('App\Address');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function country(){
        return $this->belongsTo('App\Country');
    }
}
