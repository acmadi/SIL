<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="Sistem informasi, Lingkungan Hidup, BPLHD, JawaBarat" />
	<meta name="description" content="Sistem Informasi Lingkungan Hidup Badan Pengelola Lingkungan Hidup Jawa Barat" />
	<title><?php echo $page_title; ?> | Sistem Informasi Lingkungan Hidup </title> 
	<?php echo $script; ?>
	<script language="javascript" type="text/javascript">
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
	</script>
</head>
<body>
<div id="site_title_bar_wrapper">

	<div id="site_title_bar">
    
    	<div id="site_title">
            <h1><a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>img/title.png" alt="css templates" /><span>SI Lingkungan Hidup BPLHD</span>
            </a></h1>
        </div>
	</div> 
       
</div>


<div id="menu_wrapper">
	<?php echo $header; ?>
   
</div>

<div id="content_wrapper">

	<div id="content">
        <div class="section_w960_p30">
			<div class="block b-full">
				<?php echo $content; ?>
			</div>
			
			<div class="cleaner"></div>
		</div>
    </div>
    <div id="content_bottom"></div>

</div>

<div id="footer">

    <!--div class="section_w240">
        
        <h3>Privacy Policy</h3>
        
        <div class="sub_content">
            <p>Nullam ultrices tempor nisi, ac egestas diam aliquam a. Ut eleifend semper turpis, id feugiat arcu dignissim eu. Donec mattis adipiscing imperdiet.</p>
        </div>
        
    </div>

    <div class="section_w240">
        
        <h3>Partners</h3>
        
        <div class="sub_content">
            
            <ul class="footer_list">
                <li><a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a></li>
                <li><a href="http://www.flashmo.com" target="_parent">Free Flash Templates</a></li>
                <li><a href="http://www.flashmo.com/store" target="_parent">Premium Web Templates</a></li>
                <li><a href="http://www.webdesignmo.com/blog" target="_parent">Web Design Blog</a></li>
                <li><a href="http://www.koflash.com">Best Flash Websites</a></li>               
            </ul>
            
        </div>
        
    </div>
    
    <div class="section_w240">
        
        <h3>Other links</h3>
        
        <div class="sub_content">
        
            <ul class="footer_list">
                <li><a href="#">Lorem ipsum dolor</a></li>
                <li><a href="#">Cum sociis</a></li>
                <li><a href="#">Donec quam</a></li>
                <li><a href="#">Nulla consequat</a></li>
                <li><a href="#">In enim justo</a></li>
            </ul>
        
        </div>
        
    </div>
    
    <div class="section_w240">
        
        <h3>Support Team</h3>
        
        <div class="sub_content">
        
            <ul class="footer_list">
                <li><a href="#">Aenean vulputate</a></li>
                <li><a href="#">Etiam ultricies</a></li>
                <li><a href="#">Nullam quis</a></li>
                <li><a href="#">Sed consequat</a></li>
                <li><a href="#">Cras dapibus</a></li>    
            </ul>
        </div>
            
    </div>
    
    <div class="cleaner_h40"></div-->
    
    <center>
        Copyright © 2011 <a href="#">Badan Pengelola Lingkungan Hidup</a> | 
        <a href="http://www.bplhdjabar.go.id/" target="_parent">BPLHD Jawa Barat</a>
  </center>
    
</div>
</body>
</html>