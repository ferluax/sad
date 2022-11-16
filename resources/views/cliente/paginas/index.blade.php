<x-plantilla>
    @foreach($servicios as $servicios)
    <div>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <h1>{{$servicios->nombre}}</h1>
        <a href="{{url ('/cliente/paginas/'.$servicios->id) }}">Ver</a> 
    </div>
    @endforeach
</x-plantilla>
