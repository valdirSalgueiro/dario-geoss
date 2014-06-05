<?php

session_start();

include('../estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

$codigo_galeria=$_GET['codigo_galeria'];

if(($usuario_autenticado!=NULL)and($codigo_galeria!=NULL))

{

 include('../conn.php');

 include('../data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>

<body background="imagens/LOGEMAIL.JPG">

<h1><font face=verdana color='#ff9900'><b>Fotos.</b></font></h1><hr color=black size=2>

<form name=remover method=post>

<table border=0 class=fonte>

<?php

$busca_foto="select * from foto_galerias where codigo_galeria = '".$codigo_galeria."' order by codigo_foto asc;";

$res_busca_foto=mysql_query($busca_foto,$conn);

$num_foto=mysql_num_rows($res_busca_foto);

$coluna=5;

$count=0;

$linha=$num_foto/$coluna;

for($x=0;$x<$linha;$x++)

{

 echo "<tr>";

 for($y=0;$y<$coluna;$y++)

 {

  echo "<td>";

  $campo_foto=mysql_fetch_array($res_busca_foto);

  if($campo_foto[codigo_foto]!=NULL)

  {

   printf("<img src='$campo_foto[foto]' $campo_foto[dimencao]=100><br>");

   printf("<input type=checkbox name='foto$count' value='$campo_foto[codigo_foto]'>Remover");

   $count++;

  }

  echo "</td>";

 }

 echo "</tr>";

}

?>

</table>

<?php

echo "<input type=submit value=' Ok ' class=botao name='ok'>";

?>

</form>

<form name=add method=post enctype="multipart/form-data">

<table border=0>

<tr><td></td><td><input type=button class=botao value=" Adicionar Foto " onClick="window.location='cad_foto_galerias.php?codigo_galeria=<?phpecho $codigo_galeria;?>';"><input type=button value="FIM" class=botao onClick="window.location='conteudo.php';"></td></tr>

</table>

</form>

<?php

$ok=$_POST['ok'];

if($ok!=NULL)

{

 $del_foto="delete from foto_galerias where";

 for($x=0;$x<$num_foto;$x++)

 {

  $foto[$x]=$_POST["foto$x"];

  if($foto[$x]!=NULL)

  {

   $del_foto.=$or." codigo_foto = '".$foto[$x]."'";

   $or=" or";

   //descobrir função para apagar imagem.

  }

 }

 $del_foto.=";";

 $ok_del=mysql_query($del_foto,$conn);

 if($ok_del!=1)

 {

  echo "ERRO:".mysql_error($conn).".";

 }

 else

 {

  echo "<script>window.location='mod_foto_galerias.php?codigo_galeria=$codigo_galeria';</script>";

 }

}

?>

</body>

</html>

