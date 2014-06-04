<?

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 $hoje=date('d/m/Y');
 $hora=date('H:h');
 include('../conn.php');

 include('../data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html><title>Untitled Document</title>

<link href="../estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Cadastrar Foto do Dia:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td>T&iacute;tulo Foto do Dia:</td>
  <td><input name=nome_foto_dia type=text class=botao id="nome_foto_dia" size=50 maxlength=80></td></tr>


<tr>
  <td>Data: </td>
  <td><input name=data_cadastro type=text class=botao id="data_cadastro" value="<?echo $hoje;?>" size=12 maxlength=12></td>
</tr>

<tr>
  <td>Descri&ccedil;&atilde;o Foto do Dia:</td>
  <td>

<?

$oFCKeditor = new FCKeditor('descricao_foto_dia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Cadastrar ' class=botao></td></tr>
</table>

</form>

<?
$nome_foto_dia=$_POST['nome_foto_dia'];
$descricao_foto_dia=$_POST['descricao_foto_dia'];
$ativado=0;
$por=$_SESSION["usuario_autenticado"];

if(($nome_foto_dia!=NULL)and($descricao_foto_dia!=NULL))

{

 $busca_foto_dia="select * from foto_dia where nome_foto_dia = '".$nome_foto_dia."';";

 $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

 $num_foto_dia=mysql_num_rows($res_busca_foto_dia);

 if($num_foto_dia==0)

 {

  
  $cad_foto_dia="insert into foto_dia values ('','','".$nome_foto_dia."','".$descricao_foto_dia."','".$ativado."','".$hoje."','".$hora."','".$por."');";
  print 

  $ok=mysql_query($cad_foto_dia,$conn);

  if($ok==1)

  {

   $busca_foto_dia="select * from foto_dia where nome_foto_dia = '".$nome_foto_dia."';";

   $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

   $campo_foto_dia=mysql_fetch_array($res_busca_foto_dia);

   echo "<script>window.location='cad_foto_foto_dia.php?codigo_foto_dia=$campo_foto_dia[codigo_foto_dia]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A foto_dia: $nome_foto_dia já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

