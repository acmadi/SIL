<script type="text/javascript">
    $(function() {
        $( "#info-menu" ).accordion({
            collapsible: true
        });
    });
</script>

<div class="block b-full">
    <div class="form-container block b-quarter">

        <h2>Update Sistem Informasi <?php echo $u->nama; ?> Tahun <?php echo $year; ?></h2>
        <p align="center"><a href="<?php echo base_url() . "info/kota/" . $u->id; ?>">Lihat Tampilan Statistik</a> - <a href="<?php echo base_url() . "data"; ?>">Kembali</a></p>

        <?php if (validation_errors('<p class="error">', '</p>') != '') { ?>
            <div class="errors">
                <p><em>Update Gagal</em></p>
                <?php echo validation_errors('<p class="error">', '</p>'); ?>
            </div>
        <?php } ?>

        <?php echo form_open('data/edit_data'); ?>
        <div id="my_accordion">
            <?php
            $data = array();
            $i = 0;
            foreach ($typelist as $typekey => $typeval) {
                $label_used = $this->infolib->retrieve_label($typeval['nama_tabel']);
                ?>
                <h3><a href="#"><?php echo $typeval['nama']; ?></a></h3>
                <div>
                    <?php
                    foreach ($label_used as $key => $val) {
                        // echo $key.' '.$val.'<br>';			
                        ?>
                        <div>
                            <label for="<?php echo $i . "_" . $key; ?>"><?php echo $val; ?></label>
                            <input id="<?php echo $i . "_" . $key; ?>" type="text" name="<?php echo $i . "_" . $key; ?>" value="<?php echo $all_data[$typeval['nama_tabel']][$key]; ?>">
                            <?php echo $this->infolib->get_satuan_type($typeval['nama_tabel']); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                unset($label_used);
                $i++;
            }
            ?>
        </div><br /><br />

        <input id="data_tahun" type="hidden" name="data_tahun" value="<?php echo $data_tahun; ?>">
        <input type="submit" value="Update Information" class="button">

        <?php echo form_close(); ?>

    </div><!-- /form-container -->
</div>
<?php
// $t = Doctrine_Query::create()
// ->select('*')
// ->from('jenis_data');
// $typelist = $t->execute()->toArray();
// echo $all_data['use_lahan']['lain_lain'];
// foreach($typelist as $key => $val){	
// $label_used = $this->infolib->retrieve_label($val['nama_tabel']);
// foreach($label_used as $key => $val){
// echo $key.' '.$val.'<br>';
// }
// echo '<br>';
// unset($label_used);
// }
?>
<script type="text/javascript">
    $(function() {
        $( "#my_accordion" ).accordion({
            autoHeight: false
        });
    });
</script>
<style type="text/css">
    h3 {
        text-align: justify;
    }
</style>