<?php

session_start();

if($_SESSION['drewno']>270000)
{
require_once "connect.php";

if($polaczenie = new mysqli($host, $db_user, $db_password, $db_name)) echo"POLACZONO";
$bonus_drewno=1000;
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno-190,0), kamien=kamien, zboze=zboze WHERE id=21")) echo "DODANO";
if($polaczenie->close()) echo "ZAMKNIETE";
echo $_SESSION['drewno'];
echo "lkjljlkj";
header("Refresh:0; url=gra.php");
//header('Location: gra.php');
}
else echo "ZA MALO SUROWCOW";


if($_SESSION['kamien']>270)
{
require_once "connect.php";

if($polaczenie = new mysqli($host, $db_user, $db_password, $db_name)) echo"POLACZONO";
$bonus_drewno=1000;
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno-190,0), kamien=kamien, zboze=zboze WHERE id=21")) echo "DODANO";
if($polaczenie->close()) echo "ZAMKNIETE";
echo $_SESSION['drewno'];
echo "lkjljlkj";
header("Refresh:0; url=gra.php");
//header('Location: gra.php');
}
else echo "ZA MALO SUROWCOW";


?>
