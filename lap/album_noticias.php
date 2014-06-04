<?php
session_start();

?>
<html>

<title>Album de fotos.</title>

<?

$codigo_noticia=$_GET['codigo_noticia'];

if($codigo_noticia!=NULL)

{

 echo "<frameset border='0' cols='230,*'>

 <frame src='menu_album_noticias.php?codigo_noticia=$codigo_noticia' name='menu_album' scrolling='auto'>

 <frame src='conteudo_album_noticias.php' name='conteudo_album' scrolling='auto'>

 </frameset>";

}

else

{

 echo "<script>alert('ERRO: As fotos não pode ser exibidas.');

 self.close();</script>";

}

?>

</html>

