<?php

session_start();

if($_SESSION['drewno']>190)
{
require_once "connect.php";
	//	$login = $_POST['login'];
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno-190,0), kamien=kamien, zboze=zboze WHERE id=21")) echo "DODANO";

$rezultat = @$polaczenie->query("SELECT * FROM uzytkownicy WHERE id=21");
$wiersz = $rezultat->fetch_assoc();

$bonus_drewno=10000;
//if ($polaczenie->query("UPDATE uzytkownicy SET drewno=$bonus_drewno, kamien=$bonus_drewno, zboze=$bonus_drewno WHERE id=21")) echo "DODANO";

$_SESSION['drewno'] = $wiersz['drewno'];
$_SESSION['kamien'] = $wiersz['kamien'];
$_SESSION['zboze'] = $wiersz['zboze'];

echo $_SESSION['drewno'];
if($polaczenie->close()) echo "ZAMKNIETE";
//header("Refresh:0; url=gra.php");
header('Location: gra.php');
}
else echo "ZA MALO SUROWCOW";
?>
