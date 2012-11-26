<?php ?>

<?php
if ($year && $type) {
    $label_used = $this->infolib->retrieve_label($type);
    $colNames = "Kota/Kabupaten','" . implode("','", array_values($label_used)) . "','Jumlah";

    $eachCol = array();
    array_push($eachCol, "{name:'nama',index:'nama'}");
    foreach (array_keys($label_used) as $val) {
        array_push($eachCol, "{name:'" . $val . "',index:'" . $val . "',align:'right'}");
    }
    array_push($eachCol, "{name:'total',sortable:'false',align:'right'}");
    $colModel = implode(",", $eachCol);
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            jQuery("#tabelx").jqGrid({
                url:'<?php echo base_url(); ?>data/get_laporan/<?php echo $year; ?>/<?php echo $type; ?>',
                datatype: "json",
                editurl:'<?php echo base_url(); ?>admin/edit_kota',
                mtype:'POST',
                colNames:['<?php echo $colNames; ?>'],
                colModel:[<?php echo $colModel; ?>],
                rowNum:20,
                width: 900,
                height: 250,
                rownumbers:true,
                shrinkToFit:false,
                rowList:[10,20,30],
                pager: '#navx',
                sortname: 'id',
                viewrecords: true,
                sortorder: "desc",
                caption:"<?php echo $title . ' ' . $this->infolib->get_satuan_type($type); ?>"
            });
            jQuery("#tabelx").jqGrid('navGrid','#navx',{view:true,edit:false,add:false,del:false,search:false,
                viewtext:'View',
                refreshtext:'Reload'},
            {}, // edit options
            {}, // add options
            {}, // del options
            {}, // search options
            {   // view options
                labelswidth : '50%'
            }
        );
        });
    </script>
<?php } ?>

<div class="block b-full" id="laporan-table">
    <h2>Menu Laporan</h2>
    <?php echo form_open("data/laporan"); ?>
    <div align="center"><p> 
            Tahun
            <select id="yearlist" name="yearlist">
                <?php
                foreach ($yearlist as $key => $val) {
                    if ($val['distinctyear'] != $year) {
                        echo '<option value="' . $val['distinctyear'] . '">' . $val['distinctyear'] . '</option>';
                    } else {
                        echo '<option value="' . $val['distinctyear'] . '" selected="selected">' . $val['distinctyear'] . '</option>';
                    }
                }
                ?>
            </select>
            Jenis Data<br /><br />
            <select id="typelist" name="typelist">
                <?php
                foreach ($typelist as $key => $val) {
                    if ($val['nama_tabel'] != $type) {
                        echo '<option value="' . $val['nama_tabel'] . '">' . $val['nama'] . '</option>';
                    } else {
                        echo '<option value="' . $val['nama_tabel'] . '" selected="selected">' . $val['nama'] . '</option>';
                    }
                }
                ?>
            </select><br />
            <input type="submit" name="laporan" id="View"></p>
        <hr>
    </div>
    <?php echo form_close(); ?>
    <?php if (!$year && !$type) { ?>
        <p> </p>
    <?php } else { ?>
        <table id="tabelx"></table>
        <div id="navx"></div>
    <?php } ?>
</div>
<script type="text/javascript">
    $(function() {
        $("#typelist").selectmenu({
            style: 'dropdown',
            width: 800,
            maxHeight: 200
        });
    });
</script>
<style type="text/css">
    form a {
        text-align: left;
        text-decoration: none;
    }
    form a:hover {
        text-decoration: none;
    }
</style>