

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
            @if (session('city-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('city-ok') !!}
                @endcomponent
            @endif
            <div class="panel panel-info">

                <div class="box-body table-responsive">
                    <table id="city" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Code')</th>
                            <th>@lang('City')</th>
                            <th width="50px">@lang('Action')</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Code')</th>
                            <th>@lang('City')</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.master.city.table', compact('citydetails'))
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


            <h3>City</h3>               
            @if(isset($city))
                {!!Form::open(['method' => 'POST','route' => ['city.update',$city->id], 'class' => ' form-create' ]) !!} 
                {{ method_field('PUT') }}
            @else
                {!!Form::open(['id'=> 'form_add','method' => 'POST','route' => ['city.store'], 'class' => 'form-create' ]) !!} 
            @endif
   
            {{ csrf_field() }}

            <div class="form-group">                       
                {!!Form::hidden('id', 'secret', array('id' => 'id')) !!}
                
                 @if(isset($city))
                 {!! Form::label('city_code', 'Code') !!}        
                 {!! Form::text('city_code', isset($city)?$city->city_code:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'autofocus'                    => 'autofocus',
                 'maxlength'                    => 5,
                 'readonly'                     => 'true'
                 ]) !!}
                 @else   
                 {!! Form::label('city_code', 'Code') !!}        
                 {!! Form::text('city_code', isset($city)?$city->city_code:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'autofocus'                    => 'autofocus',
                 'maxlength'                    => 5
                 ]) !!}
                 @endif  
                
                 {!! $errors->first('city_code', '<small class="help-block" style="color:red">:message</small>') !!} 

                 {!! Form::label('city_name', 'City') !!}
                 {!! Form::text('city_name', isset($city)?$city->city_name:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'maxlength'                    => 100 
                 ]) !!}              

                
                                                             
            </div>
            
            <div class="form-group">                
                 @if(isset($city))
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
                 <a class="btn btn-danger " href="{{ route('city.index') }}">Cancel</a>
          
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

        var city = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy city ?')',
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

        $(document).ready(city.onReady)

        $(document).ready( function () {
        $('#city').DataTable();
        } );

    </script>
@endsection