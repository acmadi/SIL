<?php
?>
<?php if($year && $type){
	$label_used = $this->infolib->retrieve_label($type);
	$colNames = "Kota/Kabupaten','".implode("','",array_values($label_used));
	
	$eachCol = array();
	array_push($eachCol, "{name:'nama',index:'nama'}");
	foreach(array_keys($label_used) as $val){
		array_push($eachCol, "{name:'".$val."',index:'".$val."',align:'right'}");
	}
	$colModel = implode(",",$eachCol);
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
			width: 540,
			height: 400,
			rownumbers:true,
			shrinkToFit:false,
			rowList:[10,20,30],
			pager: '#navx',
			sortname: 'id',
			viewrecords: true,
			sortorder: "desc",
			caption:"<?php echo $title; ?>"
		});
		jQuery("#tabelx").jqGrid('navGrid','#navx',{edit:false,add:false,del:false,search:false});
	});
</script>
<?php } ?>

<div class="box_medium margin_r_15">
	<div class="box_medium_top"></div>
	<div class="box_medium_content">
<?php if(!$year && !$type){ ?>
		<h2>Review</h2>
		<p> Silakan pilih tahun dan jenis data yang ingin ditampilkan pada menu di samping.</p>
<?php }else{ ?>
		<table id="tabelx"></table>
		<div id="navx"></div>
<?php } ?>
	</div>
	<div class="box_medium_bottom"></div>  
</div>

<div class="box">
	<div class="box_top"></div>
	<div class="box_content form-container">
		<h2>Pilihan Informasi</h2>
		<?php 
		echo form_open("data/laporan"); ?>
			<div align="left">
					Tahun<br>
					<select id="yearlist" name="yearlist">
					<?php 
						foreach($yearlist as $key => $val){	
							if ($val['distinctyear'] != $year){
								echo '<option value="'.$val['distinctyear'].'">'.$val['distinctyear'].'</option>';
							}else{
								echo '<option value="'.$val['distinctyear'].'" selected="selected">'.$val['distinctyear'].'</option>';
							}
						}
					?>
					</select><br>
					Jenis Data<br>
					<select id="typelist" name="typelist">
					<?php 
						foreach($typelist as $key => $val){	
							if ($val['nama_tabel'] != $type){
								echo '<option value="'.$val['nama_tabel'].'">'.$val['nama'].'</option>';
							}else{
								echo '<option value="'.$val['nama_tabel'].'" selected="selected">'.$val['nama'].'</option>';
							}
						}
					?>
					</select><br>
					<input type="submit" name="laporan" id="View">
					</div>
		<?php echo form_close(); ?>
	</div>
	<div class="box_bottom"></div>
</div>