<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Online Sergi Akademisyen Anasayfa</title>
<link href="css/anasayfa.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="altzemin"><div class="banner">
<?php
include("oturum.php");
?>
</div>
   <div class="menu">
    <ul>
    <li><a href="akademisyenanasayfa.php">Anasayfa</a></li>
    <li><a href="akademisyenanasayfa.php?menu=odevgoruntule">Odevleri Goruntule</a></li>
    <li><a href="akademisyenanasayfa.php?menu=profil">Profilim </a></li>
	</ul>
    </div>
	<div class="icerik">
	<?php
	if(isset($_GET['menu']))
	{
		$menu=$_GET['menu'];
	

///////////////////////////////ODEV GORUNTULE BAS///////////////////////////////////777777
	if($menu=="odevgoruntule")
		{
			
			 if(isset($_POST['TumOdevGoruntule']))
			{
				$DersAdi=$_POST['GoruntuleDersAd'];
				include("baglan.php");
				$SQL_dersid_bul="select DersID from ders where DersAdi='$DersAdi'";
				$dersid_sorgu=mysql_query($SQL_dersid_bul,$baglanti);
				if($dersid_sorgu)
				{
					if($veri=mysql_fetch_row($dersid_sorgu))
					{
						$DersID=$veri[0];
						echo'Ders:'.$DersAdi.'<br>';
					}
				}
				else
				{
				die();
				}
				$SQL_Derse_gore_odevler="select * from proje where DersID='$DersID'";
				$sorgu_Derse_gore_odevler=mysql_query($SQL_Derse_gore_odevler,$baglanti);
				if($sorgu_Derse_gore_odevler)
				{	//////////->>>>>>>>>>
					echo'
					<form action="akademisyenanasayfa.php?menu=odev_ayrintilari" method="post">
					<table border="2">
					<tr><td width="8%">Baslik</td><td width="8%">Ders Adi:</td><td width="8%">Ad</td><td width="8%">Soyad</td><td width="8%">Ogrenci No</td><td width="12%">Bolum</td><td width="8%">incele</td></tr>';
					
					while($veri=mysql_fetch_array($sorgu_Derse_gore_odevler))
					{
						$ProjeID=$veri[0];
					//	echo$ProjeID;
					echo'
						<input type="hidden" name="ProjeID" value="'.$veri[0].'"></input>
						<tr><td>'.$veri[1].'</td>';
						
						$SQL_Yukleyen="select kullanici.Ad,kullanici.Soyad,kullanici.OgrenciNo,Bolum.BolumAdi
						from proje,kullanici,bolum
						where proje.ProjeID='$ProjeID'and proje.KullaniciID=kullanici.KullaniciID and Kullanici.BolumID=bolum.BolumID
						";
					$sorgu=mysql_query($SQL_Yukleyen,$baglanti);
					if($sorgu)
					{	
						$SQL_Ders="select DersAdi from ders where DersID='$DersID'";
						$sorgu_dersadi=mysql_query($SQL_Ders,$baglanti);
						if($sorgu_dersadi)
						{
							if($veri=mysql_fetch_row($sorgu_dersadi))
							{
								$dersadi=$veri[0];
								echo'<td>'.$dersadi.'</td>';
							}
							else
							{
								die("yeniden dene");
							}
						}
						while($veri2=mysql_fetch_array($sorgu))
						{
							////önemliiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
							echo'<td>'.$veri2[0].'</td>';//ad
							echo'<td>'.$veri2[1].'</td>';//soyad
							echo'<td>'.$veri2[2].'</td>';//ogrno
							echo'<td>'.$veri2[3].'</td>';//bolumadi
							echo'<input type hidden name="ProjeID values="'.$ProjeID.'"></input>';
							echo'<td><input type="submit" name="incele" value="Ayrintilari"></input></td></tr>';
								
						}
					}
					else
					{
						echo'hata';
					}
		
					
					
					}
					echo'</table>
					</form>
					';
				}
				
			}
			else{	
			echo'<form action="akademisyenanasayfa.php?menu=odevgoruntule" method="POST">
					<center>
					<table border="3">
					<tr><td>Odevlerini Goruntulemek İstediğiniz Ders</td><td><select name="GoruntuleDersAd">';
					include("baglan.php");
					$SQL="select * from ders,danismanders where DanismanID='$DanismanKullaniciID'and ders.DersID=danismanders.DersID";
					$sorgu=mysql_query($SQL,$baglanti);
					if($sorgu)
					{
						while($veri=mysql_fetch_row($sorgu))
						{
							echo'<option>'.$veri[1].'</option>';
						}
					}
				echo'</td>
				<tr><td>&nbsp;</td><td><input type="submit" name="TumOdevGoruntule" value="OdevleriGoruntule"></input></td></tr>
				</form>';
		
			}
			
		}
		/////////////////ODEV GORUNTULE SON ////////////////////
		
		
		
		////////odev ayrintilari////////////////////
	
		else if($menu=="profil")
		{
		$DanismanAd="salih";
		include("baglan.php");
		$SQL="select * from danisman where DanismanID='$DanismanKullaniciID'";
		$sorgu=mysql_query($SQL,$baglanti);
		if($sorgu)
		{
			if($veri=mysql_fetch_row($sorgu))
			{
				$DanismanAd=$veri[1];
				$DanismanSoyad=$veri[2];
			
			}
		}
		else
		{
			die("yeniden deneyiniz");
		}
		echo'<form action="akademisyen_islemler/profil_guncelle.php" method="post">
				<center>
				<table border="2">
				<tr><td>Danisman Ad</td><td><input type="text" name="DanismanAd" value='.$DanismanAd.'></input></td></tr>
				<tr><td>Danisman Soyad</td><td>'.$DanismanSoyad.'</td></tr>
				<tr><td>Danisman Kullanici Ad</td><td>'.$DanismanKullaniciAdi.'</td></tr>
				<tr><td>Derslerim</td><td>';
				include("baglan.php");
			$SQL="select ders.DersAdi from ders,danismanders where ders.DersID=danismanders.DersID 
			and danismanders.DanismanID='$DanismanKullaniciID'  ";
			$sorgu=mysql_query($SQL,$baglanti);
			if($sorgu>0)
			{
				$num=mysql_num_rows($sorgu);
				echo'<select size="'.$num.'">';
				while($veri=mysql_fetch_array($sorgu))
				{
					
					
						echo'<option>'.$veri[0].'</option>';
		
						
					
				}
				echo'</select>';
			}
			
			else
			{
				die("dersler bulunamiyor");
			}
			echo'<tr><td>Danisman Olabilecegim Dersler</td><td>';
			$SQL_danisman_olabilecek=" select DersAdi from ders where DersID not in(select DersID from danismanders ) ";
			$sorgu_danisman_olabilecek=mysql_query($SQL_danisman_olabilecek,$baglanti);
			if($sorgu_danisman_olabilecek>0)
			{
				while($veri=mysql_fetch_array($sorgu_danisman_olabilecek))
				{
					
					
						echo'<input type="checkbox" name="YeniDersler[]" value="'.$veri[0].'">'.$veri[0].'</input></br>';
		
						
					
				}
				echo'</td></tr>';
		
			}
		
			echo'</td></tr>
				<tr><td>&nbsp;</td><td><input type="submit" name="Guncelle" value="Bilgilerimi Guncelle"></input>
										<input type="submit" name="İptal" formaction="akademisyenanasayfa.php" value="Vazgec"></input>
				</table>
				</center>
				<input type="hidden" name="DanismanKullaniciID" value='.$DanismanKullaniciID.'></input>
				</form>
				';
		}
		else if($menu="odev_ayrintilari")
		{
			if(isset($_POST['incele']))
			{
				echo'odev ayrintilari';
				$ProjeID=$_POST['ProjeID'];
				include("baglan.php");
				$SQL_Ayrinti_Proje="select * from proje where ProjeID='$ProjeID'";
				$sorgu=mysql_query($SQL_Ayrinti_Proje,$baglanti);
				echo'<form action="duzenle.php" method="post"><table border="1">
				<tr><td  >Proje Goruntusu</td><td colspan="2" >Bilgiler</td></tr>
				';
				if($veri=mysql_fetch_row($sorgu))
				{
				echo'<tr><td rowspan="9"><img  height=500" width="600" src="kullanici_islemler/'.$veri[4].'"></img></td></tr>';
				kullanici($veri[0]);
				echo'
				<tr><td>Proje Başlık:</td><td>'.$veri[1].'</td></tr>
				<tr><td>Ders Adi</td><td>'.ders_adi_bul($veri[7]).'</td></tr>
				<tr><td>Bilgilendirme</td><td>'.$veri[3].'</td</tr>
				<tr><td>Projeyi İndir</td><td><a href="kullanici_islemler/'.$veri[5].'">indir</a></td</tr>
				
				
				';
				
			
				}
				echo'</table></form>';	
			}
			else
			{
				header("location:akademisyenanasayfa.php");
			}
		}
		else
		{
			
			header("location:akademisyenanasayfa.php");
		}
		
	}
	else
	{
		echo'anasayfa';
	}
	
	function danisman_dersleri($DanismanKullaniciID)
	{
		
		
	}
	function yukleyen_bul($ProjeID)
	{
		
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
	?>
	
	</div>
	
</div><!-- alt zemin son-->
<!-- alt footer bas-->
<div class="footer">
<!-- alt footer son-->
</body>
</html>