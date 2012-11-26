<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<?php
$exif = exif_read_data($upload_data["full_path"], 0, true);
echo $exif["GPS"]["GPSTimeStamp"];
print_r($exif);
?>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>