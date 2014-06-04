<?

session_start();

include('estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

 $rem_usu="delete from foto_exames where codigo_foto = '".$_GET[codigo_foto]."';";

 $ok=mysql_query($rem_usu,$conn);

 if($ok==1)

 {

  printf("<script>alert('Exclusão realizada');

  window.location='cad_foto_exame.php?id=$_GET[id]'</script>");

 }
?>

