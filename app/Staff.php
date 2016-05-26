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
    protected $primaryKey ='staff_id';
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
     * set the last updated field
     *
     *  @var $date
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
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function setActiveAttribute ($value)
    {
        $this->attributes['active'] = $value? 1 : 0;
    }

    /**
     * define the address relationship
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * define the store relationship
     */
    public function store(){
        return $this->belongsTo(Store::class);
    }

    /**
     * define the rentals relationship
     */
    public function rentals(){
    	return $this->hasMany(Rental::class);
    }

    /**
     * define the payments relationship
     */
    public function payments(){
    	return $this->hasMany(Payment::class);
    }

    /**
     * define the manages relationship
     */
    public function manages(){
        return $this->hasOne(Store::class,'manager_staff_id','staff_id');
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

