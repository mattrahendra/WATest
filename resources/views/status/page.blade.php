<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <title>Status Baterai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #E6F0FF;
            font-family: 'Montserrat', sans-serif;

            .card {
                border: none;
            }

        }

        .table-no-border th,
        .table-no-border td {
            border: none;
        }

        h4 {
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card p-3 my-3">
                    <div class="row">
                        <div class="col">
                            <h3 style="font-weight: 700" class="m-3">Status Baterai</h3>
                        </div>
                    </div>
                </div>
                <div class="card px-3 pt-2">
                    <table class="table table-no-border">
                        <thead>
                            <tr>
                                <th scope="col">ID Pelanggan</th>
                                <th scope="col">Persentase Baterai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $status)
                                <tr>
                                    <th scope="row">{{ $status['id'] }}</th>
                                    <td>{{ $status['persentase_baterai'] . '%' }}</td>
                                    <td>{{ $status['status'] }}</td>
                                    <td>{{ $status['created_at'] }}</td>
                                    <td>
                                        <img src="{{$fireimage}}" alt="gambar" style="width: 25%">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        {{-- <script>
        const chartLine = new Chart(
            document.getElementById('chartLine'),
            {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Data Chart',
                        // data: {{ $chartData }}, // Ganti dengan data chart yang sebenarnya
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        lineTension: 0.1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            }
        );
    </script> --}}
</body>

</html>
