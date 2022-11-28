<x-plantilla>
  @php
  // SDK de Mercado Pago
  require base_path('vendor/autoload.php'); 
  // Agrega credenciales
  MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


  // Crea un objeto de preferencia
  $preference = new MercadoPago\Preference();

  // Crea un ítem en la preferencia
  $item = new MercadoPago\Item();
  $item->title = $servicios['nombre'];
  $item->quantity = 1;
  $item->unit_price = 75.56;
  $preference->back_urls = array(
    "success" => "https://www.tu-sitio/success",
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";
  $preference->items = array($item);
  $preference->save();
  @endphp
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <div>
    <h1>{{$servicios['nombre']}}</h1>
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$servicios['imagen'] }}" width="200" alt="">
    <p>{{$servicios['descripcion']}}</p>
    <h2>precio por el trabajo</h2>
    </div>
    {{-- <a href="{{ route('cliente.checkout.index') }}">Solicitar Servicio</a> --}}
    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <div class="cho-container"></div>
    <script>
      const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
        locale: 'es-MX'
      });

      mp.checkout({
        preference: {
          id: '{{$preference ->id}}'
        },
        render: {
          container: '.cho-container',
          label: 'Pagar',
        }
      });
    </script>
    <br>
    <h1>Informacion del Trabajador</h1>
    <h2>{{$servicios->user['name']}}</h2>
    <h2>{{$servicios->user['email']}}</h2>
    <h2>{{$servicios->user['address']}}</h2>
    <h2>{{$servicios->user['phone']}}</h2>
    <h2>{{$servicios->user['trabajador_profesion']}}</h2>
    <br>
    <br>
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewire('servicios-ratings', ['servicios' => $servicios], key($servicios->id))
    @livewireScripts
</x-plantilla>