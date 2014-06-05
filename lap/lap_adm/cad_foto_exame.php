<?php

session_start();

$num_file=3;

$dir="imagem/";



$usuario_autenticado=$_SESSION["usuario_autenticado"];

$id=$_GET['id'];

if(($usuario_autenticado!=NULL)and($id!=NULL))

{

 include('conn.php');
 
 include('estiloc.css');

 include('getimagesize.php');

 include('upload_foto.php');

 $busca_foto="select * from foto_exames where id = '".$id."';";

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
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
-->
</style>


<form name='form1' method='post' enctype="multipart/form-data">

<h1><font face=verdana color='#ff9900'><span class="style1">Fotos:</span></h1>
<hr color=black size=2>
<?php
//FOTOS DO EXAME
          

	  $busca_propaganda= "SELECT * FROM foto_exames where id='".$id."' order by codigo_foto ASC;";
        $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
        $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=3;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=3;



          }



          echo "<table border=0 class=fonte width=600 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[id]!=NULL)



            {


           
echo "<br><br><center><img src=$campo_propaganda[foto] name=PictureBox width=100 height=100 border=0><BR>";

             echo "<font size=1 class='materia' color=black><a href=rem_foto.php?id=$_GET[id]&&codigo_foto=$campo_propaganda[codigo_foto]>Remover Foto</a></font>



            ";



             echo "</center></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
<table border=0 class=fonte>

<?php

for($x=0;$x<$num_file;$x++)

{

 echo "<tr><td>Foto:</td><td><input type=file name='upload$x' class=botao>";

 echo "<tr><td>Descrição:</td><td><input type=text name='descricao_foto$x' class=botao size=50 maxlength=100><BR></td></tr>";

 if(($num_foto==0)and($x==0))

 {

  //echo "<font color=red>Foto Principal.</font>";

 }



 echo "</td></tr>";

}

?>

<tr><td></td><td><input type=submit value=" Adicionar Foto " class=botao name=adiciona_foto ><input type=button value="FIM" class=botao onClick="window.location='conteudo.php';">
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

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

   if($_FILES["upload$x"]["size"]<5000000)

   {

    $descricao_foto=$_POST["descricao_foto$x"];

    $up_foto=upload_foto($_FILES["upload$x"]["tmp_name"]);

    $dimencao=tamanho_img($up_foto);

    $cad_foto="insert into foto_exames values ('".$id."','','".$descricao_foto."','".$dimencao."','');";

    $ok_cad=mysql_query($cad_foto,$conn);

    move_uploaded_file($_FILES["upload$x"]['tmp_name'], $dir. $_FILES["upload$x"]["name"]);

    $arquivo=$_FILES["upload$x"]["name"];

    $ext=strstr($arquivo,'.');

    rename($dir. $_FILES["upload$x"]["name"], $dir.mysql_insert_id().$ext);

    if($ok_cad==1)

    {

     $mod_foto="update foto_exames set foto = '".$dir.mysql_insert_id().$ext."' where codigo_foto = '".mysql_insert_id()."';";

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

    echo "<script>alert('ERRO foto ". $x + 1 .": O arquivo é maior que 5000 Kb.');</script>";

    break;

   }

  }

 }

 if($erro==0)

 {

  echo "<script>alert('A foto foi adicionada com sucesso.');

  window.location='cad_foto_exame.php?id=$id';</script>";

 }

}

?>

</body>

</html>

