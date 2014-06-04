<?

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 $busca_exp="select * from expediente;";

 $res_busca_exp=mysql_query($busca_exp,$conn);

 $num_exp=mysql_num_rows($res_busca_exp);

 if($num_exp==1)

 {

  $campo_exp=mysql_fetch_array($res_busca_exp);

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

<h1><font face=verdana color='#ff9900'><b>Modificar Expediente:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td><BR>

<?

$oFCKeditor = new FCKeditor('descricao');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_exp[descricao];

$oFCKeditor->Create();

?></td></tr>


<tr><td><input type=submit value=" Modificar " name=modificar class=botao></td></tr>
</table>

</form>

<?

$descricao=$_POST['descricao'];
$modificar=$_POST['modificar'];

if($modificar!=NULL)

{

 $mod_exp="update expediente set descricao = '".$descricao."';";

 $ok=mysql_query($mod_exp,$conn);

 if($ok==1)

 {

  echo "<script>alert('Expediente alterado com sucesso.');

  window.location='expediente.php';</script>";

 }

}

?>

</body>

</html>

