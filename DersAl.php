<?php

	if(isset($_POST['DersAl']))
	{
		$DersAd=$_POST['DersAd'];
		$KullaniciID=$_POST['KullaniciID'];
		include("baglan.php");
		$SQLDers_id="select DersID from ders where DersAdi='$DersAd'";
		$sorgu=mysql_query($SQLDers_id,$baglanti);
		if($sorgu)
		{
			if($veri=mysql_fetch_row($sorgu))
			{
				$DersID=$veri[0];
				//echo$DersID.'<br>';
				//echo$KullaniciID;
				$SQL_kullanici_ders="insert into kullaniciders(KullaniciID,DersID) values('$KullaniciID','$DersID')";
				$sorgu_kullanici_ders=mysql_query($SQL_kullanici_ders,$baglanti);
				if($sorgu_kullanici_ders)
				{
					echo'eklendi';
					echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php">Devam Et</a>';
					die();
				}
				else
				{
					echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php">Devam Et</a>';
					die('eklenemedi');
				}
			}
			else
			{
				echo'<a href="anasayfa.php">Geri</a>';
				die("yeniden dene ders id bulunamadi ");
			}
		}
		
		
		
	}
	else
	{
		echo'<a href="anasayfa.php">Geri</a>';
		die("yetkiniz giris");
		
	}
	
	
?>