<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depo Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        /* STYLE PAGE */
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
        .combobox-title {
            font-size: 30px;
            font-family: "Montserrat", sans-serif;
            margin-bottom: 10px;
            font-weight: 700;
            color:#2c56a7;
        }
        table {
            background: white;
        }
        .table-title{
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
            color:#2c56a7;
        }
        .button-kontainer {
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
        .button-kontainer:hover {
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
        .combobox {
            border: 3px solid #2C56A7;
            border-radius: 1.5rem;
            color: #2C56A7;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
        }

        /* STYLE MODAL */
        .modal-title {
            font-size: 50px;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            color:#2c56a7;
        }
        .modal-body {
            background: rgb(228,242,252);
        }
        .modal-table-title {
            font-size: 17px;
            font-family: "Montserrat", sans-serif;
            font-weight: 550;
            color: white;
            background: #2c56a7;
        }
        .modal-table {
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color:#2c56a7;
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
                    <form action="{{ route('export.saveexportcontainer') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <label for="cbContainer" class="combobox-title">Kontainer</label>
                                <div class="col-9 mb-2">
                                    <select name="container" id="cbContainer" class="form-select combobox">
                                        @foreach ($containers as $container)
                                            <option value="{{ $container->id }}">{{ $container->name }} -
                                                {{ $container->size }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-info button-kontainer"
                                        data-bs-toggle="modal" data-bs-target="#listContainerModal">List
                                        Kontainer</button>
                                </div>
                            </div>
                        </div>
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
                                        <tr>
                                            <td class="text-center">{{ $demand->name }}</td>
                                            <td class="text-center">{{ $demand->volume }} m<sup>3</sup></td>
                                            <td class="text-center">{{ $demand->quantity }}</td>
                                            <td class="text-center">{{ $demand->weight }}</td>
                                            <td class="text-center">
                                                {{ $demand->city }}</td>
                                            <td><input type="number" class="form-control mx-auto" style="width: 80px;"
                                                    min="0" max="{{ $demand->quantity }}" value="0"
                                                    name="qty{{ $demand->id }}" id="">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary button-kontainer">Simpan Kontainer</button>
                        <a href="{{ route('export.da-addcontainer') }}" class="btn btn-secondary mb-3 button-check">Cek Kontainer</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-lg fade" id="listContainerModal" tabindex="-1" aria-labelledby="listContainerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="exampleModalLabel">List Container</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered modal-table">
                        <tr class="modal-table-title">
                            <th>Jenis Kontainer</th>
                            <th>Ukuran</th>
                            <th>20 Feet</th>
                            <th>40 Feet</th>
                        </tr>
                        <!-- General Container -->
                        <tr>
                            <td rowspan="5" class="fw-bold align-middle">General Container</td>
                            <td>Panjang</td>
                            <td>6,06 m</td>
                            <td>12,19 m</td>
                        </tr>
                        <tr>
                            <td>Lebar</td>
                            <td>2,44 m</td>
                            <td>2,44 m</td>
                        </tr>
                        <tr>
                            <td>Tinggi</td>
                            <td>2,59 m</td>
                            <td>2,59 m</td>
                        </tr>
                        <tr>
                            <td>Payload Capacity</td>
                            <td>25.000 kg</td>
                            <td>27.000 kg</td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td>38,296 m<sup>3</sup></td>
                            <td>77,0359 m<sup>3</sup></td>
                        </tr>
                        <!-- Refrigerated Container -->
                        <tr>
                            <td rowspan="5" class="fw-bold align-middle">Refrigerated Container</td>
                            <td>Panjang</td>
                            <td>6,06 m</td>
                            <td>12,19 m</td>
                        </tr>
                        <tr>
                            <td>Lebar</td>
                            <td>2,44 m</td>
                            <td>2,44 m</td>
                        </tr>
                        <tr>
                            <td>Tinggi</td>
                            <td>2,59 m</td>
                            <td>2,59 m</td>
                        </tr>
                        <tr>
                            <td>Payload Capacity</td>
                            <td>25.000 kg</td>
                            <td>27.000 kg</td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td>38,296 m<sup>3</sup></td>
                            <td>77,0359 m<sup>3</sup></td>
                        </tr>
                        <!-- Fantainer/Ventilation -->
                        <tr>
                            <td rowspan="5" class="fw-bold align-middle">Fantainer/Ventilation</td>
                            <td>Panjang</td>
                            <td>6,06 m</td>
                            <td>12,19 m</td>
                        </tr>
                        <tr>
                            <td>Lebar</td>
                            <td>2,44 m</td>
                            <td>2,44 m</td>
                        </tr>
                        <tr>
                            <td>Tinggi</td>
                            <td>2,59 m</td>
                            <td>2,59 m</td>
                        </tr>
                        <tr>
                            <td>Payload Capacity</td>
                            <td>25.000 kg</td>
                            <td>27.000 kg</td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td>38,296 m<sup>3</sup></td>
                            <td>77,0359 m<sup>3</sup></td>
                        </tr>
                    </table>

                    <table class="table table-bordered modal-table">
                        <tr class="modal-table-title">
                            <th colspan="4">Kontainer Tank</th>
                        </tr>
                        <tr class="modal-table-title">
                            <th>Capacity</th>
                            <th>Gross Weight</th>
                            <th>Tare Weight</th>
                            <th>Payload</th>
                        </tr>
                        <tr>
                            <td>21.000L</td>
                            <td>36.000kg</td>
                            <td>3.650kg</td>
                            <td>32.350kg</td>
                        </tr>
                        <tr>
                            <td>24.000L</td>
                            <td>36.000kg</td>
                            <td>3.730kg</td>
                            <td>32.270kg</td>
                        </tr>
                        <tr>
                            <td>25.000L</td>
                            <td>36.000kg</td>
                            <td>3.900kg</td>
                            <td>32.100kg</td>
                        </tr>
                        <tr>
                            <td>26.000L</td>
                            <td>36.000kg</td>
                            <td>4.060kg</td>
                            <td>31.940kg</td>
                        </tr>
                    </table>
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
