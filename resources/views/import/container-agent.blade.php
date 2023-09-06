<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import - Container Agent</title>
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
            background: #2c56a7!important;
        }

        .table-text {
            font-size: 20px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: #2c56a7;
        }

        .button-list-kontainer {
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

        .button-list-kontainer:hover {
            border: 3px solid #2C56A7;
            background: #2C56A7;
            color: white;
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
        /* STYLE MODAL */
        .modal-title {
            font-size: 50px;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            color:#2c56a7;
        }
        .modal-body {
            background: rgb(228,242,252);
        }
        .modal-table-title {
            font-size: 17px;
            font-family: "Montserrat", sans-serif;
            font-weight: 550;
            color: white;
            background: #2c56a7!important;
        }
        .modal-table {
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color:#2c56a7;
        }
        .modal-crane {
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
        <br>
        <div class="row">
            <div class="col-6 px-5">
                <div class="row">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                {{-- <a href="{{ route('export.da-addcontainer') }}"
                    class="btn btn-secondary mb-3 button-tambah-kontainer">Tambah Kontainer</a> --}}
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane  gantry travel time (in minute, per bay)</td>
                                <td class="border-0 text-center table-text">1</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane travel time (in minute, per row)</td>
                                <td class="border-0 text-center table-text">1</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane  gantry travel time (in minute, per tier)</td>
                                <td class="border-0 text-center table-text">0,5</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane's current bay position</td>
                                <td class="border-0 text-center table-text">1</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane's current row position</td>
                                <td class="border-0 text-center table-text">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center table-title">Rubber Tyred Gantry Crane's current tier position</td>
                                <td class="border-0 text-center table-text">5</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered modal-table border-0 text-center">
                        <thead class="modal-table-title">
                            <tr>
                                <th colspan="6">
                                    <select name="yard" id="cbYard"
                                        class="form-select combobox" required>
                                        <option value="import">Import Yard</option>
                                        <option value="rf">RF Yard</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="6">
                                    <select name="tier" id="cbTier"
                                        class="form-select combobox" required>
                                        <option value="1">Tier 1</option>
                                        <option value="2">Tier 2</option>
                                        <option value="3">Tier 3</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan="5">Bay</th>
                            </tr>
                            <tr>
                                <th>Row</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="modal-table-title">3</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">2</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">1</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6 px-5">
                <h1 class="layout-title">Layout Kontainer</h1>
                <form action="{{ route('export.sa-push') }}" method="post">
                    @csrf
                    <div class="row">
                        <label for="cbKontainer" class="combobox-title">Kontainer</label>
                        <div class="row">
                            <select name="kontainer" id="cbKontainer" class="form-select combobox" required>
                                <option value="" selected disabled>Pilih Kontainer</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="cbBay" class="combobox-title">Bay</label>
                        <div class="row">
                            <select name="bay" id="cbBay" class="form-select combobox" required>
                                <option value="" selected disabled>Pilih Bay</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="cbRow" class="combobox-title">Row</label>
                        <div class="row">
                            <select name="row" id="cbRow" class="form-select combobox" required>
                                <option value="" selected disabled>Pilih Row</option>
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
                    <br>
                    <div class="row">
                        <button type="button" class="btn btn-info  button-list-kontainer" data-bs-toggle="modal" data-bs-target="#listContainerModal">List Kontainer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal modal-lg fade" id="listContainerModal" tabindex="-1" aria-labelledby="listContainerModalLabel"
        aria-hidden="true">
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
                                <th>Receiving container number</th>
                                <th>Container number</th>
                                <th>Current row position</th>
                                <th>Current bay position</th>
                                <th>Current Tier position</th>
                                <th>Tujuan kontainer</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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