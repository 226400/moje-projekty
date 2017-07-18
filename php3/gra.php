<?php

	session_start();

	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<link rel="stylesheet" href="style.css" type="text/css" />

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
<script src="gra.js"></script>

</head>

<body>
	<div id="surowce">
		<form action="logout.php" method="post" >

		<input type="submit" style='position:absolute; left:90%'  value="WYLOGUJ" name="tartak" />
	</form>

	<?php
		echo "<p>Witaj ".$_SESSION['user']. '     		  <b>Drewno</b>: '.$_SESSION['drewno'];
		echo " | <b>Kamień</b>: ".$_SESSION['kamien'];
		echo " | <b>Zboże</b>: ".$_SESSION['zboze']."</p>";

		// echo "<p><b>E-mail</b>: ".$_SESSION['email'];
		// echo "<br /><b>Data wygasniecia premium</b>: ".$_SESSION['dnipremium']."</p>";


		//$dataczas=new DateTime('2017-01-01 09:30:15');
		$dataczas=new DateTime();
		//echo "Data i czas serwera:  ". $dataczas->format('Y-m-d H:i:s')."<br>";
		$koniec=DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION['dnipremium']);
		$roznica = $dataczas->diff($koniec);


		/*if($dataczas<$koniec)
		{
			echo "Pozostalo premium: ".$roznica->format('%d dni, %h godz, %i min, %s sek');
		 }else echo"Nie masz juz premium"
	*/



	?>
	</div>
	<div id="budowa">
	ZACZNIJ BUDOWE<br />
	<form action="budowa.php" method="post" >
		<input type="submit" style='float:left' class="submit" value="BUDUJ TARTAK" name="tartak" />
	</form>

	<form action="kamieniolom.php" method="post" >

	<input type="submit" style='position:absolute; left:401px' class="sub_farma" value="BUDUJ KAMIENIOLOM" name="tartak" />
</form>
	<form action="farma.php" method="post" >
		<input type="submit" style='float:right' class="sub_kamieniolom" value="BUDUJ FARMĘ" name="tartak" />
	</form>
</div>

<div id="plansza">

</div>
</body>
</html>


















<!-- NAUKA PRZETWARZANIA DAT -->
<!-- // echo time()."<br>"; -->
<!-- // echo mktime(19,37,0,4,2,2005)."<br>"; -->
<!-- // echo microtime()."<br>"; -->
<!--  -->
<!-- //echo date('Y-m-d H:i:s')."<br>"; //datetime z MySQL -->
<!-- // M miesiac litery, n miesiac bez 0, y rok bez 20, j dzien bez 0 D trzy litery dnia -->
<!-- //h 12-godz i-minuty, s -->

<!-- //$dataczas=new DateTime(); -->
<!-- //echo $dataczas->format('Y-m-d H;i;s')."<br>"; -->

<!-- //$rok=1875; -->
<!-- //$miesiac=12; -->
<!-- //$dzien>Dni premium=20; -->

<!-- //if(checkdate($miesiac, $dzien, $rok)) -->
<!-- //{ -->
<!-- //	echo "<br>Data w porządku"; -->
<!-- //}else echo "<br> Wpisz poprawna date"; -->
