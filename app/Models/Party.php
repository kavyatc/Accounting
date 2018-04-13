<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\ {
    ModelCreated
};

class Party extends Model 
{

	use SoftDeletes;	
	use IngoingTrait;


    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];

	/**
    * The attributes that are mass assignable.
    *
    * @var array
    */
 	
    protected $fillable = [
        'party_code','party_name','party_type','address','email','city_id',
        'currency_code','opening_bal','openingbal_type','remarks'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return request()->segment(1) === 'admin' ? 'id' : 'party_name';
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function partytypes()
	{
		return $this->hasOne(PartyType::class,'party_type_id','city_id');		
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function currencies()
	{
		return $this->hasOne(Currency::class,'currency_code','currency_code');		
	}
	
	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function cities()
	{
		return $this->hasOne(City::class,'id','city_id');		
	}
	
}


