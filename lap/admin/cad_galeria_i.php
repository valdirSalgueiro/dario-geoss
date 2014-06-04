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
 $hoje=date('d/m/Y');
 $hora=date('H:h');
 include('../conn.php');

 include('../data.php');


}

?>

<html><title>Untitled Document</title>

<link href="../estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Cadastrar Galeria de Fotos:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td>T&iacute;tulo Galeria:</td>
  <td><input name=nome_galeria type=text class=botao id="nome_galeria" size=50 maxlength=80></td></tr>


<tr>
  <td>Autor : </td>
  <td><input name=autor type=text class=botao id="autor" size=50 maxlength=80></td>
</tr>
<tr>
  <td>Data: </td>
  <td><input name=data_cadastro type=text class=botao id="data_cadastro" value="<?echo $hoje;?>" size=12 maxlength=12></td>
</tr>

<tr>
  <td>Descri&ccedil;&atilde;o Galeria :</td><td>

<?

$oFCKeditor = new FCKeditor('descricao_galeria');

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
$nome_galeria=$_POST['nome_galeria'];
$descricao_galeria=$_POST['descricao_galeria'];
$ativado=0;
$tipo="i";
$por=$_POST['autor'];

if(($nome_galeria!=NULL)and($descricao_galeria!=NULL))

{

 $busca_galeria="select * from galerias where nome_galeria = '".$nome_galeria."';";

 $res_busca_galeria=mysql_query($busca_galeria,$conn);

 $num_galeria=mysql_num_rows($res_busca_galeria);

 if($num_galeria==0)

 {

  
  $cad_galeria="insert into galerias values ('','','".$nome_galeria."','".$usuario_autenticado."','".$descricao_galeria."','".$ativado."','".$hoje."','".$hora."','".$por."','".$tipo."');";
  print 

  $ok=mysql_query($cad_galeria,$conn);

  if($ok==1)

  {

   $busca_galeria="select * from galerias where nome_galeria = '".$nome_galeria."';";

   $res_busca_galeria=mysql_query($busca_galeria,$conn);

   $campo_galeria=mysql_fetch_array($res_busca_galeria);

   echo "<script>window.location='cad_foto_galerias_i.php?codigo_galeria=$campo_galeria[codigo_galeria]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Galeria: $nome_galeria já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

