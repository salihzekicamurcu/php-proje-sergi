<?php
session_start();
if(isset($_SESSION['DanismanKullaniciAdi']))
{
	header("refresh:1; url=akademisyenanasayfa.php");
	die(" akademisyen oturumu aciliyor....");
}
else if(isset($_SESSION['KullaniciAdi']))
{
	header("refresh:1; url=anasayfa.php");
	die(" ogrenci oturumu aciliyor....");
}
else
{
echo'
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Sergi </title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

</head>

<body>
<!-- alt zemin bas-->
<div class="altzemin">
<div class="baslik">

<div class="sistemgirisbaslik">Sistem Giris Sayfasi</div>
</div>

<form action="login.php" method="POST">
<center>
<table>
<tr><th>Kullanici Adi</th><td><input type="text" name="KullaniciAdi"></input></td></tr>
<tr><th>Sifre</th><td><input type="password" name="Sifre"></input></td></tr>
</tr>
<tr><td>
<input type="submit"  value="Danisman Giris" name="AdminGiris" formaction="login.php"></input></td><td> <input type="submit" value="Ogrenci Giris"name="KullaniciGiris">
  <input name="uyeol" type="submit" id="uyelik" formaction="uyeol.php"   value="Uye Ol" />  </input></td><td>&nbsp;</td>
</tr>
</table>
</center>
</form>
</div>

<!-- alt zemin son-->


</div>
</body>
</html>';

}
?>

