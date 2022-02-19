@extends('layouts.app')

@section('title-page')
    <h4>Clientes</h4>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('clients.create')}}" class="btn btn-outline-primary">Novo registro</a>
      <a href="{{ url('clients/pdf')}}" class="btn btn-outline-primary">Baixar Listagem</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($clients as $client)                  
          <tr>
            @can('update-client', $client)
            <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a></td>
            <td>{{ $client->email }}</td>
            <td>
              <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-outline-warning">Editar</a>
            </td>
            <td>
              <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Excluir o registro selecionado?')">Excluir</button>
              </form>
              @endcan
            </td>
          </tr>
        @empty
            <tr><td>Nenhuma cliente cadastrado</td></tr> 
        @endforelse  
      </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $clients->links()}}
      </div>
    </div>
  </div>
@endsection


