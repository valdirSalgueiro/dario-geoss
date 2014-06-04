<?

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

$sql = mysql_query("DELETE FROM agendamentos WHERE id = '".$_GET['id']."'") or die(mysql_error());
  printf("<script>alert('Excluido.');
   window.location='agendados.php';</script>");
?>

