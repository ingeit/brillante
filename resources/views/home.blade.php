@extends('layouts.app')

@section('scripts')
{{ Html::script('js/dashboard.js')}}
@endsection


@section('content')

<div>
    <div class="row">
        <div class="offset-l1 offset-m1 offset-s1 col l10">
            <div class="row dashboardPanels">
                <div class="col m6 l3">
                    <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-green">
                        <i class="fa fa-user"></i>
                     </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 3 </h2>
                        <p class="text-muted">Users</p>
                    </div>
                   </div>
                </div>
                <div class="col m6 l3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-red">
                        <i class="fa fa-list-ul"></i> 
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0 </h2>
                        <p class="text-muted">Categories</p>
                    </div>
                   </div>
                </div>
                <div class="col m6 l3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-blue">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0 </h2>
                        <p class="text-muted">Products</p>
                    </div>
                   </div>
                </div>
                <div class="col m6 l3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-yellow">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0</h2>
                        <p class="text-muted">Sales</p>
                    </div>
                   </div>
                </div>
            </div>
            
            <div class="row dashboardCharts dashboardChartsBig">
                <div class="col s4">
                    <div class="box">
                        <div class="box-header"><h3>Productos</h3><small>Cantidad de Productos Vendidos por Mes</small></div>
                        <canvas id="productosVendidosChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #2196f3;"><span class="rounded" style="color: #2196f3!important;"></span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="box">
                        <div class="box-header"><h3>Compras</h3><small>Ultimas Compras</small></div>
                        <canvas id="misComprasChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #ef193c;"><span class="rounded" style="color: #ef193c!important;"><i class="fa fa-caret-down" style="color: #ef193c!important;"></i> 20%</span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="box">
                        <div class="box-header"><h3>Ventas </h3><small>Ultimas Ventas Realizadas</small></div>
                        <canvas id="misVentasChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #22b66e;"><span class="rounded" style="color: #22b66e!important;"><i class="fa fa-caret-up" style="color: #22b66e!important;"></i> 80%</span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
            </div>
            
            <div class="row tablasestadisticas">
                <div class="col s12 m8 l4 tablasestadistica">
                  <div class="paneles panel-default">
                    <div class="panel-heading">
                      <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>PRODUCTOS MAS VENDIDOS</span>
                      </strong>
                    </div>
                    <div class="panel-body">
                      <table class="table table-striped table-bordered table-condensed">
                       <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Cantidad Vendida</th>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach($datos as $d)
                            <tr>
                               <td>{{$d->nombre}}</td>
                               <td>{{$d->cantidad}}</td>
                            </tr>  
                           @endforeach
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col s12 m8 l4 tablasestadistica">
                   <div class="paneles panel-default">
                     <div class="panel-heading">
                       <strong>
                         <span class="glyphicon glyphicon-th"></span>
                         <span>ULTIMAS VENTAS</span>
                       </strong>
                     </div>
                     <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Fecha</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach($datos as $d)
                            <tr>
                               <td>{{$d->nombre}}</td>
                               <td>{{$d->cantidad}}</td>
                            </tr>  
                           @endforeach
                    </tbody>
                  </table>
                 </div>
                </div>
               </div>
               <div class="col s12 m8 l4 tablasestadistica">
                 <div class="paneles panel-default">
                   <div class="panel-heading">
                     <strong>
                       <span class="glyphicon glyphicon-th"></span>
                       <span>AGREGADOS RECIENTEMENTE</span>
                     </strong>
                   </div>
                   <div class="panel-body">
                       <table class="table table-striped table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Fecha</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach($datos as $d)
                            <tr>
                               <td>{{$d->nombre}}</td>
                               <td>{{$d->cantidad}}</td>
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
</div>
@endsection

