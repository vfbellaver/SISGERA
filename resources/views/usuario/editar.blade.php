@extends('layouts.app')

@section('content')
    <editar-usuario :user="{{$user}}"></editar-usuario>
@endsection