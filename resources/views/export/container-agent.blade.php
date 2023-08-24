<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container AGent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
            color:#2c56a7;
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
            background: rgb(194,226,246);
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
            background: #2c56a7;
        }
        .modal-table {
            font-size: 15px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color:#2c56a7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">CONTAINER AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-5 py-2 mb-4">
            <div class="col-12">
                <form action="{{ route('export.saveexportcontainer') }}" method="post">
                    <div class="col-9 px-5">
                        <h1 class="layout-title">Layout Kontainer</h1>
                        <div class="cell">
                            <div>
                                <div class="row">
                                    <div class="bay">Bay 1</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">1</div>
                                    <div class="nomor">2</div>
                                    <div class="nomor">3</div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">6</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">5</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">3</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">2</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">1</div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="bay">Bay 3</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">1</div>
                                    <div class="nomor">2</div>
                                    <div class="nomor">3</div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">6</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">5</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">3</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">2</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="nomor">1</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            <div class="px-4">
                                <div class="row">
                                    <div class="bay">Bay 2</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">1</div>
                                    <div class="nomor">2</div>
                                    <div class="nomor">3</div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                            </div>
                            <div class="px-4">
                                <div class="row">
                                    <div class="bay">Bay 4</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">1</div>
                                    <div class="nomor">2</div>
                                    <div class="nomor">3</div>
                                    <div class="nomor">4</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-9 px-5">
                        <div class="row">
                            <label for="cbKontainer" class="combobox-title">Kontainer</label>
                            <div class="row">
                                <select name="kontainer" id="cbKontainer" class="form-select combobox">
                                    <option value="1">a</option>
                                    <option value="2">b</option>
                                    <option value="3">c</option>
                                    <option value="4">d</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-5">
                            <label for="cbBay" class="combobox-title">Bay</label>
                            <div class="row">
                                <select name="bay" id="cbBay" class="form-select combobox">
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
                                <select name="row" id="cbRow" class="form-select combobox">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-5">
                            <label for="cbTier" class="combobox-title">Tier</label>
                            <div class="row">
                                <select name="tier" id="cbtier" class="form-select combobox">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row py-5">
                            <button type="submit" class="btn btn-primary button-layout">Simpan Kontainer</button>
                        </div>
                        <div class="row py-3">
                            <button type="button" class="btn btn-info button-layout"
                            data-bs-toggle="modal" data-bs-target="#listContainerModal">List
                            Kontainer</button>
                        </div>
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
                                <th class="border-0">No</th>
                                <th>Nomor Kontainer</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
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