<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 $busca_links="select * from links;";

 $res_busca_links=mysql_query($busca_links,$conn);

 $num_links=mysql_num_rows($res_busca_links);

 if($num_links==1)

 {

  $campo_links=mysql_fetch_array($res_busca_links);

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

<h1><font face=verdana color='#ff9900'><b>Modificar Links:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td><BR>

<?php

$oFCKeditor = new FCKeditor('descricao_links');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_links[descricao_links];

$oFCKeditor->Create();

?></td></tr>


<tr><td><input type=submit value=" Modificar " name=modificar class=botao></td></tr>
</table>

</form>

<?php

$descricao_links=$_POST['descricao_links'];
$modificar=$_POST['modificar'];

if($modificar!=NULL)

{

 $mod_links="update links set descricao_links = '".$descricao_links."';";

 $ok=mysql_query($mod_links,$conn);

 if($ok==1)

 {

  echo "<script>alert('Links alterados com sucesso.');

  window.location='links.php';</script>";

 }

}

?>

</body>

</html>

