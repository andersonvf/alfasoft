@extends('layouts.app')

@section('title-page')
    <h4>Registro de Contatos</h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('projects.create')}}" class="btn btn-outline-primary">Novo contato</a>
      <a href="{{ url('projects/pdf')}}" class="btn btn-outline-primary">Baixar Listagem</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Código do País</th>
            <th>Número</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($projects as $project)                  
          <tr>
            <td>{{ $project->client->name }}</td>
            <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->code}}</a></td>
            <td>{{ $project->number }}</td>
            <td>
              <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-warning">Editar</a>
            </td>
            <td>
              <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Excluir o registro selecionado?')">Excluir</button>
              </form>
            </td>
          </tr>
        @empty
            <tr><td>Nenhuma projecte cadastrado</td></tr> 
        @endforelse  
      </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $projects->links()}}
      </div>
    </div>
  </div>
@endsection


