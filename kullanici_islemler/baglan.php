<?php
	try
	{
	$baglanti=mysql_connect("localhost","root","");
	if(!$baglanti)
	{
		header("refresh:1;url='index.php'");
		die('Baglanti Saglanamadi'); 
	}
	mysql_select_db("dosyasergiprogrami",$baglanti);
	}
	catch(Exception $ex)
	{
	header("refresh:1;url='index.php'");
	die('Hata Birseyler Ters Gitti');
	//print_r($ex);
	//die();
	}
	
	?>