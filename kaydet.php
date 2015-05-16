<?php
session_start();
session_destroy();
?>
<?php
if(isset($_POST['DanismanUyeOl']))
{
    /*echo'<tr><th>Kullanici Adi</th><td><input type="text" name="DanismanKullaniciAdi"></input></td></tr>
    <tr><th>Sifre</th><td><input type="password" name="DanismanSifre"></input></td></tr>
    <tr><th>Ad</th><td><input type="text" name="DanismanAd"></input></td></tr>
    <tr><th>Soyad</th><td><input type="text" name="DanismanSoyad"></input></td></tr>
    <input type="hidden" name="uyeliktip" value="Danisman"></input>
    <tr><td><input formaction="uyeol.php" type="submit" value="Ogrenci Kaydi İçin "name="OgrenciUyeOl"></input>
    </td><td> <input type="submit" value="Uye Ol" name="DanismanUyeOl""></input>
    <input name="reset" type="reset" id="uyelik"    value="Temizle" />  </input><input name="iptal" type="submit" formaction="index.php"   value="İptal"></td>
    </tr>';*/
    
    if(!empty($_POST['DanismanKullaniciAdi'])&&!empty($_POST['DanismanSifre'])&&!empty($_POST['DanismanAd'])&&!empty($_POST['DanismanSoyad']))
    {
        $formDanismanKullaniciAdi=$_POST['DanismanKullaniciAdi'];
        $formDanismanSifre=$_POST['DanismanSifre'];
        $formDanismanAd=$_POST['DanismanAd'];
        $formDanismanSoyad=$_POST['DanismanSoyad'];
        include_once("baglan.php");
        $SQL="insert into danisman(DanismanAd,DanismanSoyad,DanismanKullaniciAdi,DanismanSifre) values('$formDanismanAd','$formDanismanSoyad',
             '$formDanismanKullaniciAdi','$formDanismanSifre')
             ";
        $sorgu=mysql_query($SQL,$baglanti);
        if($sorgu)
        {
            session_start();
            $_SESSION['DanismanKullaniciAdi']=$formDanismanKullaniciAdi;
            $_SESSION['DanismanKullaniciID']=danisman_kullanici_id_bul($formDanismanKullaniciAdi);
            $_SESSION['Danisman']="Danisman";
            echo'basari ile eklendi';
			echo' <br><h2>Kullanici Adiniz İle Giris Yapabilirsiniz...</h3>';
            header("refresh:4;url=index.php");
			echo'<a href="http://localhost/okul/DosyaSergiProgrami/index.php">Devam Et</a>';
			session_destroy();
            die();
        }
        else
        {
            header("refresh:1;url=uyeol.php");
            die("kayit eklenemedi...");
        }
    }
    else
    {
        header("refresh:1;url=uyeol.php");
        die("Bos Bilgi Girmeyiniz");
    }
}//danisman uye ol son
else if(isset($_POST['OgrenciUyeOl']))
{
    /*tr><th>Kullanici Adi</th><td><input type="text" name="KullaniciAdi"></input></td></tr>
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
    </tr>'*/
    echo'ogrenci kaydi';
    if(!empty($_POST['KullaniciAdi'])&&!empty($_POST['Sifre'])&&!empty($_POST['Ad'])
            &&!empty($_POST['Soyad'])&&!empty($_POST['OgrenciNo'])
            &&!empty($_POST['Sinif'])&&!empty($_POST['Bolum']))
    {
        //echo'bilgiler tamam';
		$formOgrenciKullaniciAdi=$_POST['KullaniciAdi'];
		$formOgrenciSifre=$_POST['Sifre'];
		$formOgrenciAd=$_POST['Ad'];
		$formOgrenciSoyad=$_POST['Soyad'];
		$formOgrenciNo=$_POST['OgrenciNo'];
		$formOgrenciSinif=$_POST['Sinif'];
		$formOgrenciBolum=$_POST['Bolum'];
		/*	echo$formOgrenciKullaniciAdi 
		    .$formOgrenciSifre
		    .$formOgrenciAd
		    .$formOgrenciSoyad
		    .$formOgrenciNo
	        .$formOgrenciSinif
			     .$formOgrenciBolum;
			*/	 
	    $formkullaniciBolumID=kullanici_bolum_id_bul($formOgrenciBolum);
		
		include("baglan.php");
		$SQLKullaniciEkle="insert into Kullanici(Ad,Soyad,OgrenciNo,Sinif,BolumID,KullaniciAdi,KullaniciSifre)
		values('$formOgrenciAd','$formOgrenciSoyad','$formOgrenciNo','$formOgrenciSinif','$formkullaniciBolumID',
		'$formOgrenciKullaniciAdi','$formOgrenciSifre')";
		$KullaniciEkleSorgu=mysql_query($SQLKullaniciEkle,$baglanti);
		if($KullaniciEkleSorgu)
		{
			///oturumac kullanici	
			
				session_start();
				$_SESSION['KullaniciAdi']=$formOgrenciKullaniciAdi;
				$_SESSION['KullaniciID']=kullanici_id_bul($formOgrenciKullaniciAdi);
				$_SESSION['BolumID']=kullanici_bolum_id_bul($formOgrenciBolum);
				echo'<br> <h2>Kullanici Adiniz İle Giris Yapabilirsiniz...</h2>';
				header("refresh:4;url=index.php");
				echo'<a href="http://localhost/okul/DosyaSergiProgrami/index.php">Devam Et</a>';
				session_destroy();
				die();
			
		}
		else
		{
			header("refresh:2;url=index.php");
			die("kaydedilemedi...");
			
		}
		
	}
	else
	{
		echo'Bos Bilgiler Girmeyiniz';
		header("refresh:4;url=uyeol.php");
	}	
} 
//ogrenci uye ol sonu	
else
{
    header("location:uyeol.php");
}
function danisman_kullanici_id_bul($dka)
{
    include("baglan.php");
    $SQL="select *from danisman where DanismanKullaniciAdi='$dka'";
    $sorgu=mysql_query($SQL,$baglanti);
    if($sorgu)
    {
        while($veri=mysql_fetch_row($sorgu))
        {
            $id=$veri[0];
        }
        if(!empty($id))
        {
            return $id;
        }
        else
        {
            //header("refresh:4;url=uyeol.php");
            die("kayit bulunamadi");
        }
    }
    else
    {
        //header("refresh:4;url=uyeol.php");
        echo'<a href=uyeol.php>Yeniden Dene</a>)';
		die("yeniden dene");

    }
}
function kullanici_bolum_id_bul($BolumAdi)
{
	include("baglan.php");
	$SQL="select BolumID from bolum where BolumAdi ='$BolumAdi'";
	$sorgu=mysql_query($SQL,$baglanti);
	if($sorgu)
	{
		while($veri=mysql_fetch_row($sorgu))
		{
			$id=$veri[0];
		}
		if(!empty($id))
		{
			echo'bolum id bulundu';
			return $id;
		}
	}
}
function kullanici_id_bul($KullaniciAdi)
{
	include("baglan.php");
	$tumbilgiler="select KullaniciID from kullanici where KullaniciAdi='$KullaniciAdi";
	$tumbilgilersorgu=mysql_query($tumbilgiler,$baglanti);
	if($tumbilgilersorgu)
	{
		while($veri=mysql_fetch_row($tumbilgilersorgu))
		{
			$kullaniciID=$veri[0];
		}
		if(!empty($kullaniciID))
		{
			return $kullaniciID;
		}
		else
		{
			die("kullanici adi hatali");
		}
	}
	
}
?>
