@extends('layouts.app')

@section('scripts')
{{ Html::script('js/transformacion.js')}}
<script>
    iniciar();
    // $('#modal1').openModal(); este hace que se dispare el modal mediante js
    // $('.modal-trigger').leanModal(); y este que se dispare por medio un boton 
</script>
@endsection


@section('content')
<div class="row">
    
    <div class="col s12">
        <a href="{{URL::previous() }}" type="button" class="btn btn-info">Atras<i class="fa fa-exit"></i></a>
    </div>
    
    <div class="col s12 pestanias">
        <ul class="tabs tabs-fixed-width">
          <li class="tab col s3"><a class="active" href="#menu1">Baja Producto</a></li>
          <li class="tab col s3"><a href="#menu2">Alta Producto Suelto</a></li>
        </ul>
    
    
        <div id="menu1">
            <div>
                {{ Form::label('q', 'Agregar Productos a Descontar') }}
                {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'autocomplete','autofocus'])}}
                {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                <div id="stockContainer"></div>
            </div> 

            <div>
                {{ Form::label('SelectCant', 'Cantidad') }}
                {{ Form::text('SelectCant', '', ['id' =>  'SelectCant', 'placeholder' =>  '1','class'=> 'form-control'])}}
            </div> 

            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Cant</th>
                        <th>Cod</th>
                        <th>Descripcion</th>
                        <th>Lugar de la perdida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="tablaPerdidas"></tbody>
            </table>
        </div>

        <div id="menu2">
            <div>
                {{ Form::label('q2', 'Agregar Productos suelto') }}
                {{ Form::text('q2', '', ['id' =>  'q2', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                {{ Form::hidden('qId2', '', ['id' =>  'qId2',])}}
                <div id="stockContainer2"></div>
            </div> 

            <div>
                {{ Form::label('SelectCant2', 'Cantidad (En Kg o Litros)') }}
                {{ Form::text('SelectCant2', '', ['id' =>  'SelectCant2', 'placeholder' =>  '1','class'=> 'form-control'])}}
            </div> 

            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Cant(Kg o Lts)</th>
                        <th>Cod</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaTransformaciones"></tbody>
            </table>

            <div class="col s12">
                <button type="button" class="btn btn-primary" id="realizarTransformacion"  onclick="cargarTransformacion()" style="float:right;"  disabled="disabled">Realizar Transformacion</button>
            </div>  
        </div>  
        
    </div>

   @include('partials.modal')
    
</div>
        

@endsection
