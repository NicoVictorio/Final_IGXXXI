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
        .table-title{
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
            color:#2c56a7;
        }
        .tabel-title {
            font-size: 30px;
            font-family: "Montserrat", sans-serif;
            text-align: center;
            margin-bottom: 10px;
            font-weight: 700;
            color:#2c56a7;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">DEPO AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-5 py-4">
            <div clas="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label for="tabelDepo" class="tabel-title">Keinginan Perusahaan</label>
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap" id="tabelDepo">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center">Paket Produk</th>
                        <th class="border-0 text-center">Jumlah Produk</th>
                        <th class="border-0 text-center">General Inspection Level</th>
                        <th class="border-0 text-center">Inspection level</th>
                        <th class="border-0 text-center">Acc</th>
                        <th class="border-0 text-center">Reject</th>
                        <th class="border-0 text-center">Persentase Kecacatan</th>
                        <th class="border-0 text-center">Produk Cacat</th>
                        <th class="border-0 text-center">Keputusan Akhir</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <select name="tier" id="cbtier" class="form-select combobox">
                                            <option value="none">-</option>
                                            <option value="accepted">Accepted</option>
                                            <option value="rejected">Rejeced</option>
                                        </select>
                                    </td>
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
