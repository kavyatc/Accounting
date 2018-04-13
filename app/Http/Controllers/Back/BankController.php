<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\BankRequest,
    Models\Bank
};

class BankController extends Controller
{
    /**
     * Display a listing of the bank.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $bankdetails = Bank::get();      
        
        
        return view('back.master.bank.index', compact('bankdetails'));
    }

    /**
     * Show the form for creating a new bank.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {             

        return view('back.master.bank.index');
    }

    /**
     * Store a newly created bank in storage.
     *
     * @param  \App\Http\Requests\BankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {       
       
        Bank::create($request->all());      
        
        return redirect(route('bank.index'))->with('bank-ok', __('The bank has been successfully created'));
    }

    /**
     * Show the form for editing the specified bank.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        $bankdetails = Bank::get(); 
      
        return view('back.master.bank.index', compact('bankdetails','bank'));
    }

    /**
     * Update the specified bank in storage.
     * @param  \App\Http\Requests\BankRequest  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, Bank $bank)
    {
        // dd($bank->id);
        $bank->update($request->all());   

        return redirect(route('bank.index'))->with('bank-ok', __('The bank has been successfully updated'));
    }

    /**
     * Remove the specified bank from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */


    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response ()->json ();
    }
}
