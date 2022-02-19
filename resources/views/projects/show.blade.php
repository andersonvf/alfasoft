@extends('layouts.app')

@section('title-page')
    <h3>Detalhes do registro</h3>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <p>Id: {{ $projects->id }}</p>
            <p>Nome: {{ $projects->name }}</p>
            <p>Custo: {{ $projects->cost }}</p>
            <p>Descrição: {{ $projects->description }}</p>
                            
<br>

<p>
    Tarefas do Projeto:

    @forelse ($projects->tarefas as $tarefa)
    <p>O id da tarefa é:{{ $tarefa->id }}</p>
    @empty
    <p>Não possui tarefas</p>
    @endforelse
</p>

            <a href="{{ route('projects.index') }}">Voltar para a lista</a>
        </div>
    </div>
@endsection

