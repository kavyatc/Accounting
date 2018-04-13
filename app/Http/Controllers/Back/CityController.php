<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CityRequest,
    Models\City
};

class CityController extends Controller
{
    /**
     * Display a listing of the city.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $citydetails = City::get();      
        
        
        return view('back.master.city.index', compact('citydetails'));
    }

    /**
     * Show the form for creating a new city.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {             

        return view('back.master.city.index');
    }

    /**
     * Store a newly created city in storage.
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {       
       
        City::create($request->all());      
        
        return redirect(route('city.index'))->with('city-ok', __('The city has been successfully created'));
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $citydetails = City::get(); 
      
        return view('back.master.city.index', compact('citydetails','city'));
    }

    /**
     * Update the specified city in storage.city
     * @param  \App\Http\Requests\CityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        // dd($city->id);
        $city->update($request->all());   

        return redirect(route('city.index'))->with('city-ok', __('The city has been successfully updated'));
    }

    /**
     * Remove the specified city from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */


    public function destroy(City $city)
    {
        $city->delete();
        return response ()->json ();
    }
}
