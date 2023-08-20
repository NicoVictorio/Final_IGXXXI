<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table th#title  {background-color:lightblue;}
        .space {
			border: 1px solid black;
			width: 30px;
			float: left;
			text-align: center;
		}
        .nomor {
			width: 30px;
			float: left;
			text-align: center;
		}
        .sep {
            border: 1px solid black;
            background-color: black
			width: 30px;
			float: left;
			text-align: center;
		}
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1 class="title text-center fw-bolder">Shipping Agent</h1>
        </div>
        {{-- <div class="modal-header d-flex align-items-center justify-content-center position-relative">
            <div>
                <h1 class="modal-title text-center fw-bolder">Machine</h1>
            </div>
    
            button X ga butuh soalnya ini page baru bukan modal?
            <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"
                style="right: 20px"></button>
        </div> --}}
        <div class="spacer"></div>
    
        <div class="body px-5 py-4">
            <div class="row">
                <div class="col-6">
                    <div>
                        <div class="col">
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                <div class="nomor">6 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">5 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">4 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">3 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">2 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">1 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                <div class="nomor">6 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">5 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">4 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">3 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">2 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">1 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                <div class="nomor">6 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">5 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">4 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">3 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">2 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">1 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="nomor">1</div>
                                <div class="nomor">2</div>
                                <div class="nomor">3</div>
                                <div class="nomor">4</div>
                            </div>
                            <div class="row">
                                <div class="nomor">6 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">5 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">4 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">3 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">2 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                            <div class="row">
                                <div class="nomor">1 </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                                <div class="space">  </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-wrap">
                            <tr>
                                <th id="title" class="border-0 text-center">Total Weight: Port</th>
                                <th id="title" class="border-0 text-center">Total Weight: Starboard</th>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">0</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <th id="title" class="border-0 text-center" colspan="2">Difference: Port and Starboard</th>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle" colspan="2">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-3 px-4 py-4">
                    <div>IN DECK</div>

                    <br>
                    <div>BAY (1)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
                    <br>
                    <div>BAY (3)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
            
                    <br>
                    <div>BAY (5)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>

                    <br>
                    <div>BAY (7)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
                </div>
                <div class="col-3 px-4 py-4">
                    <div>ON DECK</div>

                    <br>
                    <div>BAY (1)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
                    <br>
                    <div>BAY (3)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
            
                    <br>
                    <div>BAY (5)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>

                    <br>
                    <div>BAY (7)</div>
                    <div class="row">
                        <div class="row">
                            <div class="nomor">06</div>
                            <div class="nomor">04</div>
                            <div class="nomor">02</div>
                            <div class="nomor">  </div>
                            <div class="nomor">01</div>
                            <div class="nomor">03</div>
                            <div class="nomor">05</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">06</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">04</div>
                        </div>
                        <div class="row">
                            <div class="nomor">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="sep">  </div>
                            <div class="space">  </div>
                            <div class="space">  </div>
                            <div class="nomor">  </div>
                            <div class="nomor">02</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto">
            {{-- <div class="col text-end"> --}}
            <div class="d-flex justify-content-left position-fixed" style="bottom: 5%">
                {{-- mmmm cara ambil produk yang checkbox dicheck semua buat dikirim howww --}}
                <button class="button-kirim" role="button" onclick=kirimProduk()>Kirim Produk</button>
            </div>
        </footer>
    </div>
</body>
</html>