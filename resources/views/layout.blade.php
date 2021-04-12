<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>

    <section class="grid grid-template-areas">
        <div class="item nav"> Teste BoxTI </div>

        <div class="item content m-4"> @yield('conteudo') </div>

        <div class="item sidenav">
            <a class="nav-link" href="/registers"><i class="bi bi-list-ul"></i> Lista de Técnicos </a>

            <a class="nav-link" href="/registers/create"><i class="bi bi-person-plus-fill"></i> Cadastro de Téc... </a>
        </div>
    </section>
</body>
</html>