<?php
	session_start();
	if(isset($_SESSION['KullaniciAdi']))
	{
		/*	$_SESSION['DanismanKullaniciAdi']=$KullaniciAdi;
		$_SESSION['DanismanID']=$KullaniciID;
		*/
		$KullaniciAdi=$_SESSION['KullaniciAdi'];
		$KullaniciID=$_SESSION['KullaniciID'];
		$BolumID=$_SESSION['BolumID'];
		
		echo'<ul>
		<li id="baslik">Kullanici Adi</li><li>:'.$KullaniciAdi.'</li>
		<li id="baslik" >KullaniciID:</li><li>'.$KullaniciID.'</li>
		<li id="baslik">BolumID:</li><li>'.$BolumID.'</li>
		</ul>';
		echo'<a href="cikis.php"><img title="Cikis Yap" src="css/logout.png"></img></a>';
	}
	else if (isset($_SESSION['DanismanKullaniciAdi']))
	{
		
		$DanismanKullaniciAdi=$_SESSION['DanismanKullaniciAdi'];
		$DanismanKullaniciID=$_SESSION['DanismanKullaniciID'];
		echo'<ul>
		<li id="baslik">Danisman Kullanici Adi</li><li>:'.$DanismanKullaniciAdi.'</li>
		<li id="baslik" >Danisman KullaniciID:</li><li>'.$DanismanKullaniciID.'</li>
		</ul>';
		echo'<a href="cikis.php"><img title="Cikis Yap" src="css/logout.png"></img></a>';
						
	}

	else
	{
		header("refresh:1;url=index.php");
		die("oturum ac");
	}
?>