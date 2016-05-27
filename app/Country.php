<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='country_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['country'];

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
    public function Cities(){
    	return $this->hasMany('App\City');
    }
}
