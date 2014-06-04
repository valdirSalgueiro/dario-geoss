<?
session_start();
include('../estilo.css');
$codigo_categoria=$_GET['codigo_categoria'];
$usuario_autenticado=$_SESSION["usuario_autenticado"];
if(($usuario_autenticado!=NULL)and($codigo_categoria!=NULL))
{
 include('../conn.php');
 $busca_categoria="select * from categorias where codigo_categoria = '".$codigo_categoria."'";
 $res_busca_categoria=mysql_query($busca_categoria,$conn);
 $campo_categoria=mysql_fetch_array($res_busca_categoria);
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
<input type=hidden name='codigo_categoria2' value="<?echo $codigo_categoria;?>">
<h1><font face=verdana color='#ff9900'><b>Remover Categoria</b></font></h1><hr color=black size=2>
<BR>Deseja realmente remover a categoria <b><?echo $campo_categoria[nome_categoria];?> ?</b>
<table border=0 class=fonte>
<tr><td width=200><input type=submit value=' Remover ' name=remover class=botao></td><td><input type=button value=' Cancelar ' class=botao onclick="window.location='rem_categoria.php';"></td></tr>
</table>
</form>
<?
$codigo_categoria2=$_POST['codigo_categoria2'];
$remover=$_POST['remover'];
if(($codigo_categoria2!=NULL)and($remover!=NULL))
{
 $rem_categoria="delete from categorias where codigo_categoria = '".$codigo_categoria2."';";
 $ok=mysql_query($rem_categoria,$conn);
 if($ok==1)
 {
  echo "<script>alert('Categoria removida com sucesso.');
  window.location='rem_categoria.php';</script>";
 }
 else
 {
  echo "ERRO:".mysql_error($conn).".";
 }
}
?>
</body>
</html>
