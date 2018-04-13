

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



@section('main')

<!-- ================List=================== -->
<div class="col-md-12">

    <div class="row">

        <div class="col-md-7">
            @if (session('bank-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('bank-ok') !!}
                @endcomponent
            @endif
            <div class="panel panel-info">

                <div class="box-body table-responsive">
                    <table id="bank" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>                            
                            <th>@lang('Bank')</th>
                            <th width="50px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Bank')</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.master.bank.table', compact('bankdetails'))
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- ================Entry=================== -->
        <div class="entry" id = "masterEntry">     
          <div class="col-md-5">  


            <h3>Bank</h3>               
            @if(isset($bank))
                {!!Form::open(['method' => 'POST','route' => ['bank.update',$bank->id], 'class' => 'form-create' ]) !!} 
                {{ method_field('PUT') }}
            @else
                {!!Form::open(['method' => 'POST','route' => ['bank.store'], 'class' => 'form-create' ]) !!} 
            @endif
   
            {{ csrf_field() }}

            <div class="form-group">                       
                 {!!Form::hidden('id', 'secret', array('id' => 'id')) !!}
                     
                 {!! Form::label('bank_name', 'Bank') !!}
                 {!! Form::text('bank_name', isset($bank)?$bank->bank_name:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'autofocus'                    => 'autofocus',
                 'maxlength'                    => 100 
                 ]) !!}              
                   {!! $errors->first('bank_name', '<small class="help-block" style="color:red">:message</small>') !!} 
                
                                                             
            </div>
            
            <div class="form-group">                
                 @if(isset($bank))
                      {!! Form::submit('Update', [ 
                     'id'        => 'submit',
                     'class'     => 'btn btn-primary'
                     ]) !!}
                 @else
                     {!! Form::submit('Submit', [ 
                     'id'        => 'submit',
                     'class'     => 'btn btn-primary'
                     ]) !!}
                 @endif

                <a class="btn btn-danger " href="{{ route('bank.index') }}">Cancel</a>          
            </div>  


            {!! Form::close() !!}      
          </div>
        </div>
    <!-- ================Entry=================== -->
    </div>
    <!-- /.row -->


</div>
<!-- ================List=================== -->



@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{ asset('adminlte/js/back.js') }}"></script>


    <script>

        var bank = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy bank ?')',
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

        $(document).ready(bank.onReady)

        $(document).ready( function () {
        $('#bank').DataTable();
        } );

    </script>
@endsection