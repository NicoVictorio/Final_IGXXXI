<div class="modal-header">
    <h2>Kontainer {{ $dataContainer->code }} ({{ $dataContainer->container->name }})</h2>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <p class="mb-2 fw-bold">Isi Kontainer</p>
    <table class="table table-bordered mb-3">
        <tr>
            <th>Produk</th>
            <th>Volume</th>
            <th>Jumlah</th>
            <th>Bobot</th>
            <th>Total Bobot</th>
            <th>Total Volume</th>
        </tr>
        @php
        $totalBobot = 0;
        $totalVolume = 0;
        @endphp
        @foreach ($dataContainer->containerProducts as $productCont)
        <tr>
            <td>{{ $productCont->demand->name }}</td>
            <td>{{ number_format($productCont->demand->volume,2,',','.') }}m<sup>3</sup></td>
            <td>{{ $productCont->quantity }}</td>
            <td>{{ number_format($productCont->demand->weight, 2, ',', '.') }}kg</td>
            <td>{{ number_format($productCont->demand->weight * $productCont->quantity, 2, ',', '.') }}kg</td>
            <td>{{ number_format($productCont->demand->volume * $productCont->quantity, 2, ',', '.') }}
                @if($productCont->demand->container == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
            @php
            $totalBobot += $productCont->demand->weight * $productCont->quantity;
            $totalVolume += $productCont->demand->volume * $productCont->quantity;
            @endphp
        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="fw-bold">Total</td>
            <td>{{ number_format($totalBobot, 2, ',', '.') }}kg</td>
            <td>{{ number_format($totalVolume, 2, ',', '.') }}
                @if($dataContainer->container->name == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
        </tr>
    </table>
    <p class="mb-2 fw-bold">Status Kontainer</p>
    <table class="table table-bordered">
        <tr>
            <td colspan="2" class="fw-bold">Status Volume</td>
        </tr>
        <tr>
            <td>Volume Kontainer</td>
            <td>{{ number_format($dataContainer->container->volume, 2, ',', '.') }}
                @if($dataContainer->container->name == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
        </tr>
        <tr>
            <td>Loss Space</td>
            <td>{{ number_format($dataContainer->container->max_volume - $totalVolume, 2, ',', '.') }}
                @if($dataContainer->container->name == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
        </tr>
        <tr>
            <td>2/3 Kapasitas</td>
            <td>{{ number_format($dataContainer->container->max_volume, 2, ',', '.') }}
                @if($dataContainer->container->name == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
        </tr>
        <tr>
            <td>1/3 Kapasitas</td>
            <td>{{ number_format($dataContainer->container->min_volume, 2, ',', '.') }}
                @if($dataContainer->container->name == 'Tank Container')
                L
                @else
                m<sup>3</sup>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2" class="fw-bold">Status Bobot</td>
        </tr>
        <tr>
            <td>Bobot Kontainer</td>
            <td>{{ number_format($dataContainer->container->max_weight, 2, ',', '.') }}kg</td>
        </tr>
    </table>
</div>