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

$dir="banner_noticias/";

$usuario_autenticado=$_SESSION["usuario_autenticado"];

$codigo_banner_noticias=$_SESSION["codigo_banner_noticias"];

if($usuario_autenticado!=NULL)

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

<h1><font face=verdana color='#ff9900'><b>Cadastrar Google Banner Not&iacute;cias :</b></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<?php

for($x=0;$x<$num_file;$x++)

{

 echo "<tr><td>Código do Google:</td><td><textarea name='descricao_foto' rows='5' cols='70'></textarea><BR></td></tr>";

 
 echo "</td></tr>";

}

?>

<tr>
  <td>Categoria : </td>
  <td><select name="codigo_categoria" class="botao">
    <?php

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
  </select></td>
</tr>
<tr><td></td><td><input type=submit value=" Adicionar" class=botao name=adiciona_foto >
<input type=button value="FIM" class=botao onClick="window.location='conteudo.php';"></td></tr>
</table>

</form>

<?php

$adiciona_foto=$_POST['adiciona_foto'];
$codigo_banner_noticias=$_POST['codigo_categoria'];

if($adiciona_foto!=NULL)

{

 $erro=3;

    $descricao_foto=$_POST["descricao_foto"];

    $dimencao='';

    $cad_foto="insert into foto_banner_noticias values ('".$codigo_banner_noticias."','','".$descricao_foto."','".$dimencao."','','google');";

    $ok_cad=mysql_query($cad_foto,$conn);

       if($ok_cad==1)

    {

     $mod_foto="update foto_banner_noticias set foto = '".$dir.mysql_insert_id().$ext."' where codigo_foto = '".mysql_insert_id()."';";

     $ok_mod=mysql_query($mod_foto,$conn);

     if($ok_mod)

     {

      $erro=0;

     }

   }

 if($erro==0)

 {

  echo "<script>alert('O código google foi adicionado com sucesso.');

  window.location='cad_google.php?codigo_banner_noticias=$codigo_banner_noticias';</script>";

 }

}
?>

</body>

</html>

