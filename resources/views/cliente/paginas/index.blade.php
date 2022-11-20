<x-plantilla>
    <div>
        {{-- formulario para poder obtener la busqueda que el usuario realice --}}
        <form action="{{ route('cliente.paginas.index') }}" method="get">
            <div>
                <input type="text" name="buscar" id="buscar" value="{{$buscar}}">
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>

    @if(count($servicios)<=0)
        <h1>Lo sentimos no contamos con el servicio que estas solicitando...<h1>
    @else

    {{-- Aqui se mostraran todos los servicios registrados y el registro que el cliente busque en especifico --}}
    @foreach($servicios as $servicios)
    <div>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <h1>{{$servicios->nombre}}</h1>
        <h3>{{$servicios->categoria}}</h3>
        <a href="{{url ('/cliente/paginas/'.$servicios->id) }}">Ver</a> 
    </div>
    @endforeach
    @endif
</x-plantilla>
