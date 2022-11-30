<x-plantilla>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="text-align: center">
        {{-- formulario para poder obtener la busqueda que el usuario realice --}}
        <form action="{{ route('cliente.paginas.index') }}" method="get">
            <div>
                <input type="text" name="buscar" id="buscar" value="{{$buscar}}">
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>
    <br><br>

    @if(count($servicios)<=0)
        <h1>Lo sentimos no contamos con el servicio que estas solicitando...<h1>
    @else

    {{-- Aqui se mostraran todos los servicios registrados y el registro que el cliente busque en especifico 
    @foreach($servicios as $servicios)
    {{-- <div>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <h1>{{$servicios->nombre}}</h1>
        <h3>{{$servicios->categoria}}</h3>
        <a href="{{url ('/cliente/paginas/'.$servicios->id) }}">Ver</a>
    </div>
    @endforeach --}}
    <table class="cont-tabla">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre del Servicio</th>
                <th>Categoria</th>
                <!-- Para editar o modificar el registro -->
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicios)
            <tr>
                <td><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt=""></td>
                <td>{{$servicios->nombre}}</td>
                <td>{{$servicios->categoria}}</td>
                <td><a href="{{url ('/cliente/paginas/'.$servicios->id) }}">Ver</a></td>
            </tr>
            @endforeach
    @endif
        </tbody>
    </table>
</x-plantilla>
