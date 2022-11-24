<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAD</title>
    {{-- estilos de bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- Estilos del Proyecto --}}
    <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" />
</head>
<body>
    {{-- <a href="{{ route('dashboard') }}">Inicio</a>
    
    {{-- Paginas para trabajadores 
    @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.index') }}">Mis Servicios</a>
        @endif

        @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.create') }}">Agregar Servicio</a>
        @endif

        {{-- Paginas para clientes 
        @can('manage-paginas')
            <a href="{{ route('cliente.paginas.index') }}">Servicios</a>
        @endif


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                    <i class="fas fa-sign-out-alt"></i>
    
                    {{ __('Log Out') }}
                </a>
                
            </div>
        </form> --}}
        <header id="Header">
            <img src="Krey-Academy-Logo.png" alt="" class="logo">
    
            <!--Menu header-->
            <ul class="main-menu">
                <li class="menu-item"><a class="link" href="{{ route('dashboard') }}">Inicio</a></li>
    
                {{-- Paginas de Trabajador --}}
                @can('manage-servicios')
                <li class="menu-item"><a class="link" href="{{ route('trabajador.servicios.index') }}">Mis Servicios</a></li>
                @endif
                @can('manage-servicios')
                <li class="menu-item"><a class="link" href="{{ route('trabajador.servicios.create') }}">Agregar Servicios</a></li>
                @endif
    
                {{-- Paginas de Cliente --}}
                @can('manage-paginas')
                <li class="menu-item"><a class="link" href="{{ route('cliente.paginas.index') }}">Servicios</a></li>
                @endif
                {{-- <li class="menu-item"><a href="http://">Categorias</a></li>
                <li class="cta"><a href="{{ route('login') }}">Iniciar sesión</a></li> --}}
    
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="nav-item">
                        <li class="cta"><a class="link2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit(); " role="button">
                            <i class="fas fa-sign-out-alt"></i>
            
                            {{ __('Log Out') }}
                        </a></li>
                        
                    </div>
                </form>
            </ul>
        </header>
        {{ $slot }}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
