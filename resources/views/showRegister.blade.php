@extends('layout')

@section('titulo', 'Lista de Técnicos')

@section('conteudo')
  <div class="d-flex mb-3">
    <input
      class="form-control me-3"
      placeholder="Nome do técnico"
    />
    <select class="form-select form-control me-5">
      <option selected>Selecione uma stack</option>
      <option></option>
    </select>
    <button type="button" class="btn btn-primary bi bi-search border-0"></button>
  </div>
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
  @foreach ($register as $cadastros)
    <tr>
      <th scope="row">{{ $cadastros->id }}</th>
      <td>{{ $cadastros->name }}</td>
      <td>{{ $cadastros->cpf }}</td>
      <td>{{ $cadastros->email }}</td>
      <td>{{ $cadastros->address }}</td>
      <td>{{ $cadastros->created_at }}</td>
      <td>
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-outline-danger btn-sm bi bi-trash border-0" onclick=""></button>
          <button type="button" class="btn btn-outline-primary btn-sm bi bi-pencil border-0"></button>
        </div>
      </td>
    </tr>
  @endforeach()
  </tbody>
</table>
@endsection