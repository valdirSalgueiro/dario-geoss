<?php
session_start();

include('conn.php');
$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($_SESSION["usuario_autenticado"]!=NULL){ ?>
<meta http-equiv="refresh" content="300;URL=sair.php">
<? } ?>
<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
<style>

body {BACKGROUND-ATTACHMENT: fixed;

background-position: center center;

background-repeat: no-repeat;}

</style>

<link href="responsa.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style37 {	font-size: 36px;
	font-weight: bold;
}
.style38 {
	font-size: 18px;
	font-weight: bold;
}
.style41 {font-size: 12px}
-->
</style>
<body background="imagens/LOGEMAIL.JPG">
<div align="center">
  <p><img src="etiqueta.gif" width="76" height="100"><br>
    <br>
  </p>
  <p><span class="style38">SISGANP </span><span class="style41"><br>
  Sistema de Gest&atilde;o para Laboratorios de Anatomia Patologica e Citologia<br>
  <span class="texto_copyright style114">Desenvolvido por <a href="http://www.inverte.com.br" target="_blank"><strong>INVERTE </strong></a></span><br>  
  <br>
  </span><img src="sisganp.jpg" width="435" height="321"></p>
</div>
</body>

</html>
<center>

