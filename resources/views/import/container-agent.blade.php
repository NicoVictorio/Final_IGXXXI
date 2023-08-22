<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Container Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .title {
            border: 0;
			text-align: center;
            background-color: black;
            color: white;
        }
        .crane {
            border: 0;
			text-align: center;
            background-color: navy;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">Container Agent</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-centered table-bordered table-wrap">
                <thead>
                    <tr>
                        <th class="border-0 text-center">Sequence</th>
                        <th class="border-0 text-center">Container number</th>
                        <th class="border-0 text-center">Current row position</th>
                        <th class="border-0 text-center">Current bay position</th>
                        <th class="border-0 text-center">Target row position</th>
                        <th class="border-0 text-center">Target bay position</th>
                        <th class="border-0 text-center">Retrieval time (row direction)</th>
                        <th class="border-0 text-center">Empty retrieval time (bay direction)</th>
                        <th class="border-0 text-center">Loaded retrieval time (bay direction)</th>
                        <th class="border-0 text-center">Total retrieval time (minute)</th>
                        <th class="border-0 text-center">Completion time (minute)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9"></td>
                        <td>Total completion time (minutes)</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <button class="button-kontainer-detail" role="button" onclick="location.href='{{ route('layout-kontainer') }}'">Layout Kontainer</button>
    </div>
</body>
</html>