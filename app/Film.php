<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Film extends Model
{
    //
    protected $table = 'film';
    protected $primaryKey ='film_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];

    protected $dates = [
    	'last_update'
    ];

    /**
     * Set the last update date attribute
     *
     * @param  $date
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

    public function inventories(){
        return $this->hasMany('App\Inventory');
    }

    public function categories(){
    	return $this->belongsToMany('App\Category','film_category', 'film_id', 'category_id');
    }

    public function actors(){
        return $this->belongsToMany('App\Actor','film_actor', 'film_id', 'actor_id');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function originalLanguage(){
        return $this->belongsTo('App\Language','original_language_id','language_id');
    }

    public function getCategoryListAttribute(){
        return $this->categories->lists('category_id')->all();
    }

    public function getActorListAttribute(){
        return $this->actors->lists('actor_id')->all();
    }

    public function setSpecialFeaturesAttribute($array)
    {
        $this->attributes['special_features'] =  implode(',', $array); 
    }

    public function getSpecialFeaturesAttribute(){
        return explode(',', $this->attributes['special_features']) ;
    }

    //rating = ENUM('G', 'PG', 'PG-13', 'R', 'NC-17')
    //special_features SET('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind the Scenes')

}
