<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import - Depo Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            background: url("/assets/bg-agent.png") no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin: 0px;
            width: 100%;
        }

        .title {
            padding-top: 20px;
            font-family: "Montserrat", sans-serif;
            font-size: 60px;
            color: #2c56a7;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .container-title {
            font-size: 30px;
            font-family: "Montserrat", sans-serif;
            margin-bottom: 10px;
            font-weight: 700;
            color: #2c56a7;
        }

        table {
            background: white;
        }

        .table-title {
            font-size: 20px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: white;
            background: #2c56a7;
        }

        .table-text {
            font-size: 20px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: #2c56a7;
        }

        .button-container {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            border-radius: 1.5rem;
            color: white;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-container:hover {
            border: 3px solid #2C56A7;
            background: white;
            color: #2C56A7;
        }

        .button-batal {
            background: white;
            border: 3px solid red;
            border-radius: 1.5rem;
            color: red;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
            margin-left: 5px;
        }

        .button-batal:hover {
            background-color: red;
            color: #fff;
        }

        .container-name {
            border: 3px solid #2C56A7;
            background: white;
            border-radius: 1.5rem;
            color: #2C56A7;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            height: 2.5rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1 class="title text-center fw-bolder">DEPO AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-5 py-2 mb-4">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('export.resetexportcontainer') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <label for="cbContainer" class="container-title">Kontainer untuk pengiriman ini:</label>
                                <div class="col-9 mb-2 container-name">
                                    <p class="px-2 mt-1">{{ $sContainer->container->name }} -
                                        {{ $sContainer->container->size }} ({{ $sContainer->code }})</p>
                                </div>
                                <div class="col-3">
                                    @csrf
                                    <input type="hidden" name="idShipping" value="{{ $sContainer->id }}">
                                    <button type="submit" class="btn btn-danger button-container">Reset Kontainer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('export.updateexportcontainer') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idShipping" value="{{ $sContainer->id }}">
                        <div class="table-responsive">
                            <table class="table table-centered table-bordered table-wrap">
                                <thead>
                                    <tr class="table-title">
                                        <th class="border-0">Produk</th>
                                        <th class="border-0 text-center">Volume</th>
                                        <th class="border-0 text-center">Quantity</th>
                                        <th class="border-0 text-center">Weight (kg)</th>
                                        <th class="border-0 text-center">Destination</th>
                                        <th class="border-0 text-center">Send</th>
                                    </tr>
                                </thead>
                                <tbody class="table-text">
                                    @foreach ($demands as $demand)
                                    @if($demand->quantity > 0)
                                    <tr>
                                        <td class="">{{ $demand->name }}</td>
                                        <td class="text-center">{{ $demand->volume }} m<sup>3</sup></td>
                                        <td class="text-center">{{ $demand->quantity }}</td>
                                        <td class="text-center">{{ $demand->weight }}</td>
                                        <td class="text-center">
                                            {{ $demand->city }}</td>
                                        <td><input type="number" class="form-control mx-auto" style="width: 80px;"
                                                min="0" max="{{ $demand->quantity }}"
                                                value="{{ $demand->jmlhProdukMasuk ? $demand->jmlhProdukMasuk : 0 }}"
                                                name="qty{{ $demand->id }}" id=""></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary button-container">Update Kontainer</button>
                        <a type="button" href="{{ route('export.depo-agent') }}"
                            class="btn btn-outline-danger button-batal">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript"></script>
</body>

</html>