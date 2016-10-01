@extends('layouts.app')

@section('content')
<!-- MATERIALIZEEEEE -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!--Import materialize.css-->
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- MATERIALIZEEEEE -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script type="text/javascript" src="js/materialize.min.js"></script>
<!-- HASTA AQUI MATERIALIZEEEEE -->


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                <div class="card small col-md-4">
                   <div class="card-image waves-effect waves-block waves-light">
                     <img class="activator" src="{{ asset('assets/imagenes/venta.jpg') }}">
                   </div>
                   <div class="card-content">
                     <span class="card-title activator grey-text text-darken-4">VENTAS<i class="material-icons right">more_vert</i></span>
                   </div>
                   <div class="card-reveal">
                     <span class="card-title grey-text text-darken-4">Elija una opcion<i class="material-icons right">close</i></span>
                     <button><a href="{{ route('ventas.index',['seccion'=>'index']) }}">Nueva Venta</a></button>
                   </div>
                 </div>
                    
                    <div class="card small col-md-4">
                   <div class="card-image waves-effect waves-block waves-light">
                     <img class="activator" src="{{ asset('assets/imagenes/venta.jpg') }}">
                   </div>
                   <div class="card-content">
                     <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                     <p><a href="#">This is a link</a></p>
                   </div>
                   <div class="card-reveal">
                     <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                     <p>Here is some more information about this product that is only revealed once clicked on.</p>
                   </div>
                 </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
