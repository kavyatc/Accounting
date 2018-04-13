@extends('back.party.template')

@section('form-open')
  {!!Form::open(['id'=> 'form_add','method' => 'POST','route' => ['party.store'], 'class' => 'form-create' ]) !!}    
 
@endsection