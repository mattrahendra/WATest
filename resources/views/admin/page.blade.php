<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
                        <div class="col-md-6 d-flex">
                            <h3 style="font-weight: 700" class="m-3">Data Admin</h3>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <a href="{{ route('addadmin') }}" class="btn btn-success">+ Tambah Admin</a>
                        </div>

                    </div>
                </div>
                <div class="card px-3 pt-2">
                    <table class="table table-no-border">
                        <thead>
                            <tr>
                                <th scope="col">ID Admin</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $status)
                                @if ($status->level == 'admin')
                                    <tr>
                                        <td scope="row">{{ $status->id }}</td>
                                        <td>{{ $status->username }}</td>
                                        <td>{{ $status->email }}</td>
                                        <td>
                                            <a href="{{ route('editadmin', $status->id) }}"
                                                class="btn btn-primary"><span
                                                    class="material-symbols-outlined">edit</span></a>
                                            {{-- <button class="btn btn-danger btn-delete" data-url="{{route('customers.destroy', $customer)}}"><i class="fas fa-trash"></i></button> --}}
                                        </td>
                                        <td>
                                            <form action="#" method="post">
                                                @csrf
                                                <button class="btn btn-danger"><span class="material-symbols-outlined">
                                                        delete
                                                    </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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
