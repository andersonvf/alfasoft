@extends('layouts.pdf')

@section('content')

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
        <td>{{ $client->name}}
        </td>
        <td>{{ $client->email}}
        </td>
      </tr>
    @empty
        <tr><td>Nenhum cliente cadastrado</td></tr> 
    @endforelse  
  </tbody>
  </table>

@endsection