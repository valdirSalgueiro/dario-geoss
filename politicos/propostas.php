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



<div id="box-geral-propostas" class="box-geral-propostas">

<div id="tit-propostas" class="tit-propostas">

	<div class="box-propostas01">
    <div class="box-propostas02">
    <div class="box-propostas03">PROPOSTAS</div>
    	</div>
    	</div>

</div>


<div id="box-geral-propostas2" class="box-geral-propostas2">
  <div id="conteudo-propostas-candidato" class="conteudo-propostas-candidato">
    		<?php
			$sql = "SELECT * FROM propostas";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$titulo=$row['titulo'];
				$conteudo=$row['conteudo'];
				echo "
					<div id=\"tit_proposta\" class=\"tit_proposta\">$titulo</div>
					<div id=\"conteudo-proposta\" class=\"conteudo-proposta\">$conteudo</div>					
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



<!-- NOTÍCIAS PARTIDO -->





<div style="clear: both;"></div>


<div id="separa-footer" class="separa-miolo-footer"></div>


<?php require_once('inc/inc_footer.php'); ?>

</body>
</html>
