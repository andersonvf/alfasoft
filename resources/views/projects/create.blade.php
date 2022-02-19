@extends('layouts.app')

@section('title-page')
    <h3>Novo Contato</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('projects.store') }}">
                {{ csrf_field() }}

                @include('projects.form')
              </form>

            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">Voltar para a lista de contatos</a>
        </div>
    </div>
@endsection