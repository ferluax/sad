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
                <th>Nombre</th>
                <th>Nombre del Servicio</th>
                <th>Correo de Trabajador</th>
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
                <td>{{$check->servicios_nombre}}</td>
                <td>{{$check->servicios_email}}</td>
                <td>${{$check->precio}}.00</td>
                <form action="{{ url('/cliente/pdf/'.$check->id) }}" method="post" target="_blank">
                    @csrf
                    <td>
                        <input class="btn btn-danger" type="submit" value="Recibo PDF">
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-plantilla>