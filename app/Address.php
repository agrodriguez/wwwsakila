<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey ='address_id';
    public $timestamps = false;

    protected $fillable = [
		'address',
		'address2',
		'district',
		'city_id',
		'postal_code',
		'phone',
        'location'
    ];

    protected $dates = [
    	'last_update'
    ];

    protected $geofields = ['location'];


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
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
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function setLocationAttribute ($value)
    {
            $value=empty($value)?'0,0':$value;
            $this->attributes['location'] = DB::raw("POINT($value)") ;
    }

    /**
     * 
     **/
    public function getLocationAttribute($value){
 
        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ', ', $loc, 1);
 
        return substr($loc,0,-1);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach($this->geofields as $column){
            $raw .= ' astext('.$column.') as '.$column.' ';
        }
 
        return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
    }


    public function city(){
        return $this->belongsTo('App\City');
    }

    public function customer(){
    	return $this->hasOne('App\Customer');
    }

    public function staff(){
        return $this->hasOne('App\Staff');
    }

    /**
     * get the city name
     *
     * @return city
     * @author 
     **/
    public function getCity()
    {
        return $this->city->city;
    }

    /**
     * get the country name
     *
     * @return void
     * @author 
     **/
    public function getCountry ()
    {
        return $this->city->country->country;
    }
}
