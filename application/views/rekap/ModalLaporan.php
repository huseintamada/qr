<style>
    .modal {
        overflow: auto !important;
    }

    @media print {
        .tr {
            -webkit-print-color-adjust: exact !important;
        }
    }

    table,
    th,
    td,
    tr {
        text-align: center;
    }
</style>
<?php
if ($this->uri->segment(3) == "S") {
    $kar = $this->sant->get_by_id($segement = $this->uri->segment(3));
} else {
    $kar = $this->peng->get_by_id($segement = $this->uri->segment(3));
}
?>

<div class="box" style='max-width:80.5%;margin-left:125px'>
    <div class="box-header with-border">
        <h3 class="box-title">Data Laporan Absensi Pesantren Murottal</h3>
        <div class="container">
            <div class="alert"></div>
            <div class="row clearfix">
                <div id='msg'></div>
                <div class="input-daterange">
                    <div class="col-md-3">
                        <input type="text" name="start" id="start" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="end" id="end" class="form-control" />
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="modal-content" style="min-width: 1000px;">
            <div class="modal-header" style='text-align:center'>
                <div class='pull-right'> </div>
                <span id="print-area">
                <table style="margin: 0 auto; text-align: center;">
    <tr>
        <td style="padding: 20px; text-align: center;">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" width="100px">
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="font-size: 20px; margin: 0;"><b>BARQODE</b></p>
        </td>
    </tr>
</table>

                    <table style='text-align:left;font-weight:bold;margin-left:40px;'>
                        <tr>
                            <td width='200px' class='tr'>Periode</td>
                            <td class='tr'>:&nbsp;</td>
                            <td class='tr'>
                                <?php
                                $start = $this->input->get('tgl');
                                $end = $this->input->get('tgl');
                                if ($this->uri->segment(3) == "S") {
                                    $data = $this->rekap->resultHadir2_1($start, $end);
                                } else {
                                    $data = $this->rekap->resultHadir2_2($start, $end);
                                }
                                $start = $this->input->get('start');
                                $st = date('Y-m-d', strtotime($start));
                                $t = explode('-', $st);
                                $bulan = $this->tanggal->bulan($t[1]);
                                echo $bulan . '&nbsp' . $t[0];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width='200px' class='tr'>Operator </td>
                            <td class='tr'>:&nbsp;</td>
                            <td class='tr'><?= $user->first_name ?></td>
                        </tr>
                    </table> <br><br><br>
                    <table style='text-align: center;margin-top:-20px;' border="2" cellspacing="0" width="100%">
                        <thead>
                            <tr style='background-color:#00ccff !important'>
                                <th width='50px' rowspan="2" align='top'>No</th>
                                <th width='200px' rowspan="2">NAMA</th>
                                <th width='150px' rowspan="2">JABATAN </th>
                                <th width='70px' rowspan="2">Total Kehadiran </th>
                                <th width='130px' colspan="3">Total Ketidakhadiran </th>
                            </tr>
                            <tr style='background-color:#00ccff !important'>
                                <th width='80px'>&nbsp; Sakit</th>
                                <th width='80px'>&nbsp; Ijin </th>
                                <th width='80px'>&nbsp; Alpha </th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        $start = $this->input->get('tgl');
                        $end = $this->input->get('tgl');
                        if ($this->uri->segment(3) == "S") {
                            foreach ($this->rekap->santri() as $row) {
                                $no++;
                                $hadir = $this->rekap->totalHadir_bak_1($row->nomor_induk, $start, $end);
                                $sakit = $this->rekap->totalHadir2_1($row->nomor_induk, $start, $end);
                                $ijin = $this->rekap->totalHadir3_1($row->nomor_induk, $start, $end);
                                $alpha = $this->rekap->totalHadir4_1($row->nomor_induk, $start, $end);
                                echo "<tr>
                                <td>" . $no . "</td>
                                <td>" . $row->nama_user . "</td>
                                <td>" . $row->nama_kelompok . "</td>
                                <td>" . $hadir . "</td>
                                <td>" . $sakit . "</td>
                                <td>" . $ijin . "</td>
                                <td>" . $alpha . "</td>
                                </tr>  ";
                            }
                        } else {
                            foreach ($this->rekap->pengajar() as $row) {
                                $no++;
                                $hadir = $this->rekap->totalHadir_bak_2($row->nomor_induk, $start, $end);
                                $sakit = $this->rekap->totalHadir2_2($row->nomor_induk, $start, $end);
                                $ijin = $this->rekap->totalHadir3_2($row->nomor_induk, $start, $end);
                                $alpha = $this->rekap->totalHadir4_2($row->nomor_induk, $start, $end);
                                echo "<tr>
                                <td>" . $no . "</td>
                                <td>" . $row->nama_user . "</td>
                                <td>Pengajar</td>
                                <td>" . $hadir . "</td>
                                <td>" . $sakit . "</td>
                                <td>" . $ijin . "</td>
                                <td>" . $alpha . "</td>
                                </tr>  ";
                            }
                        }
                        ?>
                    </table>
            </div>
            <div class="modal-body" id="dataLaporan" style='margin-top:10px'></div>
            </span>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn3d" data-dismiss="modal">Close</button>
        </div>
        <script src="<?php echo base_url() ?>assets/app/core/ModalLaporan.js" charset="utf-8"></script>
        <script src="<?php echo base_url() ?>assets/app/core/print.js" charset="utf-8"></script>
        <script type="text/javascript">
            function LoadDateL() {
                var start = $('#start').val();
                var end = $('#end').val();
                var url = "rekap/ajax_list_laporan/<?php echo $this->uri->segment(3); ?>/";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        start: start,
                        end: end,
                    },
                    datatype: 'text',
                    success: function(data) {
                        $('#dataLap').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                    }
                });
            }
        </script>