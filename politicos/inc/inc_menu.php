<?php
	include_once("admin/class.database.php");
	$db = Database::getConnection();
	$sql = "SELECT * FROM config";
	$res = $db->query( $sql );			
	$row = $res->fetch_assoc();	
	$logomarca=base64_encode( $row['logomarca'] );
	$full_banner=base64_encode( $row['full_banner'] );
	$logomarca="<img src='data:image/jpeg;base64,$logomarca' width='281' height='45' border='0'>";
	$full_banner="<img src='data:image/jpeg;base64,$full_banner' width='1024' height='400'>";
?>

<style type="text/css">
@import url("../css/estilos.css");
</style>
<div id="topo"> 
  
  <!-- Barra Header Red -->
  <div id="barra_header_cor" class="cor-partido-01" style="margin:auto">
    <div id="container" class="container-topo"> 
      <!-- Logomarca do Partido -->
      <div id="logo" class="logo">
        <div id="logo-align" class="logo-align"> <a href="index.php"><?php echo $logomarca?></a> </div>
      </div>
      
      <!-- MENU PADRÃO -->
      <div id="alinhamento-menu" class="alinhamento-menu">
        <div id="menu">
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-home.png" width="39" height="36" /></div>
            <a href="historia.php">HISTÓRIA</a></div>
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-propostas.png" width="39" height="36" /></div>
            <a href="propostas.php">PROPOSTAS</a></div>
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-noticias.png" width="39" height="36" /></div>
            <a href="noticias.php">NOTÍCIAS</a></div>
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-galeria.png" width="39" height="36" /></div>
            <a href="galeria.php">GALERIA</a></div>
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-agenda.png" width="39" height="36" /></div>
            <a href="agenda.php">AGENDA</a></div>
          <div class="separa-menu"></div>
          <div class="menu link-menu">
            <div class="ico"><img src="images/ico-downloads.png" width="39" height="36" /></div>
            <a href="#">DOWNLOADS</a></div>
        </div>
      </div>
    </div>
  </div>
</div>