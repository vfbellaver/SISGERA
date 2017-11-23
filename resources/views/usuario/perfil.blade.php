@extends('layouts.app')

@section('content')
    <perfil-usuario :user="{{$user}}"></perfil-usuario>
@endsection