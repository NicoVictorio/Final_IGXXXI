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

        .button-tambah-kontainer {
            border: 3px solid #2C56A7;
            background: white;
            color: #2C56A7;
            border-radius: 1.5rem;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-tambah-kontainer:hover {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            color: white;
        }
        
        .button-kirim-kontainer {
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
        .button-kirim-kontainer:hover {
            border: 3px solid #2C56A7;
            background: white;
            color: #2C56A7;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">DEPO AGENT</h1>
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
                    <a href="{{ route('export.da-addcontainer') }}"
                        class="btn btn-secondary mb-3 button-tambah-kontainer">Tambah Kontainer</a>
                    <a href="{{ route('export.index') }}"
                        class="btn btn-secondary mb-3 button-tambah-kontainer">Back</a>                        
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center">No</th>
                                    <th class="border-0 text-center">Nomor Kontainer</th>
                                    <th class="border-0 text-center">Destinasi</th>
                                    <th class="border-0 text-center">Status</th>
                                    <th class="border-0 text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
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
                                            <td>{{ $lContainer->city }}</td>
                                            @if (
                                                ($lContainer->volume_status == 'safe' || $lContainer->volume_status == 'less') &&
                                                    $lContainer->weight_status == 'safe')
                                                <td style="text-align: center;"><span class="badge bg-success">Accepted</span></td>
                                            @elseif($lContainer->volume_status == null || $lContainer->weight_status == null)
                                                <td style="text-align: center;"><span class="badge bg-warning">Belum QC</span></td>
                                            @elseif($lContainer->volume_status == 'edit' || $lContainer->weight_status == 'edit')
                                                <td style="text-align: center;"><span class="badge bg-warning">Hasil Edit Belum QC</span></td>
                                            @else
                                                <td style="text-align: center;"><span class="badge bg-danger">Rejected</span></td>
                                            @endif
                                            @if (
                                                ($lContainer->volume_status != 'safe' && $lContainer->volume_status != 'less') ||
                                                    $lContainer->weight_status != 'safe')
                                                <td style="text-align: center;"><a href="{{ route('export.da-editcontainer', $lContainer->id) }}"
                                                        class="btn btn-primary button-tambah-kontainer">Edit Kontainer</a></td>
                                            @else
                                            <td>OK</td>
                                            @endif
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
