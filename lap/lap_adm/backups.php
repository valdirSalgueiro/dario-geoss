<?

session_start();

$cpf3 = $_SESSION['cpf2'];



$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

 include('data.php');

 include('estilo.css');

 include('fckeditor/fckeditor.php');
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/outrosite.jpg" width="50" height="50"> Backups:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><span class="por">Clique na imagem para baixar o backup solicitado.<br><br>As instruções são :<br><br> 1 - Ao abrir a página web com o backup, clique em arquivo, salvar como.<br>2 - Escolha uma pasta para guardar o arquivo e clique em salvar.<br>3 - Insira um CD virgem no gravador de CD e abra o programa para gravar o CD<br>4 - Jogue o arquivo no programa e clique em burn ou gravar. Aguarde<br>5 - Quando der a mensagem de sucesso, seu CD estará gravado.<br>Lembre-se de executar este procedimento de 2 em 2 dias. É crucial manter isto sempre atualizado.</span><br> 
<br>
<table border=1 bordercolor="#000000" class=fonte>

<? 	
//Buscando os BACKUPS
$consulta1 = mysql_query("SELECT * FROM backup order by id DESC") or die(mysql_error());  $i=0; 	while($mensagens = mysql_fetch_array($consulta1)){ 
$i++;
?>
<tr>
  <td width="174"><span class="style7"><? echo $mensagens['nome']; ?></span></td>
  <td width="318"><div align="center"><a href="<? echo $mensagens['caminho']; ?>" target="_blank"><img src="download.gif" width="50" height="50" border="0"></a></div></td>
</tr>
<? } ?>
</table>
</form>


</body>

</html>

