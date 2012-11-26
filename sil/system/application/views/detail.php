<h1>Statistik Informasi <?php echo $infokota->nama; ?></h1><br><br>

<div class="box_medium margin_r_15">
    <div class="box_medium_top"></div>
    <div class="box_medium_content">
        <script>
            $(function() {
                $( "#main_ct" ).accordion({
                    collapsible: true <?php echo empty($mode) ? ', active: 0' : ", active: 1"; ?>
                });
            });
        </script>
        <h2>Info Kota</h2>
        <div id="main_ct">
            <h3><a href="#">News</a></h3>
            <div style="text-align: left;"><?php echo $infokota->getWiki()->wiki; ?></div>
            <h3><a href="#">Graphic</a></h3>
            <div style="text-align: left;">
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swfobject.js"></script>
                <?php
                if ($type != '') {
                    if ($mode == 'pie') {
                        ?>
                        <script type="text/javascript">
                            swfobject.embedSWF(
                            "<?php echo base_url(); ?>assets/swf/open-flash-chart.swf", "pie_chart",
                            "<?php echo $data_pie_width; ?>", "<?php echo $data_pie_height; ?>",
                            "9.0.0", "expressInstall.swf",
                            {"data-file":"<?php echo urlencode($data_pie); ?>"}
                        );
                        </script>
                        <div id="content-chart">
                            <div id="pie_chart"></div>
                        </div>
                    <?php } else if ($mode == "bar") { ?>
                        <script type="text/javascript">
                            swfobject.embedSWF(
                            "<?php echo base_url(); ?>assets/swf/open-flash-chart.swf", "bar_chart",
                            "<?php echo $data_bar_width; ?>", "<?php echo $data_bar_height; ?>",
                            "9.0.0", "expressInstall.swf",
                            {"data-file":"<?php echo urlencode($data_bar); ?>"}
                        );
                        </script>	
                        <div id="content-chart">		
                            <div id="bar_chart"></div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <p> Silakan pilih data tahun dan jenis data pada menu di samping.</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="box_medium_bottom"></div>  
</div>
<div class="box">
    <div class="box_top"></div>
    <div class="box_content form-container">
        <script>
            $(function() {
                $( "#info-menu" ).accordion({
                    collapsible: true <?php echo $mode == "bar" ? ', active: 1' : ""; ?>
                });
            });
        </script>
        <h2>Menu Info Kota</h2>
        <?php if (count($yearlist) > 0) { ?>
            <div id="info-menu" style="text-align:left;">
                <h3><a href="#">Info Data Tahunan</a></h3>
                <div>
                    <?php echo form_open("info/kota/" . $kota); ?>
                    <p>Tahun</p>
                    <select id="yearlist" name="yearlist">
                        <?php
                        foreach ($yearlist as $key => $val) {
                            if ($val['tahun'] != $year) {
                                echo '<option value="' . $val['tahun'] . '">' . $val['tahun'] . '</option>';
                            } else {
                                echo '<option value="' . $val['tahun'] . '" selected="selected">' . $val['tahun'] . '</option>';
                            }
                        }
                        ?>
                    </select><br><br>
                    <p>Jenis Data</p>
                    <select id="typelist1" name="typelist">
                        <?php
                        foreach ($typelist as $key => $val) {
                            if ($val['nama_tabel'] != $type) {
                                echo '<option value="' . $val['nama_tabel'] . '">' . $val['nama'] . '</option>';
                            } else {
                                echo '<option value="' . $val['nama_tabel'] . '" selected="selected">' . $val['nama'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" name="pie" id="View">
                    <?php echo form_close(); ?>
                </div>
                <h3><a href="#">Perbandingan Data Tahunan</a></h3>
                <div>
                    <?php echo form_open("info/kota/" . $kota); ?>
                    <p>Jenis Data</p>
                    <select id="typelist2" name="typelist">
                        <?php
                        foreach ($typelist as $key => $val) {
                            if ($val['nama_tabel'] != $type) {
                                echo '<option value="' . $val['nama_tabel'] . '">' . $val['nama'] . '</option>';
                            } else {
                                echo '<option value="' . $val['nama_tabel'] . '" selected="selected">' . $val['nama'] . '</option>';
                            }
                        }
                        ?>

                    </select><br><br>
                    <p>Rentang Waktu</p>
                    <select id="yearfrom" name="yearfrom">
                        <?php
                        foreach ($yearlist as $key => $val) {
                            if ($val['tahun'] != $yearfrom) {
                                echo '<option value="' . $val['tahun'] . '">' . $val['tahun'] . '</option>';
                            } else {
                                echo '<option value="' . $val['tahun'] . '" selected="selected">' . $val['tahun'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <select id="yearto" name="yearto">
                        <?php
                        foreach ($yearlist as $key => $val) {
                            if ($val['tahun'] != $yearto) {
                                echo '<option value="' . $val['tahun'] . '">' . $val['tahun'] . '</option>';
                            } else {
                                echo '<option value="' . $val['tahun'] . '" selected="selected">' . $val['tahun'] . '</option>';
                            }
                        }
                        ?>
                    </select><br>
                    <input type="submit" name="bar" id="View">
                    <?php echo form_close(); ?>
                </div>
            </div>
        <?php } else { ?>
            <p>Belum ada data</p>
        <?php } ?>
    </div>
    <div class="box_bottom"></div>
</div>

<?php if ($year != '' && $type != '' && $mode == 'pie') { ?>
    <div class="box">
        <div class="box_top"></div>
        <div class="box_content form-container">

            <h2>Info <?php echo $typename; ?></h2>

            <script>
                $(function() {
                    $( "#info-kota" ).accordion({
                        collapsible: true
                    });
                });
            </script>
            <div id="info-kota" style="text-align:left;">
                <h3><a href="#">Detail Info</a></h3>
                <div>
                    <?php echo $detailtext; ?>
                </div>
            </div>
        </div>
        <div class="box_bottom"></div>
    </div>
<?php } ?>
<script type="text/javascript">
    $(function() {
        $("#typelist1").selectmenu({
            style: 'dropdown',
            width: 150,
            maxHeight: 200
        });
        $("#typelist2").selectmenu({
            style: 'dropdown',
            width: 150,
            maxHeight: 200
        });
    });
</script>
<style type="text/css">
    h3 a {
        text-align: left;
    }
    #content-chart {
        min-height: 420px;
    }

    #info-menu div a {
        text-decoration: none;
    }
</style>