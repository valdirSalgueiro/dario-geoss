<title>.::Deletar::.</title><?

session_start();

include('../estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}


$sql = mysql_query("DELETE FROM denuncia WHERE id_cmt = '".$_GET['id_cmt']."'") or die(mysql_error());

?>

<script>
document.location.href = 'exibir_denuncie.php?alerta=denuncie_deletado'
</script>

<? if ($_GET['alerta']=='denuncie_deletado') { ?> <script> alert('Mensagem deletada') </script> <? } ?>
