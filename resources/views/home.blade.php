@extends('layouts.app')

@section('scripts')
{{ Html::script('js/dashboard.js')}}
@endsection


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-green">
                        <i class="glyphicon glyphicon-user"></i>
                     </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 3 </h2>
                        <p class="text-muted">Users</p>
                    </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-red">
                        <i class="glyphicon glyphicon-list"></i> 
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0 </h2>
                        <p class="text-muted">Categories</p>
                    </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-blue">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0 </h2>
                        <p class="text-muted">Products</p>
                    </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="panel panel-box clearfix">
                        <div class="panel-icon pull-left bg-yellow">
                        <i class="glyphicon glyphicon-usd"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top"> 0</h2>
                        <p class="text-muted">Sales</p>
                    </div>
                   </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-header"><h3>Ganancias</h3><small>Una vista general sobre las Gancias</small></div>
                        <canvas id="misGannciasChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #2196f3;"><span class="rounded" style="color: #2196f3!important;"><i class="fa fa-caret-up" style="color: #2196f3!important;"></i> 20%</span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-header"><h3>Compras</h3><small>Ultimas Compras</small></div>
                        <canvas id="misComprasChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #ef193c;"><span class="rounded" style="color: #ef193c!important;"><i class="fa fa-caret-down" style="color: #ef193c!important;"></i> 20%</span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-header"><h3>Ventas </h3><small>Ultimas Ventas Realizadas</small></div>
                        <canvas id="misVentasChart" width="400" height="150"></canvas>
                        <div class="box-body" style="background-color: #22b66e;"><span class="rounded" style="color: #22b66e!important;"><i class="fa fa-caret-up" style="color: #22b66e!important;"></i> 80%</span> <span>Sobre el ultimo mes</span></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Highest Saleing Products</span>
                      </strong>
                    </div>
                    <div class="panel-body">
                      <table class="table table-striped table-bordered table-condensed">
                       <thead>
                        <tr>
                          <th>Title</th>
                          <th>Total Sold</th>
                          <th>Total Quantity</th>
                        </tr><tr>
                       </tr></thead>
                       <tbody>
                                   </tbody><tbody>
                      </tbody></table>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="panel panel-default">
                     <div class="panel-heading">
                       <strong>
                         <span class="glyphicon glyphicon-th"></span>
                         <span>LATEST SALES</span>
                       </strong>
                     </div>
                     <div class="panel-body">
                       <table class="table table-striped table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Product Name</th>
                        <th>Date</th>
                        <th>Total Sale</th>
                      </tr>
                    </thead>
                    <tbody>
                             </tbody>
                  </table>
                 </div>
                </div>
               </div>
               <div class="col-md-4">
                 <div class="panel panel-default">
                   <div class="panel-heading">
                     <strong>
                       <span class="glyphicon glyphicon-th"></span>
                       <span>Recently Added Products</span>
                     </strong>
                   </div>
                   <div class="panel-body">

                     <div class="list-group">
                       </div>
               </div>
              </div>
             </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

