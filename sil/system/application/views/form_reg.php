<?php
?>
<div class="block b-full b-sand2">
	<?php echo form_open($path); ?>
	<div class="form-div">
		<?php echo validation_errors('<p class="error">','</p>'); ?>
		
		<ul style="width: 330px; margin: 0 auto;">
			<li>
				<?php echo form_label("E-mail", "email"); ?>
				<?php echo form_input(array("id" => "email", "name" => "email")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Nama Lengkap", "fullname"); ?>
				<?php echo form_input(array("id" => "fullname", "name" => "fullname")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Password", "password"); ?>
				<?php echo form_password(array("id" => "password", "name" => "password")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Konfirm Password", "passconf"); ?>
				<?php echo form_password(array("id" => "passconf", "name" => "passconf")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Nomor KTP", "ktp"); ?>
				<?php echo form_input(array("id" => "ktp", "name" => "ktp")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Alamat", "address"); ?>
				<?php echo form_input(array("id" => "address", "name" => "address")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Tempat Lahir", "bplace"); ?>
				<?php echo form_input(array("id" => "bplace", "name" => "bplace")); ?>&nbsp;
			</li>
			<script>
			$(function() {
				$( "#dplace" ).datepicker({ dateFormat: "yy-mm-dd", 
											changeMonth : true,
											changeYear : true,
											yearRange : "c-100:c"
											});
			});
			</script>
			<li>
				<?php echo form_label("Tanggal Lahir", "dplace"); ?>
				<?php echo form_input(array("id" => "dplace", "name" => "dplace")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_submit("submit", $button); ?>
			</li>
		</ul>
		<p><?php echo $msg; ?></p>
	</div>
	<?php echo form_close(); ?>
</div>