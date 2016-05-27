<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Address extends Model
{
    protected $table = 'address';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='address_id';

    /**
     * set timestaps to false
     * @var boolean
     */
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

    /**
     * location is a point geofild to store the lat-long 
     * @var array
     */
    protected $geofields = ['location'];


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
     * override the set location attribute
     *
     * @param POINT $value 
     * @return void
     **/
    public function setLocationAttribute ($value)
    {
            $value=empty($value)?'0,0':$value;
            $this->attributes['location'] = DB::raw("POINT($value)") ;
    }

    /**
     *  get tke location value as string
     * 
     * @param  POINT $value
     * @return string
     */
    public function getLocationAttribute($value){
 
        $loc = substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ', ', $loc, 1);
 
        return substr($loc,0,-1);
    }

    /**
     * query database geofields
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

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function city(){
        return $this->belongsTo('App\City');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function customer(){
    	return $this->hasOne('App\Customer');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function staff(){
        return $this->hasOne('App\Staff');
    }

    /**
     * get the city name
     *
     * @return String
     **/
    public function getCity()
    {
        return $this->city->city;
    }

    /**
     * get the country name
     *
     * @return String
     **/
    public function getCountry ()
    {
        return $this->city->country->country;
    }
}
