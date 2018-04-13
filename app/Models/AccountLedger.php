<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\ {
    ModelCreated
};

class AccountLedger extends Model {

    use SoftDeletes;
    use IngoingTrait;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    
    protected $fillable = [
        'group_id','subgroup_id','account_code','account_name','currency_code',
        'opening_bal','openingbal_type'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'account_code';
    }

    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function account_groups()
    {
        return $this->hasOne(AccountGroup::class,'id','group_id');       
    }

    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function account_subgroups()
    {
        return $this->hasOne(AccountSubgroup::class,'id','subgroup_id');       
    }
    
}


