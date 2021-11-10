@extends('layouts.app')

@section('content')

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">Statistiche Ristorante</h1>
            <div class="pie-chart-container">
                <canvas id="pie-chart"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>

    $(function(){
        const gData = JSON.parse(`<?php echo $chart_data; ?>`);
        console.log(gData);
        let ctx = document.getElementById('pie-chart').getContext('2d');
        
        let data = {
            labels: gData.label,
            datasets: [
                {
                    label: 'orderCount',
                    data: gData.data,
                    backgroundColor: [
                    "#ffed4a",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46", 
                    "#CDA776",
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    ],
                    borderColor: [
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    ],
                    borderWidth: [1, 1, 1, 1, 1,1,1,1,1,1]
                }
            ]
        };
         //options
      let options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Totale Ordini ricevuti mese per mese",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }, 
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true, 
                    max: 10,
                }
            }],
        },
      };
    
      //create Pie Chart class object
      let chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });
    });
    
</script>

 
 


@endsection