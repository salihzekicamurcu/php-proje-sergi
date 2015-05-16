<?php

if(isset($_POST['AdminGiris']))
{
	//echo'danisman girisi';
	if(!empty($_POST['KullaniciAdi'])&&!empty($_POST['Sifre']))
	{	include_once("baglan.php");
		$DanismanKullaniciAdi=$_POST['KullaniciAdi'];
		$DanismanSifre=$_POST['Sifre'];
		$SQL="select * from danisman where DanismanKullaniciAdi='$DanismanKullaniciAdi' and DanismanSifre='$DanismanSifre'";
		$sorgu=mysql_query($SQL,$baglanti);
		if($sorgu>0)
		{
			while($veri=mysql_fetch_row($sorgu))
			{
				$DanismanID=$veri[0];
				$DanismanSifre=$veri[5];
				$dbSifre=$veri[5];
				$dbKullaniciAdi=$veri[4];
			}
			
			if(!empty($DanismanID))
			{
				if($dbSifre==$DanismanSifre &&$dbKullaniciAdi==$DanismanKullaniciAdi)
				{
					if (session_status() == PHP_SESSION_NONE&&isset($veri)) 
					{
						session_start();
						//session_destroy();
						$danisman="danisman";
						$_SESSION['DanismanKullaniciAdi']=$dbKullaniciAdi;
						$_SESSION['DanismanKullaniciID']=$DanismanID;
						$_SESSION['Danisman']=$danisman;
						header("refresh:2; url=akademisyenanasayfa.php");
						die("oturum acildi....");
					}
					else
					{
						header("refresh:1;url='index.php'");	
						die('birseyler ters gitti!!!');
					}
				}
				else
				{	
				header("refresh:1;url='index.php'");	
				die("Yanlis Bilgi Girdin");
				}
			}
			else
			{
			header("refresh:2;url='index.php'");	
				die("Yanlis Bilgi Girdin");	
			}
		}	
	}
	else
	{
		header("refresh:1;url='index.php'");
		die("Bos Degerler Girme!");
	}
}
else if(isset($_POST['KullaniciGiris']))
{
//	echo'Kullanici Giris';
		if(!empty($_POST['KullaniciAdi'])&&!empty($_POST['Sifre']))
	{
		include_once("baglan.php");
		$KullaniciAdi=$_POST['KullaniciAdi'];
		$KullaniciSifre=$_POST['Sifre'];
		$SQL="select * from kullanici where KullaniciAdi='$KullaniciAdi' and KullaniciSifre='$KullaniciSifre'";
		$sorgu=mysql_query($SQL,$baglanti);
		if($sorgu>0)
		{
			while($veri=mysql_fetch_row($sorgu))
			{
				$KullaniciID=$veri[0];
				$dbSifre=$veri[8];
				$dbKullaniciAdi=$veri[7];
				$dbBolumID=$veri[5];
			}
			if(!empty($KullaniciID))
			{
			if($dbSifre==$KullaniciSifre &&$dbKullaniciAdi=$KullaniciAdi)
			{
					session_start();
					$_SESSION['KullaniciAdi']=$KullaniciAdi;
					$_SESSION['KullaniciID']=$KullaniciID;
					$_SESSION['BolumID']=$dbBolumID;
					header("refresh:1;url='anasayfa.php'");
					die("oturum acildi....");
					///////////////////////////
						
				
					
					/////////////////////
			}
			else
			{	
			header("refresh:1;url='index.php");	
			die("Yanlis Bilgi Girdin girdiklerinle uyusmuyor");
			}
			}
			else
			{
			header("refresh:2;url='index.php");	
			die("girdiginiz bilgiler eslestirilemedi");
			
			}
			
		}	
		else
		{
			header("refresh:1;url='index.php");	
			die("yeniden dene");
		}
	}
	else
	{
		header("refresh:1;url='index.php'");
		die("Bos Degerler Girme!");
	}
		
}
else
{
	header("location:index.php");
}
?>