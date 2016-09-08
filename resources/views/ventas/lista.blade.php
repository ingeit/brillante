@extends('layouts.app')

@section('scripts')
{{ Html::script('js/liveSearch.js')}}
{{ Html::script('js/ventaCobrar.js')}}
{{ Html::script('js/highlighttable.js')}}
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default">
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
                                    <td>{{$l->monto}}</td>
                                    <td><a href="{!! route('detalleVenta', ['id'=>$l->idVenta, 'fecha'=>$l->fecha,'monto'=>$l->monto]) !!}">Detalles</a></td>
                                    @if($l->estado == 'I')<!-- estado = I = Impaga; P = pagada--> 
                                        <!-- Button trigger modal -->
                                        <td>
                                            <button type="button" class="open-venta btn btn-danger btn-sm" data-monto="{{$l->monto}}" data-venta="{{$l->idVenta}}" data-toggle="modal" data-target="#myModal">
                                              Cobrar
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-primary disabled btn-sm" >
                                              Cobrada
                                            </button>
                                        </td>
                                    @endif
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">COBRAR VENTA</h4>
      </div>
      <div class="modal-body">
          <ul class="list-group" id="listaModal">            
          </ul>
          <ul class="list-group" id="listaModalTotal">            
          </ul>
            <div class="form-group">
                 {{ Form::label('pago', 'Paga con: $') }}
                 {{ Form::number('pago', '', ['id' =>  'pago', 'step' => 'any','class'=> 'form-control','placeholder'=>'Opcional','autofocus'])}}
                 <ul class="list-group" id="vuelto">            
                   </ul>
             </div> 


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a class="btn btn-success" id="botonCobrar">Cobrar</a>
      </div>
    </div>

  </div>
</div>


@endsection

