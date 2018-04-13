<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\AccountLedgerRequest,
    Models\AccountLedger,
    Models\AccountGroup,
    Models\AccountSubgroup,
};

class AccountLedgerController extends Controller
{
    /**
     * Display a listing of the account ledger.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                   
       $treeView = AccountGroup::with(['account_subgroups'])->get();

       $account_ledgerdetails = AccountLedger::get();  
     
      return view('back.accounts.account_ledger.index', compact('account_ledgerdetails'
            ,'treeView'));
    }

    /**
     * Show the form for creating a new account ledger.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {             

        return view('back.accounts.account_ledger.index');
    }

    /**
     * Store a newly created account ledger in storage.
     *
     * @param  \App\Http\Requests\AccountLedgerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountLedgerRequest $request)
    {       
       
        AccountLedger::create($request->all());      
        
        return redirect(route('account_ledger.index'))->with('account_ledger-ok', __('The account ledger has been successfully created'));
    }

    /**
     * Show the form for editing the specified account ledger.
     *
     * @param  \App\Models\AccountLedger  $account_ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountLedger $account_ledger)
    {
       
      
        return view('back.accounts.account_ledger.index', compact('account_ledgerdetails','account_ledger'));
    }

    /**
     * Update the specified account ledger in storage.
     * @param  \App\Http\Requests\AccountLedgerRequest  $request
     * @param  \App\Models\AccountLedger  $account_ledger
     * @return \Illuminate\Http\Response
     */
    public function update(AccountLedgerRequest $request, AccountLedger $account_ledger)
    {
        
        $account_ledger->update($request->all());   

        return redirect(route('account_ledger.index'))->with('account_ledger-ok', __('The account ledger has been successfully updated'));
    }

    /**
     * Remove the specified account ledger from storage.
     *
     * @param  \App\Models\AccountLedger  $account_ledger
     * @return \Illuminate\Http\Response
     */


    public function destroy(AccountLedger $account_ledger)
    {
        $account_ledger->delete();
        return response ()->json ();
    }
}
