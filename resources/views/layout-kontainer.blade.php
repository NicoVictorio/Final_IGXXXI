<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout Container</title>
    <style>
        .layout {
			border: 1px solid black;
			width: 30px;
			float: left;
			text-align: center;
		}
    </style>
</head>
<body>
    <div>
        <h1 class="title text-center fw-bolder">Layout Kontainer</h1>
        <div class="spacer"></div>

        <div class="row">
            <label for="kontainer">Pilih Kontainer: </label> 
            <select name="kontainer" id="kontainer">
                <option value="General">General Container</option>
                <option value="Refirgerated">Refirgerated Container</option>
                <option value="Tank">Tank Container</option>
                <option value="Fantainer">Fantainer/ventilation</option>
            </select>
            <label for="kontainer">Row: </label> 
            <input type="number" id="row" name="row" min="1" max="6">
            <label for="kontainer">Tier: </label> 
            <input type="number" id="row" name="row" min="1" max="4">
            <button id="btnPilih" class="button-pilih" role="button" onclick=pilihLayoutKontainer()>Pilih Layout Kontainer</button>
        </div>
    </div>
    <div>
        <div class="col-3 px-4 py-4">
            <div class="row">
                <div class="nomor">1</div>
                <div class="kursi">2</div>
                <div class="kursi">3</div>
                <div class="kursi">4</div>
            </div>
            <div class="row">
                <div class="nomor">6 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">5 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">4 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">3 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">2 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">1 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
        </div>
        <div class="col-3 px-4 py-4">
            <div class="row">
                <div class="nomor">1</div>
                <div class="kursi">2</div>
                <div class="kursi">3</div>
                <div class="kursi">4</div>
            </div>
            <div class="row">
                <div class="nomor">6 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">5 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">4 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">3 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">2 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">1 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="nomor">1</div>
                <div class="kursi">2</div>
                <div class="kursi">3</div>
                <div class="kursi">4</div>
            </div>
            <div class="row">
                <div class="nomor">6 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">5 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">4 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">3 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">2 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">1 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="nomor">1</div>
                <div class="kursi">2</div>
                <div class="kursi">3</div>
                <div class="kursi">4</div>
            </div>
            <div class="row">
                <div class="nomor">6 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">5 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">4 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">3 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">2 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
            <div class="row">
                <div class="nomor">1 </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
                <div class="kursi">  </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		$("#btnPilih").click(function(){
			
		});
	</script>
</body>
</html>