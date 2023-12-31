<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Final Industrial Games 31</title>
    <link type="text/css" href="{{ asset('') }}css/volt.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            background: url("/assets/bg-index.png") no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin: 0px;
            width: 100%;
        }

        .title {
            font-family: "Montserrat", sans-serif;
            font-size: 1000px;
            color: white;
            font-weight: 800;
            letter-spacing: 3px;
        }

        .button-agent {
            border: 3px solid #2C56A7;
            background: white;
            color: #2C56A7;
            border-radius: 1.5rem;
            font-family: "Montserrat", sans-serif;
            font-size: 1.75rem;
            font-weight: 600;
            line-height: 1.5;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-agent:hover {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            color: white;
        }

        .nama-team {
            border: 3px solid #2C56A7;
            background: transparent;
            color: #2C56A7;
            border-radius: 0.5rem;
            font-family: "Montserrat", sans-serif;
            font-size: 1.75rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-logout {
            border: 3px solid red;
            background: transparent;
            color: red;
            border-radius: 0.5rem;
            font-family: "Montserrat", sans-serif;
            font-size: 1.75rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-logout:hover {
            border: 3px solid red;
            background: red;
            color: white;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <div class="w-100 h-100 position-fixed align-items-center justify-content-center" id="loading-animation"
        style="background: rgba(0,0,0,0.5); z-index: 999; display:none; flex-direction: column">
        <h3 class="fw-bolder text-white">Loading</h3><br>
        <div class="spinner-border text-white" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex flex-row justify-content-between w-100" id="navbarSupportedContent">
                {{-- NAMA TEAM --}}
                <div class="shadow m-2 nama-team" id="batch">
                    {{ Auth::user()->team->name }}
                </div>

                {{-- LOGOUT --}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-outline-primary shadow m-2 button-logout"><i class="btn-logout"></i> Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        <div class="d-flex justify-content-center py-3">
            <div class="rounded-pill p-2 w-50 shadow align-items-center" style="background-color:rgb(44,86,167);">
                <div class="fw-bolder fs-1 text-center title">SESI IMPORT</div>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-around py-5">
            <!-- LATENESS -->
            <div class="card shadow mb-3" style="max-width: 18rem;">
                <img src="{{ asset('') }}assets/ship1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex d-sm-block">
                            <h2 class="mb-0">Lateness</h2>
                            <h2 id="profit" class="mb-2 mt-1" id="profit">
                                @if ($scoring->lateness != null)
                                    {{ $scoring->lateness }}
                                @else
                                    0
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COMPLETION TIME -->
            <div class="card shadow mb-3" style="max-width: 18rem;">
                <img src="{{ asset('') }}assets/ship2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="col-12 ">
                        <div class="d-flex d-sm-block">
                            <h2 class="mb-0">Completion Time</h2>
                            <h2 class="mb-2 mt-1" id="market-share">
                                @if ($scoring->completion_time != null)
                                    {{ $scoring->completion_time }}
                                @else
                                    0
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACCEPTANCE -->
            <div class="card shadow mb-3" style="max-width: 18rem;">
                <img src="{{ asset('') }}assets/ship3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex d-sm-block">
                            <h2 class="mb-0">Acceptance</h2>
                            <div class="d-flex">
                                <h2 class="mb-2 mt-1" id="sigma-level">
                                    @if ($scoring->acceptance != null)
                                        {{ $scoring->acceptance }}
                                    @else
                                        0
                                    @endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-0 text-inverse mb-3">
        <div class="d-flex flex-row justify-content-center w-100" style="bottom: 10%">
            <a type="button" class="btn btn-block btn-outline-primary shadow m-2 button-agent"
                href="{{ route('import.shipping-agent') }}"><i class="button-shipping-agent"></i> Shipping Agent</a>
            <a type="button" class="btn btn-block btn-outline-primary shadow m-2 button-agent"
                href="{{ route('import.container-agent') }}"><i class="button-container-agent"></i> Container Agent</a>
            <a type="button" class="btn btn-block btn-outline-primary shadow m-2 button-agent"
                href="{{ route('import.depo-agent') }}"><i class="button-depo-agent"></i> Depo Agent</a>
        </div>
    </footer>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
