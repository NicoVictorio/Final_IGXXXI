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
        .table-title {
            font-size: 17px;
            font-family: "Montserrat", sans-serif;
            font-weight: 550;
            color: white;
            background: #2c56a7!important;
            text-align: center;
        }
        .table {
            background: white;
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color:#2c56a7;
        }
        .crane {
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: white;
            background: orange!important;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">CONTAINER AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-1 py-4">
            <div class="row">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <a href="{{ route('export.da-addcontainer') }}"
                        class="btn btn-secondary mb-3 button-tambah-kontainer">Tambah Kontainer</a> --}}
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-centered table-bordered table-wrap">
                                    <thead class="table-title">
                                        <tr>
                                            <th colspan="10">Tier 86</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" rowspan="2"></th>
                                            <th colspan="8">Bay (top view)</th>
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
                                    <tbody>
                                        <tr>
                                            <td class="table-title" rowspan="5" style="width: 100px;">Row</td>
                                            <td class="table-title" style="width: 100px;">4</td>
                                        </tr>
                                        <tr>
                                            <td class="table-title" style="width: 100px;">3</td>
                                        </tr>
                                        <tr>
                                            <td class="table-title" style="width: 100px;">2</td>
                                        </tr>
                                        <tr>
                                            <td class="table-title" style="width: 100px;">1</td>
                                        </tr>
                                        <tr>
                                            <td class="table-title" style="width: 100px;">0</td>
                                            <td class="crane">Crane</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table table-bordered table">
                                    <tr>
                                        <td class="table-title col-5">Yard Crane traverse travel time (in minute, per row)</th>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td class="table-title col-5">Yard Crane gantry travel time (in minute, per bay)</th>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td class="table-title col-5">Yard Crane's current bay position</th>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td class="table-title col-5">Yard Crane traverse travel time (in minute, per tier)</th>
                                        <td>0,5</td>
                                    </tr>
                                    <tr>
                                        <td class="table-title col-5">Yard Crane's current tier position</th>
                                        <td>90</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table">
                                <thead class="table-title">
                                    <tr>
                                        <th>Sequence</th>
                                        <th>Container number</th>
                                        <th>Row position</th>
                                        <th>Bay position</th>
                                        <th>Tier position</th>
                                        <th>Retrieval time (row direction)</th>
                                        <th>Retrieval time (bay direction)</th>
                                        <th>Retrieval time (tier direction)</th>
                                        <th>Total retrieval time (minute)</th>
                                        <th>Completion time (minute)</th>
                                        <th>Due date (minute)</th>
                                        <th>Lateness</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
