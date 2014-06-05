<?php

session_start();

include('../estilo.css');

$codigo_foto_dia=$_GET['codigo_foto_dia'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_foto_dia!=NULL))

{

 include('../conn.php');

 $busca="select * from foto_dia where codigo_foto_dia = '".$codigo_foto_dia."';";

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

<h1><font face=verdana color='#ff9900'><b>Remover Foto do Dia </b></font></h1>
<hr color=black size=2>

Deseja realmente remover a Foto do Dia <b><?phpecho $campo[nome_foto_dia];?></b> ?<BR>

<table border=0 class=fonte>

<tr><td width=200><input type=submit name=remover value=" Remover " class=botao></td><td><input type=button value=" Cancelar " class=botao onClick="history.go(-1);"></td></tr>

</table>

</form>

<?php

$remover=$_POST['remover'];

if($remover!=NULL)

{

 $rem_foto_dia="delete from foto_dia where codigo_foto_dia = '".$codigo_foto_dia."';";

 $ok_foto_dia=mysql_query($rem_foto_dia,$conn);

 $rem_foto="delete from foto_foto_dia where codigo_foto_dia = '".$codigo_foto_dia."';";

 $ok_foto=mysql_query($rem_foto,$conn);

 if(($ok_foto_dia==1)and($ok_foto==1))

 {

  echo "<script>alert('A Foto do Dia: $campo[nome_foto_dia] foi removida com sucesso.');

  window.location='rem_foto_dia.php';</script>";

 }

}

?>

</body>

</html>

