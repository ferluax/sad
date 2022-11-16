<x-plantilla>
    @foreach($servicios as $servicios)
    <div>
        <h1>{{$servicios->nombre}}</h1>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <p>{{$servicios->descripcion}}</p>
    </div>
    @endforeach
</x-plantilla>
