<div class="box_dummy margin_r_15">
</div>
<div class="box">
	<div class="box_top"></div>
	<div class="box_content form-container">
		<h2>Login</h2>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#username").click(function(){
					$("#username").val('');
				});
				$("#password").click(function(){
					$("#password").val('');
				}); 
			});
		</script>
		
		<?php echo form_open($path); ?>
		<div class="form-div">
			<?php echo validation_errors('<p class="error">','</p>'); ?>
			
			<div> <input name="username" id="username" type="text" size="30" value="username"></div>
			<div> <input name="password" id="password" type="password" size="30" value="password"></div>
			<p>
				<?php echo form_submit('submit',$button); ?>
			</p>
		</div>
		<?php echo form_close(); ?>
	</div>
	<div class="box_bottom"></div>  
</div>