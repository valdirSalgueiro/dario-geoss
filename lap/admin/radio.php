<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 $busca_radio="select * from radio;";

 $res_busca_radio=mysql_query($busca_radio,$conn);

 $num_radio=mysql_num_rows($res_busca_radio);

 if($num_radio==1)

 {

  $campo_radio=mysql_fetch_array($res_busca_radio);

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

<h1><font face=verdana color='#ff9900'><b>Modificar radio:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td><BR>

<?php

$oFCKeditor = new FCKeditor('descricao_radio');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_radio[descricao_radio];

$oFCKeditor->Create();

?></td></tr>


<tr><td><input type=submit value=" Modificar " name=modificar class=botao></td></tr>
</table>

</form>

<?php

$descricao_radio=$_POST['descricao_radio'];
$modificar=$_POST['modificar'];

if($modificar!=NULL)

{

 $mod_radio="update radio set descricao_radio = '".$descricao_radio."';";

 $ok=mysql_query($mod_radio,$conn);

 if($ok==1)

 {

  echo "<script>alert('radio alterada com sucesso.');

  window.location='radio.php';</script>";

 }

}

?>

</body>

</html>

