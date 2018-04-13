<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AccountSubgroup extends Model {

    use SoftDeletes;
    protected $table = 'account_subgroups';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    
    protected $fillable = [
        'group_id','subgroup_code','subgroup_name'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'subgroup_code';
    }
    

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function account_groups() 
    {
    return $this->belongsTo(AccountGroup::class, 'group_id');
    }



}


