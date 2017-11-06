@extends('layouts.app')
@section('content')
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   Conteudo Página!
                </div>
            </div>
    </div>

@endsection
