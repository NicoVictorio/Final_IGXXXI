<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depo Agent</title>
</head>
<body>
    <div class="container">

        <div>
            <h1 class="title text-center fw-bolder">Depo Agent</h1>
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
                <div class="col-9">
                    <div class="table-responsive">
                        <table class="table table-centered table-wrap">
                            <thead>
                                <tr>
                                    <th class="border-0 text-center">Produk</th>
                                    <th class="border-0 text-center">Volume</th>
                                    <th class="border-0 text-center">Jumlah</th>
                                    <th class="border-0 text-center">Bobot</th>
                                    <th class="border-0 text-center">Tanggal Pengiriman</th>
                                    <th class="border-0 text-center">Kirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1 @endphp
                                @foreach($produks as $produk)
                                <tr>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="produk-nama" value="{{ $produk->nama }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">
                                        {{ $produk->volume }}</td>
                                    <td class="border-0 text-center align-middle">
                                        <input type="number" style="margin: auto"
                                            class="form-control produk-jumlah w-50 text-center"
                                            id="produk-jumlah-{{ $produk->nama }}" value="0" min="0">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="produk-bobot" value="{{ $produk->bobot }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="produk-pengiriman" value="{{ $produk->pengiriman }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="checkbox" class="produk-status" id="produk-status-{{ $produk->kirim }}" value=true>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3 px-4 py-4">
                    <button class="button-list-kontainer" role="button" onclick="location.href='{{ route('list-kontainer') }}'">List Kontainer</button>
                    {{-- di sini keterangan kontainer yang dipilih, g atau cara ngonekin sama page yang milih kontainer --}}
                    <table class="table table-centered table-wrap">
                        <thead>
                            <tr>
                                <th class="border-0 text-center" colspan="2">Status Kontainer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-0 text-center align-middle">Loss Space</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">2/3 Kapasitas</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">1/3 Kapasitas</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">Status Volume Kontainer</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">Status Bobot Kontainer</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                            <tr>
                                <td class="border-0 text-center align-middle">Keputusan Akhir</td>
                                <td class="border-0 text-center align-middle">0</td>
                            </tr>
                        </tbody>
                    </table>
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
    <script type="text/javascript">
        const buyFridge {
            if (!confirm("Are you sure?")) return
            @foreach($produks as $produk)
            if ($produk.kirim == true) {
                
        }
    </script>
</body>
</html>