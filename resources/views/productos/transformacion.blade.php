@extends('layouts.app')

@section('scripts')
{{ Html::script('js/transformacion.js')}}
<script>
    iniciar();
</script>
{{ Html::style('css/style.css')}}
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <a href="{{ route('productos.index') }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
            
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menu1">Baja Producto</a></li>
                <li><a data-toggle="tab" href="#menu2">Alta Producto Suelto</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <div>
                        <dl class="list">
                            <dt style="width: 100%;">
                                <div class="form-group">
                                    {{ Form::label('q', 'Agregar Productos a Descontar') }}
                                    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                                    {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                                    <div id="stockContainer">
                                    </div>
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
                        <div class="panel-heading">Perdidas</div>
                        <div class="panel-body">
                            <div  class="table-responsive">              
                                <table class="table table-striped tabla-listaPerdida">
                                    <thead>
                                        <tr>
                                            <th>Cant</th>
                                            <th>Cod</th>
                                            <th>Descripcion</th>
                                            <th>Lugar de la perdida</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaPerdidas">
                                    </tbody>
                                </table>
                            </div>
                        </div>     
                    </div> 
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div>
                        <dl class="list">
                            <dt style="width: 100%;">
                                <div class="form-group">
                                    {{ Form::label('q2', 'Agregar Productos suelto') }}
                                    {{ Form::text('q2', '', ['id' =>  'q2', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                                    {{ Form::hidden('qId2', '', ['id' =>  'qId2',])}}
                                    <div id="stockContainer2">
                                    </div>
                                </div> 
                            </dt>
                            <dt style="width: 100%;">
                                <div class="form-group2">
                                    {{ Form::label('SelectCant2', 'Cantidad (En Kg o Litros)') }}
                                    {{ Form::text('SelectCant2', '', ['id' =>  'SelectCant2', 'placeholder' =>  '1','class'=> 'form-control'])}}
                                </div> 
                            </dt>
                        <dl>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Transformacion</div>
                        <div class="panel-body">
                            <div  class="table-responsive">              
                                <table class="table table-striped tabla-listaTransformacion">
                                    <thead>
                                        <tr>
                                            <th>Cant(Kg o Lts)</th>
                                            <th>Cod</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaTransformaciones">
                                    </tbody>
                                </table>
                            </div>
                        </div>     
                    </div> 
                    <button type="button" class="btn btn-primary" id="realizarTransformacion"  onclick="cargarTransformacion()" style="float:right;"  disabled="disabled">Realizar Transformacion</button>
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
        </div>
        <div id="tituloModal" class="modal-title" align="center">
        </div>
        <div id="mensajeModal" class="modal-body" align="center">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
@endsection
