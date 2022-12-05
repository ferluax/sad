<x-plantilla>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="alert alert-success" role="alert">
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje') }}
        @endif
    </div>        
    <a class="btn btn-info" href="{{ url('/trabajador/eliminados') }}">Categorias Almacenadas</a>
    <table class="cont-tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <!-- Para editar o modificar el registro -->
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->name}}</td>
                <td>
                    <a class="btn btn-warning" href="{{ url('/trabajador/json/'.$categoria->id) }}">Ver</a>    
                     | 
                        <!-- formulario para eliminar un registro -->
                        <form class="d-inline" action="{{ url('/trabajador/eliminar/'.$categoria->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro?')" value="Eliminar">
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-plantilla>