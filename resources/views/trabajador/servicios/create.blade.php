<x-plantilla>
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
        
        <!-- {{-- para evitar error 419 --}} -->
        @csrf 
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

        <label for="direccion">Direccion de email de trabajo</label><br>
        <input type="email" class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}">
        <br>

        <label for="imagen">Imagen</label><br>
        <input type="file" class="form-control" name="imagen" id="imagen" value="{{old('imagen')}}">
        <br><br>

        <input type="submit" class="btn btn-info" value="Agregar">
    </form>
</div>
</x-plantilla>
