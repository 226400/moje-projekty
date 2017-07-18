<?php

session_start();

if($_SESSION['kamien']>270 && $_SESSION['drewno']>90)
{
require_once "connect.php";
	//	$login = $_POST['login'];
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno-90,0), kamien=kamien-270, zboze=zboze WHERE id=21")) echo "DODANO";
$rezultat = @$polaczenie->query("SELECT * FROM uzytkownicy WHERE id=21");
$wiersz = $rezultat->fetch_assoc();

$bonus_drewno=1000;

$_SESSION['drewno'] = $wiersz['drewno'];
$_SESSION['kamien'] = $wiersz['kamien'];
$_SESSION['zboze'] = $wiersz['zboze'];


//header("Refresh:0; url=gra.php");
if($polaczenie->close()) echo "ZAMKNIETE";
header('Location: gra.php');
}
else echo "ZA MALO SUROWCOW";
?>
