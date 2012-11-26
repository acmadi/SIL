<script type="text/javascript">
	$(document).ready(function(){
		$("#tabelyear").jqGrid({
			url:'<?php echo base_url(); ?>data/get_year_kota',
			datatype: "json",
			editurl:'<?php echo base_url(); ?>data/edit_report',
			mtype:'POST',
			colNames:['Data Kota Tahun', 'Status', 'Menu', 'Catatan'],
			colModel:[
					{name:'tahun', index:'tahun', width:140,editable:true,editoptions:{size:20}},
					{name:'status',width:80, align:'center',sortable:false},
					{name:'menu',width:80, align:'center',sortable:false},
					{name:'notes', index:'notes', width:250, sortable:false,editable:true,editoptions:{size:20}}
				],
			rowNum:5,
			width: 600,
			height: 100,
			rownumbers:true,
			shrinkToFit:false,
			rowList:[5,10],
			pager: '#navyear',
			sortname: 'tahun',
			viewrecords: true,
			sortorder: 'desc',
			caption:'Data Sistem Informasi Tahunan <?php echo Current_User::user()->nama; ?>'
		});
		$("#tabelyear").jqGrid('navGrid','#navyear',{edit:false,add:true,del:true,search:false});
	});
</script>

<div class="block b-full" id="laporan-table">
	<table id="tabelyear"></table>
	<div id="navyear"></div>
	<p align="left"><a href="<?php echo base_url()."info/kota/".Current_User::user()->id; ?>">Lihat Tampilan Statistik</a></p>
</div>