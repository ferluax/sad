<x-plantilla>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <table class="cont-tabla">
    <thead>
    <tr>
        <th colspan="8">
            <h1>{{$servicios['nombre']}}</h1>
        </th>
    </tr>
    </thead>
    <tr>
        <td class="" colspan="8"><img src="{{ asset('storage').'/'.$servicios['imagen'] }}" width="400" alt=""></td>
    </tr>
    <tr>
        <td colspan="8"><p>{{$servicios['descripcion']}}</p></td>
        <tr>
        <td colspan="8"><h1>Informacion del Trabajador</h1></td>
        </tr>
        <td><h2>{{$servicios->user['name']}}</h2></td>
        <td><h2>{{$servicios->user['email']}}</h2></td>
        <td><h2>{{$servicios->user['address']}}</h2></td>
        <td><h2>{{$servicios->user['phone']}}</h2></td>
        <td><h2>{{$servicios->user['trabajador_profesion']}}</h2></td>
    </tr>
</table>
<br>
<br>
<form action="{{ url('/cliente/checkout') }}" method="post">
    @csrf

    <input type="hidden" value="{{$servicios['id']}}" name="servicios_id">
    <input type="hidden" value="{{$servicios['nombre']}}" name="servicios_nombre">
    <input type="hidden" value="{{$servicios->user['email']}}" name="servicios_email">
    <div style="text-align: center;">
        <select class="form-control" name="precio" id="precio">
            <option value="">Seleccionar opcion</option>
            <option value="150">Baja (Se atiende en la misma semana de la solicitud)</option>
            <option value="250">Moderada (Se atiende tres dias despues de la solicitud)</option>
            <option value="350">Urgente (Se atiende en las primeras 24hrs de la solicitud)</option>
        </select>
        <br>
        <br>
    </div>
        <input type="submit" class="btn1" value="Solicitar Servicio" required>
</form>
    <br>
    <br>
    <br>
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
    @livewire('servicios-ratings', ['servicios' => $servicios], key($servicios->id))
    @livewireScripts
</x-plantilla>