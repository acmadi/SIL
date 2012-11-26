
<h1>Informasi <?php echo $infokota->nama; ?> Tahun <?php echo $report->tahun; ?></h1><br><br>

<div class="block b-quarter margin_r_15">

    <script>
        $(function() {
            var tab_container = [];
            var tab_counter = 2;
            var typetxt = $('#typelist :selected').text();
            var typeval = $("#typelist").val();
            // tabs init with a custom tab template and an "add" callback filling in the content
            var $tabs = $( "#tabs").tabs({
                tabTemplate: "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close'>Remove Tab</span></li>"
            });

            // addTab button: just opens the dialog
            $( "#show_tab" )
            .click(function() {
                typeval = $("#typelist").val();
                typetxt = $('#typelist :selected').text();
                if(!isExist()){
                    addTab();
                    tab_container.push(typeval);
                }
            });

            // close icon: removing the tab on click
            $( "#tabs span.ui-icon-close" ).live( "click", function() {
                var index = $( "li", $tabs ).index( $( this ).parent() );
                $tabs.tabs( "remove", index );
                tab_container.splice(index,1);
            });
            function isExist(){
                var isE = false;
                $.each(tab_container, function(index, val){
                    if(val.toLowerCase().search(typeval.toLowerCase()) != -1){
                        isE = true;
                    }
                });
                return isE;
            }
            function remove(item){
                var pos = -1;
                $.each(tab_container, function(index, val){
                    if(val.toLowerCase().search(idx.toLowerCase()) != -1){
                        pos = index;
                    }
                });
                return pos;
            }
            // actual addTab function: adds new tab using the title input from the form above
            function addTab() {
                $tabs.tabs( "add", '<?php echo base_url(); ?>data/show_report/<?php echo $data_tahun; ?>/'+typeval, typetxt );
                tab_counter++;
            }
            
            $("#typelist").selectmenu({
                style: 'dropdown',
                width: 250,
                maxHeight: 200
            });
        });
    </script>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Informasi</a></li>
        </ul>
        <div id="tabs-1">
            <p> Silakan pilih data tahun dan jenis data pada menu di samping.</p>
            <p align="center"><a href="<?php echo base_url() . "info/kota/" . $infokota->id; ?>">Lihat Tampilan Statistik</a></p>
            <p align="center"><a href="<?php echo base_url() . "data/kota/"; ?>">Kembali</a></p>
        </div>
    </div>

</div>
<div id="rb" class="box">
    <div class="box_top"></div>
    <div class="box_content form-container">
        <h2>Kategori Informasi</h2>
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
        </select><br /><br />
        <button id="show_tab">Show</button>
    </div>
    <div class="box_bottom"></div>
</div>

<style type="text/css">
    table {
        border-top: 1px solid #AAAAAA;
        border-left: 1px solid #AAAAAA;
        width: 100%;
    }
    th {
        font-weight: bold;
        padding: 5px;
    }
    th, td {
        text-align: left;
        border-right: 1px solid #AAAAAA;        
        border-bottom: 1px solid #AAAAAA;        
    }
    tr:hover > th, tr:hover > td {
        background-color: #DDDDDD;
    }
    #rb a:link, #rb a:visited, #rb a:hover, #typelist-menu a:link, #typelist-menu a:visited, #typelist-menu a:hover {
        color: #222222;
        text-decoration: none;
    }
</style>