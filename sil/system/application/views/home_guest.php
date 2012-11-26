<div class="block b-third b-left shadow-light b-sand2"><a href="<?php echo base_url(""); ?>frontpage/faq"><img src="<?php echo base_url(""); ?>img/how.png" alt="" /></a>
</div>
<div class="block b-third b-center shadow-light b-sand2"><a href="<?php echo base_url(""); ?>tools/1.jpg"><img src="<?php echo base_url(""); ?>img/download.png" alt="" /></a>
</div>
<div class="block b-third b-right shadow-light b-sand2">
	<img src="<?php echo base_url(""); ?>img/login.png" alt="" />
	<?php echo form_open("log/login"); ?>
	<div class="form-div">
		<?php echo validation_errors('<p class="error">','</p>'); ?>

		<p>
			<label for="email">Email: </label>
			<?php echo form_input('email',set_value('email')); ?>
		</p>
		<p>
			<label for="password">Password: </label>
			<?php echo form_password('password'); ?>
		</p>
		<p>
			<?php echo form_submit('submit',"Login"); ?>
		</p>
	</div>
	<?php echo form_close(); ?>
</div>