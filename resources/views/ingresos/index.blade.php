@extends('layouts.app')

@section('scripts')
{{ Html::script('js/ingresos.js')}}
{{ Html::style('css/style.css')}}
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                 <ul class="list-inline">
                     <li>
                         <a href="{{ route('ingresos.index',['seccion'=>'lista']) }}" class="btn btn-default">LISTA INGRESOS</a>
                     </li>    
                </ul>
            </div>
            <div>
                <dl class="list">
                    <dt style="width: 100%;">
                        <div class="form-group">
                            {{ Form::label('q', 'Producto a Ingresar') }}
                            {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                            {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                        </div> 
                    </dt>
                    <dt style="width: 100%;">
                        <div class="form-group2">
                            {{ Form::label('SelectCant', 'Cantidad') }}
                            {{ Form::text('SelectCant', '', ['id' =>  'SelectCant', 'placeholder' =>  '1','class'=> 'form-control'])}}
                        </div> 
                    </dt>
                <dl>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Ingresos</div>
                <div class="panel-body">
                    <div  class="table-responsive">              
                        <table class="table table-striped tabla-listaIngreso">
                            <thead>
                                <tr>
                                    <th>Cant</th>
                                    <th>Cod</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaIngresos">
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div> 
            <button type="button" class="btn btn-primary" id="realizarIngreso" style="float:right;" onclick="cargarIngreso()" disabled="disabled">Realizar Ingreso</button>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Felicidades!!!</h4>
      </div>
      <div class="modal-body">
        <p>Ingreso Realizado con Exito.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
@endsection
