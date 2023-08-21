<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container AGent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div>
            <h1 class="title text-center fw-bolder">Container Arrival</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-5 py-4">
            <div class="row">
                <div class="col-9">
                    <div class="table-responsive">
                        <table class="table table-centered table-wrap">
                            <thead>
                                <tr>
                                    <th class="border-0 text-center">No</th>
                                    <th class="border-0 text-center">List Kontainer</th>
                                    <th class="border-0 text-center">Tanggal Pengiriman</th>
                                    <th class="border-0 text-center">Jenis Barang</th>
                                    <th class="border-0 text-center">Ukuran Kontainer</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3 px-4 py-4">
                    {{-- <button class="button-layout-kontainer" role="button" onclick="location.href='{{ route('layout-kontainer') }}'">Layout Kontainer</button> --}}
                </div>
            </div>
        </div>
</body>
</html>