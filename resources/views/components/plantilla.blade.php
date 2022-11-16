<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAD</title>
</head>
<body>
    <a href="{{ route('dashboard') }}">Inicio</a>
    
    {{-- Paginas para trabajadores --}}
    @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.index') }}">Mis Servicios</a>
        @endif

        @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.create') }}">Agregar Servicio</a>
        @endif

        {{-- Paginas para clientes --}}
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
        </form>
        {{ $slot }}
</body>
</html>
