@extends('layout')

@section('titulo', 'Edição de Stack')

@section('conteudo')
<div class= "p-4 d-flex flex-column rounded form">
    <form method="POST" action="{{route("stacks.update", ['stack' => $stack->id])}}">
        @csrf
        @method("PUT")
        <p> Modificar Stack </p>
        
        <div>
            <input class="form-control" placeholder="Nome da Stack" type="text" name="name" value="{{ $stack->name }}" />
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
</div>
@endsection