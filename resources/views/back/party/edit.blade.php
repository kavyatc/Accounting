@extends('back.party.template')

@section('form-open')  
        {!!Form::open(['method' => 'POST','route' => ['party.update',$party->id], 'class' => 'form-update' ]) !!} 
        {{ method_field('PUT') }}
@endsection
