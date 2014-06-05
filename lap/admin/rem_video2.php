<?php

session_start();

include('../estilo.css');

$codigo_video=$_GET['codigo_video'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_video!=NULL))

{

 include('../conn.php');

 $busca="select * from videos where codigo_video = '".$codigo_video."';";

 $res_busca=mysql_query($busca,$conn);

 $campo=mysql_fetch_array($res_busca);

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Remover Video </b></font></h1>
<hr color=black size=2>

Deseja realmente remover o Video <b><?phpecho $campo[nome_video];?></b> ?<BR>

<table border=0 class=fonte>

<tr><td width=200><input type=submit name=remover value=" Remover " class=botao></td><td><input type=button value=" Cancelar " class=botao onClick="history.go(-1);"></td></tr>

</table>

</form>

<?php

$remover=$_POST['remover'];

if($remover!=NULL)

{

 $rem_video="delete from videos where codigo_video = '".$codigo_video."';";

 $ok_video=mysql_query($rem_video,$conn);

 if($ok_video==1)

 {

  echo "<script>alert('O video: $campo[nome_video] foi removido com sucesso.');

  window.location='rem_video.php';</script>";

 }

}

?>

</body>

</html>

