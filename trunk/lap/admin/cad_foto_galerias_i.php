<?php

session_start();

$num_file=10;

include('../estilo.css');

include('upload_foto.php');

$dir="galeria/";

$usuario_autenticado=$_SESSION["usuario_autenticado"];

$codigo_galeria=$_GET['codigo_galeria'];

if($codigo_galeria!=NULL)

{

 include('../conn.php');

 include('getimagesize.php');

 $busca_foto="select * from foto_galerias where codigo_galeria = '".$codigo_galeria."';";

 $res_busca_foto=mysql_query($busca_foto,$conn);

 $num_foto=mysql_num_rows($res_busca_foto);

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

<tr><td></td><td><input type=submit value=" Adicionar Foto " class=botao name=adiciona_foto ><input type=button value="FIM" class=botao onClick="window.location='../index.php';"></td></tr>

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

    $cad_foto="insert into foto_galerias values ('".$codigo_galeria."','','".$descricao_foto."','".$dimencao."','');";

    $ok_cad=mysql_query($cad_foto,$conn);

    move_uploaded_file($_FILES["upload$x"]['tmp_name'], $dir. $_FILES["upload$x"]["name"]);

    $arquivo=$_FILES["upload$x"]["name"];

    $ext=strstr($arquivo,'.');

    rename($dir. $_FILES["upload$x"]["name"], $dir.mysql_insert_id().$ext);

    if($ok_cad==1)

    {

     $mod_foto="update foto_galerias set foto = '".$dir.mysql_insert_id().$ext."' where codigo_foto = '".mysql_insert_id()."';";

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

  window.location='cad_foto_galerias_i.php?codigo_galeria=$codigo_galeria';</script>";

 }

}

?>

</body>

</html>


