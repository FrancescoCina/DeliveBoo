@extends('layouts.app')

@section('content')

{{-- BLADE PER CHART JS --}}


{{--     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">Statistiche Ristorante</h1>
            <canvas id="myCanvasYear"></canvas>
        </div>
    </div>
</div> --}}

@endsection
{{-- @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
    let myCanvasYear = document.getElementById("myCanvasYear").getContext('2d');
    let myLabelsYear = ["2015", "2016", "2017","2018", "2019", "2020", "2021"];
    let myDataYear = [500, 600, 700, 800, 900, 1000, 1100];

    // global options
    // Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = "#777";

    let chartYear = new Chart(myCanvasYear, {
    type: "horizontalBar",
    data: {
        labels: myLabelsYear,
        datasets:[{
            label: "Numero ordini",
            data: myDataYear,
            backgroundColor: [
                "#0D47A1",
                "#1565C0",
                "#1976D2",
                "#1E88E5",
                "#2196F3",
                "#42A5F5",
                "#64B5F6",
                "#90CAF9",
                "#BBDEFB",
                "#B6BDE8",
                "#00C1B2",
                "#00F2B2",
            ],
        }]
    },
    options:{
        title: {
            display: true,
            text: "Ordini annuali del ristorante",
            fontSize: 25,
        },
        legend: {
            display: true,
            position: "right",
        },
        layout:{
            padding: 40,
        },
        tooltips:{
            enabled: true,
        },
    },
});


</script>

@endsection --}}