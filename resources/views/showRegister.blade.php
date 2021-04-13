@extends('layout')

@section('titulo', 'Lista de Técnicos')

@section('conteudo')
  <form  method="GET" action="/" class="d-flex mb-3">
    <input
      class="form-control me-3"
      placeholder="Nome do técnico"
      name="name"
    />
    <select class="form-select form-control me-5" name="stack">
      <option selected></option>
      @foreach ($stacks as $stack)
          <option value="{{ $stack->id }}"> {{ $stack->name }} </option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-primary bi bi-search border-0"></button>
  </form>
  <table class="table table-secondary border-table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Email</th>
      <th scope="col">Endereço</th>
      <th scope="col">Criado em</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($registers as $register)
    <tr>
      <th scope="row">{{ $register->id }}</th>
      <td>{{ $register->name }}</td>
      <td>{{ $register->cpf }}</td>
      <td>{{ $register->email }}</td>
      <td>{{ $register->address }}</td>
      <td>{{ ($register->created_at)->format('d/m/y H:i') }}</td>
      <td>
        <div class="d-flex justify-content-between">
          <a href="/" type="button" class="btn btn-outline-danger btn-sm bi bi-trash border-0"></a>
          <a href="{{route("registers.show", ['register' => $register->id])}}" type="button" class="btn btn-outline-primary btn-sm bi bi-pencil border-0"></button>
          </a>
      </td>
    </tr>
  @endforeach()
  </tbody>
</table>
<div>
  {{ $registers->links() }}
</div>
@endsection