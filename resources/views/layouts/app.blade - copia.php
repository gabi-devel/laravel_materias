<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Template --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- plugin css -->
    <link href="assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="topbar-dark">
    <div id="app">

        {{-- Template --}}
        <header id="topnav">
            <div class="">{{-- topbar-menu --}}
                <div class="container-fluid">
                    <div id="navigation">
                        <ul class="navigation-menu d-flex justify-content-center gap-5 mx-5">

                            <li class="has-submenu">
                                <a class="nav-link  {{ request()->is('materias*') 
                                        ? 'active' : '' }}" href="/">
                                    <i class="la la-cube"></i>Materias  
                                    {{-- <div class="arrow-down"></div> --}}
                                </a>
                            </li>
                            <li class="has-submenu">
                                <a class="nav-link {{ request()->is('tareas*') 
                                    ? 'active' : '' }}" href="{{ route('tareas.index') }}">
                                    <i class="la la-clone"></i>Tareas  
                                    {{-- <div class="arrow-down"></div> --}}
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a class="nav-link {{ request()->is('calendar*') 
                                    ? 'active' : '' }}" href="{{ route('calendar.index') }}">
                                    <i class="la la-dashboard"></i>Horarios
                                    </a>
                            </li>

                            <li class="has-submenu">
                                <a class="nav-link {{ request()->is('profesores*') 
                                    ? 'active' : '' }}" href="{{ route('profesores.index') }}">
                                    <i class="la la-user"></i>Profesores
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a class="nav-link {{ request()->is('examenes*') 
                                    ? 'active' : '' }}" href="/examenes">
                                    <i class="la la-file-text-o"></i>Examenes 
                                </a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <br>
        <br>
        <br>

        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('materias*') 
                                                ? 'active' : '' }}" href="/">Materias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('tareas*') 
                                                ? 'active' : '' }}" href="{{ route('tareas.index') }}">Tareas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profesores*') 
                                                ? 'active' : '' }}" href="{{ route('profesores.index') }}">Profesores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('calendar*') 
                                                ? 'active' : '' }}" href="{{ route('calendar.index') }}">Horario</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() { 
        // Que la alerta se oculte:
        $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-dismissible").alert('close');
        });
        // Texto con fondo negro al hacer hover en los botones:
        $('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover'
        }); 
    });
</script>
</body>
</html>