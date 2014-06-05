<?php

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

<h1><font face=verdana color='#ff9900'><b>Cadastrar Video:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td>T&iacute;tulo Video:</td>
  <td><input name=nome_video type=text class=botao id="nome_video" size=50 maxlength=80></td></tr>

<tr>
  <td>Descri&ccedil;&atilde;o Video: </td>
  <td><input name=desc_video type=text class=botao id="desc_video" size=50 maxlength=80></td>
</tr>

<tr>
  <td>Link Video : </td>
  <td><input name=link_video type=text class=botao id="link_video" size=50 maxlength=80></td>
</tr>
<tr>
  <td>Usu&aacute;rio</td>
  <td><?php echo $usuario_autenticado; ?></td>
</tr>
<tr>
  <td>Data: </td>
  <td><input name=data_cadastro type=text class=botao id="data_cadastro" value="<?phpecho $hoje;?>" size=12 maxlength=12></td>
</tr>

<tr>
  <td>Sobre o Video :</td><td>

<?php

$oFCKeditor = new FCKeditor('descricao_video');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Cadastrar ' class=botao></td></tr>
</table>

</form>

<?php

$nome_video=$_POST['nome_video'];
$desc_video=$_POST['desc_video'];
//$link_video=$_POST['link_video'];
$link_video= str_replace('watch?v=','v/',$_POST['link_video']);
$descricao_video=$_POST['descricao_video'];
$ativado=0;
$por=$_SESSION["usuario_autenticado"];

if(($nome_video!=NULL)and($desc_video!=NULL)and($descricao_video!=NULL)and($link_video!=NULL))

{

 $busca_video="select * from videos where nome_video = '".$nome_video."' AND link_video = '".$link_video."';";

 $res_busca_video=mysql_query($busca_video,$conn);

 $num_video=mysql_num_rows($res_busca_video);

 if($num_video==0)

 {

  
  $cad_video="insert into videos values ('','','".$nome_video."','".$desc_video."','".$link_video."','".$descricao_video."','".$ativado."','".$hoje."','".$hora."','".$por."','','','');";
 

  $ok=mysql_query($cad_video,$conn);

  if($ok==1)

  {

   $busca_video="select * from videos where nome_video = '".$nome_video."';";

   $res_busca_video=mysql_query($busca_video,$conn);

   $campo_video=mysql_fetch_array($res_busca_video);

      echo "<script>alert('O Video $nome_video foi cadastrado com sucesso.');
      window.location='cad_video.php';</script>";
  

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Video: $nome_video já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

