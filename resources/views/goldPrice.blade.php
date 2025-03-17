<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prix de l'Or</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Prix de l'Or</h1>
        <form action="{{ route('gold-prices.store') }}" method="POST" class="text-center mb-4">
            @csrf
            <button type="submit" class="btn btn-primary">Mettre à jour le prix</button>
        </form>
        
        <div id="line-chart" class="mb-5"></div>
        <div id="bar-chart" class="mb-5"></div>
    </div>

    <script>
        // Données des prix
        var prix24k = @json($prix24k);
        var prix22k = @json($prix22k);
        var prix21k = @json($prix21k);
        var prix21k = @json($prix21k);
        var dates = @json($dates);

        // Graphique Linéaire
        var lineOptions = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'Prix 24K',
                data: prix24k
            }, {
                name: 'Prix 22K',
                data: prix22k
            }, {
                name: 'Prix 21K',
                data: prix21k
            }],
            xaxis: {
                categories: dates
            }
        };
        var lineChart = new ApexCharts(document.querySelector("#line-chart"), lineOptions);
        lineChart.render();

        // Graphique à Barres
        var barOptions = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'Prix 24K',
                data: prix24k
            }, {
                name: 'Prix 22K',
                data: prix22k
            }, {
                name: 'Prix 21K',
                data: prix21k
            }],
            xaxis: {
                categories: dates
            }
        };
        var barChart = new ApexCharts(document.querySelector("#bar-chart"), barOptions);
        barChart.render();
    </script>
</body>
</html>
