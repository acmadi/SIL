
    <div id="menu">
    
	    <ul>
		<?php 
			//kalau admin
			if(Current_User::user()){ 
				if(Current_User::user()->role == 2){
		?>
			 <li><a <?php if($page == 'admin') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>admin" >User</a></li>
			 <li><a <?php if($page == 'info') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>info" >Info Kota</a></li>
			 <li><a <?php if($page == 'laporan') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>data/laporan" >Laporan</a></li>
			 <li><a <?php if($page == 'data') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>data" >Data</a></li>
			 <li><a <?php if($page == 'account') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>log/profil" >Account</a></li>
			 <li><a href="<?php echo base_url(""); ?>log/logout" >Logout</a></li>
		<?php 	}else{ ?>
			 <li><a <?php if($page == 'home') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>" >Home</a></li>
			 <li><a <?php if($page == 'info') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>info" >Info Kota</a></li>
			 <li><a <?php if($page == 'data') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>data" >Data</a></li>
			 <li><a <?php if($page == 'account') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>log/profil" >Account</a></li>
			 <li><a href="<?php echo base_url(""); ?>log/logout" >Logout</a></li>
		<?php } ?>
		<?php 
			}else{ 
		?>
			 <li><a <?php if($page == 'home') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>" >Home</a></li>
			 <li><a <?php if($page == 'info') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>info" >Info Kota</a></li>
			 <li><a <?php if($page == 'log') echo 'class="current"'; ?> href="<?php echo base_url(""); ?>log" >Login</a></li>
		<?php } ?>
        </ul>
    
    </div>
	
