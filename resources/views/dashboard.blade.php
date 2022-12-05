{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <a href="{{ route('dashboard') }}">Inicio</a>
    
    {{-- Paginas para trabajadores 
    @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.index') }}">Mis Servicios</a>
        @endif

        @can('manage-servicios')
            <a href="{{ route('trabajador.servicios.create') }}">Agregar Servicio</a>
        @endif

        {{-- Paginas para clientes 
        @can('manage-paginas')
            <a href="{{ route('cliente.paginas.index') }}">Servicios</a>
        @endif


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                    <i class="fas fa-sign-out-alt"></i>
    
                    {{ __('Log Out') }}
                </a>
                
            </div>
        </form>
        <h1>pagina de inicio</h1>
        
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" />
    <title>SAD</title>
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/slider.css')}}" rel="stylesheet" />
</head>
<body>

    <header id="Header">
        <img src="Krey-Academy-Logo.png" alt="" class="logo">

        <!--Menu header-->
        <ul class="main-menu">
            <li class="menu-item"><a class="link" href="{{ route('dashboard') }}">Inicio</a></li>

            {{-- Paginas de Trabajador --}}
            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ route('trabajador.servicios.index') }}">Mis Servicios</a></li>
            @endif

            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ route('trabajador.servicios.create') }}">Agregar Servicios</a></li>
            @endif

            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ url('/trabajador/categoria') }}">Mis Categorias</a></li>
            @endif

            @can('manage-servicios')
            <li class="menu-item"><a class="link" href="{{ url('/trabajador/general') }}">Todas las Categorias</a></li>
            @endif

            {{-- Paginas de Cliente --}}
            @can('manage-paginas')
            <li class="menu-item"><a class="link" href="{{ route('cliente.paginas.index') }}">Servicios</a></li>
            @endif

            @can('manage-checkout')
                <li class="menu-item"><a class="link" href="{{ url('/cliente/recibos') }}">Mis Recibos</a></li>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="nav-item">
                    <li class="cta"><a class="link2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit(); " role="button">
                        <i class="fas fa-sign-out-alt"></i>
        
                        {{ __('Cerrar Sesion') }}
                    </a></li>
                    
                </div>
            </form>
        </ul>
    </header>

    <div class="slider-frame">
        <ul>
            <li><img src="assets/images/slider11.jpg" alt=""></li>
            <li><img src="assets/images/slider22.jpg" alt=""></li>
            <li><img src="assets/images/slider33.jpg" alt=""></li>
            <li><img src="assets/images/slider44.jpg" alt=""></li>
        </ul>
    </div>
        <section class="box">

            <h1>Nosotros</h1>

            <p>“SAD (Servicios a Domicilio) es una iniciativa sin fines de lucro que busca dar la oportunidad de
                crecimiento laboral para oficios y servicios que no tienen el mismo alcance que las profesiones.
                Estamos iniciando y creciendo con tu ayuda desde este año 2022. Una de las principales razones
                para llevar a cabo este sitio es ofrecer una oportunidad de empleo a prestadores de oficios que
                cuentan con las habilidades, conocimiento y compromiso de ofrecer sus servicios, así como
                promoverlos en base a las calificaciones que los mismos usuarios dejen saber y a su vez esto
                proporciona mayor seguridad del servicio aportado tanto para el cliente como para el mismo
                proveedor, además de mostrar la ubicación del experto y establecer un canal de comunicación.
                De esta manera estaremos brindando un servicio seguro y autenticado para resolver algún
                problema que se te presente y a la vez dando una oportunidad laboral a quien lo necesita.
                Esta app web ofrece la ventaja de ahorrar la mayor cantidad de tiempo posible de acuerdo a la
                gravedad del problema según lo indique el usuario.
                
            </p>

        </section>

    <footer>
        <div class="social-icons-container">
            <a href="" class="social-icon"></a>
            <a href="" class="social-icon"></a>
            <a href="" class="social-icon"></a>
            <a href="" class="social-icon"></a>
        </div>
        <ul class="footer-menu-container">
            <li class="menu-item">Legal</li>
            <li class="menu-item">Cookies</li>
            <li class="menu-item">Privacy</li>
            <li class="menu-item">Shipping</li>
            <li class="menu-item">Refunds</li>
        </ul>
        <span class="copyright">&copy;2022, SAD. Derechos resevados.</span>
    </footer>

    <script src="{{asset('assets/js/header.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $('.carousel').carousel({
  interval: 2000
});
</script>
