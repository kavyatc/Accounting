@extends('back.accounts.cash_book.template')

@section('form-open')  
        {!!Form::open(['method' => 'POST','route' => ['cash_book.update',$cash_book->id], 'class' => 'form-update' ]) !!} 
        {{ method_field('PUT') }}
@endsection
