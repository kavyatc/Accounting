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
    <a class="btn btn-primary" href="{{ route('party.create') }}">@lang('New Party')</a>
@endsection

@section('main')

    <div class="row">
        <div class="col-md-12">
            @if (session('party-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('party-ok') !!}
                @endcomponent
            @endif
            <div class="box">
                
               

                <div class="box-body table-responsive">
                    <table id="party" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Code')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Address')</th> 
                            <th>@lang('Email')</th>
                            <th>@lang('City')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Opening Balance')</th>
                            <th>@lang('')</th>  
                            <th>@lang('Remarks')</th>                          
                            <th width="50px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Code')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Address')</th> 
                            <th>@lang('Email')</th>
                            <th>@lang('City')</th>
                            <th>@lang('Cur.')</th>
                            <th>@lang('Opening Balance')</th>
                            <th>@lang('')</th>   
                            <th>@lang('Remarks')</th>                                          
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.party.table', compact('partydetails'))
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

        var party = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy party ?')',
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

        $(document).ready(party.onReady)

        $(document).ready( function () {
        $('#party').DataTable();
        } );

    </script>

    


@endsection