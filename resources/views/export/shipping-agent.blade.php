<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        table th#title  {background-color:lightblue;}
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
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">SHIPPING AGENT</h1>
        </div>
        <div class="spacer"></div>
        <div class="body px-9 py-8 mb-9">
            <div class="col-15 px-20">
                <form action="{{ route('export.saveexportcontainer') }}" method="post">
                    <div class="col-8 px-15">
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
                    <div class="col-8 px-15">
                        <div class="table-responsive">
                            <table class="table table-centered table-bordered table-wrap">
                                <thead>
                                    <tr class="table-title">
                                        <th class="border-0 text-center">Total Weight: Port</th>
                                        <th class="border-0 text-center">Total Weight: Starboard</th>
                                    </tr>
                                </thead>
                                <tbody class="table-text">
                                    <tr>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-centered table-bordered table-wrap">
                                <thead>
                                    <tr class="table-title">
                                        <th class="border-0 text-center" colspan="2">Difference: Port and Starboard</th>
                                    </tr>
                                </thead>
                                <tbody class="table-text">
                                    <tr>
                                        <td class="text-center" colspan="2">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-8 px-15">
                        <h1 class="layout-title">In Deck</h1>
                        <div class="cell">
                            <div>
                                <div class="row">
                                    <div class="bay-ship">Bay 1</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">06</div>
                                    <div class="nomor">04</div>
                                    <div class="nomor">02</div>
                                    <div class="blank">  </div>
                                    <div class="nomor">01</div>
                                    <div class="nomor">03</div>
                                    <div class="nomor">05</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="bay-ship">Bay 3</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">06</div>
                                    <div class="nomor">04</div>
                                    <div class="nomor">02</div>
                                    <div class="blank">  </div>
                                    <div class="nomor">01</div>
                                    <div class="nomor">03</div>
                                    <div class="nomor">05</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="bay-ship">Bay 5</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">06</div>
                                    <div class="nomor">04</div>
                                    <div class="nomor">02</div>
                                    <div class="blank">  </div>
                                    <div class="nomor">01</div>
                                    <div class="nomor">03</div>
                                    <div class="nomor">05</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="bay-ship">Bay 7</div>
                                </div>
                                <div class="row">
                                    <div class="nomor">06</div>
                                    <div class="nomor">04</div>
                                    <div class="nomor">02</div>
                                    <div class="blank">  </div>
                                    <div class="nomor">01</div>
                                    <div class="nomor">03</div>
                                    <div class="nomor">05</div>
                                </div>
                                <div class="row">
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                                <div class="row">
                                    <div class="blank">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="sep">  </div>
                                    <div class="space">  </div>
                                    <div class="space">  </div>
                                    <div class="blank">  </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="cell">
                            <div class="px-4">
                                
                            </div>
                            <div class="px-4">
                                
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript"></script>
</body>
</html>