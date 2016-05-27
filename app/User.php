<?php
/** CHANGE THE DEFAULT USER TABLE TO STAFF TABLE USING THIS MODEL AS USER LOGIN*/
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

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
     * The attributes that are mass assignable.
     *
     * @var array
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
    * Overrides the method to ignore the remember token.
    */    
    public function getRememberToken()
    {
        return null; // not supported
    }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function setRememberToken($value)
    {
        // not supported
    }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function getRememberTokenName()
    {
        return null; // not supported
    }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
           parent::setAttribute($key, $value);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * user has the same relations as staff
     *
     * @var string
     **/

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
     * return the full store name
     *
     * @return string
     * @author 
     **/
    public function getStoreName()
    {
        return $this->store->address->city->city.', '.$this->store->address->city->country->country;
    }
    
}
