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
<?php
	$sql = "SELECT * FROM historia";
	$res = $db->query( $sql );			
	$row = $res->fetch_assoc();	
	$imagem=base64_encode( $row['imagem'] );
	$texto=$row['texto'];
	$imagem="<img src='data:image/jpeg;base64,$imagem' width='315' height='425'>";
?>


<!-- MIOLO 02 -->





<!-- MIOLO 3 -->

<div id="geral-miolo3" class="geral-miolo3">

<div id="geral-conteudo-miolo3" class="geral-conteudo-miolo3">



<div id="box-geral-historia" class="box-geral-historia">

<div id="tit-historia" class="tit-historia">

	<div class="box-historia01">
    <div class="box-historia02">
    <div class="box-historia03"> HISTÓRIA DO CANDIDATO</div>
    	</div>
    	</div>

</div>

<div id="box-geral-historia2" class="box-geral-historia2">

<div id="foto-candidato-historia" class="foto-candidato-historia"><?php echo $imagem?></div>
<div id="conteudo-historia-candidato" class="conteudo-historia-candidato"><?php echo $texto?></div>



</div>
</div>

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
