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
        body {
            background: rgb(228,242,252);
        }
    </style>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="cbContainer" class="form-label">Kontainer untuk pengiriman ini:</label>
                        <p class="px-2 py-1 fw-bold bg-primary text-white">{{ $sContainer->container->name }} -
                            {{ $sContainer->container->size }} ({{ $sContainer->code }})</p>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('export.resetexportcontainer') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idShipping" value="{{ $sContainer->id }}">
                            <button type="submit" class="btn btn-danger">Reset Kontainer</button>
                        </form>
                    </div>
                    <form action="{{ route('export.updateexportcontainer') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idShipping" value="{{ $sContainer->id }}">
                        <div class="table-responsive">
                            <table class="table table-centered table-bordered table-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-0">Produk</th>
                                        <th class="border-0 text-center">Volume</th>
                                        <th class="border-0 text-center">Quantity</th>
                                        <th class="border-0 text-center">Weight</th>
                                        <th class="border-0 text-center">Destination</th>
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
                                                {{ $demand->city }}</td>
                                            <td><input type="number" class="form-control mx-auto" style="width: 80px;"
                                                    min="0" max="{{ $demand->quantity }}"
                                                    value="{{ $demand->jmlhProdukMasuk ? $demand->jmlhProdukMasuk : 0 }}"
                                                    name="qty{{ $demand->id }}" id=""></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kontainer</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript"></script>
</body>

</html>
