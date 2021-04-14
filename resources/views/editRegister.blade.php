@extends('layout')

@section('titulo', 'Cadastro de Técnico')

@section('conteudo')
<div class= "p-4 d-flex flex-column rounded form">
    <form method="POST" action="{{route("registers.update", ['register' => $register->id])}}">
        @csrf
        @method("PUT")
        <p>Formulário do Técnico</p>
        
        <div>
            <input class="form-control" placeholder="Nome do Técnico" type="text" name="name" id="name" value="{{ $register->name }}"/>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>

        <div>
            <input class="form-control" placeholder="CPF do Técnico" type="text" name="cpf" id="cpf" value="{{ $register->cpf }}"/>
        </div>

        <div>
            <input class="form-control" placeholder="Email do Técnico" type="email" name="email" id="email" value="{{ $register->email }}"/>
            @if($errors->has('email'))
                @foreach($errors->get('email') as $erro)
                <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>

        <div>
            <input class="form-control" placeholder="Data de Nascimento" type="date" name="date_birth" id="date_birth" value="{{ date('Y-m-d', strtotime($register->date_birth)) }}"/>
        </div>

        <div>
            <input class="form-control" placeholder="Endereço do Técnico" type="text" name="address" id="address" value="{{ $register->address }}"/>
        </div>

        <div>
            <label class="label mt-2" for="body">Stacks</label>

            {{-- <div class="select is-multiple control">
                <select name="newStacks[]" multiple>
                    @foreach ($stacks as $st)
                        <option selected value="{{ $st->id }}"> {{ $st->name }} </option>
                    @endforeach
                </select>
                @error('stacks')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="select is-multiple control">
                <select name="stacks[]" multiple>
                    @foreach ($allStacks as $stack)
                        <option value="{{ $stack->id }}" 
                            @foreach ($stacks as $st)
                                @if ($stack->id === $st->id)
                                    selected
                                @endif
                            @endforeach
                        > {{ $stack->name }} </option>
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