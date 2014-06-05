<?php

session_start();

include('../estilo.css');

include('../data.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 $busca_usu="select * from usu where usu = '".$usuario_autenticado."';";

 $res_busca_usu=mysql_query($busca_usu,$conn);

 $num_usu=mysql_num_rows($res_busca_usu);

 if($num_usu>0)

 {

  $campo_usu=mysql_fetch_array($res_busca_usu);

  $acesso=$campo_usu[acesso];

 }

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>

<body bgcolor=white>

<form name=form1 method=post>

<table border=0 class=fonte>

<tr><td><font face=verdana size=2 color=black><b>Usuário: <?phpecho $usuario_autenticado;?><br><a href='sair.php'>Logoff</a></b></font></td></tr>

<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_usuario);'><b>Usuários</b><BR>

<div id='menu_usuario' style='display:none'>

<a href='trocar_senha.php' target='conteudo'>Trocar Senha</a><BR>

<?php

if($acesso[0]==1)

{

 echo "<a href='cad_usu.php' target='conteudo' >Cadastrar</a><BR>";

}

if($acesso[1]==1)

{

 echo "<a href='mod_usu.php' target='conteudo'>Modificar</a><BR>";

}

if($acesso[2]==1)

{

 echo "<a href='rem_usu.php' target='conteudo'>Remover</a><BR>";

}
if($acesso[2]==1)

{

 echo "<a href='ver_ips.php' target='conteudo'>Ver Visitas</a><BR>";

}

echo "</div></td></tr>";

if($acesso[11]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_recados);'><b>Recados</b><BR>";

 echo "<div id='menu_recados' style='display:none'>";

 echo "<a href='fale_conosco.php' target='conteudo'>Ler recados</a><BR>";

 echo "</div></td></tr>";

}

if(($acesso[3]==1)or($acesso[4]==1)or($acesso[5]==1)or($acesso[3]==1))

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_galeria);'><b>Galeria de Fotos</b><BR>";

 echo "<div id='menu_galeria' style='display:none'>";

 if($acesso[3]==1)

 {

  echo "<a href='cad_galeria.php' target='conteudo'>Cadastrar</a><BR>";

 }

 if($acesso[4]==1)

 {

  echo "<a href='mod_galeria.php' target='conteudo'>Modificar</a><BR>";

 }

 if($acesso[5]==1)

 {

  echo "<a href='rem_galeria.php' target='conteudo'>Remover</a><BR>";

 }

 if($acesso[3]==1)

 {

  echo "<a href='exibir_galeria.php' target='conteudo'>Exibir / Não Exibir</a><BR>";

 }

 echo "</div></td></tr>";

}

if(($acesso[6]==1)or($acesso[7]==1)or($acesso[8]==1)or($acesso[6]==1))

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_festas);'><b>Notícias</b><BR>";

 echo "<div id='menu_festas' style='display:none'>";

 if($acesso[6]==1)

 {

  echo "<a href='cad_noticia.php' target='conteudo'>Cadastrar</a><BR>";

 }

 if($acesso[7]==1)

 {

  echo "<a href='mod_noticia.php' target='conteudo'>Modificar</a><BR>";

 }

 if($acesso[8]==1)

 {

  echo "<a href='rem_noticia.php' target='conteudo'>Remover</a><BR>";

 }
  if($acesso[6]==1)

 {

  echo "<a href='exibir_noticia.php' target='conteudo'>Exibir / Não Exibir</a><BR>";
  
  echo "<a href='menu_banner.php' target='conteudo'>Cadastrar Banner Notícias</a><BR>";
  
  echo "<a href='mod_menu_banner.php' target='conteudo'>Modificar Banner Notícias</a><BR>";
  
  echo "<a href='mais_lidas.php' target='conteudo'>Notícias Mais Lidas</a><BR>";

 }

 echo "</div></td></tr>";

}

if(($acesso[9]==1))

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_enquete);'><b>Enquete</b><BR>";

 echo "<div id='menu_enquete' style='display:none'>";
 echo "<a href='../enquete/apgindex.php' target='conteudo'>Menu Principal</a><BR>";
 echo "</div></td></tr>";

 }

if($acesso[10]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_denuncie);'><b>Denuncie</b><BR>";

 echo "<div id='menu_denuncie' style='display:none'>";

 echo "<a href='exibir_denuncie.php' target='conteudo'>Exibir / Nao Exibir</a><BR>";

 echo "</div></td></tr>";

}

if($acesso[10]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_radio);'><b>Rádio</b><BR>";

 echo "<div id='menu_radio' style='display:none'>";

 echo "<a href='radio.php' target='conteudo'>Alterar</a><BR>";

 echo "</div></td></tr>";

}
if($acesso[12]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_exp);'><b>Expediente</b><BR>";

 echo "<div id='menu_exp' style='display:none'>";

 echo "<a href='expediente.php' target='conteudo'>Alterar</a><BR>";

 echo "</div></td></tr>";

}
if($acesso[13]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_foto_dia);'><b>Foto do Dia</b><BR>";

 echo "<div id='menu_foto_dia' style='display:none'>";
 echo "<a href='cad_foto_dia.php' target='conteudo'>Cadastrar</a><BR>";
 echo "<a href='mod_foto_dia.php' target='conteudo'>Modificar</a><BR>";
 echo "<a href='rem_foto_dia.php' target='conteudo'>Remover</a><BR>";
 echo "<a href='exibir_foto_dia.php' target='conteudo'>Exibir / Não Exibir</a><BR>";
 echo "</div></td></tr>";
 }
 if($acesso[13]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_propaganda);'><b>Foto Propaganda</b><BR>";

 echo "<div id='menu_propaganda' style='display:none'>";
 echo "<a href='cad_propaganda.php' target='conteudo'>Cadastrar</a><BR>";
 echo "<a href='mod_propaganda.php' target='conteudo'>Modificar</a><BR>";
 echo "<a href='rem_propaganda.php' target='conteudo'>Remover</a><BR>";
 echo "</div></td></tr>";
 }
if($acesso[12]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_col);'><b>Colunistas</b><BR>";

 echo "<div id='menu_col' style='display:none'>";

 echo "<a href='colunista.php' target='conteudo'>Alterar</a><BR>";

 echo "</div></td></tr>";

} 
if($acesso[14]==1)

{

 echo "<tr><td><hr color=black size=1><input type=checkbox onclick='visivel(this,document.all.menu_vid);'><b>Videos</b><BR>";

 echo "<div id='menu_vid' style='display:none'>";
 echo "<a href='cad_video.php' target='conteudo'>Cadastrar</a><BR>";
 echo "<a href='mod_video.php' target='conteudo'>Modificar</a><BR>";
 echo "<a href='rem_video.php' target='conteudo'>Remover</a><BR>";
 echo "<a href='exibir_video.php' target='conteudo'>Exibir / Não Exibir</a><BR>";

 echo "</div></td></tr>";

} 
?>

</table>

</form>

</body>

</html>

