<?php

session_start();

include('../estilo.css');

$codigo_galeria=$_GET['codigo_galeria'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_galeria!=NULL))

{

 include('../conn.php');

 $busca="select * from galerias where codigo_galeria = '".$codigo_galeria."';";

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

<h1><font face=verdana color='#ff9900'><b>Remover Galeria de Fotos </b></font></h1>
<hr color=black size=2>

Deseja realmente remover a Galeria de Fotos <b><?phpecho $campo[nome_galeria];?></b> ?<BR>

<table border=0 class=fonte>

<tr><td width=200><input type=submit name=remover value=" Remover " class=botao></td><td><input type=button value=" Cancelar " class=botao onClick="history.go(-1);"></td></tr>

</table>

</form>

<?php

$remover=$_POST['remover'];

if($remover!=NULL)

{

 $rem_galeria="delete from galerias where codigo_galeria = '".$codigo_galeria."';";

 $ok_galeria=mysql_query($rem_galeria,$conn);

 $rem_foto="delete from foto_galerias where codigo_galeria = '".$codigo_galeria."';";

 $ok_foto=mysql_query($rem_foto,$conn);

 if(($ok_galeria==1)and($ok_foto==1))

 {

  echo "<script>alert('A Galeria: $campo[nome_galeria] foi removida com sucesso.');

  window.location='rem_galeria.php';</script>";

 }

}

?>

</body>

</html>

