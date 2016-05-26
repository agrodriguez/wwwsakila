<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    protected $table = 'actor';
    protected $primaryKey ='actor_id';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

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

    public function films(){
    	return $this->belongsToMany('App\Film','film_actor', 'actor_id', 'film_id');
    }

}
