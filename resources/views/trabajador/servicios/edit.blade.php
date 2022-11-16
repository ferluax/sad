<x-plantilla>
    <form action="{{ url('/trabajador/servicios/'.$servicios->id) }}" method="post" enctype="multipart/form-data">
        
        <!-- {{-- para evitar error 419 --}} -->
        {{-- {{ url('/trabajador/servicios/'.$servicios->id.) }} --}}
        @csrf 
        {{ method_field('PATCH') }}
        
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" value="{{$servicios->nombre}}">
        <br>

        <label for="categoria">Categoria</label><br>
        <select name="categoria" id="categoria">
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
        <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{$servicios->descripcion}}</textarea>
        <br>

        <label for="direccion">Direccion de email de trabajo</label><br>
        <input type="email" name="direccion" id="direccion" value="{{$servicios->direccion}}">
        <br>

        <label for="imagen">Imagen</label><br>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
        <input type="file" name="imagen" id="imagen" value="">
        <br><br>

        <!-- enlace a index -->
        <a href="{{ url('trabajador/servicios') }}">Regresar</a><br><br>

        <input type="submit" value="Guardar cambios">
    </form>
</x-plantilla>
