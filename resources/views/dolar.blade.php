@extends('layouts.noMenu')

@section('content')
<div class="container" style="margin-top: 10%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Precio del Dolar</div>
                <div class="panel-body">
                    
                    <p>Precio sugerido por Yahoo! <span>{{$precio}}</span></p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/dolar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="dolar" class="col-md-4 control-label">Introducir el valor del Dolar</label>

                            <div class="col-md-6">
                                <input id="dolar" type="text" class="form-control" name="dolar">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="float:right">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
