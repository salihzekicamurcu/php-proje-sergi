<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                             <title> Online Sergi  Ogrenci Anasayfa</title>
                             <link href="css/anasayfa.css" rel="stylesheet" type="text/css" />

                                        </head>

                                        <body>

                                        <div class="altzemin">
                                                    <div class="banner">

                                                                    <?php include("oturum.php");

?>

</div>
<div class="menu">
               <ul>
               <li><a href="anasayfa.php">Anasayfa</a></li>
                           <li><a href="anasayfa.php?menu=odevyukle">Odev Yukle</a></li>
                                       <li><a href="anasayfa.php?menu=odevlerim">Yukledigim Odevler </a></li>
                                               <li><a href="anasayfa.php?menu=profilim">Profil </a></li>
                                                       <li><a href="anasayfa.php?menu=ders_al">Ders Al </a></li>
                                                               </ul>

                                                               </div>
                                                               <div class="icerik">
                                                                           <?php
                                                                               if(isset($_GET['menu'])&&!empty($_GET['menu']))
        {
            $menu=$_GET['menu'];
/////////////////////////////////////////////////////////////ODEV YUKLE////////////////////////////////////////////////////////////////////
        if($menu=="odevyukle")
        {
                echo'

                <form action="anasayfa.php?menu=upload" method="POST">
                <center>
                <table border="3">
                <tr><td>Odev Yuklemek İstediğiniz Ders</td><td><select name="DersAd">';
                include("baglan.php");
                $SQL="select ders.DersAdi from kullaniciders,ders where kullaniciders.KullaniciID='$KullaniciID' and Ders.DersID=kullaniciDers.DersID";
                $sorgu=mysql_query($SQL,$baglanti);
                if($sorgu)
                {
                    while($veri=mysql_fetch_row($sorgu))
                    {
                        echo'<option>'.$veri[0].'</option>';
                    }
                }

                echo'</select></td></tr>
                <tr><td>Proje Basligi</td><td><input type="text" name="ProjeBaslik"></input></tr>
                <tr><td>&nbsp;</td><td><input type="submit" name="odevyukle" value="Yukleme Sayfasina Git"></input><input type="submit" formaction="anasayfa.php" value="Vazgec"></input></td></tr>
                </table>
                </center>
                <input type="hidden" name="KullaniciID" value='.$KullaniciID.'></input>
                <input type="hidden" name="KullaniciAdi" value='.$KullaniciAdi.'></input>
                <input type="hidden" name="BolumID" value='.$BolumID.'></input>
                </form>
                ';

        }
        else if($menu=="ders_al")
        {
                include("baglan.php");
                $SQLTumDers="select * from ders";
                $sorgu=mysql_query($SQLTumDers,$baglanti);

                if($sorgu)
                {
                    echo'<form action="DersAl.php" method="POST">
                    <center>
                    <h2>Ders Seciniz</h2>
                    <table border="2">
                    <tr><td>Ders</td><td><select name="DersAd">';
                    while($veri=mysql_fetch_row($sorgu))
                    {
                        echo'<option value="'.$veri[1].'">'.$veri[1].'</option>';

                    }
                    echo'</td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="DersAl" value="Dersi Al"></input></td></tr>

                    <input type="hidden" name="KullaniciID" value="'.$KullaniciID.'"></input>:
                    ';



                    echo'</table>
                    </center></form>
                    ';

                }

            }
        else if($menu=="upload")
        {
                if(isset($_POST['odevyukle']))
                {
                    echo'upload';
                    if(isset($_POST['DersAd']))
                    {
                        if(!empty($_POST['DersAd'])&&!empty($_POST['ProjeBaslik'])&&!empty($_POST['KullaniciAdi'])
                                &&!empty($_POST['KullaniciID'])&&!empty($_POST['BolumID']))
                        {
                            $DersAd=$_POST['DersAd'];
                            $ProjeBaslik=$_POST['ProjeBaslik'];
                            $KullaniciAdi=$_POST['KullaniciAdi'];
                            $KullaniciID=$_POST['KullaniciID'];
                            //$DersID=ders_id_bul($DersAd);
                            include("baglan.php");
                            $SQL="select * from ders where DersAdi='$DersAd'";
                            $sorgu=mysql_query($SQL,$baglanti);
                            if($sorgu)
                            {
                                if($veri=mysql_fetch_row($sorgu))
                                {
                                    $Ders_ID=$veri[0];
                                    $Ders_Ad=$veri[1];

                                }
                            }
                            else
                            {
                                //header("refresh:2; url=http://localhost/okul/DosyaSergiProgrami/anasayfa.php")
                                die("yeniden Dene");
                            }

                            echo'<form action="kullanici_islemler/odevyukle.php" method="post" enctype="multipart/form-data">
                            <center>
                            <h2>'.$ProjeBaslik.'</h2>
                            <input type="hidden" name="ProjeBaslik" value='.$ProjeBaslik.'></input>
                            <table border="2">
                            <tr><td>Proje Başlığı</td><td>'.$ProjeBaslik.'</input></td></tr>
                            <tr><td>Ders Adi:</td><td>'.$Ders_Ad.'</input></td></tr>
                            <tr><td>Bilgilendirme</td><td><textarea rows="15" name="Bilgilendirme"></textarea></td></tr>

                            <tr><td>Proje</td><td><input type="file" name="Proje"></input>(*.zip)</td></tr>
                            <tr><td>Resim</td><td><input type="file" name="EkranGoruntusu">(*.jpeg)</input></td></tr>

                            <input type="hidden" name="KullaniciID" value='.$KullaniciID.'></input>
                            <input type="hidden" name="DersID" value='.$Ders_ID.'></input>
                            <tr><td></td><td><input type="submit" value="Yükle" name="Yukle"><input type="reset" value="Temizle"></input>
                            <input type="submit" formaction="anasayfa.php" value="İptal"></input></td>
                            </table>
                            </center>
                            </form>
                            ';
                        }
                        else
                        {
                            die("bos deger girme");
                        }
                    }
                    /////upload sonu
                }
                else
                {
                    header("location:anasayfa.php");
                }
            }
            ////upload sonu
/////////////////////////////////////////////////////////////ODEV YUKLE SON

/////////////////////////////////////////////////////////////YUKLEDiGİM
            
		else if($menu=="odevlerim")
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
							$SQL_Derse_gore_odevler="select * from proje where  KullaniciID='$KullaniciID' and DersID='$DersID'";
                    $sorgu_Derse_gore_odevler=mysql_query($SQL_Derse_gore_odevler,$baglanti);
                    if($sorgu_Derse_gore_odevler)
                    {
                        //////////->>>>>>>>>>
                        echo'
                        <form action="ogrenci_ayrintilar.php" method="post">
                        <table border="2">
                        <tr><td width="8%">Baslik</td><td width="8%">Ders Adi:</td><td width="8%">Arıntılar</td></tr>';

                        while($veri=mysql_fetch_array($sorgu_Derse_gore_odevler))
                        {
							$ProjeID=$veri[0];
                            echo'
								
                             <tr><td>'.$veri[1].'</td>';
                            echo'<td>'.$DersAdi.'</td>';
                            echo'<input type hidden name="ayrintiProjeID" value="'.$ProjeID.'"></input>';
                            echo'<input type="hidden" name="KullaniciID" value="'.$KullaniciID.'"></input>';
							echo'<td><input type="submit" name="incele" value="Ayrintilari"></input></td></tr>';

                        }
							echo'</table>
									</form>
									';
					}
					else
					{
						echo'hata';
					}

				
                        }
							}
                    else
                    {
                        die();
                    }
                    
					
                }
                
            

            else
            {
                echo'<form action="anasayfa.php?menu=odevlerim" method="POST">
                <center>
                <table border="3">
                <tr><td>Goruntulemek İstediğiniz Ders</td><td><select name="GoruntuleDersAd">';
                include("baglan.php");
                $SQL="select * from ders,kullaniciders where KullaniciID='$KullaniciID'and ders.DersID=kullaniciders.DersID";
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
//////////////////////////////////////////////// YUKLEDIGIM SON
       
//////////////////////////////////////////DUZENLE/////////////////////////////////////////////

        else if($menu="profilim")
        {
            include("baglan.php");
            $SQL_ogrenci_bilgileri="select * from kullanici where KullaniciID='$KullaniciID'";
            $sorgu_ogrenci_bilgileri=mysql_query($SQL_ogrenci_bilgileri,$baglanti);
            if($sorgu_ogrenci_bilgileri)
            {
                echo'<form action="" method="post">
                <center>
                <table border="2">';
                while($veri=mysql_fetch_array($sorgu_ogrenci_bilgileri))
                {
                    echo'<tr><td>Ogrenci Ad</td><td><input type="text" name=" Ogrenci Ad" value='.$veri[1].'></input></td></tr>
                    <tr><td>Ogrenci Soyad</td><td>'.$veri[2].'</td></tr>
                    <tr><td>Ogrenci No</td><td>'.$veri[3].'</td></tr>
                    <tr><td>Sinif</td><td>'.$veri[4].'</td></tr>
                    <tr><td>Bolum</td><td>'.' '.'</td></tr>
                    <tr><td>Ogrenci Kullanici Ad</td><td>'.$veri[7].'</td></tr>
                    <tr><td>Derslerim</td><td>';
                    derslerigetir($KullaniciID);


                }
                echo'
                </td></tr><tr><td>&nbsp;</td><td><input type="Submit" value="Bilgilerimi Guncelle"></input></td></tr>
                </table>
                </form>
                ';
            }






        }
///////////////////////////////////////////DUZENLE//////////////////////////////////////////////////
	

        else
        {
            header("location:anasayfa.php");
        }

}
else
{
    echo'anasayfadasin';
}
function derslerigetir($KullaniciID)
{

    include("baglan.php");
    $SQLdersgetir="select ders.dersID,ders.DersAdi from ders,kullaniciders where ders.DersID=kullaniciDers.DersID and kullaniciders.KullaniciID='$KullaniciID'";
    $sorgudersgetir=mysql_query($SQLdersgetir,$baglanti);
    $sayi=mysql_num_rows($sorgudersgetir);

    if($sorgudersgetir>0)
    {
        echo'<select  size="'.$sayi.'">';
        while($veri=mysql_fetch_array($sorgudersgetir))
        {
            echo'<option>'.$veri[1].'</option>';
        }
        echo'</select>';
    }


}

?>
</div>
</div>
<!-- alt zemin son-->
<!-- alt footer bas-->
<div class="footer">
               <!-- alt footer son-->
               </div>
               </body>
               </html>
