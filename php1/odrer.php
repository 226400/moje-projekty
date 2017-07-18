<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf8"/>
<title>Podsumowanie</title>
</head>
<body>
<?php

$towaru1=$_POST['towar1'];
$towaru2=$_POST['towar2'];
$suma=1*$towaru1+2*$towaru2;
echo<<<END

<h2>PODSUMOWANIE</h2>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<td>towar 1</td> <td>$towaru1</td>
</tr>
<tr>
<td>Towar 2</td> <td>$towaru2</td>
</tr>
<tr>
<td>SUMA</td> <td>$suma</td>
</tr>
</table>
<br /><a href="index.php">Powrot do strony glownej</a>

END;

?>

</body>
</html>
