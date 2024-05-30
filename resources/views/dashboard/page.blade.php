<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #E6F0FF;
            font-family: 'Montserrat', sans-serif;
        }

        .card {
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
                            <h3 style="font-weight: 700" class="m-3">Dashboard</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-dark">
                            <div class="card-body">
                                <p class="card-title">Data WMReader Masuk</p>
                                <h4 class="card-text">{{ $dataWMReaderMasuk }}</h4>
                                <p class="card-text">Hari Ini</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-dark">
                            <div class="card-body">
                                <p class="card-title">Total Pelanggan</p>
                                <h4 class="card-text">{{ $totalPelanggan }}</h4>
                                <p class="card-text">Pelanggan WMReader</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-dark">
                            <div class="card-body">
                                <p class="card-title">Total Baterai Aktif</p>
                                <h4 class="card-text">{{ $totalBateraiAktif }}</h4>
                                <p class="card-text">Status Baterai</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-dark">
                            <div class="card-body">
                                <p class="card-title">Pelanggan Baru</p>
                                <h4 class="card-text">{{ $pelangganBaru }}</h4>
                                <p class="card-text">Hari Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-12">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{ $chart->script() }}
</body>

</html>
