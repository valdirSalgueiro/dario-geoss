<?

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_noticia=$_GET['codigo_noticia'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_noticia!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_noticia="select * from noticias where codigo_noticia = '".$codigo_noticia."';";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $campo_noticia=mysql_fetch_array($res_busca_noticia);

 echo mysql_error($conn);

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">

<body class=fonte>

<form name=form1 method=post>

<input type=hidden name=nome_antigo value="<?echo $campo_noticia[nome_noticia];?>">

<h1><font face=verdana color='#ff9900'><b>Modificar Not&iacute;cia:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td width="147">Nome Categoria: </td><td width="405"><select name=codigo_categoria class=botao>

<?

$busca_categoria="select * from categorias order by nome_categoria asc;";

$res_busca_categoria=mysql_query($busca_categoria,$conn);

$num_categoria=mysql_num_rows($res_busca_categoria);

if($num_categoria>0)

{

 for($x=0;$x<$num_categoria;$x++)

 {

  $campo_categoria=mysql_fetch_array($res_busca_categoria);

  if($campo_categoria[codigo_categoria]==$campo_produto[codigo_categoria])

  {

   $selected="selected";

  }

  else

  {

   $selected="";

  }

  echo "<option value='$campo_categoria[codigo_categoria]' $selected>$campo_categoria[nome_categoria]</option>";

 }

}

else

{

 echo "<option value=''>Nenhuma categoria cadastrada.</option>";

}

?>

</select></td></tr>
<tr>
  <td>Lingua: </td>
  <td><select name="pais" class="botaofifa" id="pais">
    <option value="Brazil">Brazil</option>
    <option value="eng">English</option>
    <option value="esp">Spanish</option>
  </select></td>
</tr>

<tr>
  <td>T&iacute;tulo Not&iacute;cia:</td><td><input name=nome_noticia type=text class=botao id="nome_noticia" value="<?echo $campo_noticia[nome_noticia];?>" size=50 maxlength=100></td></tr>

<tr>
  <td>Descri&ccedil;&atilde;o Not&iacute;cia : </td>
  <td><input name=desc_not type=text class=botao id="desc_not" value="<?echo $campo_noticia[desc_not];?>" size=50 maxlength=100></td>
</tr>

<tr>
  <td>Data Entrada : </td>
  <td><?
  $tempo=date("d-n-Y-H:i",$campo_noticia['data_entrada']);
  if($campo_noticia['data_entrada']=='0'){
  print "A notícia já está no ar."; } else {
  print $tempo;
  }
  ?></td>
</tr>
<tr>
  <td>Not&iacute;cia:</td><td>

<?

$oFCKeditor = new FCKeditor('descricao_noticia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_noticia['descricao_noticia'];

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao><input type=button value=" Foto " class=botao onClick="window.location='mod_foto_noticias.php?codigo_noticia=<?echo $campo_noticia[codigo_noticia];?>';"></td></tr>
</table>

</form>

<?
$codigo_categoria=$_POST['codigo_categoria'];
$nome_antigo=$_POST['nome_noticia'];
$nome_noticia=$_POST['nome_noticia'];
$desc_not=$_POST['desc_not'];
$pais=$_POST['pais'];
$descricao_noticia=$_POST['descricao_noticia'];

if(($nome_antigo!=NULL)or($nome_noticia!=NULL)or($desc_not!=NULL)or($descricao_noticia!=NULL))

{

 if($nome_noticia!=$nome_antigo)

 {

  $busca_noticia="select * from noticias where nome_noticia = '".$nome_noticia."';";

  $res_busca_noticia=mysql_query($busca_noticia,$conn);

  $num_noticia=mysql_num_rows($res_busca_noticia);

  if($num_noticia>0)

  {

   $igual=1;

  }

  else

  {

   $igual=0;

  }

 }

 else

 {

  $igual=0;

 }

 if($igual==0)

 {

 

  $mod_noticia = "update noticias set nome_noticia = '".$nome_noticia."',pais = '".$pais."',desc_not = '".$desc_not."',descricao_noticia = '".$descricao_noticia."', codigo_categoria = '".$codigo_categoria."' where codigo_noticia = '".$codigo_noticia."';";
  
  $ok=mysql_query($mod_noticia,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Notícia $nome_noticia foi alterada com sucesso.');

   window.location='mod_noticia2.php?codigo_noticia=$codigo_noticia';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A notícia: $nome_noticia já existe.');</script>";

 }

}

?>

</body>

</html>

