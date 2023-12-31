<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import - Shipping Agent</title>
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

        .table-title {
            font-size: 17px;
            font-family: "Montserrat", sans-serif;
            font-weight: 550;
            color: white;
            background: #2c56a7 !important;
            text-align: center;
        }

        .table {
            background: white;
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: #2c56a7;
        }

        .crane {
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: white;
            background: orange !important;
            text-align: center;
        }

        .button-cek {
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

        .button-cek:hover {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            color: white;
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

        .combobox {
            border: 3px solid #2C56A7;
            border-radius: 1.5rem;
            color: #2C56A7;
            font-family: "Montserrat", sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">SHIPPING AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-1 py-4">
            <div class="row">
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
                @if ($errors->any())
                @if ($errors->all()[0] == 'Sequence harus berbeda!')
                <div class="alert alert-danger" role="alert">
                    Sequence harus berbeda!
                </div>
                @endif
                @endif
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-8">
                            <table class="table table-centered table-bordered table-wrap">
                                <thead class="table-title">
                                    <tr>
                                        <th colspan="10">
                                            <select name="tier" id="cbTier" class="form-select combobox">
                                                <option value="" selected disabled>Pilih Tier</option>
                                                <option value="86">Tier 86</option>
                                                <option value="84">Tier 84</option>
                                                <option value="82">Tier 82</option>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" rowspan="2"></th>
                                        <th colspan="8">Bay (Top View)</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px;">7</th>
                                        <th style="width: 100px;">5</th>
                                        <th style="width: 100px;">3</th>
                                        <th style="width: 100px;">1</th>
                                        <th style="width: 100px;">2</th>
                                        <th style="width: 100px;">4</th>
                                        <th style="width: 100px;">6</th>
                                        <th style="width: 100px;">8</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyRBT">
                                    <tr>
                                        <td class="table-title" rowspan="5" style="width: 100px;">Row</td>
                                        <td class="table-title" style="width: 100px;">4</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-title" style="width: 100px;">3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-title" style="width: 100px;">2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-title" style="width: 100px;">1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-title" style="width: 100px;">0</td>
                                        <td class="crane">Crane</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-4">
                            <table class="table table-bordered table">
                                <tr>
                                    <td class="table-title col-9">Yard Crane traverse travel time (in minute, per row)
                                        </th>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td class="table-title col-9">Yard Crane gantry travel time (in minute, per bay)
                                        </th>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td class="table-title col-9">Yard Crane's current bay position</th>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td class="table-title col-9">Yard Crane traverse travel time (in minute, per tier)
                                        </th>
                                    <td>0,5</td>
                                </tr>
                                <tr>
                                    <td class="table-title col-9">Yard Crane's current tier position</th>
                                    <td>90</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-bordered table">
                            <form action="{{ route('import.sa-ceklateness') }}" method="post">
                                @csrf
                                <thead class="table-title">
                                    <tr>
                                        <th>Sequence</th>
                                        <th>Container number</th>
                                        <th>Row position</th>
                                        <th>Bay position</th>
                                        <th>Tier position</th>
                                        <th>Total retrieval time (minute)</th>
                                        <th>Completion time (minute)</th>
                                        <th>Due date (minute)</th>
                                        <th>Lateness</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($containers as $cont)
                                    <tr>
                                        <td>
                                            <select name="sequence[]" id="cbSequence" class="form-select" required>
                                                @for ($i = 1; $i <= $countContainers; $i++) @if ($cont->ica_sequence ==
                                                    $i)
                                                    <option value="{{ $i }}" selected>
                                                        {{ $i }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                    @endif
                                                    @endfor
                                            </select>
                                            <input type="hidden" name="containerShip[]" value="{{ $cont->id }}">
                                        </td>
                                        <td>{{ $cont->loss_space }}</td>
                                        <td>{{ $cont->row }}</td>
                                        <td>{{ $cont->bay }}</td>
                                        <td>{{ $cont->tier }}</td>
                                        <td>{{ $cont->total_r_time }}</td>
                                        <td>
                                            @if ($cont->completion_time)
                                            {{ $cont->completion_time }}
                                            @else
                                            0
                                            @endif
                                        </td>
                                        <td>{{ $cont->isa_due_date }}</td>
                                        <td>
                                            @if ($cont->lateness)
                                            {{ $cont->lateness }}
                                            @else
                                            0
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="8" class="text-end fw-bold">Total Lateness</td>
                                        <td class="fw-bold">{{ $totalLateness }}</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <a href="{{ route('import.index') }}" class="btn btn-primary button-kontainer">Back</a>
                    <button type="submit" class="btn button-primary button-kontainer">Cek Lateness</button>
                    </form>
                </div>
                <div class="col-6 text-end">
                    <form action="{{ route('scoring.isa') }}" method="post">
                        @csrf
                        <input type="hidden" name="lateness" value="{{ $totalLateness }}">
                        <button type="submit" class="btn btn-primary button-kontainer"
                            onclick="return confirm('Apakah anda ingin menyimpan permanen sequence dengan hasil lateness {{ $totalLateness }}?');">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $('#cbTier').on('change', function() {
            var tier = $('#cbTier').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('import.sa-getrowbaytable') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'tier': tier,
                },
                success: function(data) {
                    $('#tableBodyRBT').html(data.data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Terjadi Kesalahan, Hubungi Tim Panitia.\nError Message [Tier Table ISA]: ' +
                        errorThrown);
                }
            });
        });
    </script>
</body>

</html>