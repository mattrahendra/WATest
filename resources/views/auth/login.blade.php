<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            background-color: #141c28;
            font-family: 'Montserrat', sans-serif;
        }

        .card {
            border: none;
        }

        h4 {
            font-weight: 700;
        }

        .material-icons {
            vertical-align: middle;
            margin-right: 8px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .form-control {
            position: relative;
            padding-left: 40px;
            border-radius: 50px;
            height: 50px;
        }

        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .btn {
            border-radius: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card bg-light text-dark">
            <h4 class="text-center mb-4">Login</h4>
            <form method="POST" action="{{ route('logina') }}">
                @csrf
                <div class="mb-3 position-relative">
                    <span class="material-icons form-control-icon">person</span>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                        required>
                </div>
                <div class="mb-3 position-relative">
                    <span class="material-icons form-control-icon">lock</span>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Modal Error -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->has('login'))
                        <p>{{ $errors->first('login') }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </script>

    <script>
        // Show the modal if there are any errors
        @if ($errors->has('login'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif
    </script>
</body>

</html>
