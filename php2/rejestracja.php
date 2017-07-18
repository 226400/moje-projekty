<?php
session_start();

if(isset($_POST['email']))
{
  //udana walidacja, zakladam 1
  $wszystko_OK=true;

  //Spr nick
  $nick=$_POST['nick'];

//spr dl. nick
if((strlen($nick)<3) ||(strlen($nick>20)))
{
  $wszystko_OK=false;
  $_SESSION['e_nick']="Nick musie miec od 3 do 20 znakow";

}

if(ctype_alnum($nick)==false)
{
  $wszystko_OK=false;
  $_SESSION['e_nick']="Nick bez polskich znakow i tylko litery";
}


//spr email
$email=$_POST['email'];
$emailb=filter_var($email, FILTER_SANITIZE_EMAIL);

if((filter_var($emailb, FILTER_VALIDATE_EMAIL)==false)||($emailb!=$email))
{
  $wszystko_OK=false;
  $_SESSION['e_mail']="Podaj poprawny e-mail";
}
//spr hasla
$haslo1=$_POST['haslo1'];
$haslo2=$_POST['haslo2'];

if((strlen($haslo1)<5)||(strlen($haslo2)>20))
{
  $wszystko_OK=false;
  $_SESSION['e_haslo']="haslo musie byc od 5 do 20 znakow";

}
if($haslo1!=$haslo2)
{
$wszystko_OK=false;
$_SESSION['e_haslo']="hasla musza sie zgadzac";
}

$haslo_hash=password_hash($haslo1, PASSWORD_DEFAULT);

//spr regulamin
if(isset($_POST['regulamin'])==false)
{
  $wszystko_OK=false;
    $_SESSION['e_regulamin']="musisz zakceptowac regulamin";
}

//Captcha
$sekret="6LdMOycUAAAAALd3bo1i-jeWXP9Sr8wnXm2fyPpM";
$sprawdz=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

$odpowiedz=json_decode($sprawdz);
if(($odpowiedz->success)==false)
{
  $wszystko_OK=false;
  $_SESSION['e_bot']="udowodnij ze nie jestes botem";
}

//zapamietaj wprowadzane DOMNamedNodeMap
$_SESSION['fr_nick']=$nick;
$_SESSION['fr_email']=$email;
$_SESSION['fr_haslo1']=$haslo1;
$_SESSION['fr_haslo2']=$haslo2;
if(isset($_POST['regulamin']))$_SESSION['fr_regulamin']=true;

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try
{
  $polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
  if($polaczenie->connect_errno!=0)
 // jesli polaczenie sie udalo if nie zachodzi
 {
throw new Exception(mysqli_connect_errno());
 }
 else{
//czy jest email

$rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
if(!$rezultat) throw new Exception($polaczenie->error);

$ile_takich_maili=$rezultat->num_rows;
if($ile_takich_maili>0)
{
  $wszystko_OK=false;
  $_SESSION['e_mail']="taki e_mail istnieje";
}

//czy jest uzytkownik

$rezultat=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
if(!$rezultat) throw new Exception($polaczenie->error);

$ile_takich_nickow=$rezultat->num_rows;
if($ile_takich_nickow>0)
{
  $wszystko_OK=false;
  $_SESSION['e_nick']="taki nick juz istnieje";
}

if($wszystko_OK==true)
{
  // zaliczone
if($polaczenie->query("INSERT INTO uzytkownicy VALUES(NULL, '$nick', '$haslo_hash', '$email',100, 100, 100, 14)"))
{
  $_SESSION['unadarejestracja']=true;
  header('Location: witamy.php');
}
else
{
  throw new Exception($polaczenie->error);
}

}
   $polaczenie->close();
 }
}
catch(Exception $e)
{
  echo '<span style="color:red;"> Blad serwera"</span>';
  echo '<br />Informacja developerska:'.$e;
}
///////////////////////////////////////////////////////
///////////////////////koniec testu/////////////////////

}

 ?>
 <!DOCTYPE HTML>
 <html lang="pl">
 <head>
   <meta charset="utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>REJESTRACJA</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
.error
{
  color:red;
  margin-top: 10px;
  margin-bottom: 10px;
}

</style>
</head>
   <body>

     <form method="post">

Nickname: <br />
<input type="text" value="<?php
if(isset($_SESSION['fr_nick']))
{
  echo $_SESSION['fr_nick'];
  unset($_SESSION['fr_nick']);
}
?>" name="nick"/><br />

<?php
if (isset($_SESSION['e_nick']))
{
  echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
  unset($_SESSION['e_nick']);
}
 ?>
 email: <br />
<input type="text" value="<?php
{
  echo $_SESSION['fr_email'];
  unset($_SESSION['fr_email']);
}

?>
" name="email"><br />

<?php
if (isset($_SESSION['e_mail']))
{
  echo '<div class="error">'.$_SESSION['e_mail'].'</div>';
  unset($_SESSION['e_mail']);
}
 ?>
Haslo: <br />
<input type="password" value="<?php
{
  echo $_SESSION['fr_haslo1'];
  unset($_SESSION['fr_haslo1']);
}

?>
" name="haslo1"><br />
<?php
if (isset($_SESSION['e_haslo1']))
{
  echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
  unset($_SESSION['e_haslo1']);
}
 ?>
Haslo: <br />
<input type="password"  value=" <?php
{
  echo $_SESSION['fr_haslo2'];
  unset($_SESSION['fr_haslo2']);
}

?>
"name="haslo2"><br />
<?php
if (isset($_SESSION['e_haslo2']))
{
  echo '<div class="error">'.$_SESSION['e_haslo2'].'</div>';
  unset($_SESSION['e_haslo2']);
}
 ?>


<label>
  <!-- label dalo mozliwosz klikania na caly tekst -->
Akceptacja regulaminu
<input type="checkbox" name="regulamin"<?php
if(isset($_SESSION['fr_regulamin'])==true)
{
echo "checked";
unset($_SESSION['fr_regulamin']);
}
?>><br />
<?php
if (isset($_SESSION['e_regulamin']))
{
  echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
  unset($_SESSION['e_regulamin']);
}
 ?>
</label>
<div class="g-recaptcha" data-sitekey="6LdMOycUAAAAAOwdkxFrfqxdNur7hXTauBW-ksbF"></div>
<?php
if (isset($_SESSION['e_bot']))
{
  echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
  unset($_SESSION['e_bot']);
}
 ?>
<br />
<input type="submit" value="zarejestruj sie"/>
     </form>

  </body>
  </html>
