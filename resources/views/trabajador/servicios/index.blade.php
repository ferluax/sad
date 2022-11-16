<x-plantilla>
    <table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>DESCRIPCION</th>
                <th>DIRECCION</th>
                <th>IMAGEN</th>
                <!-- Para editar o modificar el registro -->
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicios)
            <tr>
                <td>{{$servicios->nombre}}</td>
                <td>{{$servicios->categoria}}</td>
                <td>{{$servicios->descripcion}}</td>
                <td>{{$servicios->direccion}}</td>
                {{-- <td>{{$servicios->imagen}}</td> --}}
                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios->imagen }}" width="200" alt="">
                </td>
                <td>
                    <a href="{{url ('/trabajador/servicios/'.$servicios->id.'/edit') }}">Editar</a>    
                     | 
                        <!-- formulario para eliminar un registro -->
                        <form action="{{ url('/trabajador/servicios/'.$servicios->id ) }}" method="post">
                            @csrf
                            {{ method_field('delete') }}
                            <input type="submit" onclick="return confirm('¿Estas seguro?')" value="Eliminar">
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-plantilla>
