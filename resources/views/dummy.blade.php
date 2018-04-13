     $opening_balance = CashBook::select('sum(amount) AS openbalamt')
                                     ->Where('cashaccount_id',$request->account_ledeger_id)
                                     ->whereDate('accountdate', '>=', Carbon::parse('first day of January'))
                                     ->whereDate('accountdate', '<', $request->fromdate)
                                     ->get();  

        dd($opening_balance);        

        
Finance::select('id', 'amount', 'type', 'date',
                DB::raw('@balance := @balance + IF(type = "credit", amount, -amount) AS balance'))
         ->from(DB::raw('finances, (SELECT @balance := 0) AS balanceStart'))
         ->get();



         $allFinances = // query from above
$perPage = 10;
$pagination = App::make('paginator');
$count = $allFinances->count();
$page = $pagination->getCurrentPage($count);
$finances = $this->slice(($page - 1) * $perPage, $perPage)->all();
$items = $pagination->make($items, $count, $perPage);


$transactions = DB::table('transactions')
->whereDate('date', '>=', '2016-06-09')
->whereDate('date', '<=', '2016-06-20')
->get();


  /* dd($cash_bookdetails);*/


        // $result = $cash_bookdetails->union($account_ledger);
        // dd($result);


$silver = DB::table("product_silver")
    ->select("product_silver.name"
      ,"product_silver.price"
      ,"product_silver.quantity");
$gold = DB::table("product_gold")
    ->select("product_gold.name"
      ,"product_gold.price"
      ,"product_gold.quantity")
    ->unionAll($silver)
    ->get();
print_r($gold);


$users = DB::table('users')
  ->select(DB::raw("
  name,
  surname,  
  (CASE WHEN (gender = 1) THEN 'M' ELSE 'F' END) as gender_text")
);
 

$ips_list = DB::table('ips')->where('network', '=', '1')->where('used', '=', '0')->limit(5);

for($n = 1; $n < $total_networks; $n++){
    $ip_list_subquery = DB::table('ips')
             ->where('network', '=', $n)
             ->where('used', '=', '0')
             ->limit(5);
    $ips_list = $ips_list->unionAll($ip_list_subquery);
}
$ips = $ips_list->get();







       $result = User::join('user_institutions',function($user_institutions){

           $user_institutions->on('user_institutions.user_id','=','users.id');

       })->join('designations' , function($designations){

           $designations->on('designations.id','=','user_institutions.designation_id');

       })->select('users.id as id','user_institutions.emp_code as emp_code','users.title as title','users.name as name','users.last_name as last_name','users.email as email','designations.designation_name as designation_name')->where('users.id', '!=', 1)->where('user_institutions.institution_id','=',$request->instituteName)->where('designations.designation_type',$request->designation_type)->whereNull('users.deleted_at')->whereNull('user_institutions.deleted_at')->orderBy('users.id', 'DESC');



 <a href="#"><i class="fa fa-fw fa-folder-open"></i> {{ $account_group->group_name }}  </a>


<form method="POST" action="form-handler" onsubmit="return checkForm(this);">
<p>Input: <input type="text" size="32" name="inputfield">
<input type="submit"></p>
</form>


<script type="text/javascript">

  function checkForm(form)
  {
    // validation fails if the input is blank
    if(form.inputfield.value == "") {
      alert("Error: Input is empty!");
      form.inputfield.focus();
      return false;
    }

    // regular expression to match only alphanumeric characters and spaces
    var re = /^[\w ]+$/;

    // validation fails if the input doesn't match our regular expression
    if(!re.test(form.inputfield.value)) {
      alert("Error: Input contains invalid characters!");
      form.inputfield.focus();
      return false;
    }

    // validation was successful
    return true;
  }

</script>


<script type="text/javascript">

  function checkForm(form)
  {
    if(!condition1) {
       alert("Error: error message");
       form.fieldname.focus();
       return false;
    }
    if(!condition2) {
       alert("Error: error message");
       form.fieldname.focus();
       return false;
    }
    ...
    return true;
  }

</script>


function checkForm(form)
  {
    var itemsChecked = checkArray(form, "pref[]");
    alert("You selected " + itemsChecked.length + " items");
    if(itemsChecked.length > 0) {
      alert("The items selected were:\n\t" + itemsChecked);
    }
    return false;
  }


<form action="#" method="post" onsubmit="return ValidationEvent()">

// Below Function Executes On Form Submit
function ValidationEvent() {
// Storing Field Values In Variables
var name = document.getElementById("name").value;
var email = document.getElementById("email").value;
var contact = document.getElementById("contact").value;
// Regular Expression For Email
var emailReg = /^([w-.]+@([w-]+.)+[w-]{2,4})?$/;
// Conditions
if (name != '' && email != '' && contact != '') {
if (email.match(emailReg)) {
if (document.getElementById("male").checked || document.getElementById("female").checked) {
if (contact.length == 10) {
alert("All type of validation has done on OnSubmit event.");
return true;
} else {
alert("The Contact No. must be at least 10 digit long!");
return false;
}
} else {
alert("You must select gender.....!");
return false;
}
} else {
alert("Invalid Email Address...!!!");
return false;
}
} else {
alert("All fields are required.....!");
return false;
}
}




       
 $(document).on('click','.validate',function(){        
      
  
     var chk = document.getElementsByName('partytype_lists[]')
         
    if (!$fields.length) {
        alert('Please select party type!');
        return false; // The form will *not* submit
      }
 });


 ============================================================


 

 @extends('back.layout')

@section('css')
     <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
 
    <link href="/css/treeview.css" rel="stylesheet">

    
    
@endsection



@section('main')

<!-- ================Account Ledger=================== -->
<div class="col-md-12">

    <div class="row">       

    <!-- ================Entry=================== -->
    <div class="accounts" id = "accounts_list">     
        <div class="col-md-4">  

        <div class="panel panel-info">
        <div class="panel-body">
         <h4> Account Heads</h4>

            <ul id="tree1">
                @foreach($treeView as $account_group)
                <li">
                    {{ $account_group->group_name }}
                <ul>
                @foreach($account_group->account_subgroups as $account_subgroup)
                <li>
                    {{ $account_subgroup->subgroup_name }}  
                </li>
                @endforeach
                </ul>
                
                @endforeach
            </ul>
                
        </div>
        </div>

        </div>
    </div>
    <!-- ================Entry=================== -->

    <!-- ================List=================== -->
    <div class="col-md-8">
            @if (session('account_ledger-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('account_ledger-ok') !!}
                @endcomponent
            @endif
            <div class="panel panel-info">

                <div class="box-body table-responsive">
                    <table id="account_ledger" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Account Group')</th>
                            <th>@lang('Account Subgroup')</th>
                            <th>@lang('Account code')</th>
                            <th>@lang('Account name')</th>
                            <th>@lang('Account code')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Opening Balance')</th>
                            <th>@lang('')</th>
                            <th width="50px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Account Group')</th>
                            <th>@lang('Account Subgroup')</th>
                            <th>@lang('Account code')</th>
                            <th>@lang('Account name')</th>
                            <th>@lang('Account code')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Opening Balance')</th>
                            <th>@lang('')</th>                          
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                          
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- ================List=================== -->


    </div>
    <!-- /.row -->


</div>

<!-- ================Account Ledger=================== -->
@endsection


@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{ asset('adminlte/js/back.js') }}"></script>

    <script src="/js/treeview.js"></script>

    <script>

        var account_ledger = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy account ledger ?')',
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: '@lang('Yes')',
                        cancelButtonText: '@lang('No')'
                    }).then(function () {
                        back.spin()
                        $.ajax({
                            url: that.attr('href'),
                            type: 'DELETE'
                        })
                            .done(function () {
                                that.parents('tr').remove()
                                back.unSpin()
                            })
                            .fail(function () {
                                back.fail('@lang('Looks like there is a server issue...')')
                            }
                        )
                    })
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(account_ledger.onReady)

        $(document).ready( function () {
        $('#account_ledger').DataTable();
        } );

    </script>
@endsection