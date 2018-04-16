@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

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

                <div class="box-body table-responsive">
                    <table id="cash_book" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('V/R No.')</th>
                            <th>@lang('Account Date')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Amount ' . $defaCurrency)</th>
                            <th>@lang('')</th>
                            <th>@lang('Party')</th>
                            <th>@lang('Cash Account')</th>
                            <th>@lang('narration')</th>                                      
                            <th width="75px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('V/R No.')</th>
                            <th>@lang('Account Date')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Amount ' . $defaCurrency)</th>
                            <th>@lang('')</th>
                            <th>@lang('Party')</th>
                            <th>@lang('Cash Account')</th>
                            <th>@lang('narration')</th>                                   
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

        $(document).ready( function () {
        $('#cash_book').DataTable();
        } );

    </script>

    


@endsection