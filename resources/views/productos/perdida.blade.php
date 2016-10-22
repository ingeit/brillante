@extends('layouts.app')

@section('scripts')
{{ Html::script('js/perdidas.js')}}
<script>
    iniciar();
</script>
{{ Html::style('css/style.css')}}
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <dl class="list">
                    <dt style="width: 100%;">
                        <div class="form-group">
                            @if(Session::get('titulo') == 'Perdida')
                            {{ Form::label('q', 'Agregar Productos a Descontar') }}
                            @else
                            {{ Form::label('q', 'Agregar Productos a Transformar') }}
                            @endif
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
            @if(Session::get('titulo') == 'Perdida')
                <button type="button" class="btn btn-primary" id="realizarPerdida" style="float:right;" onclick="cargarPerdida()" disabled="disabled">Realizar Perdida</button>
            @else
                <button type="button" class="btn btn-primary" id="realizarPerdida" style="float:right;" onclick="cargarPerdida_transformar()" disabled="disabled">Siguiente paso</button>
            @endif
        </div>
    </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
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
