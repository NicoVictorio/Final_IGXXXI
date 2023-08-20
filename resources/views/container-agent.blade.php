<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container AGent</title>
</head>
<body>
    <div class="container">

        <div>
            <h1 class="title text-center fw-bolder">COntainer Arrival</h1>
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
                                    <th class="border-0 text-center">No</th>
                                    <th class="border-0 text-center">List Kontainer</th>
                                    <th class="border-0 text-center">Tanggal Pengiriman</th>
                                    <th class="border-0 text-center">Jenis Barang</th>
                                    <th class="border-0 text-center">Ukuran Kontainer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1 @endphp
                                @foreach($containers as $container)
                                <tr>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="container-id" value="{{ $container->id }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="container-bobot" value="{{ $container->bobot }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="container-pengiriman" value="{{ $container->pengiriman }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="container-barang" value="{{ $container->barang }}">
                                    </td>
                                    <td class="border-0 text-center align-middle">{{ $index++ }}
                                        <input type="hidden" class="container-ukuran" value="{{ $container->ukuran }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3 px-4 py-4">
                    <button class="button-layout-kontainer" role="button" onclick="location.href='{{ route('layout-kontainer') }}'">Layout Kontainer</button>
                </div>
            </div>
        </div>
</body>
</html>