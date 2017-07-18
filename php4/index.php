<?php

	session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
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
</head>

<body >

	Tylko martwi ujrzeli koniec wojny - Platon<br /><br />
	<script type="text/javascript">



</script>
<div id="pojemnik">

	<a href="rejestracja.php">Rejestracja - załóż darmowe konto!</a>
</div>
<div id="logowanie">

	<br />

	<form action="zaloguj.php" method="post">

		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br />
		<input type="submit" value="Zaloguj się" />

	</form>
	<div id="zdjecie">
</div>
</div>

<div id="zdjecie">
<div id="obrazek">
	<!-- <img src="osada1.jpg" alt="Osada Galów" /> -->

<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>
