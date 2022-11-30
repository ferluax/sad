<x-plantilla>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table class="cont-tabla">
            <thead>
                <tr>
                    <th>ID Solicitud</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Precio</th>
                    <!-- Para editar o modificar el registro -->
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($check as $check)
                <tr>
                    <td>{{$check->id}}</td>
                    <td>{{$check->user->name}}</td>
                    <td>{{$check->servicios_id}}</td>
                    <td>{{$check->precio}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{url ('/cliente/checkout/'.$check->id) }}">Completar Pago</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-plantilla>