

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
                <li>
                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> {{ $account_group->group_name }}  </a>
                   

                    <ul>
                    @foreach($account_group->account_subgroups as $account_subgroup)
                    <li>
                        <a href="#"><i class="fa fa-fw fa-folder"></i> {{ $account_subgroup->subgroup_name }}  </a>
                        
                    </li>
                    @endforeach
                    </ul>
                </li>
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