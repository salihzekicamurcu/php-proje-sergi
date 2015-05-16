<?php
	if(isset($_POST['Yukle']))
	{	
		if(!empty($_POST['ProjeBaslik'])&&!empty($_POST['Bilgilendirme']))
		{
			
			$KullaniciID=$_POST['KullaniciID'];
			$DersID=$_POST['DersID'];
			$ProjeBaslik=$_POST['ProjeBaslik'];	
			$Bilgilendirme=$_POST['Bilgilendirme'];
		
			if(!empty($_FILES['Proje']))
			{
		
			 $tip = $_FILES['Proje']['type'];
			$isim = $_FILES['Proje']['name'];
			$uzanti = explode('.', $isim);
			$uzanti = $uzanti[count($uzanti)-1];
			
            
			if($uzanti == 'zip') 
			{
					$new_name=$ProjeBaslik.'_'.$KullaniciID.'_'.$DersID;
					$uploadfile = 'Dosya_'.$new_name . '.' . $uzanti; // yeni dosya ismi uzantısıyla birlikte 
					$dosyayolu='resim_dosya/'.$uploadfile ;
					echo"Yukleyen:".$KullaniciID."<br>";	
					if(is_uploaded_file($_FILES["Proje"]['tmp_name']))
					{echo'gecici';
						if(move_uploaded_file($_FILES["Proje"]['tmp_name'],'resim_dosya/'.$uploadfile))
						{
							if(!empty($_FILES['EkranGoruntusu']))
			{
			
			 $tip = $_FILES['EkranGoruntusu']['type'];
			$isim = $_FILES['EkranGoruntusu']['name'];
			$uzanti = explode('.', $isim);
			$uzanti = $uzanti[count($uzanti)-1];
			
            echo'uzantisi:'.$uzanti;
			if($uzanti == 'jpg') 
			{
					$new_name=$ProjeBaslik.'_'.$KullaniciID.'_'.$DersID;
					$uploadfile = 'EkranGoruntusu_'.$new_name . '.' . $uzanti; // yeni dosya ismi uzantısıyla birlikte 
					$resimdosyayolu='resim_dosya/'.$uploadfile;
					
					// resmi geçici klasöründen yüklemek istediğimiz yere taşıyoruz. 
			

					//echo"Dosya Yolu:".$resimdosyayolu."<br>";
					//echo"Yukleyen:".$KullaniciID."<br>";
					
					if(is_uploaded_file($_FILES["EkranGoruntusu"]['tmp_name']))
					{//echo'gecici';
						if(move_uploaded_file($_FILES["EkranGoruntusu"]['tmp_name'],'resim_dosya/'.$uploadfile))
						{
						//echo$resimdosyayolu.'na kaydedildi';
							
						}
						else
						{
							echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
							die("yeniden deneyiniz");
						}
					}
				}	
				else
				{
					echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
					die('jpg Formatinda Dosya Olmali');
				}
				
			
			}
						}
						else
						{
							echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
							die("yeniden deneyiniz");
						}
					}
					else
					{
						echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
							die("yeniden deneyiniz");
					}
				}
				else
				{
					echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
					die('ZIP Formatinda Dosya Olmali');
				}
				
			}
			include("baglan.php");
			$SQL_proje_ekle="insert into proje(ProjeBaslik,Bilgilendirme,DosyaLink,ResimLink,KullaniciID,DersID)
													values('$ProjeBaslik','$Bilgilendirme','$resimdosyayolu','$dosyayolu','$KullaniciID','$DersID')";
			
			$sorgu_proje_ekle=mysql_query($SQL_proje_ekle,$baglanti);
			if($sorgu_proje_ekle)
			{
				echo'Kaydınız basari ile eklenmistir';
				echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php">Devam Et</a>';
			}
			else
			{
			echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
							die("yeniden deneyiniz");
			}
		}
		else
		{
		echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php?menu=odevyukle">Geri</a>';
		die('bos degerler girme');
		}
	
		
	}
	else
	{
		
		
		echo'<a href="http://localhost/okul/DosyaSergiProgrami/anasayfa.php">Yetkisiz Giris</a>';
		die();
	}	

?>