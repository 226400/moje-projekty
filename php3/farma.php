<?php

session_start();

if($_SESSION['zboze']>=400 && $_SESSION['drewno']>=190 && $_SESSION['kamien']>=100)
{
require_once "connect.php";
	//	$login = $_POST['login'];

$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno-190,0), kamien=kamien-100, zboze=zboze-400 WHERE id=21")) echo "DODANO";

$rezultat = @$polaczenie->query("SELECT * FROM uzytkownicy WHERE id=21");
$wiersz = $rezultat->fetch_assoc();

$bonus_drewno=1000;

$_SESSION['drewno'] = $wiersz['drewno'];
$_SESSION['kamien'] = $wiersz['kamien'];
$_SESSION['zboze'] = $wiersz['zboze'];



if($polaczenie->close()) echo "ZAMKNIETE";
//header("Refresh:0; url=gra.php");
header('Location: gra.php');
}
else echo "ZA MALO SUROWCOW";
?>
