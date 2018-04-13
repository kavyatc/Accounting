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
                 {!! Form::label('party_code', 'Code') !!}        
                 {!! Form::text('party_code', isset($party)?$party->party_code:$party_code, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!} 



                 {!! Form::label('party_name', 'Name') !!}
                 {!! Form::text('party_name', isset($party)?$party->party_name:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' ,
                 'autofocus'                    => 'autofocus',
                 'maxlength'                    => 50
                 ]) !!}  
                 {!! $errors->first('party_name', '<small class="help-block" style="color:red">:message</small>') !!} 

                </div>
                                 
                <div class="col-md-4"> 
                    {!! Form::label('party_type', 'Party Type') !!}

                  
                <div class="checkboxcontainer ">  
                   
                     @if(isset($party))

                        @foreach($partytype_lists as $id => $party_type)

                        <?php  $party_type_exists = 'N';  ?>

                          <div class="checkbox">
                          <label class="form-checkbox form-normal form-green form-text">
                           @foreach($party_type_ids as $party_type_id)
                            @if($id==$party_type_id)                                 
                                <?php $party_type_exists = 'Y'; ?>
                                @break;
                            @endif
                           @endforeach
                           
                           @if($party_type_exists=='Y')
                               {!! Form::checkbox("party_type[]", $id, true) !!} {{$party_type}}
                           @else
                               {!! Form::checkbox("party_type[]", $id, false) !!} {{$party_type}}
                           @endif        

                          </label>
                          </div>
                        @endforeach 


                     @else

                        @foreach($partytype_lists as $id => $party_type)
                         <div class="checkbox">
                         <label class="form-checkbox form-normal form-green form-text">
                            {!! Form::checkbox("party_type[]", $id, [
                            ]) !!} {{$party_type}}
                         </label>
                         </div>
                         @endforeach 
                           
                        @endif
                   


                </div> 
                </div>        

                <div class="col-md-12"> 
                 {!! Form::label('address', 'Address') !!}
                 {!! Form::textarea('address', isset($party)?$party->address:null, [
                 'class'                        => 'form-control',
                 'size'                         => '30x5',
                 'maxlength'                    => 1000
                 ]) !!}                               
                </div>
                <div class="clearfix"></div> 

                <div class="col-md-12"> 
                {!!Form::label('email','Email address')!!}
                {!! Form::email('email', isset($party)?$party->email:null, [
                 'class'                         => 'form-control',
                 'placeholder'                   => 'Email address',
                 'id'                            => 'email',
                 'maxlength'                     => 50
                ]) !!}      
                </div>
                
                <div class="col-md-6"> 
                 {!! Form::label('city', 'City') !!}
                 {!! Form::select('city_id', $city_lists,isset($party)?$party->city_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}    
                 </div> 
                 {!! $errors->first('city_id', '<small class="help-block" style="color:red">:message</small>') !!} 

                 <div class="col-md-6">   
                 {!! Form::label('currency', 'Currency') !!}
                 {!! Form::select('currency_code', $currency_list,isset($party)?$party->currency_code:'INR', [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}                 
                </div>   
                {!! $errors->first('currency_code', '<small class="help-block" style="color:red">:message</small>') !!} 


                <div class="col-md-12">  
                 {!! Form::label('opening_bal', 'Opening Balance') !!}
                </div>
                <div class="col-md-6">      
                
                 {!! Form::text('opening_bal', isset($party)?$party->opening_bal:'0.00', [
                 'class'                        => 'form-control',
                 'numeric'                      => 'true',
                 'style'                        => 'text-align: right',
                 'maxlength'                    => 16,
                 'onkeypress'                   => "return isNumberKey(event);"
                 ]) !!}  
                </div>
               
                <div class="col-md-2">      
                {!! Form::radio('balance_type', 'Dr',(isset($party) && $party->openingbal_type == 'Dr')?True:False,[
                     'class'                        => 'radio-inline '
                 ]) !!} 
                <span style='color:red'>{!! Form::label('openingbal_type', 'Dr') !!}</span>

                {!! Form::radio('balance_type', 'Cr',(isset($party) &&$party->openingbal_type == 'Cr')?True:False,[
                     'class'                        => 'radio-inline'
                 ]) !!} 
                <span style='color:red'>{!! Form::label('openingbal_type', 'Cr') !!}</span>
                </div>
                 {!! $errors->first('balance_type', '<small class="help-block" style="color:red">:message</small>') !!} 


                <div class="col-md-12"> 
                 {!! Form::label('remarks', 'Remarks') !!}
                 {!! Form::textarea('remarks', isset($party)?$party->remarks:null, [
                 'class'                        => 'form-control'
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
     
    <script type="text/javascript" src="/js/party.js"></script>   
    
@endsection


