<x-plantilla>
    <br>
    <br>
    <br>
    <br><br>
    <table class="cont-tabla">
        <thead>
        <tr>
            <th colspan="8">
                <h1>Categorias de Trabajador</h1>
            </th>
        </tr>
        </thead>

        <tr>
            @foreach ($user->categorias as $categoria)
            <td colspan="8"><p>{{$categoria->name}}</p></td>
            <tr>
            @endforeach
        </tr>
    </table>
</x-plantilla>