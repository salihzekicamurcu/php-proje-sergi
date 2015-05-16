<?php

if(isset($_POST['incele'])){

	if(!empty($_POST['ayrintiProjeID'])){
	$ProjeID=$_POST['ayrintiProjeID'];
	echo'yuklemis oldun odevin ayrintilari';
	include("baglan.php");
	$SQL_ayrinti="select * from proje where ProjeID='$ProjeID'";
	$sorgu=mysql_query($SQL_ayrinti,$baglanti);
	if($sorgu)
	{
		
		echo'<form action="duzenle.php" method="post"><table border="1">
		<tr><td  >Proje Goruntusu</td><td colspan="2" >Bilgiler</td></tr>
		';
		if($veri=mysql_fetch_row($sorgu))
		{
		echo'<tr><td rowspan="10"><img  height=500" width="600" src="kullanici_islemler/'.$veri[4].'"></img></td></tr>';
		kullanici($veri[0]);
		echo'
		<tr><td>Proje Başlık:</td><td><input type="text" name=" ProjeBaslik" value="'.$veri[1].'"></input></td></tr>
		<tr><td>Ders Adi</td><td>'.ders_adi_bul($veri[7]).'</td></tr>
		<tr><td>Bilgilendirme</td><td><textarea name="Bilgilendirme">'.$veri[3].'</textarea></td</tr>
		<tr><td>Projeyi İndir</td><td><a href="kullanici_islemler/'.$veri[5].'">indir</a></td</tr>
		<tr><td ><input type="submit" name="Guncelle" Value="Degisiklikleri Kaydet"></input></td><td><a href="anasayfa.php">Anasayfa</a></td></tr>
		
		';
		
	
		}
		echo'</table></form>';
	}
	}
	else
	{
		header("refresh:3; url=anasayfa.php");
		die("Yeniden Deneyiniz");
	}
}
else
{
	header("refresh:3; url=anasayfa.php");
	echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php">Geri Don</a>';
	die("Yetkisiz Giris");				
}
function ders_adi_bul($dersid)
{
	include ("baglan.php");
	$SQL="select ders.DersAdi from ders where DersID='$dersid'";
	$sorgu=mysql_query($SQL,$baglanti);
	if($sorgu)
	{
		if($veri=mysql_fetch_row($sorgu))
		{
			$dersadi=$veri[0];
			return $dersadi;
			
		}
		else
		{	
			header("refresh:3; url=anasayfa.php");
			die("yeniden deneyiniz");
		}
	}
}
function kullanici($projeid)
	{
		include ("baglan.php");
		$SQL="select kullanici.Ad,Kullanici.Soyad,Kullanici.Sinif,bolum.BolumAdi from bolum,kullanici,proje where proje.KullaniciID=kullanici.KullaniciID and proje.ProjeID='$projeid'and bolum.BolumID=kullanici.BolumID";
		$sorgu=mysql_query($SQL,$baglanti);
		if($sorgu)
		{
			if($veri=mysql_fetch_row($sorgu))
			{
				echo'<tr><td>Ogrenci Ad Soyad</td><td>'.$veri[0].'-'.$veri[1].'</td></tr>';
				echo'<tr><td>Bolum</td><td>'.$veri[3].'</td></tr>';
			}
			
		}
		
	}
?>