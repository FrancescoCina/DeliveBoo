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
        let ctx = document.getElementById('pie-chart');
        
        let data = {
            labels: gData.label,
            datasets: [
                {
                    label: 'orderCount',
                    data: gData.data,
                    backgroundColor: [
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46",
                    "#CDA776",
                    ],
                    borderColor: [
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                    ],
                    borderWidth: [1, 1, 1, 1, 1,1,1]
                }
            ]
        };
         //options
      let options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Week Registered Users -  Day Wise Count",
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
        }
      };
    
      //create Pie Chart class object
      let chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
    });
    
</script>

 
 


@endsection