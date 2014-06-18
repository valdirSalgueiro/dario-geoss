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



<div id="box-geral-agenda" class="box-geral-agenda">

<div id="tit-agenda" class="tit-agenda">

	<div class="box-agenda01">
    <div class="box-agenda02">
    <div class="box-agenda03">AGENDA</div>
    	</div>
    	</div>

</div>


<div id="box-geral-agenda2" class="box-geral-agenda2">
  <div id="conteudo-agenda-candidato" class="conteudo-agenda-candidato">
    
	<?php
		$sql = "SELECT * FROM agenda";
		$res = $db->query( $sql );			
		while ( $row = $res->fetch_assoc() ) {
			$dia=$row['dia'];
			$id=$row['id'];
			$sql = "SELECT * FROM agenda_conteudo WHERE idx_agenda=$id";
			echo "<div id=\"tit_agenda\" class=\"tit_agenda\">$dia</div>";
			$res2 = $db->query( $sql );			
			echo "<div id=\"conteudo-agenda\" class=\"conteudo-agenda\">";
			while ( $row2 = $res2->fetch_assoc() ) {
				$hora=$row2['hora'];
				$conteudo=$row2['conteudo'];
				echo "
					<span class=\"hora_agenda\">$hora:</span> $conteudo<br/>					
				";
			}
			echo "</div>";
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
