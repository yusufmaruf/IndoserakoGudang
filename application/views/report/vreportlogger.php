<!-- Content Wrapper. Contains page content -->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.4/dataTables.bootstrap4.min.css" integrity="sha512-PtMN9IfbDiW41+IT7U23EZ/jPCyTRQgH8qGO2JXfodGnkntT2VlfKFcE8Oe4ZQyfAj8UPlQ+D2zKpZ/h52JcNg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.2.9/responsive.bootstrap4.min.css" integrity="sha512-Kep8UHrRwnogj5OXG/g6ZXsfOtdFwJBhcEkEKIKZfiiedZmjwVH3JAyPM3Ag4x6xG1DYf+U/Uu/MFCMkQh+eWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>


<script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>



<style>
    .filter-list .form-group {
        margin-right: 0.75rem;
        /* min-width: 150px; */
    }

    .filter-list .btn {
        line-height: 1.6;
    }

    .table-min td {
        padding-top: 0.25rem;
        padding-bottom: 0.5rem;
    }

    .tr-good td {
        /* background-color: var(--color-success); */
        /* color: #fff; */
        background-color: #e8faec;
    }

    .tr-warning td {
        /* background-color: var(--color-warning); */
        /* color: #fff; */
        background-color: #fdf2df;
    }

    .tr-danger td {
        /* background-color: var(--color-danger); */
        /* color: #fff; */
        background-color: #f9dcdf;
    }
</style>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0">Report Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Main</a></li>
                        <li class="breadcrumb-item active">Report Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="m-0">Report Table</h5>
                                </div>

                            </div>
                            <form action="<?= base_url('report'); ?>" method="post">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Line</label>
                                            <select autofocus="" id="i_id_line" name="product_number" class="form-control select2">
                                                <option value="">Select Product Numbers</option>
                                                <?php foreach ($data['products_numbers'] as $key => $value) { ?>
                                                    <option value="<?= $value->product_number; ?>" <?= $value->product_number == $data['serialNumber'] ? 'selected' : ''; ?>><?= $value->product_number; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div class="datetime">
                                                <label for="">From</label>
                                                <div class="input-group date" data-target-input="nearest">
                                                    <input type="text" id="i_fromdate1" class="form-control datetimepicker-input" data-target="#i_fromdate1" value="<?php if (isset($data['from'])) echo date('d-m-y', strtotime($data['from'])); ?>" name="from" />
                                                    <div class="input-group-append" data-target="#i_fromdate1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div class="datetime">
                                                <label for="">To</label>
                                                <div class="input-group date" data-target-input="nearest">
                                                    <input type="text" id="i_fromdate2" class="form-control datetimepicker-input" data-target="#i_fromdate2" value="<?php if (isset($data['to'])) echo date('d-m-y', strtotime($data['to'])); ?>" name="to" />
                                                    <div class="input-group-append" data-target="#i_fromdate2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary btn-block "><i class="fas fa-search mr-2"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="datatable">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" class="align-middle" nowrap>No.</th>
                                            <th rowspan="3" class="align-middle" nowrap>Tanggal</th>
                                            <th rowspan="3" class="align-middle" nowrap>Product Number</th>
                                            <th colspan="6" nowrap>Total W1</th>
                                            <th colspan="6" nowrap>Total W2</th>
                                            <th colspan="6" nowrap>Total W3</th>
                                            <th colspan="6" nowrap>Total W4</th>
                                        </tr>
                                        <tr>
                                            <th nowrap colspan="3">Kelebihan</th>
                                            <th nowrap colspan="3">Kekurangan</th>
                                            <th nowrap colspan="3">Kelebihan</th>
                                            <th nowrap colspan="3">Kekurangan</th>
                                            <th nowrap colspan="3">Kelebihan</th>
                                            <th nowrap colspan="3">Kekurangan</th>
                                            <th nowrap colspan="3">Kelebihan</th>
                                            <th nowrap colspan="3">Kekurangan</th>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                            <th>Total</th>
                                            <th>box</th>
                                            <th>Average</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php if (count($items) >= 1) : // Cek jika array items berisi lebih dari 1 array 
                                        ?>
                                            <?php foreach ($items as $key => $value) { ?>
                                                <?php if ($value['product_number'] != '') { ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $value['date']; ?></td>
                                                        <td nowrap><?= htmlspecialchars($value['product_number']); ?></td>
                                                        <td nowrap><?= number_format($value['total_kelebihan_w1'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kelebihan_w1'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kelebihan_w1'] * 1000, 2, '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['total_kekurangan_w1'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kekurangan_w1'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kekurangan_w1'] * 1000, 2, '.', '.') . " gram"; ?></td>

                                                        <td nowrap><?= number_format($value['total_kelebihan_w2'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kelebihan_w2'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kelebihan_w2'] * 1000, 2, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['total_kekurangan_w2'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kekurangan_w2'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kekurangan_w2'] * 1000, 2, '.', '.') . " gram"; ?></td>

                                                        <td nowrap><?= number_format($value['total_kelebihan_w3'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kelebihan_w3'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kelebihan_w3'] * 1000, 2, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['total_kekurangan_w3'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kekurangan_w3'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kekurangan_w3'] * 1000, 2, '.', '.') . " gram"; ?></td>

                                                        <td nowrap><?= number_format($value['total_kelebihan_w4'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kelebihan_w4'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kelebihan_w4'] * 1000, 2, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['total_kekurangan_w4'] * 1000, 0, '.', '.') . " gram"; ?></td>
                                                        <td nowrap><?= number_format($value['jumlah_box_kekurangan_w4'], 0, '.', '.') . " box"; ?></td>
                                                        <td nowrap><?= number_format($value['avg_kekurangan_w4'] * 1000, 2, '.', '.') . " gram"; ?></td>
                                                    </tr>
                                                <?php } ?>
                                        <?php  }
                                        endif ?>



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            // "scrollX": true,
            "iDisplayLength": 50,
            "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                },
                // {
                // 	"visible": false,
                // 	"targets": [6],
                // }
            ],

        });
        var from_dateNow = new Date();
        var to_dateNow = new Date();

        $('#i_fromdate1').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD-MM-YYYY',
            defaultDate: from_dateNow
        });
        //Date & Time picker
        $('#i_fromdate2').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD-MM-YYYY',
            defaultDate: to_dateNow
        });
    });
</script>
<!-- /.content-wrapper -->