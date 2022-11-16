<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>

    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>

</head>
    <header>
        <div class="wrapper">
        <div class="logo">Logo</div>
        <!--Menu header-->
        <nav>
            <a href="{{ route('login') }}">Ingresar</a>
            <a href="{{ route('register') }}">Crear cuenta</a>
        </nav>  
        </div>
    </header>
    <body>
            <div class="slider-frame">
                <ul>
                    <li><img src="assets/images/slider11.jpg" alt=""></li>
                    <li><img src="assets/images/slider22.jpg" alt=""></li>
                    <li><img src="assets/images/slider33.jpg" alt=""></li>
                    <li><img src="assets/images/slider44.jpg" alt=""></li>
                </ul>
            </div>
            <div class="tex_nosotros">
                <h2>Sobre nosotros</h2>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>