function dodaj()
{
  <?php
require_once "connect.php";

if($polaczenie = new mysqli($host, $db_user, $db_password, $db_name)) echo"POLACZONO";
$bonus_drewno=1000;
if ($polaczenie->query("UPDATE uzytkownicy SET drewno=ROUND(drewno+1000,0), kamien=kamien+99, zboze=$bonus_drewno+10 WHERE id=21")) echo "DODANO";
if($polaczenie->close()) echo "ZAMKNIETE";
?>
}
