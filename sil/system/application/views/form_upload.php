<div class="block b-full b-sand2">
	<?php echo "<p>$msg</p>"; ?>
	<?php echo validation_errors('<p class="error">','</p>'); ?>
	<?php echo form_open_multipart("file/upload"); ?>
	<div class="form-div">
		<ul style="width: 330px; margin: 0 auto;">
			<li>
				<?php echo form_label("Judul Pengaduan", "reporttitle"); ?> <br>
				<?php echo form_input(array("id" => "reporttitle", "name" => "reporttitle")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Lokasi", "location"); ?> <br>
				<?php echo form_input(array("id" => "location", "name" => "location")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Sumber Informasi", "source"); ?> <br>
				<?php echo form_input(array("id" => "source", "name" => "source")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("Deskripsi Pengaduan", "desc"); ?> <br>
				<?php echo form_textarea(array("id" => "desc", "name" => "desc", "rows" => "5", "cols" => "250")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_label("File", "userfile"); ?>
				<?php echo form_upload(array("id" => "userfile", "name" => "userfile")); ?>&nbsp;
			</li>
			<li>
				<?php echo form_submit("submit", $button); ?>
			</li>
		</ul>
	</div>
	<?php echo form_close(); ?>
</div>