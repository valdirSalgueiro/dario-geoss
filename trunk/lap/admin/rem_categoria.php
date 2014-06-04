<?

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

?>

<html>

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Remover Categoria</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>
<p>
  <?
$consulta = mysql_query("SELECT * FROM categorias order by codigo_categoria") or die(mysql_error());
  ?>
  </p>
  <table width="235" border="0" cellpadding="2" cellspacing="2" class="boldamarelo">
  <? 	while($mensagens = mysql_fetch_array($consulta)){   ?>
</p>
<form name="formUsuarios" action="" method="post" id="formUsuarios">
  <tr>
  
    <td width="56" bgcolor="#DBDAF8"><span class="style1">Código Categoria</span></td>
    <td width="161" bgcolor="#E2E2E2"><? echo $mensagens['codigo_categoria']; ?></td>
	
  </tr>
  <tr>

    <td bgcolor="#DEDBFF"><span class="style1">Nome Categoria</span></td>
    <td bgcolor="#E7E3E7"><? echo $mensagens['nome_categoria']; ?></td>
	
	</td>
  <tr>
    <td colspan="2"><div align="right">
     <input name="id_mensagem" id="is_mensagem" type="hidden" value="<?=$mensagens['codigo_categoria']; ?>">
     <input name="deletar" type="button" class="botao" id="deletar" value="Deletar" onClick="javascript:location.href = 'deletar_categoria.php?codigo_categoria=<?=$mensagens['codigo_categoria']; ?>'" />
     
	 	
 
</form>

  <tr>
    <td colspan="2"></td>
  </tr>

<? } ?>
</table>
<? if ($_GET['alerta']=='categoria_deletada') { ?> <script> alert('Categoria deletada') </script> <? } ?>
</body>
</html>
