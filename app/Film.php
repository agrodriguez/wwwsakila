<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Film extends Model
{
    //
    protected $table = 'film';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='film_id';

    /**
     * set timestaps to false
     * @var boolean
     */
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

    /**
     * relation
     *
     * @return relation
     */
    public function inventories(){
        return $this->hasMany('App\Inventory');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function categories(){
    	return $this->belongsToMany('App\Category','film_category', 'film_id', 'category_id');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function actors(){
        return $this->belongsToMany('App\Actor','film_actor', 'film_id', 'actor_id');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function language(){
        return $this->belongsTo('App\Language');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function originalLanguage(){
        return $this->belongsTo('App\Language','original_language_id','language_id');
    }

    
    /**
     * get the relation in list form
     * 
     * @return array
     */
    public function getCategoryListAttribute(){
        return $this->categories->lists('category_id')->all();
    }

    /**
     * get the relation in list form
     * 
     * @return array
     */
    public function getActorListAttribute(){
        return $this->actors->lists('actor_id')->all();
    }

    /**
     * set the set field as implided array
     * 
     * @return void
     */
    public function setSpecialFeaturesAttribute($array)
    {
        $this->attributes['special_features'] =  implode(',', $array); 
    }

    /**
     * get the relation in list form as exploded array
     * 
     * @return array
     */
    public function getSpecialFeaturesAttribute(){
        return explode(',', $this->attributes['special_features']) ;
    }

    //rating = ENUM('G', 'PG', 'PG-13', 'R', 'NC-17')
    //special_features SET('Trailers', 'Commentaries', 'Deleted Scenes', 'Behind the Scenes')

}
