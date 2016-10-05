@extends('layouts.app')

@section('scripts')
{{ Html::script('js/ventaCobrar.js')}}
@if(Session::has('resultado'))
    <script>
    $(function() {
        $('#myModalMensaje').modal('show');
    });
    </script>
@endif
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default">
                <a href="{{ route('ventas.index',['seccion'=>'index']) }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
                <div class="panel-heading">Ventas Realizadas</div>
                <div class="panel-body">
                    <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                        <thead>
                            <tr>
                                <th>Nº Venta</th>
                                <th>Fecha</th>
                                <th>Total $</th>
                                <th></th>  
                            </tr>
                        </thead>
                    </table>    
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table id="data" class="table table-hover">
                            <tbody id="resultado">
                                @foreach ($listaVenta as $l)
                                <tr>
                                    <td>{{$l->idVenta}}</td>
                                    <td>{{$l->fecha}}</td>
                                    <td>$ {{$l->monto}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['VentasController@mostrar']]) !!}
                                        {{ Form::hidden('idVenta',$l->idVenta)}} 
                                            <button style="float:right" class="btn btn-danger btn-sm" type="submit">Detalles</button>
                                        {!! Form::close() !!}
                                        <!--<a href="{!! route('detalleVenta', ['id'=>$l->idVenta, 'fecha'=>$l->fecha,'monto'=>$l->monto]) !!}">Detalles</a>-->
                                    </td>
                                        <td>
                                             @if($l->estado == 'I')<!-- estado = I = Impaga; P = pagada--> 
                                        <!-- Button trigger modal -->
                                            <button type="button" id="esImpaga{{$l->idVenta}}" class="open-venta btn btn-danger btn-sm" data-monto="{{$l->monto}}" data-venta="{{$l->idVenta}}" data-toggle="modal" data-target="#myModal">
                                              Cobrar
                                            </button>
                                             @endif
                                        </td>
                                    <td>
                                    {!! Form::open(['route' => ['ventas.destroy',$l->idVenta],'method'=>'delete']) !!}
                                        <button style="float:right" class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>     
                </div>
            </div>
        </div>
    </div>

<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">COBRAR VENTA</h4>
      </div>
      <div class="modal-body">
          
        <ul class="list-group" id="listaModal"></ul>
        
        <p class="list-group" id="listaModalTotal">Total: $ <span></span></p>
          
        <div class="form-group">
            {{ Form::label('pago', 'Paga con: $') }}
            {{ Form::number('pago', '', ['id' =>  'pago', 'step' => 'any','class'=> 'form-control','placeholder'=>'Opcional'])}}
            <p class="list-group" id="vuelto"></p>
        </div> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a class="btn btn-success" id="botonCobrar" data-idventa="" onclick="cobrar(this)">Cobrar</a>
      </div>
    </div>

  </div>
</div>

<div id="myModalMensaje" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div class="modal-title" align="center">
                    @if (Session::get('codigo') == 0)
                        <p class="alert alert-danger" >ERROR</p>  
                    @else
                        <p class="alert alert-success">CORRECTO</p>
                    @endif
                </div>
        <div  class="modal-body" align="center">
            <p>{{Session::get('mensaje')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

  </div>
</div>


@endsection

