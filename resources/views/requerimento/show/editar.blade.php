@extends('layouts.app')

@section('content')
    <show-requerimento :id="{{$requerimento->id}}"></show-requerimento>
@endsection