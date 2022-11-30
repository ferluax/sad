<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Servicio SAD</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="assets/images/logo.jpeg" width="150"/></td>
        <td align="right">
            <h3>Servicios a Domicilio</h3>
            <pre>
                SAD
                Blvd. Gral. Marcelino García Barragán 1421, Olímpica
                44430
                Guadalajara, Jal
                +52 3317251421
                serviciosadomicilio112@gmail.com
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>PARA:</strong> {{$check->user['name']}}</td>
        <td><strong>DE:</strong> SAD - Servicios a Domicilio</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Servicio</th>
        <th>Correo Trabajador</th>
        <th>Precio $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$check->id}}</th>
        <td align="center">{{$check->servicios_nombre}}</td>
        <td align="center">{{$check->servicios_email}}</td>
        <td align="center">${{$check['precio']}}.00</td>
        <td align="right">${{$check['precio']}}.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Cargo de Mercado Pago $</td>
            <td align="right">18.82</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ {{$check['precio']}}.00</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>