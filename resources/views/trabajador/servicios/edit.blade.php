<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <<title>SAD</title>
    {{-- estilos de bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- Estilos del Proyecto --}}
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/regist.css')}}" rel="stylesheet" />
</head>
<body>
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

            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ url('/trabajador/categoria') }}">Mis Categorias</a></li>
            @endif

            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ url('/trabajador/general') }}">Todas las Categorias</a></li>
            @endif

            {{-- Paginas de Cliente --}}
            @can('manage-paginas')
            <li class="menu-item"><a class="link" href="{{ route('cliente.paginas.index') }}">Servicios</a></li>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="nav-item">
                    <li class="cta"><a class="link2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit(); " role="button">
                        <i class="fas fa-sign-out-alt"></i>
        
                        {{ __('Cerrar Sesion') }}
                    </a></li>
                    
                </div>
            </form>
        </ul>
    </header>
    <br>
    <br>
    <br> 
    <div class="form-body">
        <div class="row">
          <div class="form-holder">
            <div class="form-content">
              <div class="form-items">

    <form action="{{ url('/trabajador/servicios/'.$servicios->id) }}" method="post" enctype="multipart/form-data">
        
        <!-- {{-- para evitar error 419 --}} -->
        {{-- {{ url('/trabajador/servicios/'.$servicios->id.) }} --}}
        @csrf 
        {{ method_field('PATCH') }}
        
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" value="{{$servicios->nombre}}" required minlength="6" maxlength="255">
        <br>

        <label for="categoria">Categoria</label><br>
        <select name="categoria" id="categoria" title="Selecciona una de las categorias para editar!"  required>
        <option value="">Seleccionar opcion</option>
        <option value="albañileria">Albañileria</option>
        <option value="carpinteria">Carpinteria</option>
        <option value="cerrajeria">Cerrajeria</option>
        <option value="electricista">Electricista</option>
        <option value="fontaneria">fontaneria</option>
        <option value="mecanico">Mecanico</option>
        <option value="jardineria">Jardineria</option>
        <option value="tecnico">Tecnico en Electrodomesticos</option>
        <option value="pintor">Pintor</option>
        </select>
        <div class="valid-feedback">Todo bien</div>
        <div class="invalid-feedback">Selecciona una categoria para modificar el registro</div>
        <br>

        <label for="descripcion">Descripcion</label><br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" required minlength="6" maxlength="255">{{$servicios->descripcion}}</textarea>
        <br>

        <label for="imagen">Imagen</label><br>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <input type="file" name="imagen" id="imagen" value="" required>
        <br><br>

        <!-- enlace a index -->
        <a href="{{ url('trabajador/servicios') }}">Regresar</a><br><br>

        <input type="submit" value="Guardar cambios">
    </form>

</div>
</div>
</div>
</div>
</div> 

    
</body>
</html>
