@extends('layouts.app')

@section('scripts')
{{ Html::style('css/style.css')}}
{{ Html::script('js/proveedores.js')}}

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <ul class="list-inline">
                        <li>
                            <a href="{{ route('proveedores.create') }}" class="btn btn-default">Nuevo Proveedor</a>
                        </li>
                    </ul>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Lista de Proveedores</div>
                <div class="panel-body">
                    <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                        <thead>
                            <tr>
                                <th>Razon Social</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>    
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table id="data" class="table table-hover">
                            <tbody id="resultado">
                                @foreach ($proveedores as $p)
                                <tr>
                                    <td>{{$p->razonSocial}}</td>
                                    <td>{{$p->direccion}}</td>
                                    <td>{{$p->telefono}}</td>
                                    <td><a style='float:left;' href="{{route('proveedores.edit',$p->idProveedor)}}">Editar</a></td>
                                    <td>
                                        <button class="btn btn-link"  onclick="proveedorEliminar(this)" data-idproveedor="{{$p->idProveedor}}"><i class="glyphicon glyphicon-trash"></i></button>
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
        <div id="botonModal" class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
@endsection

