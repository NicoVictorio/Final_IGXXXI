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
        <div class="body px-1 py-4">
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <a href="{{ route('export.da-addcontainer') }}"
                        class="btn btn-secondary mb-3 button-tambah-kontainer">Tambah Kontainer</a> --}}
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-wrap">
                            <thead>
                                <tr class="table-title">
                                    <th class="border-0 text-center">Sequence</th>
                                    <th class="border-0 text-center">Container number</th>
                                    <th class="border-0 text-center">Current row position</th>
                                    <th class="border-0 text-center">Current bay position</th>
                                    <th class="border-0 text-center">Target row position</th>
                                    <th class="border-0 text-center">Target bay position</th>
                                    <th class="border-0 text-center">Retrieval time (row direction)</th>
                                    <th class="border-0 text-center">Empty retrieval time (bay direction)</th>
                                    <th class="border-0 text-center">Loaded retrieval time (bay direction)</th>
                                    <th class="border-0 text-center">Total retrieval time (minute)</th>
                                    <th class="border-0 text-center">Completion time (minute)</th>
                                </tr>
                            </thead>
                            <tbody class="table-text">
                                <tr>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                    <td class="border-0 text-center">0</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="border-0 text-center table-title fw-bold" colspan="10">Total completion time (minutes)</td>
                                    <td class="border-0 text-center table-text">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end px-1" style="bottom: 5%">
            <button type="button" class="btn btn-info button-list-kontainer" data-bs-toggle="modal" data-bs-target="#listContainerModal">List Kontainer</button>
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
                                <th>Target row position</th>
                                <th>Target bay position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td>4</td>
                                <td>2</td>
                                <td>1</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td></td>
                                <td>4</td>
                                <td>4</td>
                                <td>1</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td>4</td>
                                <td>5</td>
                                <td>1</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td>`</td>
                                <td>1</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td></td>
                                <td>4</td>
                                <td>6</td>
                                <td>1</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td></td>
                                <td>4</td>
                                <td>11</td>
                                <td>1</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td></td>
                                <td>4</td>
                                <td>9</td>
                                <td>1</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td></td>
                                <td>4</td>
                                <td>7</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td></td>
                                <td>4</td>
                                <td>8</td>
                                <td>1</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td></td>
                                <td>4</td>
                                <td>10</td>
                                <td>1</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered modal-table">
                        <tr>
                            <td class="modal-table-title col-8">Yard Crane traverse travel time (in minute, per row)</th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td class="modal-table-title col-8">Yard Crane gantry travel time (in minute, per bay)</th>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td class="modal-table-title col-8">Yard Crane's current bay position</th>
                            <td>1</td>
                        </tr>
                    </table>

                    <table class="table table-bordered modal-table border-0 text-center">
                        <thead class="modal-table-title">
                            <tr>
                                <th colspan="15">Sequence 0</th>
                            </tr>
                            <tr>
                                <th colspan="3" rowspan="2"></th>
                                <th colspan="12">Bay (top view)</th>
                            </tr>
                            <tr>
                                <th style="width: 70px;">1</th>
                                <th style="width: 70px;">2</th>
                                <th style="width: 70px;">3</th>
                                <th style="width: 70px;">4</th>
                                <th style="width: 70px;">5</th>
                                <th style="width: 70px;">6</th>
                                <th style="width: 70px;">7</th>
                                <th style="width: 70px;">8</th>
                                <th style="width: 70px;">9</th>
                                <th style="width: 70px;">10</th>
                                <th style="width: 70px;">11</th>
                                <th style="width: 70px;">12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="modal-table-title"rowspan="4">Row</td>
                                <td class="modal-table-title">4</td>
                                <td class="modal-table-title">Marshall</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">3</td>
                                <td class="modal-table-title">Depo</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">2</td>
                                <td class="modal-table-title">Pick Up</td>
                            </tr>
                            <tr>
                                <td class="modal-table-title">1</td>
                                <td class="modal-table-title">Drop Off</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="modal-table-title" colspan="3">0</td>
                                <td class="modal-crane">Crane</td>
                            </tr>
                        </tfoot>
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