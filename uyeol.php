<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uye Ol</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<?php
session_start();
session_destroy();
?>
</head>
<body>
<div class="altzemin">
<div class="baslik">
<div class="sistemgirisbaslik">Üyelik Sayfasi</div>
</div>
<form action="kaydet.php" method="POST">
<center>
<table>
<?php
	if(isset($_POST['DanismanUyeOl']))
	{
		echo'<tr><th>Kullanici Adi</th><td><input type="text" name="DanismanKullaniciAdi"></input></td></tr>
<tr><th>Sifre</th><td><input type="password" name="DanismanSifre"></input></td></tr>
<tr><th>Ad</th><td><input type="text" name="DanismanAd"></input></td></tr>
<tr><th>Soyad</th><td><input type="text" name="DanismanSoyad"></input></td></tr>
<input type="hidden" name="uyeliktip" value="Danisman"></input>
<tr><td><input formaction="uyeol.php" type="submit" value="Ogrenci Kaydi İçin "name="OgrenciUyeOl"></input>
</td><td> <input type="submit" value="Uye Ol" name="DanismanUyeOl""></input>
  <input name="reset" type="reset" id="uyelik"    value="Temizle" />  </input><input name="iptal" type="submit" formaction="index.php"   value="İptal"></td>
</tr>';
	
	}
	else {
	echo'<tr><th>Kullanici Adi</th><td><input type="text" name="KullaniciAdi"></input></td></tr>
<tr><th>Sifre</th><td><input type="password" name="Sifre"></input></td></tr>
<tr><th>Ad</th><td><input type="text" name="Ad"></input></td></tr>
<tr><th>Soyad</th><td><input type="text" name="Soyad"></input></td></tr>
<tr><th>Ogrenci No</th><td><input type="text" name="OgrenciNo"></input></td></tr>
<tr><th>Sinif</th><td><input type="text" name="Sinif"></input></td></tr>
<tr><th>Bolum</th><td>'; bolumgetir();echo'</td></tr>
	<input type="hidden" name="uyeliktip" value="Kullanici"></input>
<tr><td>
<input type="submit"  value="Danisman Kaydi İçin Tıkla" name="DanismanUyeOl" formaction="uyeol.php"></input></td><td> <input type="submit" value="UyeOl"name="OgrenciUyeOl">
  <input name="reset" type="reset" id="uyelik"    value="Temizle" >  </input><input name="iptal" type="submit" formaction="index.php"   value="İptal">  </input></td>
</tr>
<tr><th></th><th>Tum Alanların Doldurulması Zorunludur</th></tr>';
	
	}
	?>
</table>

</center>
</form>
</div>
<!-- alt zemin son-->


</div>
<body>
<?php
	function bolumgetir()
	{
		include_once("baglan.php");
		$SQL="select * from bolum";
		$sorgu=mysql_query($SQL,$baglanti);
		if($sorgu)
		{
			echo'<select name=Bolum>';
			while($veri=mysql_fetch_row($sorgu))
			{
				echo'<option>'.$veri[1].'</option>';
			}
			echo'</select>';
		}
	}
?>