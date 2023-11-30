<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Database</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    .bg-light {
        background-image: url(https://images.unsplash.com/photo-1557128928-66e3009291b5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
    }

    .mt-5,
    .my-5 {
        margin-top: 15rem !important;
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: transparent;
        background-clip: border-box;
        border: 1px solid white;
        border-radius: .25rem;
        border-radius: 30px;
        backdrop-filter: blur(20px);
    }
</style>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Flight Database</div>

                    @if($message = Session::get('fail'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf

                            <!-- Hapus radio button dan labelnya -->

                            <input type="hidden" name="role" value="admin"> <!-- Langsung tentukan role sebagai admin -->

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-secondary">
                                    Login as Admin <!-- Ubah teks tombol jika diperlukan -->
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>