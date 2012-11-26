<script type="text/javascript">
    $(document).ready(function(){
        $("#tabelyear").jqGrid({
            url:'<?php echo base_url(); ?>data/get_year_kota_admin',
            datatype: "json",
            editurl:'<?php echo base_url(); ?>data/edit_report_admin',
            mtype:'POST',
            colNames:['Kota/Kabupaten', 'Data Tahun', 'Status Edit', 'Menu', 'Catatan'],
            colModel:[
                {name:'kota_id', index:'kota_id', width:200,editable:false,editoptions:{readonly:true,size:20}},
                {name:'tahun', index:'tahun', align:'center', width:80,editable:false,editoptions:{readonly:true,size:20}},
                {name:'lock_status', index:'lock_status', align:'center', width:80,editable:true,edittype:"select",editoptions:{value:"0:Dapat Diedit;1:Terkunci"}},
                {name:'menu',width:80, align:'center', sortable:false},
                {name:'notes', index:'deskripsi', width:350, sortable:false,editable:true,editoptions:{size:20}}
            ],
            rowNum:30,
            width: 850,
            height: 300,
            rownumbers:true,
            shrinkToFit:false,
            rowList:[30,20,10],
            pager: '#navyear',
            sortname: 'tahun',
            viewrecords: true,
            sortorder: 'desc',
            caption:'Manajemen Data Sistem Informasi Lingkungan Hidup Jawa Barat'
        });
        $("#tabelyear").jqGrid('navGrid','#navyear',{edit:true,add:false,del:false,search:false,
            edittext:'Edit',
            searchtext:'Search',
            refreshtext:'Reload'
        });
    });
</script>

<div class="block b-full" id="laporan-table">
    <table id="tabelyear"></table>
    <div id="navyear"></div>
</div>