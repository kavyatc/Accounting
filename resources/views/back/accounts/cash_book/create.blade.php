@extends('back.accounts.cash_book.template')

@section('form-open')
  {!!Form::open(['id'=> 'form_add','method' => 'POST','route' => ['cash_book.store'], 'class' => 'form-create' ]) !!}    
 
@endsection