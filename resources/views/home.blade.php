@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
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
                <div class="col-md-4">
                    <canvas id="myChart" width="400" height="400"></canvas>
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

@section('scripts')
<script>
    var data = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
    datasets: [
        {
            label: "Ganancias",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40],
            spanGaps: false,
        }
    ]
};

var ctx = $("#myChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: data,

});

</script>

@endsection