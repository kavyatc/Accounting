<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model {

    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    
    protected $fillable = [
        'city_code','city_name'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'city_code';
    }
    
}


