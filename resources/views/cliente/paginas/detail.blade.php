<x-plantilla>
    <div>
    <h1>{{$servicios['nombre']}}</h1>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios['imagen'] }}" width="200" alt="">
    <p>{{$servicios['descripcion']}}</p>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="bajo" id="bajo" value="100">
        <label class="form-check-label" for="bajo">BAJO</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="medio" id="medio" value="200">
        <label class="form-check-label" for="medio">MEDIO</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="urgente" id="urgente" value="300">
        <label class="form-check-label" for="urgente">URGENTE</label>
    </div>
    <a href="">Solicitar</a>

</x-plantilla>