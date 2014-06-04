<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Pagina&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.pgoff {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #FF0000; text-decoration: none}
a.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #003366; text-decoration: none}
a:hover.pg {font-family: Verdana, Arial, Helvetica; font-size: 11px; color: #0066cc; text-decoration:underline}
-->
</style>
Paginação :
<?php
$quant_pg = ceil($quantreg/$numreg);
$quant_pg++;

// Verifica se esta na primeira página, se nao estiver ele libera o link para anterior
if ( $_GET['pg'] > 0) { 
echo "<a href=noticias.php?pg=".($_GET['pg']-1) ."class=pg><b></b></a>";
} else { 
echo "<font color=#CCCCCC></font>";
}

// Faz aparecer os numeros das página entre o ANTERIOR e PROXIMO
for($i_pg=1;$i_pg<$quant_pg;$i_pg++) { 
// Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
if ($_GET['pg'] == ($i_pg-1)) { 
echo " <span class=pgoff>[$i_pg]</span> ";
} else {
$i_pg2 = $i_pg-1;
echo "<a href=noticias.php?pg=$i_pg2 class=pg><b>$i_pg</b></a> ";
}
}

// Verifica se esta na ultima página, se nao estiver ele libera o link para próxima
if (($_GET['pg']+2) < $quant_pg) { 
echo "<a href=noticias.php?pg=".($_GET['pg']+1)." class=pg><b></b></a>";
} else { 
echo "<font color=#CCCCCC></font>";
}
?>
