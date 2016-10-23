<!-- Previene que se cachee las cosas-->
<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 "); // Proxies. ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo">BRILLANTE®</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Acceder</a></li>
                            <li><a href="{{ url('/register') }}">Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                                    @if(Auth::user()->role === 'admin')
                                    <li><a href="{{ url('/register') }}">Registrar nuevo usuario</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif    
                </ul>
                <ul class="side-nav fixed" id="mobile-demo">
                    <li>
                        <div class="userView">
                            <img class="background" src="img/office.jpg">
                            <img class="circle" src="img/unknown.png">
                            <div><span>{{ Auth::user()->name }}</span></div>
                            <div style="margin-top: -20px"><span>{{ Auth::user()->role }}</span></div>
                        </div>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Productos</a>
                                <div class="collapsible-body" style="">
                                    <ul>
                                    <li><a href="{{ route('productos.index') }}">Lista</a></li>
                                    
                                        <li>
                                            <a href="{{ route('productos.create') }}">Nuevo Producto</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('perdidasProducto.index') }}">Perdidas Producto</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('transformacion.index') }}">Generar Producto suelto</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Ventas</a>
                                <div class="collapsible-body" style="">
                                    <ul>
                                    <li><a href="{{ route('ventas.index') }}">Nueva</a></li>
                                    <li><a href="{{ route('listaVentas') }}">Lista Ventas</a></li> 
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Compras</a>
                                <div class="collapsible-body" style="">
                                    <ul>
                                    <li><a href="{{ route('compras.index') }}">Nueva</a></li> 
                                    <li><<a href="{{  route('listaCompras') }}">Lista Compras</a></li> 
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('ingresos.index') }}">Ingreso Local</a></li>
                    @if (!Auth::guest())
                        @if (Auth::user()->role == 'admin')
                            <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                            <li><a href="{{ url('/dolar') }}">Actualizar Dolar</a></li>
                        @endif
                    @endif
                    <li class="divider"></li> 
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">{{ Auth::user()->username }}</a>
                                <div class="collapsible-body" style="">
                                    <ul>
                                    <li><a href="{{ url('/logout') }}">Salir</a></li>
                                    <li><a href="{{ url('/register') }}">Registrar nuevo usuario</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="/js/js-query/jquery-ui.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>$(document).ready(function(){
        $('.button-collapse').sideNav({
            menuWidth: 250, // Default is 240
            edge: 'left', // Choose the horizontal origin
            //closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
    });
    </script>
    @yield('scripts')
</body>
</html>
