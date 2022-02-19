@extends('layouts.app')

@section('title-page')
    <h4>Novo registro</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('clients.store') }}">
                {{ csrf_field() }}

                @include('clients.form')
              </form>
            <div>
            <a href="{{ route('clients.index') }}" class="btn btn-outline-primary">Voltar para a lista de clientes</a>
            </div>
        </div>
    </div>
@endsection