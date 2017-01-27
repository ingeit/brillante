@extends('layouts.app')

@section('scripts')
{{ Html::script('js/productos.js')}}
{{ Html::script('js/highlighttable.js')}}
{{ Html::style('css/style.css')}}
@endsection

@section('content')
<div class="row">
    <div class="col s11 m11 l11 contenedor">
        <div class="row">
            {{ Form::label('q', 'Consultar Producto') }}
            {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control'])}}
        </div>
        <!--<div  style="height: 550px;overflow-y: scroll;">-->  
            <table id="data" class="responsive-table">
                <thead>
                    <tr>
                        <th>Deposito</th>
                        <th>Nombre</th>
                        @if($user == 'admin')
                            <th>Precio sin iva</th>
                            <th>Ganancia</th>
                        @endif
                        <th>Precio Venta</th>
                        <th>Stock General</th>
                        <th>Stock Deposito</th>
                        <th>Stock Local</th>
                        @if($user == 'admin')
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="resultado">
                    @foreach ($listaProductos as $l)
                    <tr>
                        <td>{{$l->idDeposito}}</td>
                        <td>{{$l->nombre}}</td>
                        @if($user == 'admin')
                            @if($l->cotizacion=='Dolares')
                                <td><font color="#04B431">u$s {{$l->precio}}<font></td>
                            @else
                                <td>$ {{$l->precio}}</td>
                            @endif
                            <td>{{$l->ganancia}}%</td>
                        @endif
                        <td>$ {{$l->precioVenta}}</td>
                        <td>{{$l->stock}}</td>
                        <td>{{$l->stockDeposito}}</td>
                        <td>{{$l->stockLocal}}</td>
                        @if($user == 'admin')
                            <td><a style='float:left;' href="{{route('productos.edit',$l->idProducto)}}">Editar</a></td>
                            <td>
                                <button style="float:right" class="btn btn-danger btn-sm" onclick="productoEliminar(this)" data-idproducto="{{$l->idProducto}}">Eliminar</button>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
  
    </div>
</div>


   @include('partials.modal')
   
@endsection

