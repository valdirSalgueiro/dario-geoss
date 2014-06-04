<?

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["userfaq_autenticado"];

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

<html><title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>

<link href="../estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Cadastrar Not&iacute;cia:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td>Nome Autor </td>
  <td><input name=por type=text class=botao id="por" size=50></td>
</tr>
<tr>
  <td>Lingua: </td>
  <td><select name="pais" id="pais">
    <option value="Brazil">Brazil</option>
    <option value="eng">English</option>
    <option value="esp">Spanish</option>
  </select></td>
</tr>
<tr><td>Nome Categoria: </td><td><select name=codigo_categoria class=botao>

<?

$busca_categoria="select * from categorias order by nome_categoria asc;";

$res_busca_categoria=mysql_query($busca_categoria,$conn);

$num_categoria=mysql_num_rows($res_busca_categoria);

if($num_categoria>0)

{

 for($x=0;$x<$num_categoria;$x++)

 {

  $campo_categoria=mysql_fetch_array($res_busca_categoria);

  echo "<option value='$campo_categoria[codigo_categoria]'>$campo_categoria[nome_categoria]</option>";

 }

}

else

{

 echo "<option value=''>Nenhuma categoria cadastrada.</option>";

}

?>

</select></td></tr>

<tr>
  <td>T&iacute;tulo Not&iacute;cia:</td>
  <td><input name=nome_noticia type=text class=botao id="nome_noticia" size=50></td></tr>

<tr>
  <td>Descri&ccedil;&atilde;o Not&iacute;cia: </td>
  <td><input name=desc_not type=text class=botao id="desc_not" size=50></td>
</tr>

<tr>
  <td>Data: </td>
  <td><input name=data_cadastro type=text class=botao id="data_cadastro" value="<?echo $hoje;?>" size=12 maxlength=12></td>
</tr>

<tr>
  <td>Not&iacute;cia:</td>
  <td>

<?

$oFCKeditor = new FCKeditor('descricao_noticia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?></td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Cadastrar ' class=botao></td></tr>
</table>

</form>

<?

$codigo_categoria=$_POST['codigo_categoria'];
$nome_noticia=$_POST['nome_noticia'];
$desc_not=$_POST['desc_not'];
$por=$_POST['por'];
$pais=$_POST['pais'];
$descricao_noticia=$_POST['descricao_noticia'];
$ativado=1;

if(($nome_noticia!=NULL)and($desc_not!=NULL)and($por!=NULL)and($descricao_noticia!=NULL)and($codigo_categoria!=NULL))

{

 $busca_noticia="select * from noticias where nome_noticia = '".$nome_noticia."';";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $num_noticia=mysql_num_rows($res_busca_noticia);

 if($num_noticia==0)

 {

  
  $cad_noticia="insert into noticias values ('','".$codigo_categoria."','".$pais."','','','".$nome_noticia."','".$desc_not."','".$descricao_noticia."','".$ativado."','".$hoje."','".$hora."','".$por."','','','');";
 

  $ok=mysql_query($cad_noticia,$conn);

  if($ok==1)

  {

   $busca_noticia="select * from noticias where nome_noticia = '".$nome_noticia."';";

   $res_busca_noticia=mysql_query($busca_noticia,$conn);

   $campo_noticia=mysql_fetch_array($res_busca_noticia);

   echo "<script>window.location='cad_foto_materias.php?codigo_noticia=$campo_noticia[codigo_noticia]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Notícia: $nome_noticia já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

