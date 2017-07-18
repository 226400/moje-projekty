<?php
session_start();

if(!isset($_SESSION['udanarejestracja']))
{
  header('Location:index.php');
  exit();
}
else{
  unset($_SESSION['unadarejestracja']);
}

//usuwanie zmiennych

if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

//usuwanie wszystkich zmiennych z bledami rejestracji
if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
if(isset($_SESSION['e_mail'])) unset($_SESSION['e_mail']);
if(isset($_SESSION['e_haslo1'])) unset($_SESSION['e_haslo1']);
if(isset($_SESSION['e_haslo2'])) unset($_SESSION['e_haslo2']);
if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);



 ?>
 <!DOCTYPE HTML>
 <html lang="pl">
 <head>
   <meta charset="utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>OSADNICY</title>
</head>
   <body>

Proces Rejestracji zakończyl się poprawnie :-) <br/>
Na start otrzymasz następujące surowce i ich ilość<br/>
Drewno - 100<br/>
Kamień - 100<br/>
Zboże - 100<br/>
Życzymy miłej zabawy<br/>

Cel Twojej Gry Bedzie Później<br/>

<a href="index.php">ZALOGUJ</a><br/><br/>
  </body>
  </html>
