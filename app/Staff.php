<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * override default table name, index field
     * and timestaps to 
     * for use with the database AS IS
     */
    protected $table = 'staff';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='staff_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    /**
     * defina fillable fields
     */
    protected $fillable = [
		'first_name',
		'last_name',
		'address_id',
		'email',
		'store_id',
		'active',
		'username',
		'password',
        'picture',
    ];

    /**
     * define the dates fields
     */
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
     * set the active attribute
     *
     * @return void
     * @author 
     **/
    public function setActiveAttribute ($value)
    {
        $this->attributes['active'] = $value? 1 : 0;
    }

    /**
     * relation
     *
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
        return $this->belongsTo(Store::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function rentals(){
    	return $this->hasMany(Rental::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function payments(){
    	return $this->hasMany(Payment::class);
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function manages(){
        return $this->hasOne(Store::class,'manager_staff_id','staff_id');
    }

    /**
     * get the full name
     *
     * @return string
     **/
    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

}

