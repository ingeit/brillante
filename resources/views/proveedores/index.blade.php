@extends('layouts.app')

@section('scripts')
{{ Html::style('css/style.css')}}
@if(Session::has('resultado'))
    <script>
    $(function() {
        $('#myModal').modal('show');
    });
    </script>
@endif
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
                                    {!! Form::open(['method' => 'delete', 'action' => ['ProveedoresController@destroy', $p->idProveedor]]) !!}
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-link']) !!}
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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div id="tituloModal" class="modal-title" align="center">
                    @if (Session::get('codigo') == 0)
                        <p class="alert alert-danger" >ERROR</p>  
                    @else
                        <p class="alert alert-success">CORRECTO</p>
                    @endif
                </div>
        <div id="mensajeModal" class="modal-body" align="center">
            <p>{{Session::get('mensaje')}}</p>
        </div>
        <div class="modal-footer">
            <a href="{{ route('proveedores.index') }}">Cerrar</a>
        </div>
    </div>

  </div>
</div>
@endsection

