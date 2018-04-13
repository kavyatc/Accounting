
        @section('content')
@if (isset($navigations)) 

      @foreach ($navigations as $navigation)

        @if($navigation->type == 1)
         <li class="{{ $navigation->classL }}">{{  $navigation->main_Header }}</li>
        @elseif($navigation->type == 2)
         <li class="treeview">
            <a href="{{ $navigation->link }}">
                <i class="{{ $navigation->classL }}"></i> <span>{{ $navigation->title }}</span>
                <i class="{{ $navigation->classR }}"></i>
            </a>
        </li>
        @elseif($navigation->type == 3)
        <ul class="treeview-menu">
             <li><a href="{{ $navigation->link }}"><i class="{{ $navigation->classR }}"></i>{{ $navigation->title }}</a></li>
        </ul>
    @endif
@endsection 


 @foreach($treeView as $account_group)

                  <li class="treeview">  
                  <a href="#"><i class="fa fa-fw fa-folder"></i> <span>{{ $account_group->group_name }}</span>
                  </span>
                  <span class="pull-right-container">
                  <span class="fa fa-angle-left pull-right"></span>
                  </span>
                  </a>
                   
                  <ul class="treeview-menu">
                    @foreach ($account_group->account_subgroups as $account_subgroup)
                        <li><a href="#"><span class="fa fa-fw fa-circle-o text-blue"></span> <span>{{$account_subgroup->subgroup_name}}</span></a></li>
                    @endforeach
                  </ul>

                  </li>
           @endforeach

        



          <!--  @foreach($treeView as $account_group)

                  <li class="treeview">                   
                   <a icon ="file-text" href="#"> {{ $account_group->group_name }}</a>
                   
                    <ul class="treeview-menu">
                      @foreach($account_group->account_subgroups as $account_subgroup)
                       <a href="#">{{$account_subgroup->subgroup_name}}</a><br>
                      @endforeach
                    </ul>

                  </li>
           @endforeach -->

           

          <!--   @foreach($treeView as $account_group)
                  <li class="treeview">                   
                   <a href="#"> {{ $account_group->group_name }}</a>
                   
                    <ul class="treeview-menu">
                      @foreach($account_group->account_subgroups as $account_subgroup)
                       <a href="#"> {{$account_subgroup->subgroup_name}}</a>
                      @endforeach
                    </ul>

                  </li>
           @endforeach -->

































@foreach($treeView as $account_group)
                  <li class="treeview">                   
                   <a href="#"> {{ $account_group->group_name }}</a>
                   
                    <ul class="treeview-menu">
                      @foreach($account_group->account_subgroups as $account_subgroup)
                       <a href="#"> {{$account_subgroup->subgroup_name}}</a>
                      @endforeach
                    </ul>

                  </li>
           @endforeach


 @foreach($treeView as $account_group)
          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>{{ $account_group->group_name }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              @foreach($account_group->account_subgroups as $account_subgroup)
                <li class=""><a href="#">{{$account_subgroup->subgroup_name}}</a></li>
              @endforeach
            </ul>
          </li>
         @endforeach


// in the controller:

$checkedResource = $model->relationship()->pluck('id')->all();

// in the view where I loop the checkboxes:
@foreach($resourceCollection as $resource)
        <label class="form-checkbox form-normal form-green form-text">
            {!! Form::checkbox('resource_array[]', $resource->id, in_array($resource->id, $checkedResource) ? true : false) !!}
            {{ $resource->name }}
        </label>
@endforeach



// in the controller:

$checkedResource = $model->relationship()->pluck('id')->all();

// in the view where I loop the checkboxes:
@foreach($resourceCollection as $resource)
        <label class="form-checkbox form-normal form-green form-text">
            {!! Form::checkbox('resource_array[]', $resource->id, in_array($resource->id, $checkedResource) ? true : false) !!}
            {{ $resource->name }}
        </label>
@endforeach



$(document).ready(function(){
    $('#radioValidate').click(function(){
        var check = true;
        $("input:radio").each(function(){
            var name = $(this).attr("name");
            if($("input:radio[name="+name+"]:checked").length == 0){
                check = false;
            }
        });
        
        if(check){
            alert('One radio in each group is checked.');
        }else{
            alert('Please select one option in each question.');
        }
    });
});


function validate()
{
var chks = document.getElementsByName('colors[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
  if (chks[i].checked)
  {
  hasChecked = true;
  break;
  }
}

if (hasChecked == false)
  {
  alert("Please select at least one.");
  return false;
  }

return true;
}



 $(document).on('click','.validate',function(){          
      

     var $fields = document.getElementsByName('partytype_lists[]');
         
     if (!$fields.length) {
        alert('Please select party type!');
        return false; // The form will *not* submit
     }

 });
   


     if (!$fields.length){
        alert('Please select party type!');
        return false; // The form will *not* submit
     }



 function validate()
{
var chks = document.getElementsByName('partytype_lists[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
  if (chks[i].checked)
  {
  hasChecked = true;
  break;
  }
}

if (hasChecked == false)
  {
  alert("Please select party type.");
  return false;
  }

return true;
}



 function ValidateDecimal(evt)
       {
       
       var charCode = (evt.which) ? evt.which : event.keyCode;
       
       
       
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;

       }





       
 $(document).on('keypress','.decimalnumbers',function(){          
        alert("hi");

        var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
 });













'onchange'=>"showProduct(this.value);"

<input id="decimalNumber" onchange="validateDecimal(this);" onkeypress="return checkForSecondDecimal(this,event)" />



function validateDecimal(sender) {
            if (sender.value.match(/^(\d+)?\.\d$/))
                alert("YES");// Approval, No Message Required
            else
                alert("NO");// Can output a friendly message to the user here
        }
        function checkForSecondDecimal(sender, e) {
            formatBox = document.getElementById(sender.id);
            strLen = sender.value.length;
            strVal = sender.value;
            hasDec = false;
            e = (e) ? e : (window.event) ? event : null;


            if (e) {
                var charCode = (e.charCode) ? e.charCode :
                            ((e.keyCode) ? e.keyCode :
                            ((e.which) ? e.which : 0));


                if ((charCode == 46) || (charCode == 110) || (charCode == 190)) {
                    for (var i = 0; i < strLen; i++) {
                        hasDec = (strVal.charAt(i) == '.');
                        if (hasDec)
                            return false;
                    }
                }
            }
            return true;
        }




function ValidateDecimal(sender,args)
    {
        var txt = (args.Value);
        var startindex= txt.indexOf(".")
        var lastindex=txt.lastIndexOf(".")
        
        if(startindex != lastindex)
        {
           
            args.IsValid = false;
             return;
        }
             
        args.IsValid = true;
    }



  <!-- <script type="text/javascript">
        if($("#isAgeSelected").is(':checked'))
            $("#txtAge").show();  // checked
        else
            $("#txtAge").hide();  // unchecked
    </script> -->



input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}


<SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>

$(document).on('click','.cancel',function(){  
            $('#id').val("");
            $('#currency_code').val("");
            $('#currency_name').val(""); 
            $('#subcurrency').val(""); 
            $('#submit').val('Submit');
        });


// $(document).on('click','.edit',function(){ 
//        $id = $(this).parent().parent().find('.id').html();
//             $currency_code = $(this).parent().parent().find('.currency_code').html();

//             $currency_name = $(this).parent().parent().find('.currency_name').html();
//             $subcurrency = $(this).parent().parent().find('.subcurrency').html();

//             $('#id').val($id);
//             $('#currency_code').val($currency_code);
//             $('#currency_name').val($currency_name);    

//             $('#subcurrency').val($subcurrency);
//             $('#submit').val('Update');

//         });



 <a class="btn btn-warning btn-xs btn-block" href="{{ route('currency.edit', [$currency->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>


             
             <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('currency.destroy', [$currency->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a>


[
              'route' => '',
              'command' => 'trial_balance',
              'color' => 'purple',
            ],
            [
              'route' => '',
              'command' => 'balance_sheet',
              'color' => 'orange',
            ],


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<div class="row">
  <div class="form-group-lg col-xs-5">
    <label class="control-label" for="facilities">Facilities</label>
    <div class="form-group-lg">
      <div th:each="facility : ${facilities}" class="column_2">
        <input type="checkbox" th:field="*{checkedItems}" th:value="${facility}" />
        <label class="checkbox-inline" th:text="${facility}"></label>
      </div>
    </div>
  </div>
</div>

.column_2{
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;
}


<div class="form-group">
  <label for="reverse_direction" class="col-md-3 control-label">
    Direction
  </label>
  <div class="col-md-7">
    <label class="radio-inline">
      <input type="radio" name="reverse_direction"
             id="reverse_direction"
      @if (! $reverse_direction)
        checked="checked"
      @endif
      value="0"> Normal
    </label>
    <label class="radio-inline">
      <input type="radio" name="reverse_direction"
      @if ($reverse_direction)
        checked="checked"
      @endif
      value="1"> Reversed
    </label>
  </div>
</div>


$working_days = array( 0 => 'Mon', 1 => 'Tue', 2 => 'Wed', 
                       3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun' );

@foreach ( $working_days as $i => $working_day )
{!! Form::checkbox( 'working_days[]', 
                  $working_day,
                  !in_array($working_days[$i],$saved_working_days),
                  ['class' => 'md-check', 'id' => $working_day] 
                  ) !!}
{!! Form::label($working_day,  $working_day) !!}
@endforeach

 $role = DB::table('role')->lists('role_name', 'id');
    $labourTypes = DB::table('labour_type')->lists('labour_type_name', 'id');
    return view('pages.addemployee', compact('role', 'labourTypes'));



@foreach($labourTypes as $id => $name)
    <div class="checkbox">
        <label>
            {!! Form::checkbox("labour_types[]", $id) !!} {{$name}}
        </label>
   <div>
@endforeach


<input type="number" style="text-align: right;"> or <input type="number" style="direction: rtl;">).


<!-- <div th:each="partytype : ${partytype_lists}" class="column_2">
                <div class="checkbox">
                <label>
                {!! Form::checkbox("partytype_lists[]", $party_type_id) !!} {{$party_type}}
                </label>
                <div>
                </div>   
                 -->


 <!-- if isnull($employee_info){    

            {!!Form::open(['method' => 'POST','route' => ['currency.update',$currency->id], 'class' => 'form-update' ]) !!} 
            {{ method_field('PUT') }}    
            }
            else
            {      -->       

            {!!Form::open(['method' => 'POST','route' => ['currency.store'], 'class' => 'form-create' ]) !!} 

            <!-- } -->




             {{$currency}};

                


                   <td>{{ $currency->currency_code }}</td>
        <td>{{ $currency->currency }}</td>
        <td>{{ $currency->subcurrency }}</td> 


        <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('currency.edit', [$currency->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>
        <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('currency.destroy', [$currency->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a></td>


        {!!Form::hidden('id', 'secret', array('id' => 'id')) !!}
                     
                 {!! Form::label('currency_code', 'Code') !!}        
                 {!! Form::text('currency_code', isset($currency)?$currency->currency_code:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required'
                 ]) !!} 

                 {!! Form::label('currency', 'Currency') !!}
                 {!! Form::text('currency', isset($currency)?$currency->currency:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' ,
                 'autofocus'                    => 'autofocus'
                 ]) !!} 


                 {!! Form::label('subcurrency', 'Sub Currency') !!}
                 {!! Form::text('subcurrency', isset($currency)?$currency->subcurrency:null, [
                 'class'                        => 'form-control',
                 'autofocus'                    => 'autofocus'
                 ]) !!}  
                                   
<!-- 
 <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('employees.edit', [$employee->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td> -->


