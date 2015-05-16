<?php
//echo'akademsiyen profil goruntule';
if(isset($_POST['DanismanKullaniciID']))
{
$DanismanKullaniciID=$_POST['DanismanKullaniciID'];
if(isset($_POST['YeniDersler'])&&count($_POST['YeniDersler'])>0)
{	//yeni dersler ekleniyor
	$yenidersler=$_POST['YeniDersler'];
	include("baglan.php");
		for($i=0;$i<count($yenidersler);$i++)
		{	
		echo'Eklenen Ders'.$yenidersler[$i].'<br>';
		$dersadi=$yenidersler[$i];
		$SQL_ders_id_bul="select DersID from ders where DersAdi='$dersadi'";
		$ders_id_sorgu=mysql_query($SQL_ders_id_bul,$baglanti);
		if($ders_id_sorgu)
		{
			if($veri=mysql_fetch_array($ders_id_sorgu))
			{
				$eklenecek_DersID=$veri[0];
				$SQL_Yeni_ders="insert into danismanders values('','$DanismanKullaniciID','$eklenecek_DersID')";
				$ders_ekle_sorgu=mysql_query($SQL_Yeni_ders);
				if($ders_ekle_sorgu)
				{
					header("refresh:1; url=http://localhost/okul/DosyaSergiProgrami/akademisyenanasayfa.php?menu=profil");
					echo'<a href="http://localhost/okul/DosyaSergiProgrami/index.php">Devam Et</a>';
					die('ders secimini yapitniz');
					
		
			
				}
			
			}
		}
		}
}
//***********************************************////////////////////

	
}	

 else
	{
		header("refresh:1; url=http://localhost/okul/DosyaSergiProgrami/akademisyenanasayfa.php");
		die("gorme yetkin yok");
	
	}
?>