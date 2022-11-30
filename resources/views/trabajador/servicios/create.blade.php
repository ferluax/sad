{{-- <x-plantilla>
    <br>
    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">

    <form action="{{ url('/trabajador/servicios') }}" method="post" enctype="multipart/form-data">
        
        {{-- <!-- {{-- para evitar error 419 
        @csrf 
        <label for="nombre">Nombre</label><br>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
        <br>

        <label for="categoria">Categoria</label><br>
        <select class="form-control" name="categoria" id="categoria">
        <option value="">Seleccionar opcion</option>
        <option value="Albañileria">Albañileria</option>
        <option value="Carpinteria">Carpinteria</option>
        <option value="Cerrajeria">Cerrajeria</option>
        <option value="Electricista">Electricista</option>
        <option value="Fontaneria">Fontaneria</option>
        <option value="Mecanico">Mecanico</option>
        <option value="Jardineria">Jardineria</option>
        <option value="Tecnico">Tecnico en Electrodomesticos</option>
        <option value="Pintor">Pintor</option>
        </select>
        <br>

        <label for="descripcion">Descripcion</label><br>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old ('descripcion')}}</textarea>
        <br>

        <label for="imagen">Imagen</label><br>
        <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
        <br><br>

        <input type="submit" class="btn btn-info" value="Agregar">
    </form>
</div>  --}}

{{-- <div class="form-body">
    <div class="row">
      <div class="form-holder">
        <div class="form-content">
          <div class="form-items">
              <h3>Registro</h3>
              <p>Por favor completa los campos</p>
  
              <form action="{{ url('/trabajador/servicios') }}" method="post" enctype="multipart/form-data" >
  
                  <!-- {{-- para evitar error 419 
                  @csrf 
                  <br>
                  <label for="nombre">Nombre</label><br>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
                  <br>
  
                  <label for="categoria">Categoria</label><br>
                  <select class="form-control" name="categoria" id="categoria">
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
                  <br>
  
                  <label for="descripcion">Descripcion</label><br>
                  <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old ('descripcion')}}</textarea>
                  <br>
  
                  <label for="imagen">Imagen</label><br>
                  <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
                  <br><br>
  
                  <div  class="form-button mt-3">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
</x-plantilla>--}}

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
            
                            {{ __('Cerrar Sesion') }}
                        </a></li>
                        
                    </div>
                </form>
            </ul>
        </header>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="form-body">
        <div class="row">
          <div class="form-holder">
            <div class="form-content">
              <div class="form-items">
                  <h3>Registro de Servicios</h3>
                  <p>Por favor completa los campos</p>
      
                  <form action="{{ url('/trabajador/servicios') }}" method="post" enctype="multipart/form-data" >
      
                      {{-- <!-- {{-- para evitar error 419  --}}
                      @csrf 
                      <br>
                      <label for="nombre">Nombre</label><br>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
                      <br>
      
                      <label for="categoria">Categoria</label><br>
                      <select class="form-control" name="categoria" id="categoria">
                        <option value="">Seleccionar opcion</option>
                        <option value="Albañileria">Albañileria</option>
                        <option value="Carpinteria">Carpinteria</option>
                        <option value="Cerrajeria">Cerrajeria</option>
                        <option value="Electricista">Electricista</option>
                        <option value="Fontaneria">fontaneria</option>
                        <option value="Mecanico">Mecanico</option>
                        <option value="Jardineria">Jardineria</option>
                        <option value="Tecnico">Tecnico en Electrodomesticos</option>
                        <option value="Pintor">Pintor</option>
                      </select>
                      <br>
      
                      <label for="descripcion">Descripcion</label><br>
                      <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old ('descripcion')}}</textarea>
                      <br>
      
                      <label for="imagen">Imagen</label><br>
                      <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
                      <br><br>
      
                      <div  class="form-button mt-3">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div> 
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
