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



<div id="box-geral-galeria-interna" class="box-geral-galeria-interna">

<div id="tit-galeria-interna" class="tit-galeria-interna">

	<div class="box-galeria-interna01">
    <div class="box-galeria-interna02">
    <div class="box-galeria-interna03">GALERIA</div>
    	</div>
    	</div>

</div>


<div id="box-geral-galeria-interna2" class="box-geral-galeria-interna2">
	<div id="conteudo-galeria" class="conteudo-galeria">
    <?php
			$sql = "SELECT * FROM galeria";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$imagem=base64_encode( $row['imagem'] );
				$imagem="<img src='data:image/jpeg;base64,$imagem' width='95' height='95'>";
				echo "	
					<div id=\"foto-galeria-interna\" class=\"foto-galeria-interna\">$imagem</div>
				";
			}
	?>  

	</div>
</div>




</div>

<!-- termina DIV CLASS geral-conteudo-miolo3 -->
</div>
<!-- termina DIV CLASS geral-miolo3 -->
</div>

<?php require_once('inc/inc_footer.php'); ?>

</body>
</html>
