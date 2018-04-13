<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\PartyRequest,
    Models\Party,
    Models\Currency,
    Models\PartyType,
    Models\City
};


class PartyController extends Controller
{
    /**
     * Display a listing of the party.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        $partydetails = Party::get();      
        
                 
       
        return view('back.party.index', compact('partydetails'));
    }

    /**
     * Show the form for creating a new party.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $party_code= 10000;
        $party_info = Party::orderby('id','desc')->first();

        if (!$party_info){
            $party_code = $party_code;           
        }else{
            $party_code = $party_code+$party_info->id;           
        }
        $party_code= 'PRTYM'.$party_code;

        


        $partytype_lists = PartyType::pluck('party_type','party_type_id');
        $city_lists = City::pluck('city_name','id');
        $currency_list = Currency::pluck('currency_code','currency_code');
        
        return view('back.party.create',compact('city_lists','partytype_lists','currency_list',
                                                'party_code'));
    }

    /**
     * Store a newly created party in storage.
     *
     * @param  \App\Http\Requests\PartyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartyRequest $request)
    { 
       
        $party_type_ids = "";
        
        foreach ($request->party_type as $key => $value) {           
            if($party_type_ids==""){
                $party_type_ids = $value;
            }else{
                $party_type_ids = $party_type_ids . "," . $value;
            }
        }
        $request['party_type'] = $party_type_ids;   
        $request['openingbal_type'] = $request->balance_type; 

       /* dd($request->all());      */
    
     
        Party::create($request->all());      
        
        return redirect(route('party.index'))->with('party-ok', __('The party has been successfully created'));
    }

    /**
     * Show the form for editing the specified party.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {            
       
      

        $partytype_lists = PartyType::pluck('party_type','party_type_id');
        $city_lists = City::pluck('city_name','id');
        $currency_list = Currency::pluck('currency_code','currency_code');

        $party_type_ids = explode(',', $party->party_type);


        return view('back.party.edit', compact('party','partytype_lists','city_lists',
            'currency_list','party_type_ids'));
    }

    /**
     * Update the specified party in storage.
     *
     * @param  \App\Http\Requests\PartyRequest  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(PartyRequest $request, Party $party)
    {
       /* dd($request->all());*/

        $party_type_ids = "";
        
        foreach ($request->party_type as $key => $value) {           
            if($party_type_ids==""){
                $party_type_ids = $value;
            }else{
                $party_type_ids = $party_type_ids . "," . $value;
            }
        }
        $request['party_type'] = $party_type_ids;   
        $request['openingbal_type'] = $request->balance_type; 
        
        $party->update($request->all());   

        return redirect(route('party.index'))->with('party-ok', __('The party has been successfully updated'));
    }

    /**
     * Remove the specified party from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */


    public function destroy(Party $party)
    {
        $party->delete();
        return response ()->json ();
    }

}
