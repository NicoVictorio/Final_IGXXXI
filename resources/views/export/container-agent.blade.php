<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export - Container Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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

        .layout-title {
            font-size: 30px;
            font-family: "Montserrat", sans-serif;
            margin-bottom: 10px;
            font-weight: 700;
            color: #2c56a7;
        }

        .title {
            padding-top: 20px;
            padding-bottom: 10px;
            font-family: "Montserrat", sans-serif;
            font-size: 40px;
            color: #2c56a7;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .row {
            height: 40px;
        }

        .space {
            border: 0.5px solid darkblue;
            background: white;
            width: 40px;
            float: left;
            text-align: center;
        }

        .bay {
            border: 1px solid darkblue;
            background: #2c56a7;
            color: white;
            width: 160px;
            float: left;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
        }

        .nomor {
            border: 0.5px solid darkblue;
            background: rgb(194, 226, 246);
            color: #2c56a7;
            width: 40px;
            float: left;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
        }

        .cell {
            float: left;
        }

        .button-layout {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            border-radius: 1.5rem;
            color: white;
            font-family: "Montserrat", sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1;
            padding: 0.5rem 1.6rem;
            text-align: center;
        }

        .button-layout:hover {
            border: 3px solid #2C56A7;
            background: white;
            color: #2C56A7;
        }

        .combobox-title {
            font-size: 25px;
            font-family: "Montserrat", sans-serif;
            margin-bottom: 5px;
            font-weight: 600;
            color: #2c56a7;
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
            color: #2c56a7;
        }

        .modal-body {
            background: rgb(228, 242, 252);
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
            color: #2c56a7;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">CONTAINER AGENT</h1>
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
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Belum semua pilihan diisi!
            </div>
        @endif
        <div class="spacer"></div>
        <div class="body px-5 py-2 mb-4">
            <div class="row">
                <div class="col-7 px-5">
                    <h1 class="layout-title">Layout Kontainer</h1>
                    <div class="cell">
                        <div>
                            <div class="row">
                                <div class="bay">Block 1</div>
                            </div>
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier6#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier6#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier6#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">6</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier5#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier5#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier5#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">5</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier4#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier4#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier4#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier3#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier3#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier3#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">3</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier2#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier2#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier2#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">2</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier1#bay1/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier1#bay1/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier1#bay1/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">1</div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="bay">Block 3</div>
                            </div>
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier6#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier6#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier6#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">6</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier5#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier5#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier5#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">5</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier4#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier4#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier4#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier3#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier3#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier3#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">3</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier2#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier2#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier2#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">2</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier1#bay3/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier1#bay3/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier1#bay3/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                                <div class="nomor">1</div>
                            </div>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="px-4">
                            <div class="row">
                                <div class="bay">Block 2</div>
                            </div>
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier6#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier6#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier6#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier5#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier5#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier5#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier4#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier4#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier4#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier3#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier3#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier3#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier2#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier2#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier2#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier1#bay2/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier1#bay2/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier1#bay2/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="px-4">
                            <div class="row">
                                <div class="bay">Block 4</div>
                            </div>
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier6#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier6#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier6#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier5#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier5#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier5#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier4#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier4#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier4#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier3#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier3#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier3#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier2#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier2#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier2#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="space {{ preg_grep('/row' . $i . '#tier1#bay4/', $arrPlot) ? 'bg-primary' : '' }}"
                                        style="display: flex; align-items: center; justify-content:center;">
                                        @php
                                            if (preg_grep('/row' . $i . '#tier1#bay4/', $arrPlot)) {
                                                $arrVal = preg_grep('/row' . $i . '#tier1#bay4/', $arrPlot);
                                                $value = array_shift($arrVal);
                                            } else {
                                                $value = '';
                                            }
                                        @endphp
                                        {{ substr($value, 0, 4) }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 px-5">
                    <form action="{{ route('export.ca-push') }}" method="post">
                        @csrf
                        <div class="row">
                            <label for="cbKontainer" class="combobox-title">Kontainer</label>
                            <div class="row">
                                <select name="kontainer" id="cbKontainer" class="form-select combobox" required>
                                    <option value="" selected disabled>Pilih Kontainer</option>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach ($containerShips as $key => $contShip)
                                        @if ($counter == 0)
                                            <option value="{{ $contShip->id }}">{{ $contShip->code }}
                                                ({{ number_format($contShip->stuff_weight, 2, ',', '.') }}kg)
                                            </option>
                                        @else
                                            <option value="{{ $contShip->id }}" disabled>{{ $contShip->code }}
                                                ({{ number_format($contShip->stuff_weight, 2, ',', '.') }}kg)
                                            </option>
                                        @endif
                                        @php
                                            $counter++;
                                        @endphp
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row py-5">
                            <label for="cbBay" class="combobox-title">Block</label>
                            <div class="row">
                                <select name="bay" id="cbBay" class="form-select combobox" required>
                                    <option value="" selected disabled>Pilih Block</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-5">
                            <label for="cbRow" class="combobox-title">Row</label>
                            <div class="row">
                                <select name="row" id="cbRow" class="form-select combobox" required>
                                    <option value="" selected disabled>Pilih Row</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-5" id="divTier">
                            <label class="combobox-title">Tier: Belum Pilih Row</label>
                        </div>
                        <div class="row py-5">
                            <button type="submit" class="btn btn-primary button-layout">Simpan Kontainer</button>
                        </div>
                    </form>
                    <div class="row py-3">
                        <button type="button" class="btn btn-info button-layout" data-bs-toggle="modal"
                            data-bs-target="#listContainerModal">List Kontainer</button>
                    </div>
                    <br>
                    <div class="row py-3">
                        <button type="button" class="btn btn-primary button-layout" id="reset">Reset</button>
                    </div>
                    <br>
                    <div class="row py-3">
                        <a href="{{ route('export.index') }}" class="btn btn-primary button-layout">Back</a>
                    </div>
                    @if (count($containerShips) == 0)
                        <div class="row py-3">
                            <button type="button" class="btn btn-info button-layout mt-5" data-bs-toggle="modal"
                                data-bs-target="#scoringModal">Submit</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal modal-lg fade" id="listContainerModal" tabindex="-1"
        aria-labelledby="listContainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="exampleModalLabel">List Container</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered modal-table">
                        <thead class="modal-table-title">
                            <tr>
                                <th class="border-0">No</th>
                                <th>Nomor Kontainer</th>
                                <th>Destination</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($listContainer as $key => $lCont)
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $lCont->code }}</td>
                                    <td>{{ $lCont->city }}</td>
                                    <td>{{ number_format($lCont->stuff_weight, 2, ',', '.') }}kg</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Scoring Modal --}}
    <div class="modal fade" id="scoringModal" tabindex="-1" aria-labelledby="scoringModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-3" id="exampleModalLabel">Docking Time Submission (Container Agent)</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="scoringModalBody">
                    <h4>LO Authorization</h4>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="usernameLO" id="txtUsername" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="passwordLO" id="txtPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary button-layout" id="btnAuthorizeCA">Authorize</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $('#btnAuthorizeCA').on('click', function() {
            var username = $('#txtUsername').val();
            var password = $('#txtPassword').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('scoring.lo-authorize') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'username':username,
                    'password':password,
                },
                success: function(data) {
                    if(data.authorize=='ok'){
                        var htmlText = "<form action='{{ route('scoring.eca') }}' method='post'><input type='hidden' name='_token' value='{{ csrf_token() }}'><div class='mb-3 text-center'><label for='' class='form-label'>Minute</label><input type='text' name='minute' style='width: 150px' class='form-control mx-auto' required></div><div class='mb-3 text-center'><label for='' class='form-label'>Second</label><input type='text' name='second' style='width: 150px' class='form-control mx-auto' required></div><div class='mb-3'><button type='submit' class='btn button-layout'>Submit</button></div></form>";
                        $('#scoringModalBody').html(htmlText);
                    }
                    else{
                        alert('LO Wrong Authorization');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Terjadi Kesalahan, Hubungi Tim Panitia.\nError Message [LO Authorize ECA]: ' +
                        errorThrown);
                }
            });
        });
        $('#cbKontainer').on('change', function() {
            $('#cbBay').html(
                "<option value='' selected disabled>Pilih Block</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
            );
        });
        $('#cbBay').on('change', function() {
            $('#cbRow').html(
                "<option value='-' selected disabled>Pilih Row</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
            );
            $('#divTier').html(
                "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
            );
        });
        $('#reset').on('click', function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('export.ca-reset') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    window.location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Terjadi Kesalahan, Hubungi Tim Panitia.\nError Message [Reset ECA]: ' +
                        errorThrown);
                }
            });
        });
        $('#cbRow').on('change', function() {
            var idShipping = $('#cbKontainer').val();
            var bay = $('#cbBay').val();
            var row = $('#cbRow').val();

            if (idShipping == null || bay == null) {
                if (idShipping == null) {
                    alert('Belum memilih container');
                    $('#cbBay').html(
                        "<option value='' selected disabled>Pilih Block</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
                    );
                    $('#cbRow').html(
                        "<option value='-' selected disabled>Pilih Row</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
                    );
                    $('#divTier').html(
                        "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                    );
                }
                if (bay == null) {
                    alert('Belum memilih block!');
                    $('#cbBay').html(
                        "<option value='' selected disabled>Pilih Block</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
                    );
                    $('#cbRow').html(
                        "<option value='-' selected disabled>Pilih Row</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>"
                    );
                    $('#divTier').html(
                        "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                    );
                }
            } else {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('export.ca-gettier') }}',
                    data: {
                        '_token': '<?php echo csrf_token(); ?>',
                        'bay': bay,
                        'row': row,
                    },
                    success: function(data) {
                        $('#divTier').html("<input type='hidden' name='tier' value='" + data.tier +
                            "'><label class='combobox-title'>Tier: " + data.tier + "</label>");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert('Terjadi Kesalahan, Hubungi Tim Panitia.\nError Message [View Tier ECA]: ' +
                            errorThrown);
                    }
                });
            };
        });
    </script>
</body>

</html>
