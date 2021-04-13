@extends('layout')

@section('titulo', 'Cadastro de Stack')

@section('conteudo')
<div class= "p-4 d-flex flex-column rounded form">
    <form method="POST" action="/stacks">
        @csrf
        <p> Adicionar Stack </p>
        
        <div>
            <input class="form-control" placeholder="Nome da Stack" type="text" name="name"/>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
            <div class="d-flex justify-content-end">
                <button class="btn btn-success mt-2" type="submit">Salvar</button>
            </div>
        </div>
    </form>
    <table class="table table-secondary border-table">
        <p>Stacks</p>
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stacks as $stack)
            <tr>
                <th scope="row">{{ $stack->id }}</th>
                <td>{{ $stack->name }}</td>
                <td>
                    <a href="{{route("stacks.destroy", ['stack' => $stack->id])}}" type="button" class="btn btn-outline-danger btn-sm bi bi-trash border-0"></a>
                    <a href="{{route("stacks.show", ['stack' => $stack->id])}}" type="button" class="btn btn-outline-primary btn-sm bi bi-pencil border-0"></button>
                    </a>
                </td>
            </tr>
            @endforeach()
        </tbody>
      </table>
      <div>
        {{ $stacks->links() }}
      </div>
</div>
@endsection