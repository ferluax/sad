<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
        <h1>pagina de inicio</h1>
        
</body>
</html>
