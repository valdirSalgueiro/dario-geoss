<?php

session_start();
?>
<style>
.acesso { font-family:Arial; font-size:11px; font-weight:bold; color:#FFFFFF; }
.titulo { font-family:Arial; font-size:18px; font-weight:bold; color:#333333; }
.atributos_titulo { font-family:Arial; font-size:11px; font-weight:bold; color:#333333; }
.materia { font-family:Tahoma; font-size:11px; color:#2D2D2D; }
.arquivo { font-family:Arial; font-size:12px; font-weight:bold; color:#FFFFFF; }
.meses { font-family:Arial; font-size:11px; font-weight:bold; color:#F6F6F6; }
.por { font-family:Verdana; font-size:10px; font-weight:bold; color:#000000; }
.comentarios_italico { font-family:Tahoma; font-size:11px;  color:#333333; font-style:italic;}
.fonte_cinza { font-family:Arial; font-size:11px; color:#666666; }
.comentarios_responsabilidade { font-family:Verdana; font-size:11px; color:#666666; font-style:italic;}
.email_materia { font-family:Verdana; font-size:12px; font-weight:bold; color:#666666;}


a.l_meses:link    { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:visited { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:active  { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:hover   { text-decoration: none; background-color:#FFFFFF; color:#333333; font-size:11px; }

a.l_menu_materia:link    { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:visited { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:active  { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:hover   { text-decoration: none; background-color:#E9E9E9; color:#000000; font-size:11px; }

a.menu_principal:link    { text-decoration: none; color:#333333; font-size:11px;}
a.menu_principal:visited { text-decoration: none; color:#333333; font-size:11px;}
a.menu_principal:hover   { text-decoration: none; color:#000000; font-size:11px; font-weight:bold}
a.menu_principal:active  { text-decoration: none; color:#33333; font-size:11px;}
.style6 {


	font-size: 12px;



	font-weight: bold;



	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<?php
$num_file=1;

include('../estilo.css');

include('upload_foto.php');

$dir="foto_dia/";

$usuario_autenticado=$_SESSION["usuario_autenticado"];

$codigo_foto_dia=$_GET['codigo_foto_dia'];

if(($usuario_autenticado!=NULL)and($codigo_foto_dia!=NULL))

{

 include('../conn.php');

 include('getimagesize.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>

<form name='form1' method='post' enctype="multipart/form-data">

<h1><font face=verdana color='#ff9900'><b>Fotos:</b></h1><hr color=black size=2>

<table border=0 class=fonte>

<?php

for($x=0;$x<$num_file;$x++)

{

 echo "<tr><td>Foto:</td><td><input type=file name='upload$x' class=botao>";

 echo "<tr><td>Descrição:</td><td><input type=text name='descricao_foto$x' class=botao size=50 maxlength=100><BR></td></tr>";

 if(($num_foto==0)and($x==0))

 {

  echo "<font color=red>Foto Principal.</font>";

 }



 echo "</td></tr>";

}

?>

<tr><td></td><td><input type=submit value=" Adicionar Foto " class=botao name=adiciona_foto ><input type=button value="FIM" class=botao onClick="window.location='conteudo.php';"></td></tr>

</table>

</form>

<?php

$adiciona_foto=$_POST['adiciona_foto'];

if($adiciona_foto!=NULL)

{

 $erro=3;

 for($x=0;$x<$num_file;$x++)

 {

  if($_FILES["upload$x"]["name"]!=NULL)

  {

   if($_FILES["upload$x"]["size"]<500000)

   {

    $descricao_foto=$_POST["descricao_foto$x"];

    $up_foto=upload_foto($_FILES["upload$x"]["tmp_name"]);

    $dimencao=tamanho_img($up_foto);

    $cad_foto="insert into foto_foto_dia values ('".$codigo_foto_dia."','','".$descricao_foto."','".$dimencao."','');";

    $ok_cad=mysql_query($cad_foto,$conn);

    move_uploaded_file($_FILES["upload$x"]['tmp_name'], $dir. $_FILES["upload$x"]["name"]);

    $arquivo=$_FILES["upload$x"]["name"];

    $ext=strstr($arquivo,'.');

    rename($dir. $_FILES["upload$x"]["name"], $dir.mysql_insert_id().$ext);

    if($ok_cad==1)

    {

     $mod_foto="update foto_foto_dia set foto = '".$dir.mysql_insert_id().$ext."' where codigo_foto = '".mysql_insert_id()."';";

     $ok_mod=mysql_query($mod_foto,$conn);

     if($ok_mod)

     {

      $erro=0;

     }

     else

     {

      $erro=1;

      echo "ERRO foto ". $x + 1 .":".mysql_error($conn).".";

      break;

     }

    }

    else

    {

     $erro=1;

     echo "ERRO:".mysql_error($conn).".";

     break;

    }

   }

   else

   {

    $erro=2;

    echo "<script>alert('ERRO foto ". $x + 1 .": O arquivo é maior que 500 Kb.');</script>";

    break;

   }

  }

 }

 if($erro==0)

 {

  echo "<script>alert('A foto foi adicionada com sucesso.');

  window.location='cad_foto_foto_dia.php?codigo_foto_dia=$codigo_foto_dia';</script>";

 }

}
?>

</body>

</html>

