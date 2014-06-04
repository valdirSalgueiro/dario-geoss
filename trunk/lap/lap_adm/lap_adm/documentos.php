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

<h1 class="style3"><font face=verdana><img src="images/outrosite.jpg" width="50" height="50"> Documentos:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><span class="por">Clique na imagem para abrir no formato desejado</span><br>
<br> 
<br>
<table border=1 bordercolor="#000000" class=fonte>


<tr>
  <td width="174"><span class="style7">Recomenda&ccedil;&otilde;es</span></td>
  <td width="318"><div align="center"><a href="recomendacoes_coposcopia.doc"><img src="images/icone_word.gif" width="30" height="30" border="0"></a></div></td>
</tr>
</table>
</form>

<?

$codigo=$_POST['codigo'];
$descricao=$_POST['descricao'];


if(($codigo!=NULL)and($descricao!=NULL))

{

 $busca_cod="select * from achados_colposcopicos where codigo = '".$codigo."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $num_cod=mysql_num_rows($res_busca_cod);

 if($num_cod==0)

 {


  $cad_cod="insert into achados_colposcopicos values ('','".$codigo."','".$descricao."');";

  $ok=mysql_query($cad_cod,$conn);

  if($ok==1)

  {

   $busca_cod2="select * from achados_colposcopicos where codigo = '".$codigo."';";
   $res_busca_cod2=mysql_query($busca_cod2,$conn);
   $campo_cod2=mysql_fetch_array($res_busca_cod2);

 echo "<script>alert('Achado Colposcopico Cadastrado.');window.location='cad_achados.php?id=$campo_cod2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Achado Colposcopico: $codigo já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

