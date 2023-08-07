<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>@yield('titulo') </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
        
    </head>
    <body>
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{url('/') }}">Gestão Escolar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('escolas.index') }}">Escolas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- header-end -->
        <div class="container bg-light border border-light">
            <!-- Mensagens de erros -->
            @if ($errors->any())
                <div class="alert alert-danger my-3">
                    <ul>
                        <h5><i class="icon fas fa-ban"></i> Ops! Erro encontrado.</h5>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Mensagens de sucesso -->
            @if (session('msg'))
                <div class="alert alert-success my-3" role="alert">
                   {{ session('msg') }}
                </div>
            @endif

          @yield('content')
        </div>

        <script src="{{ asset('assets/jquery.js') }}"></script>
        <script src="{{ asset('assets/bootstrap.js') }}"></script>
       <!-- Mask para input -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('#telefone').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
        </script>
        <!-- Mask-end-->
    </body>
</html>
