<script type="text/javascript">
	$(document).ready(function(){
		jQuery("#tabelkota").jqGrid({
			url:'<?php echo base_url(); ?>info/get_kota',
			datatype: "json",
			mtype:'POST',
			colNames:['Nama Kota/Kabupaten', 'Longitude', 'Latitude','Alamat'],
			colModel:[
					{name:'nama',index:'nama',width:140},
					{name:'lon',width:80, sortable:false},
					{name:'lat',width:80, sortable:false},
					{name:'deskripsi',width:650, sortable:false}	
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
			caption:"Daftar Kota dan Kabupaten Provinsi Jawa Barat"
		});
		jQuery("#tabelkota").jqGrid('navGrid','#navkota',{edit:false,add:false,del:false,search:false});
	});
</script>

<div class="block b-full" id="laporan-table">
	
	<table id="tabelkota"></table>
	<div id="navkota"></div>
</div>