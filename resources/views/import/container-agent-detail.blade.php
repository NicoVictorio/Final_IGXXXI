<div class="modal fade p-5" id="modalMachine" aria-hidden="true" aria-labelledby="modalMachineLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen w-100">
        <div class="modal-content rounded">
            <div class="modal-header d-flex align-items-center justify-content-center position-relative">
                <div>
                    <h5 class="modal-title text-center fw-bolder">Container Details</h5>
                </div>

                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"
                    style="right: 20px"></button>
            </div>
            <div class="modal-body px-5 py-4">
                <div class="row">
                    <div class="col-8">
                        <div class="table-responsive">
                            <table class="table table-centered table-wrap">
                                <thead>
                                    <tr>
                                        <th class="title">Receiving container number</th>
                                        <th class="title">container number</th>
                                        <th class="title">Current row position</th>
                                        <th class="title">Current bay position</th>
                                        <th class="title">Target row position</th>
                                        <th class="title">Target bay position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-centered table-wrap">
                            <thead>
                                <tr>
                                    <th class="title" colspan="15">Sequence 0</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th class="title" colspan="12">Bay (top view)</th>
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th class="title">1</th>
                                    <th class="title">2</th>
                                    <th class="title">3</th>
                                    <th class="title">4</th>
                                    <th class="title">5</th>
                                    <th class="title">6</th>
                                    <th class="title">7</th>
                                    <th class="title">8</th>
                                    <th class="title">9</th>
                                    <th class="title">10</th>
                                    <th class="title">11</th>
                                    <th class="title">12</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="title" rowspan="4">Row</td>
                                    <td class="title">4</td>
                                    <td class="title">Marshall</td>
                                </tr>
                                <tr>
                                    <td class="title">3</td>
                                    <td class="title">Depo</td>
                                </tr>
                                <tr>
                                    <td class="title">2</td>
                                    <td class="title">Pick Up</td>
                                </tr>
                                <tr>
                                    <td class="title">1</td>
                                    <td class="title">Drop Off</td>
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
            </div>
        </div>
    </div>
</div>