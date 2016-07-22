@extends('layouts.app')

@section('scripts')
{{ Html::script('js/liveSearch.js')}}
{{ Html::script('js/highlighttable.js')}}
{{ Html::style('css/style.css')}}
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a style='float:left;' href="{{route('proveedores.edit',$p->idProveedor)}}">Editar</a></td>
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
@endsection

