<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\ {
    ModelCreated
};

class CashBook extends Model 
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

    protected $dates = ['accountdate' 
    ]; 

	/**
    * The attributes that are mass assignable.
    *
    * @var array
    */
 	
    protected $fillable = [
        'trans_type','voucherno','accountdate','currency_code','amount','account_party_type',
        'account_party_id','cashaccount_id','narration'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return request()->segment(1) === 'admin' ? 'id' : 'voucherno';
	}

	/**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
	public function transactiontypes()
	{
		return $this->hasOne(TransactionType::class,'code','trans_type')
                    ->where('trans_type_of','CSH');		
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
	public function parties_account()
	{
		return $this->hasOne(Party::class,'id','account_party_id');
	}	

    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function accountledgers_account()
    {
        return $this->hasOne(AccountLedger::class,'id','account_party_id');
    }   
    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function accountledgers()
    {
        return $this->hasOne(AccountLedger::class,'id','cashaccount_id')
                    ->where('subgroup_id','_CSH_') ;     
    }
    
}


