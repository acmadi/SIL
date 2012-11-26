<script type="text/javascript">
    $(document).ready(function(){
        jQuery("#tabelkota").jqGrid({
            url:'<?php echo base_url(); ?>admin/get_kota',
            datatype: "json",
            editurl:'<?php echo base_url(); ?>admin/edit_kota',
            mtype:'POST',
            colNames:['Nama Kota/Kabupaten', 'Status', 'Longitude', 'Latitude', 'Alamat', 'No Telp', 'Email'],
            colModel:[
                {name:'nama',index:'nama',width:140,editable:true,editoptions:{size:20},editrules:{required:true}},
                {name:'status',index:'status',width:80,align:'center',editable:true,edittype:"select",editoptions:{value:"0:Non Aktif;1:Aktif"}},
                {name:'lon',width:80,align:'right', sortable:false,editable:true,editoptions:{size:20},editrules:{required:true, number:true}},
                {name:'lat',width:80,align:'right', sortable:false,editable:true,editoptions:{size:20},editrules:{required:true, number:true}},
                {name:'deskripsi',width:550, sortable:false,editable:true,edittype:"textarea",editoptions:{size:20}},
                {name:'phone_no',width:100, sortable:false,editable:true,editoptions:{size:20}},
                {name:'email',width:100, sortable:false,editable:true,editoptions:{size:20}}
            ],
            rowNum:30,
            width: 900,
            height: 400,
            rownumbers:true,
            shrinkToFit:false,
            rowList:[10,20,30],
            pager: '#navkota',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption:"Daftar User Kota dan Kabupaten Provinsi Jawa Barat"
        });
        jQuery("#tabelkota").jqGrid('navGrid','#navkota',
        {
            view:true,
            edit:true,
            add:true,
            del:false,
            search:false,
            addtext:'Add',
            edittext:'Edit',
            viewtext:'View',
            refreshtext:'Reload',
            editfunc: function(id) {
                location = "<?php echo base_url() . "log/edit"; ?>/" + id;
            }
        },
        {}, // edit options
        {}, // add options
        {}, // del options
        {}, // search options
        {   // view options
            labelswidth : '30%'
            ,modal : true
            ,top : 300
            ,left : 400
            ,width : 500
        }
    );
    });
</script>

<div class="block b-full" id="laporan-table">
    <table id="tabelkota"></table>
    <div id="navkota"></div>
</div>