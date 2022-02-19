@extends('layouts.app')

@section('title-page')
    <h3>Editar registro</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" method="post" action="{{ route('projects.update', $project->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                @include('projects.form')
              </form>
            <a href="{{ route('projects.index') }}">Voltar para a lista</a>
        </div>
    </div>
@endsection