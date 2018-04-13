<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CurrencyRequest,
    Models\Currency
};

class CurrencyController extends Controller
{
    /**
     * Display a listing of the currency.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $currencydetails = Currency::get();      
        
        
        return view('back.master.currency.index', compact('currencydetails'));
    }

    /**
     * Show the form for creating a new currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {             

        return view('back.master.currency.index');
    }

    /**
     * Store a newly created currency in storage.
     *
     * @param  \App\Http\Requests\CurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {       
       
        Currency::create($request->all());      
        
        return redirect(route('currency.index'))->with('currency-ok', __('The currency has been successfully created'));
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        $currencydetails = Currency::get(); 
      
        return view('back.master.currency.index', compact('currencydetails','currency'));
    }

    /**
     * Update the specified currency in storage.
     * @param  \App\Http\Requests\CurrencyRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        // dd($currency->id);
        $currency->update($request->all());   

        return redirect(route('currency.index'))->with('currency-ok', __('The currency has been successfully updated'));
    }

    /**
     * Remove the specified currency from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */


    public function destroy(Currency $currency)
    {
        $currency->delete();
        return response ()->json ();
    }
}
