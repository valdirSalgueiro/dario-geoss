<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 $busca_col="select * from colunista;";

 $res_busca_col=mysql_query($busca_col,$conn);

 $num_col=mysql_num_rows($res_busca_col);

 if($num_col==1)

 {

  $campo_col=mysql_fetch_array($res_busca_col);

 }

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='admin.php';</script>";

}

?>

<html>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Modificar Colunistas:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td><BR>

<?php

$oFCKeditor = new FCKeditor('descricao');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_col[descricao];

$oFCKeditor->Create();

?></td></tr>


<tr><td><input type=submit value=" Modificar " name=modificar class=botao></td></tr>
</table>

</form>

<?php

$descricao=$_POST['descricao'];
$modificar=$_POST['modificar'];

if($modificar!=NULL)

{

 $mod_col="update colunista set descricao = '".$descricao."';";

 $ok=mysql_query($mod_col,$conn);

 if($ok==1)

 {

  echo "<script>alert('Colunistas alterado com sucesso.');

  window.location='colunista.php';</script>";

 }

}

?>

</body>

</html>

