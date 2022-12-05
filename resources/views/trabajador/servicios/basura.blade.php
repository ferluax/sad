<x-plantilla>
    <br>
    <br>
    <br>
    <br>
    <br>
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
                    {{-- <a class="btn btn-warning" href="">Restaurar</a> --}}
                    <form class="d-inline" action="{{ url('/trabajador/restore/'.$categoria->id) }}" method="post">
                        @csrf
                        <input class="btn btn-warning" type="submit" onclick="return confirm('¿Estas seguro, se restaurara el registro?')" value="Restaurar">
                    </form>    
                     | 
                        <!-- formulario para eliminar un registro -->
                        <form class="d-inline" action="{{ url('/trabajador/forceDelete/'.$categoria->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro, se eliminara para siempre?')" value="Eliminar Definitivamente">
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-plantilla>