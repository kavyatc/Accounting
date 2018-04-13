<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccountGroup extends Model {

    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    
    protected $fillable = [
        'group_code','group_name','nature_of_group_id'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'group_code';
    }
    
    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function account_subgroups()
    {
        return $this->hasMany(AccountSubgroup::class,'group_id');       
    }
}


