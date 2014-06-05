<?php

session_start();

include('../estilo.css');

$codigo_propaganda=$_GET['codigo_propaganda'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_propaganda!=NULL))

{

 include('../conn.php');

 $busca="select * from propaganda where codigo_propaganda = '".$codigo_propaganda."';";

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

<h1><font face=verdana color='#ff9900'><b>Remover Foto Propaganda </b></font></h1>
<hr color=black size=2>

Deseja realmente remover a Propaganda <b><?phpecho $campo[nome_propaganda];?></b> ?<BR>

<table border=0 class=fonte>

<tr><td width=200><input type=submit name=remover value=" Remover " class=botao></td><td><input type=button value=" Cancelar " class=botao onClick="history.go(-1);"></td></tr>

</table>

</form>

<?php

$remover=$_POST['remover'];

if($remover!=NULL)

{

 $rem_propaganda="delete from propaganda where codigo_propaganda = '".$codigo_propaganda."';";

 $ok_propaganda=mysql_query($rem_propaganda,$conn);

 $rem_foto="delete from foto_propaganda where codigo_propaganda = '".$codigo_propaganda."';";

 $ok_foto=mysql_query($rem_foto,$conn);

 if(($ok_propaganda==1)and($ok_foto==1))

 {

  echo "<script>alert('A Propaganda: $campo[nome_propaganda] foi removida com sucesso.');

  window.location='rem_propaganda.php';</script>";

 }

}

?>

</body>

</html>

