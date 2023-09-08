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
    <div class="container mt-2">
        <h1 class="text-center">Admin Final IG XXXI</h1>
        <div class="row">
            <div class="col-12">
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
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header"><strong>Export Control</strong></div>
            <div class="card-body">
                <form action="{{ route('admin.changestateexport') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            @if ($statusExport->status == 'standby')
                                <h5>Sesi Export Berjalan: <span class="badge bg-danger"> {{ $statusExport->status }}
                                    </span></h5>
                            @else
                                <h5>Sesi Export Berjalan: <span class="badge bg-info"> {{ $statusExport->status }}
                                    </span></h5>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check form-check-inline">
                                @if ($statusExport->status == 'standby')
                                    <input class="form-check-input" type="radio" name="radioExport" value="standby"
                                        checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioExport" value="standby">
                                @endif
                                <label class="form-check-label text-danger">
                                    <strong>Standby</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusExport->status == 'depo-agent')
                                    <input class="form-check-input" type="radio" name="radioExport" value="depo-agent"
                                        checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioExport"
                                        value="depo-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Depo Agent</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusExport->status == 'container-agent')
                                    <input class="form-check-input" type="radio" name="radioExport"
                                        value="container-agent" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioExport"
                                        value="container-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Container Agent</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusExport->status == 'shipping-agent')
                                    <input class="form-check-input" type="radio" name="radioExport"
                                        value="shipping-agent" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioExport"
                                        value="shipping-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Shipping Agent</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="submit"
                                onclick="return confirm('Apakah anda yakin mengubah Status EXPORT Berjalan?');">Ubah
                                Sesi Export</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header"><strong>Import Control</strong></div>
            <div class="card-body">
                <form action="{{ route('admin.changestateimport') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            @if ($statusImport->status == 'standby')
                                <h5>Sesi Import Berjalan: <span class="badge bg-danger"> {{ $statusImport->status }}
                                    </span></h5>
                            @else
                                <h5>Sesi Import Berjalan: <span class="badge bg-info"> {{ $statusImport->status }}
                                    </span></h5>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check form-check-inline">
                                @if ($statusImport->status == 'standby')
                                    <input class="form-check-input" type="radio" name="radioImport" value="standby"
                                        checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioImport" value="standby">
                                @endif
                                <label class="form-check-label text-danger">
                                    <strong>Standby</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusImport->status == 'shipping-agent')
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="shipping-agent" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="shipping-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Shipping Agent</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusImport->status == 'container-agent')
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="container-agent" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="container-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Container Agent</strong>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if ($statusImport->status == 'depo-agent')
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="depo-agent" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="radioImport"
                                        value="depo-agent">
                                @endif
                                <label class="form-check-label">
                                    <strong>Depo Agent</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="submit"
                                onclick="return confirm('Apakah anda yakin mengubah Status IMPORT Berjalan?');">Ubah
                                Sesi Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="post" class="mb-3">
            @csrf
            <a href="{{ route('admin.listscoring') }}" class="btn btn-outline-secondary">Go to Scoring Page</a>
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>
