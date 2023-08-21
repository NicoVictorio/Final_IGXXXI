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
</head>

<body>
    <div class="container">
        <div>
            <h1 class="title text-center fw-bolder">Depo Agent</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-5 py-4">
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
                                <label for="cbContainer" class="form-label">Pilih Container</label>
                                <div class="col-9">
                                    <select name="container" id="cbContainer" class="form-select">
                                        @foreach ($containers as $container)
                                            <option value="{{ $container->id }}">{{ $container->name }} -
                                                {{ $container->size }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="btn btn-info button-list-kontainer"
                                        data-bs-toggle="modal" data-bs-target="#listContainerModal">List
                                        Kontainer</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered table-bordered table-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-0">Produk</th>
                                        <th class="border-0 text-center">Volume</th>
                                        <th class="border-0 text-center">Quantity</th>
                                        <th class="border-0 text-center">Weight (kg)</th>
                                        <th class="border-0 text-center">Ship Date</th>
                                        <th class="border-0 text-center">Send</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demands as $demand)
                                        <tr>
                                            <td class="">{{ $demand->name }}</td>
                                            <td class="text-center">{{ $demand->volume }} m<sup>3</sup></td>
                                            <td class="text-center">{{ $demand->quantity }}</td>
                                            <td class="text-center">{{ $demand->weight }}</td>
                                            <td class="text-center">
                                                {{ date_format(date_create($demand->ship_date), 'd-m-Y') }}</td>
                                            <td><input type="number" class="form-control mx-auto" style="width: 80px;"
                                                    min="0" max="{{ $demand->quantity }}" value="0"
                                                    name="qty{{ $demand->id }}" id="">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Kontainer</button>
                        <a type="button" href="{{ route('export.depo-agent') }}" class="btn btn-outline-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto">
            {{-- <div class="col text-end"> --}}
            <div class="d-flex justify-content-left position-fixed" style="bottom: 5%">
                {{-- mmmm cara ambil produk yang checkbox dicheck semua buat dikirim howww --}}
                <button class="button-kirim" role="button" onclick=kirimProduk()>Kirim Produk</button>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal modal-lg fade" id="listContainerModal" tabindex="-1" aria-labelledby="listContainerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">List Container</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
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
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <th colspan="4">Kontainer Tank</th>
                        </tr>
                        <tr>
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
