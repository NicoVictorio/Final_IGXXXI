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
        <div class="text-center">
            <h1 class="title text-center fw-bolder">Depo Agent</h1>
            <a href="{{ route('export.index') }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-short"></i>
                Kembali</a>
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
                    <a href="{{ route('export.da-addcontainer') }}" class="btn btn-secondary mb-3">Tambah Kontainer</a>
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr>
                                    <th class="border-0">No</th>
                                    <th class="border-0 text-center">Nomor Kontainer</th>
                                    <th class="border-0 text-center">Tanggal Pengiriman</th>
                                    <th class="border-0 text-center">Status</th>
                                    <th class="border-0 text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($listContainers) == 0)
                                    <tr>
                                        <td colspan="5" class="text-danger text-center fw-bold">Belum Ada Kontainer
                                            yang dibuat</td>
                                    </tr>
                                @else
                                    @foreach ($listContainers as $key => $lContainer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $lContainer->code }}</td>
                                            <td>{{ date_format(date_create($lContainer->ship_date), 'd-m-Y') }}</td>
                                            @if ($lContainer->volume_status == 'safe' && $lContainer->weight_status == 'safe')
                                                <td><span class="badge bg-success">Accepted</span></td>
                                            @elseif($lContainer->volume_status == null || $lContainer->weight_status == null)
                                                <td><span class="badge bg-warning">Belum QC</span></td>
                                            @elseif($lContainer->volume_status == 'edit' || $lContainer->weight_status == 'edit')
                                                <td><span class="badge bg-warning">Hasil Edit Belum QC</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            @endif
                                            <td><a href="{{ route('export.da-editcontainer', $lContainer->id) }}"
                                                    class="btn btn-primary">Edit Kontainer</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
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
