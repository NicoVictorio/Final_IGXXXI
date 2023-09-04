<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export - Shipping Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        table th#title {
            background-color: lightblue;
        }

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

        .title {
            padding-top: 20px;
            padding-bottom: 10px;
            font-family: "Montserrat", sans-serif;
            font-size: 60px;
            color: #2c56a7;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .cell .row {
            height: 40px;
        }

        .row-bay {
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

        .bay-ship {
            border: 1px solid darkblue;
            background: #2c56a7;
            color: white;
            width: 280px;
            float: left;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
        }

        .blank {
            border: none;
            width: 40px;
            float: left;
            text-align: center;
        }

        .sep {
            border: 0.5px solid darkblue;
            background: #2c56a7;
            width: 40px;
            float: left;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">SHIPPING AGENT</h1>
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
        <div class="spacer"></div>
        <div class="body mb-9">
            <div class="row mb-5">
                <!-- LAYOUT CONTAINER START -->
                <div class="col-4" style="padding-left: 40px;">
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
                <!-- CONTROL START -->
                <div class="col-4 px-5">
                    <h1 class="layout-title">Layout Kontainer</h1>
                    <form action="{{ route('export.sa-push') }}" method="post">
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
                        <div class="row">
                            <label for="cbBay" class="combobox-title">Bay</label>
                            <div class="row">
                                <select name="bay" id="cbBay" class="form-select combobox" required>
                                    <option value="" selected disabled>Pilih Bay</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                    <option value="9">9</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="cbRow" class="combobox-title">Row</label>
                            <div class="row">
                                <select name="row" id="cbRow" class="form-select combobox" required>
                                    <option value="" selected disabled>Pilih Row</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="divTier">
                            <label class="combobox-title">Tier: Belum Pilih Row</label>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary button-layout">Simpan Kontainer</button>
                        </div>
                        <br>
                        <div class="row">
                            <button type="button" class="btn btn-primary button-layout" id="reset">Reset</button>
                        </div>
                        <br>
                        <div class="row">
                            <a href="{{ route('export.index') }}" class="btn btn-primary button-layout">Back</a>
                        </div>
                    </form>
                </div>
                <!-- IN DECK START -->
                <div class="col-4 px-5">
                    <h1 class="layout-title">In Deck</h1>
                    <div class="cell">
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 1</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 3</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 5</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 7</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 9</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                        <div>
                            <div class="row row-bay">
                                <div class="bay-ship">Bay 11</div>
                            </div>
                            <div class="row row-bay">
                                <div class="nomor">06</div>
                                <div class="nomor">04</div>
                                <div class="nomor">02</div>
                                <div class="blank"> </div>
                                <div class="nomor">01</div>
                                <div class="nomor">03</div>
                                <div class="nomor">05</div>
                            </div>
                            <div class="row row-bay">
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">06</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">04</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                            <div class="row row-bay">
                                <div class="blank"> </div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="nomor">02</div>
                                <div class="space"> </div>
                                <div class="space"> </div>
                                <div class="blank"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center w-50">Total Weight: Port</th>
                                    <th class="border-0 text-center w-50">Total Weight: Starboard</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td class="text-center">{{ $totalWeightPort }}</td>
                                    <td class="text-center">{{ $totalWeightStarboard }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center" colspan="2">Difference: Port and Starboard
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td class="text-center" colspan="2">{{ $diffPortStarboard }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center w-50">Total Weight: Bow</th>
                                    <th class="border-0 text-center w-50">Total Weight: Stern</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td class="text-center">{{ $totalWeightBow }}</td>
                                    <td class="text-center">{{ $totalWeightStern }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center" colspan="2">Difference: Port and Stern
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td class="text-center" colspan="2">{{ $diffBowStern }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered table-bordered table-wrap">
                        <thead>
                            <tr class="table-title">
                                <th class="border-0 text-center" colspan="2">TOTAL BERAT KAPAL</th>
                            </tr>
                        </thead>
                        <tbody class="table-text">
                            <tr>
                                <td class="text-center" colspan="2">{{ $totalWeightShip }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-centered table-bordered table-wrap">
                        <thead>
                            <tr class="table-title">
                                <th class="border-0 text-center w-50">Keputusan 1</th>
                                <th class="border-0 text-center w-50">Keputusan 2</th>
                            </tr>
                        </thead>
                        <tbody class="table-text">
                            <tr>
                                <td class="text-center">{{ ucfirst($decision1) }}</td>
                                <td class="text-center">{{ ucfirst($decision2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-centered table-bordered table-wrap">
                        <thead>
                            <tr class="table-title">
                                <th class="border-0 text-center" colspan="2">Keputusan Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="table-text">
                            <tr>
                                <td class="text-center" colspan="2">{{ ucfirst($finalDecision) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @if ($finalDecision == 'send')
                        <div class="row">
                            <form action="#" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $('#cbKontainer').on('change', function() {
            $('#cbBay').html(
                "<option value='' selected disabled>Pilih Bay</option><option value='1'>1</option><option value='3'>3</option><option value='5'>5</option><option value='7'>7</option><option value='9'>9</option><option value='11'>11</option>"
                )
            $('#cbRow').html(
                "<option value='' selected disabled>Pilih Row</option><option value='1'>01</option><option value='2'>02</option><option value='3'>03</option><option value='4'>04</option><option value='5'>05</option><option value='6'>06</option>"
                );
            $('#divTier').html(
                "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                );
        });
        $('#cbBay').on('change', function() {
            $('#cbRow').html(
                "<option value='' selected disabled>Pilih Row</option><option value='1'>01</option><option value='2'>02</option><option value='3'>03</option><option value='4'>04</option><option value='5'>05</option><option value='6'>06</option>"
                );
            $('#divTier').html(
                "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                );
        });
        $('#reset').on('click', function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('export.sa-reset') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    window.location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Terjadi Kesalahan, Hubungi Tim Panitia.\nError Message [Reset ESA]: ' +
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
                        "<option value='' selected disabled>Pilih Bay</option><option value='1'>1</option><option value='3'>3</option><option value='5'>5</option><option value='7'>7</option><option value='9'>9</option><option value='11'>11</option>"
                        )
                    $('#cbRow').html(
                        "<option value='' selected disabled>Pilih Row</option><option value='2'>02</option><option value='4'>04</option><option value='6'>06</option>"
                        );
                    $('#divTier').html(
                        "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                        );
                }
                if (bay == null) {
                    alert('Belum memilih bay!');
                    $('#cbBay').html(
                        "<option value='' selected disabled>Pilih Bay</option><option value='1'>1</option><option value='3'>3</option><option value='5'>5</option><option value='7'>7</option><option value='9'>9</option><option value='11'>11</option>"
                        )
                    $('#cbRow').html(
                        "<option value='' selected disabled>Pilih Row</option><option value='2'>02</option><option value='4'>04</option><option value='6'>06</option>"
                        );
                    $('#divTier').html(
                        "<input type='hidden' name='tier' value=''><label class='combobox-title'>Tier: Belum Pilih Row</label>"
                        );
                }
            } else {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('export.sa-gettier') }}',
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
