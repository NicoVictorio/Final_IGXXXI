<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Admin | Final IG XXXI</title>
</head>

<body>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mt-2">
        <h1 class="text-center mb-3">List Scoring Final IG XXXI</h1>
        <div class="card mb-3">
            <div class="card-header"><strong>Sesi Export</strong></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Tim</th>
                            <th>Stowage Plan</th>
                            <th>Docking Duration</th>
                            <th>Teus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoringExport as $key => $se)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $se->team->name }}</td>
                                @if ($se->stowage_plan != null)
                                    <td>{{ $se->stowage_plan }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($se->docking_duration != null)
                                    <td>{{ $se->docking_duration }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($se->teus != null)
                                    <td>{{ $se->teus }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header"><strong>Sesi Import</strong></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Tim</th>
                            <th>Lateness</th>
                            <th>Completion Time</th>
                            <th>Acceptance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoringImport as $key => $si)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $si->team->name }}</td>
                                @if ($si->lateness != null)
                                    <td>{{ $si->lateness }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($si->completion_time != null)
                                    <td>{{ $si->completion_time }}</td>
                                @else
                                    <td>-</td>
                                @endif

                                @if ($si->acceptance != null)
                                    <td>{{ $si->acceptance }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Back to Admin Page</a>
    </div>
</body>

</html>
