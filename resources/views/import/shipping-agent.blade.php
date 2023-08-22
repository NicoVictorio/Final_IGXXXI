<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depo Agent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="depo">
        <div class="text-center">
            <h1 class="title text-center fw-bolder">Shipping Agent</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <label for="kontainer">Tier: </label> 
                <select name="tier" id="tier">
                    <option value="86">86</option>
                    <option value="84">84</option>
                    <option value="82">82</option>
                </select>
                <div class="table-responsive">
                    <table class="table table-centered table-wrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="title" colspan="12">Bay (top view)</th>
                            </tr>
                            <tr>
                                <th colspan="7"></th>
                                <th class="title">7</th>
                                <th class="title">5</th>
                                <th class="title">3</th>
                                <th class="title">1</th>
                                <th class="title">2</th>
                                <th class="title">4</th>
                                <th class="title">6</th>
                                <th class="title">8</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="title" rowspan="4">Row</td>
                                <td class="title">4</td>
                            </tr>
                            <tr>
                                <td class="title">3</td>
                            </tr>
                            <tr>
                                <td class="title">2</td>
                            </tr>
                            <tr>
                                <td class="title">1</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">0</td>
                                <td class="crane">Crane</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table table-centered table-wrap">
                        <tbody>
                            <tr>
                                <td>Yard Crane traverse travel time (in minute, per row)</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Yard Crane gantry travel time (in minute, per bay)</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Yard Crane's current bay position</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Yard Crane traverse travel time (in minute, per tier)</td>
                                <td>0,5</td>
                            </tr>
                            <tr>
                                <td>Yard Crane's current tier position</td>
                                <td>90</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-centered table-bordered table-wrap">
                    <thead>
                        <tr>
                            <th class="border-0 text-center">Sequence</th>
                            <th class="border-0 text-center">Container number</th>
                            <th class="border-0 text-center">Row position</th>
                            <th class="border-0 text-center">Bay position</th>
                            <th class="border-0 text-center">Tier position</th>
                            <th class="border-0 text-center">Retrieval time (row direction)</th>
                            <th class="border-0 text-center">Retrieval time (bay direction)</th>
                            <th class="border-0 text-center">Retrieval time (tier direction)</th>
                            <th class="border-0 text-center">Total retrieval time (minute)</th>
                            <th class="border-0 text-center">Completion time (minute)</th>
                            <th class="border-0 text-center">Due date (minute)</th>
                            <th class="border-0 text-center">Lateness</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10"></td>
                            <td>Total lateness</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script type="text/javascript"></script>
</body>

</html>
