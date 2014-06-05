<?php

session_start();

include('../estilo.css');

$codigo_noticia=$_GET['codigo_noticia'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_noticia!=NULL))

{

 include('../conn.php');

 $busca="select * from noticias where codigo_noticia = '".$codigo_noticia."';";

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

<h1><font face=verdana color='#ff9900'><b>Remover Not&iacute;cia </b></font></h1>
<hr color=black size=2>

Deseja realmente remover a Not&iacute;cia <b><?phpecho $campo[nome_noticia];?></b> ?<BR>

<table border=0 class=fonte>

<tr><td width=200><input type=submit name=remover value=" Remover " class=botao></td><td><input type=button value=" Cancelar " class=botao onClick="history.go(-1);"></td></tr>

</table>

</form>

<?php

$remover=$_POST['remover'];

if($remover!=NULL)

{

 $rem_noticia="delete from noticias where codigo_noticia = '".$codigo_noticia."';";

 $ok_noticia=mysql_query($rem_noticia,$conn);

 $rem_foto="delete from foto_noticias where codigo_noticia = '".$codigo_noticia."';";

 $ok_foto=mysql_query($rem_foto,$conn);

 if(($ok_noticia==1)and($ok_foto==1))

 {

  echo "<script>alert('A Notícia: $campo[nome_noticia] foi removida com sucesso.');

  window.location='rem_noticia.php';</script>";

 }

}

?>

</body>

</html>

