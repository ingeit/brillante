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
                <div class="col-sm-4">
                    <div class="box">
                        <canvas id="myChart" width="400" height="400"></canvas>
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

@section('scripts')
<script>
   

var ctx = $("#myChart");
var myLineChart = new Chart(ctx, 
    {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'Dataset',
                data: [25, 21, 18, 20, 30, 40, 45],
                fill: true,
                backgroundColor: '#2196f3',
                borderColor: '#2196f3',
                borderWidth: 2,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: '#2196f3',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBackgroundColor: '#2196f3',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 2,
                pointRadius: [0,4,4,4,4,4,0],
                pointHitRadius: 10,
                spanGaps: false
            }
        ]
    },
    options: {
      scales: {
              xAxes: [{
                 display: false
              }],
              yAxes: [{
                 display: false,
                 ticks:{
                       min: 0,
                       max: 60
                 }
              }]
      },
      legend: {
              display: false
      }
    }
  }
);

</script>

@endsection