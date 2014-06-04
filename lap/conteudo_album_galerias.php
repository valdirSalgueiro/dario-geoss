<?

include('estilo.css');
include('conn.php');

?>

<html>

<head><meta http-equiv="Page-Enter" content="blendTrans(Duration=1)">
<link href="estilo.css" rel="stylesheet" type="text/css">
<link href="arquivos/estilo.css" rel="stylesheet" type="text/css">
<script src="funcoesg.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style29 {
	font-size: 11px;
	font-weight: bold;
}
.acesso { font-family:Arial; font-size:11px; font-weight:bold; color:#FFFFFF; }
.titulo { font-family:Arial; font-size:18px; font-weight:bold; color:#333333; }
.atributos_titulo { font-family:Arial; font-size:11px; font-weight:bold; color:#333333; }
.materia { font-family:Tahoma; font-size:11px; color:#2D2D2D; }
.arquivo { font-family:Arial; font-size:12px; font-weight:bold; color:#FFFFFF; }
.meses { font-family:Arial; font-size:11px; font-weight:bold; color:#F6F6F6; }
.por { font-family:Verdana; font-size:10px; font-weight:bold; color:#000000; }
.comentarios_italico { font-family:Tahoma; font-size:11px;  color:#333333; font-style:italic;}
.fonte_cinza { font-family:Arial; font-size:11px; color:#666666; }
.comentarios_responsabilidade { font-family:Verdana; font-size:11px; color:#666666; font-style:italic;}
.email_materia { font-family:Verdana; font-size:12px; font-weight:bold; color:#666666;}


a.l_meses:link    { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:visited { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:active  { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:hover   { text-decoration: none; background-color:#FFFFFF; color:#333333; font-size:11px; }

a.l_menu_materia:link    { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:visited { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:active  { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:hover   { text-decoration: none; background-color:#E9E9E9; color:#000000; font-size:11px; }

a.menu_principal:link    { text-decoration: none; color:#333333; font-size:11px;}
a.menu_principal:visited { text-decoration: none; color:#333333; font-size:11px;}
a.menu_principal:hover   { text-decoration: none; color:#000000; font-size:11px; font-weight:bold}
a.menu_principal:active  { text-decoration: none; color:#33333; font-size:11px;}
.style30 {font-family: Tahoma}
-->
</style>
</head>

<body bgcolor="white" class="fundo">

<div align="center">
  <table width="503" border="0">
    <tr>
      <td width="360" bgcolor="#CCCCCC"><div align="center"><span class="style21"><span class="style29">PortalSentinela.com</span> | Galeria de Fotos</span></div></td>
    </tr>
  </table>
  <br>
<?
$busca_galeria="select * from galerias WHERE codigo_galeria = '".$_GET['codigo_galeria']."';";
$res_busca_galeria=mysql_query($busca_galeria,$conn);
$campo_galeria=mysql_fetch_array($res_busca_galeria);
echo "<BR><font class=titulo>$campo_galeria[nome_galeria]</font> - <font class=materia>$campo_galeria[data_cadastro]</font>";
echo "<BR><center><font class=materia>$campo_galeria[descricao_galeria]</center><BR><center><font class=materia>Por : $campo_galeria[por]</center></font><BR>";
?>
  <br>
  <?

$codigo_foto=$_GET['codigo_foto'];

$foto=$_GET['foto'];

$dimencao=$_GET['dimencao'];

if(($codigo_foto!=NULL)and($foto!=NULL)and($dimencao!=NULL))

{

 $busca_foto="select * from foto_galerias where codigo_foto = '".$codigo_foto."';";

 $res_busca_foto=mysql_query($busca_foto,$conn);

 $campo_foto=mysql_fetch_array($res_busca_foto);

 echo "<center><img src='admin/$foto'></center><BR>

 <table border=0 class=fonte width=100% cellspading=20>

 <tr><td><center>$campo_foto[descricao_foto]</center></td></tr>

 </table>";

}



?>
  <br>
 <? if($codigo_foto!=NULL){ ?></a><br />
  <?
//Contando o n&uacute;mero de coment&aacute;rios existentes
$consultac = mysql_query("SELECT count(codigo_galeria) as total FROM tab_comentarios_galeria where codigo_foto = '".$codigo_foto."' ") or die(mysql_error());
$totalcom = mysql_result($consultac,0,"total");
?>
  <br>
  <table width="54%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="79%" align="right" bgcolor="#FFFFFF"><div align="center"><a href="javascript:Comentar('<?=$codigo_foto ?>')" class="l_menu_materia"><strong> CLIQUE AQUI para comentar </strong></a></div></td>
    </tr>
  </table>
  <br>
  <table width="87%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="506" bgcolor="#CCCCCC" style="border:2px #EAEAEA dotted;"><img src="images/ico_meus_documentos.gif" width="36" height="36" align="left" /> <span class="titulo"> Coment&aacute;rios   [ <? print $totalcom; ?> ] </span><span class="materia"></span> <br />
      </td>
    </tr>
    <tr>
      <?
		$consulta = mysql_query("SELECT * FROM tab_comentarios_galeria WHERE  codigo_foto = '".$codigo_foto."' ORDER BY id_cmt DESC") or die(mysql_error());
		



	while($comentarios=mysql_fetch_array($consulta)) {
?>
      <td valign="top" class="legenda_foto" align="center" style="padding-top:15px; padding:5px; border:2px #EAEAEA dotted;"><div align="left" class="materia"><strong><b>
          <?=$comentarios['nome_cmt']?>
          </b> </strong>em <span class="style30" style="border-top:1px #CCCCCC dotted;; font-size:11px; color:#333333;">
          <?=$comentarios['data_cmt']?>
          </span> :
        <?=$comentarios['texto_cmt']?>
          <span style="padding:10px; padding-top:0px;"> </span></div></td>
    </tr>
    <? } ?>
  </table>
  <p style="padding:10px; padding-top:0px;"><span class="materia">
    <? if($totalcom==0){ echo "<font class='materia'>Ainda n&atilde;o h&aacute; coment&aacute;rios.</font>"; } ?>
    <? } ?>
  </span></p>
  
</div>
</body>

</html>

