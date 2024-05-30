<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <title>Data WMReader</title>
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
                        <div class="col">
                            <h3 style="font-weight: 700" class="m-3">Edit Pelanggan</h3>
                        </div>
                    </div>
                </div>
                <div class="card px-3 py-2 pb-5">
                    <form action="{{ route('edit.pelanggan', $pelanggan->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$pelanggan->id}}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$pelanggan->nama}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$pelanggan->alamat}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                        <a href="{{route('pelanggan')}}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
