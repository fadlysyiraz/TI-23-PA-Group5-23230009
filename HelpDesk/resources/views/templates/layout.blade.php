<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helpdesk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('./assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('./assets/bootstrap-icons/font/bootstrap-icons.css') }}">
    <style>
        .img {
            width: 150px;
            height: auto;
        }
        .full-height {
            min-height: 100vh;
        }
        .content {
            background-color: #2F4AA3;
        }
    </style>
</head>
<body style="background-color: #2F4AA3;">
    <div class="container-fluid">
        <div class="row full-height align-items-center">
            <!-- Left column: logo and title -->
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                <h1 class="mb-3">helpdesk</h1>
                <img src="assets/img/logo.png" alt="Logo" class="img mb-3">
            </div>
            <!-- Right column: form -->
            <div class="content col-md-6 d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                <div class="card p-4 w-100" style="max-width: 400px; min-width: 320px; border-radius: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">
                    @yield('content') <!-- Form login atau lainnya -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
