var misGannciasChart = $("#misGannciasChart");
var myLineChart = new Chart(misGannciasChart, 
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

var misComprasChart = $("#misComprasChart");
var myLineChart = new Chart(misComprasChart, 
    {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'Dataset',
                data: [63, 57, 40, 25, 20, 22, 26],
                fill: true,
                backgroundColor: '#ef193c',
                borderColor: '#ef193c',
                borderWidth: 2,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: '#ef193c',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBackgroundColor: '#ef193c',
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
                       max: 100
                 }
              }]
      },
      legend: {
              display: false
      }
    }
    }
);


var misVentasChart = $("#misVentasChart");
var myLineChart = new Chart(misVentasChart, 
    {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'Dataset',
                data: [10, 15, 25, 40, 60, 75, 80],
                fill: true,
                backgroundColor: '#22b66e',
                borderColor: '#22b66e',
                borderWidth: 2,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: '#22b66e',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBackgroundColor: '#22b66e',
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
                       max: 120
                 }
              }]
      },
      legend: {
              display: false
      }
    }
  }
);
