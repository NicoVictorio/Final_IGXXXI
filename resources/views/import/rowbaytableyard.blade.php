<tr>
    <td class="modal-table-title">3</td>
    @foreach ([1, 2, 3, 4, 5] as $i)
    <td class="space {{ preg_grep('/row3#bay'. $i .'/', $arrPlot) ? 'bg-primary' : '' }} text-center text-white" style="width: 15%;">
        @php
            if (preg_grep('/row3#bay'. $i .'/', $arrPlot)) {
                $arrVal = preg_grep('/row3#bay'. $i .'/', $arrPlot);
                $value = array_shift($arrVal);
            } else {
                $value = '';
            }
        @endphp
        {{ substr($value, 0, 4) }}
    </td>
    @endforeach
</tr>
<tr>
    <td class="modal-table-title">2</td>
    @foreach ([1, 2, 3, 4, 5] as $i)
    <td class="space {{ preg_grep('/row2#bay'. $i .'/', $arrPlot) ? 'bg-primary' : '' }} text-center text-white" style="width: 15%;">
        @php
            if (preg_grep('/row2#bay'. $i .'/', $arrPlot)) {
                $arrVal = preg_grep('/row2#bay'. $i .'/', $arrPlot);
                $value = array_shift($arrVal);
            } else {
                $value = '';
            }
        @endphp
        {{ substr($value, 0, 4) }}
    </td>
    @endforeach
</tr>
<tr>
    <td class="modal-table-title">1</td>
    @foreach ([1, 2, 3, 4, 5] as $i)
    <td class="space {{ preg_grep('/row1#bay'. $i .'/', $arrPlot) ? 'bg-primary' : '' }} text-center text-white" style="width: 15%;">
        @php
            if (preg_grep('/row1#bay'. $i .'/', $arrPlot)) {
                $arrVal = preg_grep('/row1#bay'. $i .'/', $arrPlot);
                $value = array_shift($arrVal);
            } else {
                $value = '';
            }
        @endphp
        {{ substr($value, 0, 4) }}
    </td>
    @endforeach
</tr>
<tr>
    <td class="modal-table-title">0</td>
    <td class="bg-warning text-white" style="width: 15%;">Crane</td>
</tr>