<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="{{asset('assets/css/box.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet" />
  <title>SAD</title>
</head>
<body>
  @php
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php'); 
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = $check['servicios_nombre'];
    $item->quantity = 1;
    $item->unit_price = $check['precio'];
    $preference->back_urls = array(
        "success" => "http://p3.test/cliente/success/" . $check->id,
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
    <table class="cont-tabla">
      <thead>
          <tr>
              <th>ID Solicitud</th>
              <th>Nombre del Cliente</th>
              <th>Email del Cliente</th>
              <th>Direccion del Cliente</th>
              <th>Celular del Cliente</th>
              <th>Precio</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>{{$check['id']}}</td>
              <td>{{$check->user['name']}}</td>
              <td>{{$check->user['email']}}</td>
              <td>{{$check->user['address']}}</td>
              <td>{{$check->user['phone']}}</td>
              <td>{{$check['precio']}}</td>
          </tr>
      </tbody>
  </table>
  <br>

    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <div style="text-align: center">
      <div class="cho-container"></div>
    </div>
    
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

<section class="box">

  <h1>Informacion Adicional</h1>

    <h4>Precios</h4>
    <h4>Bajo $150: Se atiende en la misma semana de la solicitud</h4>
    <h4>Moderado $250: Se atiende tres dias despues de la solicitud</h4>
    <h4>Urgente $350: Se atiende en las primeras 24hrs de la solicitud</h4>
    <br>
    <h5>El Trabajador se contactara con usted en la brevedad</h5>

</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>