<?php 
$cu = Current_User::user();
if($cu){ 
	echo $cu->id."<br>";
	echo $cu->nama."<br>";
	echo $cu->no_ktp."<br>";
	echo $cu->email."<br>";
	echo $cu->alamat."<br>";
	echo $cu->tempat_lahir."<br>";
	echo $cu->status."<br>";
	
}else{
	echo "kosong";
}
?>