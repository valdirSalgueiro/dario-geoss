<?php
session_start();

?>
<html>

<title>Album de fotos.</title>

<?

$codigo_galeria=$_GET['codigo_galeria'];

if($codigo_galeria!=NULL)

{

 echo "<frameset border='0' cols='230,*'>

 <frame src='menu_album_galerias.php?codigo_galeria=$codigo_galeria' name='menu_album' scrolling='auto'>

 <frame src='conteudo_album_galerias.php?codigo_galeria=$codigo_galeria' name='conteudo_album' scrolling='auto'>

 </frameset>";

}

else

{

 echo "<script>alert('ERRO: As fotos não pode ser exibidas.');

 self.close();</script>";

}

?>

</html>

