@extends('layouts.app')

@section('title-page')
    <h3>Detalhes do registro</h3>
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Contatos do cliente:  {{ $clients->name }}</th>
            </tr>
      <tr>
        <th>Código do País</th>
        <th>Número</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($clients->projects as $project)                 
      <tr>
        <td>{{ $project->code }}</td>
        <td>{{ $project->number }}</td>
      </tr>
    @empty
        <tr><td>Nenhuma contato cadastrado</td></tr> 
    @endforelse  
  </tbody>
  </table>
@endsection

