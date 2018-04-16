<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\CashBookRequest,
    Models\CashBook,
    Models\TransactionType,
    Models\Currency,
    Models\Party,
    Models\AccountLedger
};


class CashBookController extends Controller
{
    /**
     * Display a listing of the cash book.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     

      $cash_bookdetails = CashBook::get();
             
      /*dd( $cash_bookdetails);*/
      return view('back.accounts.cash_book.index', compact('cash_bookdetails'));
             
    }

    /**
     * Show the form for creating a new cash_book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $transtype_lists = TransactionType::where('trans_type_of','CSH')
                                          ->pluck('trans_type','code');

        $currency_list = Currency::pluck('currency_code','currency_code');
        $partyAcc_lists = Party::pluck('party_name','id');
        $account_ledger_lists = AccountLedger::pluck('account_name','id');


        $account_ledgerCashAcc_lists = AccountLedger::where('subgroup_id','_CSH_')
                                          ->pluck('account_name','id');

        
        return view('back.accounts.cash_book.create',compact('transtype_lists','currency_list',
                                                'partyAcc_lists','account_ledger_lists',
                                                'account_ledgerCashAcc_lists'));
    }

    /**
     * Store a newly created cash book in storage.
     *
     * @param  \App\Http\Requests\CashBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashBookRequest $request)
    { 
               
        $voucherno= 1000000;
        $max_id = CashBook::orderby('id','desc')->max('id');

      
        if (!$max_id){
            $voucherno = $voucherno;           
        }else{
            $voucherno = $voucherno + $max_id;;           
        }
        $voucherno= $request['trans_type'].$voucherno;
        $request['voucherno'] = $voucherno; 


        $party_account_id = "";
        
        if (is_null($request['account_party_type'])) 
        {
            $request['account_party_type'] = 'N';
            $request['account_party_type'] ="P"; 
            $party_account_id = $request['party_id'];
        }              
        else
        {
            $request['account_party_type'] = 'Y';
            $request['account_party_type'] ="A"; 
            $party_account_id = $request['account_ledeger_id'];
        }    
        
        CashBook::create(['trans_type'=>$request->trans_type,
                         'voucherno'=>$request->voucherno,
                         'accountdate'=>$request->accountdate,
                         'currency_code'=>$request->currency_code,
                         'amount'=>$request->amount,
                         'account_party_type'=>$request->account_party_type,
                         'account_party_id'=>$party_account_id,
                         'cashaccount_id'=>$request->cashaccount_id,
                         'narration'=>$request->narration
                          ]);      
        
        return redirect(route('cash_book.index'))->with('cash_book-ok', __('The cash book has been successfully created'));
    }

    /**
     * Show the form for editing the specified cash book.
     *
     * @param  \App\Models\CashBook  $cash_book
     * @return \Illuminate\Http\Response
     */
    public function edit(CashBook $cash_book)
    {            
       
        $transtype_lists = TransactionType::where('trans_type_of','CSH')
                                          ->pluck('trans_type','code');
        $currency_list = Currency::pluck('currency_code','currency_code');
        $partyAcc_lists = Party::pluck('party_name','id');
        $account_ledger_lists = AccountLedger::pluck('account_name','id');
        $account_ledgerCashAcc_lists = AccountLedger::where('subgroup_id','_CSH_')
                                          ->pluck('account_name','id');

      

        return view('back.accounts.cash_book.edit', compact('cash_book','transtype_lists',
                                                   'currency_list','partyAcc_lists',
                                                   'account_ledger_lists',
                                                   'account_ledgerCashAcc_lists'));
    }

    /**
     * Update the specified cash book in storage.
     *
     * @param  \App\Http\Requests\CashBookRequest  $request
     * @param  \App\Models\CashBook  $cash_book
     * @return \Illuminate\Http\Response
     */
    public function update(CashBookRequest $request, CashBook $cash_book)
    {
      
      $party_account_id = "";
        
        if (is_null($request['account_party_type'])) 
        {
            $request['account_party_type'] = 'N';
            $request['account_party_type'] ="P"; 
            $party_account_id = $request['party_id'];
        }              
        else
        {
            $request['account_party_type'] = 'Y';
            $request['account_party_type'] ="A"; 
            $party_account_id = $request['account_ledeger_id'];
        }  
       

        
        $cash_book->update($request->all());   


        return redirect(route('cash_book.index'))->with('cash_book-ok', __('The cash book has been successfully updated'));
    }

    /**
     * Remove the specified cash_book from storage.
     *
     * @param  \App\Models\CashBook  $cash_book
     * @return \Illuminate\Http\Response
     */


    public function destroy(CashBook $cash_book)
    {
        $cash_book->delete();
        return response ()->json ();
    }

}
