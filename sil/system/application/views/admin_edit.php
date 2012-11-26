<div class="block b-quarter b-left">
	<!-- foto + deskripsi pengaduan -->
	<div class="block b-full b-sand">
		<div id="detail-photo">
			<h1><?php echo $detail->report_title; ?></h1>
			<img id="big-photo" src="<?php echo base_url(); ?>upload/<?php echo $detail->filename; ?>" alt="photo logo" title="jalan-jalan" /><br>
			
		</div>
	</div>
	<div class="block b-full b-sand">
		<h1>Respon Pengaduan</h1>
				
		<p><b>Status Valid</b></p>
		<?php 
			if($detail->valid_status == 1){
		?>
			<p>Sudah Valid</p>
		<?php
			}else{
		?>
			<p>	Belum Valid</p>
		<?php } ?>
				
		<p><b>Status Respon</b></p>
		<?php 
			if($detail->response_status == 1){
		?>
			<p>Sudah Ditanggapi</p>
			<p><b>Tanggal Respon</b></p> 
			<p><?php 
				$response_time_arr = explode(" ",$detail->response_date);
				$response_date_arr = array_reverse(explode("-",$response_time_arr[0]));
				echo implode("-",$response_date_arr); ?></p>
			<p><b>Deskripsi Respon</b></p>
			<p><?php echo $detail->response_desc; ?></p>
		<?php
			}else{
		?>
			<p>	Belum Ditanggapi</p>
		<?php } ?>
		
		<script>
		$(function() {
			$( "#edit-form" ).accordion();
		});
		</script>
		<div id="edit-form" style="text-align:left;">
			<h3><a href="#"><strong>Edit Respon Pengaduan</strong></a></h3>
			<div>		
			<?php echo form_open($path); ?>
			<div class="form-div">
				<?php echo validation_errors('<p class="error">','</p>'); ?>
				
				<ul style="width: 330px; margin: 0 auto;">
					<li>
						<?php echo form_label("Status Valid", "valid_status"); ?>
						<?php $opt_val_status = array(
								  '0'  => 'Belum',
								  '1'    => 'Sudah'
								);
								echo form_dropdown('valid_status', $opt_val_status, $detail->valid_status); ?>&nbsp;
					</li>
					<li>
						<?php echo form_label("Status Respon", "respon_status"); ?>
						<?php $opt_res_status = array(
								  '0'  => 'Belum',
								  '1'    => 'Sudah'
								);
								echo form_dropdown('respon_status', $opt_res_status, $detail->response_status); ?>&nbsp;
					</li>
					<li>
						<?php echo form_label("Respon Pengaduan", "respon_desc"); ?> <br>
						<?php echo form_textarea(array("id" => "respon_desc", "name" => "respon_desc", "rows" => "5", "cols" => "250", "value" => $detail->response_desc)); ?>&nbsp;
					</li>
					<li>
						<?php echo form_submit("submit", "Simpan"); ?>
					</li>
				</ul>
			</div>
			<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="block b-fourth b-right b-sand">
	<!-- info pengaduan -->
	<div id="user-menu" class="clearboth">
		<h1>Info Pengaduan</h1>
		<p><b>Nama Pengadu</b></p>
		<p><?php echo $user->nama; ?></p>
		<p><b>Sumber Informasi</b></p>
		<p><?php echo $detail->report_source; ?></p>
		<p><b>Tanggal Upload</b></p> 
		<p><?php 
			$date_arr = array_reverse(explode("-",$detail->upload_time));
			echo implode("-",$date_arr); ?></p>
		<p><b>Lokasi</b></p>
		<p><?php echo $detail->report_location; ?></p>
		<p><b>Posisi Geografis (Lon-Lat)</b></p>
		<p><?php echo $detail->lon; ?> , <?php echo $detail->lat; ?></p>
		<p><b>Deskripsi Pengaduan</b></p>
		<p><?php echo $detail->report_desc; ?></p>
	</div>
</div>