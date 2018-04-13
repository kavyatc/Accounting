<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
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

        $account_ledger_lists = AccountLedger::where('subgroup_id','_CSH_')
                                          ->pluck('account_name','id');


       if (!$request->all())
       {
         $cash_bookdetails = CashBook::get();
       }
       else
       {
        $accstartdate = date('d-m-Y',strtotime('first day of this month'));

       /* $opening_balance = CashBook::select('amount AS openbalamt')
                                     ->Where('cashaccount_id',$request->account_ledeger_id)
                                     ->whereDate('accountdate', '>=', .date($accstartdate))
                                     ->whereDate('accountdate', '<', $request->fromdate)
                                     ->get();  */

                                     /*"2018-04-12"*/
        dd($request->fromdate);

         $cash_bookdetails = CashBook::Where('cashaccount_id',$request->account_ledeger_id)
                                      ->whereDate('accountdate', '>=', $request->fromdate)
                                      ->whereDate('accountdate', '<=', $request->todate)
                                      ->get(); 
        
       }

      
       /*dd($request->all());*/
       /* $cash_bookdetails = CashBook::get();  */

       

      /*  $opening_balance = CashBook::
            select(
                   '"" AS voucherno '
                  ,'now() AS accountdate'
                  ,'trans_type AS trans_type'
                  ,'Opening Balance AS details'
                  ,'currency_code AS currency_code'
                  ,'amount AS recieptamt'
                  ,'amount AS payamt'
                  ,'amount AS balance'
                  ,'balancetype = Case when isnull(SUM(amount),0) < 0 then "Cr" else "Dr" end'
                  )->get(); */


       /* dd($opening_balance);*/



        return view('back.accounts.cash_book.index', compact('cash_bookdetails','account_ledger_lists'));
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
        $account_ledgerCashAcc_lists = AccountLedger::where('trans_type_of','CSH')
                                          ->pluck('subgroup_id','_CSH_');

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
       /* dd($request->all());*/

        $voucherno= 10000;
        $cash_book_info = CashBook::orderby('id','desc')->max();

        if (!$cash_book_info){
            $voucherno = $voucherno;           
        }else{
            $voucherno = $voucherno+$cash_book_info->id;           
        }
        $voucherno= 'CSH'.$voucherno;

        $request['voucherno'] = $voucherno;  
        
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
