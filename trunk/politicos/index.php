<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=1260">
<link rel="stylesheet" href="css/estilos.css" />
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true
			});
		});	
	</script>

<title></title>
</head>

<body>

<?php require_once('inc/inc_menu.php'); ?>

<div id="container-slide" class="container-slide">
  <div id="slide" class="slide"> 
    
    <!-- SLIDE SHOW --> 
    
    <?php echo $full_banner?>
    
    <!-- TEXTO SLIDE SHOW -->
    
   
  </div>
</div>

<!-- MIOLO 02 -->

<section id="miolo02" class="container-miolo02">

  <div id="conteudo01" class="conteudo01">
    <div id="separa" class="separa-miolo01"></div>
    <div id="slide-noticias" class="slide-noticia">
    
    
    <div id="content">
	
		<div id="slider">
			<ul>				
			<?php
			$sql = "SELECT * FROM noticiasgeral";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$titulo=$row['titulo'];
				$imagem=base64_encode( $row['imagem'] );
				$imagem="<img src='data:image/jpeg;base64,$imagem' width='480' height='320'>";
				$chamada=$row['chamada'];
				echo "
				<li>
				  <div id=\"box-imagem-noticia\" class=\"box-imagem-noticia\">
					<div id=\"imagem-noticia\" class=\"imagem-noticia\"> $imagem </div>
				  </div>
				  <div id=\"box-noticia\" class=\"box-noticia\">
					<div id=\"titulo-noticia\" class=\"tit-noticia\">$titulo</div>
					<div id=\"chamada-noticia\" class=\"chamada-noticia\"> $chamada </div>
					<div class=\"box-01\">
					  <div class=\"box-02\">
						<div class=\"box-03 link-leia-mais\"> <a href=\"#\">LEIA MAIS</a> </div>
					  </div>
					</div>
				  </div>
					</li>
					";
				//$dias[$row['idx_dia']]=$row['total'];
			}
			?>				
			</ul>
		</div>
	</div>
    
    
      
      
    </div>
  </div>
</section>



<!-- MIOLO 3 -->

<div id="geral-miolo3" class="geral-miolo3">

<div id="geral-conteudo-miolo3" class="geral-conteudo-miolo3">



<div id="box-geral-galeria " class="box-geral-galeria ">

<div id="tit-galeria" class="tit-galeria">

	<div class="box-galeria01">
    <div class="box-galeria02">
    <div class="box-galeria03"> GALERIA DE FOTOS</div>
    	</div>
    	</div>

</div>

<div id="box-geral-galeria2" class="box-geral-galeria2">

			<?php
			$sql = "SELECT * FROM galeria";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$imagem=base64_encode( $row['imagem'] );
				$imagem="<img src='data:image/jpeg;base64,$imagem' width='95' height='95'>";
				echo "
				<div id=\"foto-galeria\" class=\"foto-galeria\">$imagem</div>
				";
			}
			?>

<div class="alinhamento-box-galeria-fotos">
		<div class="box-leia-mais-galeria-fotos01">
        <div class="box-leia-mais-galeria-fotos02">
        <div class="box-leia-mais-galeria-fotos03 link-leia-mais"> <a href="#">LEIA MAIS</a> </div>
       	  </div>
       	</div>
	  </div>

</div>
</div>

<div id="separa-miolo03" class="separa-miolo03">&nbsp;</div>




<div id="box-geral-noticia-partido" class="box-geral-noticia-partido">

<div id="tit-galeria" class="tit-galeria">

	<div class="box-noticia-partido01">
    <div class="box-noticia-partido02">
    <div class="box-noticia-partido03">NOTÍCIAS DO PARTIDO</div>
    	</div>
    	</div>

<div id="box-geral-noticia-partido2" class="box-geral-noticia-partido2">

			<?php
			$sql = "SELECT * FROM noticiaspartido";
			$res = $db->query( $sql );			
			while ( $row = $res->fetch_assoc() ) {
				$data=$row['data'];
				$titulo=$row['titulo'];
				$imagem=base64_encode( $row['imagem'] );
				$imagem="<img src='data:image/jpeg;base64,$imagem' width='80' height='60'>";
				echo "
				<div id=\"foto-chamada-noticia-partido\" class=\"foto-chamada-noticia-partido\">$imagem</div>
				<div id=\"data-chamada-noticia-partido\" class=\"data-chamada-noticia-partido\">$data</div>
				<div id=\"chamada-noticia-partido\" class=\"chamada-noticia-partido\">$titulo</div>
				<div id=\"linha-separa-noticia-partido\" class=\"linha-separa-noticia-partido\"></div>";
			}
			?>



		<div class="alinhamento-box-noticia-partido2">
		<div class="box-leia-mais-noticia-partido01">
        <div class="box-leia-mais-noticia-partido02">
        <div class="box-leia-mais-noticia-partido03 link-leia-mais"> <a href="#">LEIA MAIS</a> </div>
       		</div>
       		</div>
	  		</div>


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
