<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/aiga-symbol-signs/586/aiga_departingflights_inv-512.png" type="image/x-icon">
    <title>Flight Database</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="/resources/css/app.css">
    <style>
        body {
            font-family: 'poppins', sans-serif;
            color: black;
            background-image: url(https://images.unsplash.com/photo-1557128928-66e3009291b5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
            background-size: cover;
        }

        .navbar {
            padding: 30px 50px;
        }

        #navbarNav {
            justify-content: flex-end;
        }

        .table>thead {
            vertical-align: bottom;
            color: black;
            font-family: poppins;
        }

        .container {
            backdrop-filter: blur(20px);
            padding: 30px;
            margin-top: 30px;
            border-radius: 50px;
            border: 1px solid white;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            color: black;
        }

        .mt-5 {
            text-align: center;
            margin-top: 3rem !important;
        }

        .table>:not(caption)>*>* {
            text-align: center;
        }

        .modal-backdrop.show {
            display: none;
            opacity: var(--bs-backdrop-opacity);
        }
    </style>
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/index">Flight Database</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/index">All Data <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/passenger">Passenger Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/airline">Airlines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/flight">Flight</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/trash">Trash Bin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>