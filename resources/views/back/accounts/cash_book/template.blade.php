@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection


@section('main')

          <!-- employee form -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             
           @yield('form-open')
           
            {{ csrf_field() }}

               <div class="box-body">                
                {!!Form::hidden('id', 'secret', array('id' => 'id')) !!}
               
                <div class="col-md-8"> 
                 {!! Form::label('trans_type', 'Transaction Type') !!}
                 {!! Form::select('trans_type', $transtype_lists,isset($cash_book)?$cash_book->trans_type:null, [
                 'class'                        => 'form-control trans_type',
                 'required'                     => 'required' 
                 ]) !!}  
                </div>    
                <div class="clearfix"></div> 

                <div class="col-md-8">                    
                 {!! Form::label('voucherno', 'Voucher No.') !!}        
                 {!! Form::text('voucherno', isset($cash_book)?$cash_book->voucherno:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!} 
                 </div>

                <div class="col-md-4"> 
                 {!! Form::label('accountdate', 'Date') !!}    
                 {!! Form::date('accountdate', isset($cash_book)?$cash_book->accountdate:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required' 
                 ]) !!}  
                </div>  

                <div class="col-md-8"> 
                 {!! Form::label('amount', 'Amount') !!}   
                 {!! Form::text('amount', isset($cash_book)?$cash_book->amount:'0.00', [
                 'class'                        => 'form-control',
                 'numeric'                      => 'true',
                 'style'                        => 'text-align: right',
                 'maxlength'                    => 16,
                 'onkeypress'                   => "return isNumberKey(event);"
                 ]) !!}  
                </div> 

                <div class="col-md-4">  
                 {!! Form::label('currency', 'Currency') !!}
                 {!! Form::select('currency_code', $currency_list,isset($cash_book)?$cash_book->currency_code:'INR', [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!} 
                </div> 


                <div class="col-md-12">
                 {!! Form::label('account_party', 'Pay To/By', [
                 'id'                           => 'account_party'
                 ]) !!}
                </div>    

                <div class="col-md-8"> 
                 <div class="account_ledgers">    
                 {!! Form::select('account_ledeger_id', $account_ledger_lists,isset($cash_book)?$cash_book->account_party_id:null, [
                 'class'                        => 'form-control'
                 ]) !!} 
                 </div>

                 <div class="parties">               
                 {!! Form::select('party_id', $partyAcc_lists,isset($cash_book)?$cash_book->account_party_id:null, [
                 'class'                        => 'form-control'
                 ]) !!}
                 </div>

                </div>              

                <div class="col-md-4">                 
                 {!! Form::checkbox('account_party_type', isset($cash_book)?$cash_book->account_party_type:'P', (isset($cash_book) && $cash_book->account_party_type == 'A')?True:False,[
                     'class'                        => 'field account_party_type',
                 ]) !!}                 
                 {!! Form::label('account_party_type', 'Account') !!}     
                </div>
               
                          
                <div class="col-md-12"> 
                 {!! Form::label('cashaccount_id', 'Cash Account') !!}
                 {!! Form::select('cashaccount_id', $account_ledgerCashAcc_lists,isset($cash_book)?$cash_book->cashaccount_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!} 
                </div>
             
                <div class="col-md-12"> 
                 {!! Form::label('narration', 'Narration') !!}
                 {!! Form::textarea('narration', isset($cash_book)?$cash_book->narration:null, [
                 'class'                        => 'form-control',
                 'size'                         => '30x5'
                 ]) !!}                               
                </div>    
              
              
                </div>
              
                <div class="box-footer">     
                 {!! Form::submit('Submit', [ 
                 'class'                        => 'btn btn-primary validate'
                 ]) !!}   
                </div>

            {!! Form::close() !!}


          </div>
        </div>
        </div>
   
@endsection

@section('js')

    <script src="{{ asset('adminlte/plugins/voca/voca.min.js') }}"></script>
     
    <script type="text/javascript" src="/js/cash_book.js"></script>   
    
@endsection


