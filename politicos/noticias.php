<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=1260">
<link rel="stylesheet" href="css/estilos.css" />
<link rel="stylesheet" href="css/estilo_internas.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<title></title>
</head>

<body>

<?php require_once('inc/inc_menu.php'); ?>


<!-- MIOLO 02 -->


<div id="geral-miolo3" class="geral-miolo3">

<div id="geral-conteudo-miolo3" class="geral-conteudo-miolo3">



<div id="box-geral-noticias" class="box-geral-noticias">

<div id="tit-noticias" class="tit-noticias">

	<div class="box-noticias01">
    <div class="box-noticias02">
    <div class="box-noticias03">NOTÍCIAS</div>
    	</div>
    	</div>

</div>


<div id="box-geral-noticias2" class="box-geral-noticias2">
  <div id="conteudo-noticias-candidato" class="conteudo-noticias-candidato">
    
	<?php
			$sql = "SELECT * FROM noticias";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$titulo=$row['titulo'];
				$imagem=base64_encode( $row['imagem'] );
				$imagem="<img src='data:image/jpeg;base64,$imagem' width='315' height='259'>";
				$data=$row['data'];
				$texto=$row['texto'];
				echo "	
					<div id=\"tit_noticias\" class=\"tit_noticias\">$titulo</div>
					<div id=\"tit_noticias\" class=\"data_noticias\">$data</div>
				    <div id=\"conteudo-noticias\" class=\"conteudo-noticias\">$texto<br /><br />
					<div id=\"imagem_noticia\" class=\"imagem_noticia\">$imagem</div>
				";
			}
	?>
    

    
    
    
    

</div>	


</div>



</div>
</div>
<div id="btn_noticias_antigas" class="btn_noticias_antigas"><a href="#"><img src="images/noticias/btn_noticias_antigas.png" width="352" height="42" /></a></div>
<div id="btn_noticias_recentes" class="btn_noticias_recentes"><a href="#"><img src="images/noticias/btn_noticias_recentes.png" width="352" height="42" /></a></div>


<!-- termina DIV CLASS geral-conteudo-miolo3 -->
</div>
<!-- termina DIV CLASS geral-miolo3 -->
</div>



<!-- NOTÍCIAS PARTIDO -->







<div style="clear: both;"></div>


<div id="separa-footer" class="separa-miolo-footer"></div>


<?php require_once('inc/inc_footer.php'); ?>

</body>
</html>
