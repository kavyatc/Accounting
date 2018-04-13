@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css"> -->

    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('button')
    <a class="btn btn-primary" href="{{ route('cash_book.create') }}">@lang('New Cash Book')</a>
@endsection

@section('main')
 <?php  $defaCurrency = 'INR';  ?>


    <div class="row">
        <div class="col-md-12">
            @if (session('cash_book-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('cash_book-ok') !!}
                @endcomponent
            @endif
            <div class="box">

              <!--  search options -->               
               <div class="box-header with-border">

                     {!!Form::open(['id'=> 'search','method' => 'GET','route' => ['cash_book.index'], 'class' => 'form width88' ]) !!}   

                    <div class="col-md-5">
                     {!! Form::label('cashaccount_id', 'Cash Account') !!}  
                    </div>  

                     <div class="col-md-2">
                     {!! Form::label('fromdate', 'From date') !!}  
                    </div>   

                     <div class="col-md-2">
                     {!! Form::label('todate', 'To date') !!}  
                    </div>     
                    <div class="clearfix"></div> 

                    <div class="col-md-5">                      
                     {!! Form::select('account_ledeger_id', $account_ledger_lists,null, [
                     'class'                        => 'form-control',
                     'required'                     => 'required' 
                     ]) !!} 
                    </div>
                    
                    <div class="col-md-2">                       
                     {!! Form::date('fromdate', today(), [
                     'class'                        => 'form-control date-picker',
                     'required'                     => 'required' 
                     ]) !!}                     
                    </div>  

                    <div class="col-md-2">                      
                     {!! Form::date('todate', today(), [
                     'class'                        => 'form-control date-picker',
                     'required'                     => 'required' 
                     ]) !!}                       
                    </div>     


                     {!! Form::submit('Search', [ 
                     'class'                        => 'btn btn-default search-bar-btn'
                     ]) !!}  

                     {!! Form::close() !!}                   
                   
                </div>

                <div class="box-body table-responsive">
                    <table id="cash_book" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>@lang('V/R No.')</th>
                            <th>@lang('Date')</th>
                            <th>@lang('')</th> 
                            <th>@lang('Details')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Receipt Amt In ' . $defaCurrency)</th>
                            <th>@lang('Pay Amt In ' . $defaCurrency)</th>
                            <th>@lang('Balance In ' . $defaCurrency)</th>
                            <th>@lang('')</th>                                      
                            <th width="75px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>@lang('V/R No.')</th>
                            <th>@lang('Date')</th>
                            <th>@lang('')</th> 
                            <th>@lang('Details')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Receipt Amt In ' . $defaCurrency)</th>
                            <th>@lang('Pay Amt In ' . $defaCurrency)</th>
                            <th>@lang('Balance In ' . $defaCurrency)</th>
                            <th>@lang('')</th>                                  
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.accounts.cash_book.table', compact('cash_bookdetails'))
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{ asset('adminlte/js/back.js') }}"></script>
    <script>

        var cash_book = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy cash book ?')',
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

        $(document).ready(cash_book.onReady)

        /*$(document).ready( function () {
        $('#cash_book').DataTable();
        } );*/

    </script>

    


@endsection