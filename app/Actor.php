<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    
    protected $table = 'actor';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='actor_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name'
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
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function films(){
    	return $this->belongsToMany('App\Film','film_actor', 'actor_id', 'film_id');
    }

}
