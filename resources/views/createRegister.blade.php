@extends('layout')

@section('titulo', 'Cadastro de Técnico')

@section('conteudo')
<div class= "p-4 d-flex flex-column rounded form">
    <form method="POST" action="/registers">
        @csrf
        <p>Formulário do Técnico</p>
        
        <div>
            <input class="form-control" placeholder="Nome do Técnico" type="text" name="name" id="name"/>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>

        <div>
            <input class="form-control" placeholder="CPF do Técnico" type="text" name="cpf" id="cpf"/>
            @if($errors->has('cpf'))
                @foreach($errors->get('cpf') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>

        <div>
            <input class="form-control" placeholder="Email do Técnico" type="email" name="email" id="email"/>
            @if($errors->has('email'))
                @foreach($errors->get('email') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>

        <div>
            <input class="form-control" placeholder="Data de Nascimento" type="date" name="date_birth" id="date_birth"/>
        </div>

        <div>
            <input class="form-control" placeholder="Endereço do Técnico" type="text" name="address" id="address"/>
        </div>

        <div>
            <label class="label">Stacks</label>

            <div class="select is-multiple control">
                <select name="stacks[]" multiple>
                    @foreach ($stacks as $stack)
                        <option value="{{ $stack->id }}"> {{ $stack->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success mt-2" type="submit">Salvar</button>
            </div>
        </div>

    </form>
</div>
@endsection