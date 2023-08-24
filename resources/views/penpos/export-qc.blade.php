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
            font-size: 40px;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">PENPOS QC - EXPORT</h1>
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
                    <div class="row mb-3">
                        <div class="col-4">
                            <select name="team" id="cbTeam" class="form-select">
                                <option selected disabled>Pilih Tim</option>
                                @foreach ($teamList as $tl)
                                    @if ($team->id == $tl->id)
                                        <option value="{{ $tl->id }}" selected>{{ $tl->name }}</option>
                                    @else
                                        <option value="{{ $tl->id }}">{{ $tl->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            @if ($team->id != null)
                                <a href="{{ route('export.qcpenpos', $team->id) }}" class="btn btn-primary"
                                    id="btnPilihTeam">Pilih Tim</a>
                            @else
                                <a href="#" class="btn btn-primary" id="btnPilihTeam">Pilih Tim</a>
                            @endif
                        </div>
                    </div>
                    @if ($team->name == null)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center text-danger">Belum ada Tim yang dipilih!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-centered table-bordered table-wrap">
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Kontainer</th>
                                                <th>Status Volume</th>
                                                <th>Status Bobot</th>
                                                <th>Status Akhir</th>
                                                <th>Detail Kontainer</th>
                                                <th>Proses QC</th>
                                            </tr>
                                            @if (count($containerShips) == 0)
                                                <tr>
                                                    <td colspan="7" class="text-center fw-bold text-danger">Tim Ini Belum
                                                        Memiliki Kontainer</td>
                                                </tr>
                                            @else
                                                @foreach ($containerShips as $key => $containerShip)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $containerShip->code }}</td>
                                                        @if ($containerShip->volume_status == null)
                                                            <td>Belum QC</td>
                                                        @else
                                                            <td>{{ ucwords($containerShip->volume_status) }}</td>
                                                        @endif
                                                        @if ($containerShip->weight_status == null)
                                                            <td>Belum QC</td>
                                                        @else
                                                            <td>{{ ucwords($containerShip->weight_status) }}</td>
                                                        @endif
                                                        @if (($containerShip->volume_status == 'safe' || $containerShip->volume_status == 'less') && $containerShip->weight_status == 'safe')
                                                            <td><span class="badge bg-success">Accepted</span></td>
                                                        @elseif($containerShip->volume_status == null || $containerShip->weight_status == null)
                                                            <td><span class="badge bg-warning">Belum QC</span></td>
                                                        @elseif($containerShip->volume_status == 'edit' || $containerShip->weight_status == 'edit')
                                                            <td><span class="badge bg-warning">Hasil Edit Belum
                                                                    QC</span></td>
                                                        @else
                                                            <td><span class="badge bg-danger">Rejected</span></td>
                                                        @endif
                                                        <td class="text-center"><button type="button"
                                                                class="btn btn-secondary" id="btnDetailModal"
                                                                onclick="showDetailModal({{ $containerShip->id }})"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#detailModal">Detail</button>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="{{ route('export.qcpenposproses') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="shipping_container_id" value="{{ $containerShip->id }}">
                                                                <button type="submit" class="btn btn-primary">Proses
                                                                    QC</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal modal-lg fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="contentDetailModal">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $('#cbTeam').on('change', function() {
            var idTeam = $('#cbTeam').val();
            var routing = "{{ route('export.qcpenpos', '%id') }}";
            routing = routing.replace('%id', idTeam);
            $('#btnPilihTeam').attr('href', routing);
        });

        function showDetailModal(idShipping) {
            $.ajax({
                type: 'POST',
                url: '{{ route('export.qcpenposmodaldetail') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'idShipping': idShipping,
                },
                success: function(data) {
                    $('#contentDetailModal').html(data['data']);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Terjadi Kesalahan, Hubungi SI.\nError Message [View Detail Modal]: ' + errorThrown);
                    $('#contentDetailModal').html('<div class="modal-body"><h3 class="text-danger fw-bold text-center">Terjadi Kesalahan, Hubungi SI.</h3><p class="mb-0 fw-bold">ID Shipping: '+idShipping+'</p><p class="mb-0 fw-bold">Error Message [View Detail Modal]:</p><p>' + errorThrown + '</p></div>');
                }
            })
        }
    </script>
</body>

</html>
