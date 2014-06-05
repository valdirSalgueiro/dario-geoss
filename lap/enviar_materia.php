<?php
/*
session_start();
$usuario_autenticado=$_SESSION["dados_usuario"];
include "whosonline_other.php";
*/
?>
<?php
include "conn.php";

if ($_POST['enviar'])
{

	$id = $_GET['id'];
	$consulta = mysql_query("SELECT * FROM noticias WHERE codigo_noticia = '".$id."'") or die(mysql_error());
	$materias = mysql_fetch_array($consulta);

$assunto = "MATÉRIA";
$corpo = "<html><head><title>Portal Sentinela</title><link href='http://www.fifabr.com.br/mesas_julgadora/responsa.css' rel='stylesheet' type='text/css' /></head><body><table width='500' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'><tr><td style='border:2px #333333 dashed border-top:0px padding:20px padding-top:0px' class='email_materia'><div align='center'><a href='http://www.fifabr.com.br'><img src='http://www.luiz.uily.com/FIFAZONE/logo.jpg' border='0' /></a> </div>"
. $_POST['remetente'] . " encontrou uma matéria interessante e gostaria que você desse uma olhada:<br><br>Comentários do remetente:<br>" 
. $_POST['comentarios'] .
"</td></tr><tr><td width='506' style='border:2px #EAEAEA dotted padding-top:20px'><img src='http://www.fifabr.com.br/mesa_julgadora/images/ico_meus_documentos.gif' width='36' height='36' align='left' /> <span class='titulo'>"
. $materias['nome_noticia'] .
"</span><br />"
. $materias['data_cadastro'] .
"<img src='http://www.fifabr.com.br/mesa_julgadora/images/ico_relogio.gif' align='absbottom' />"
. $materias['hora_cadastro'] .
"<br /></td></tr>";


$corpo .= "<tr><td valign='top' class='legenda_foto' align='center' style='padding-top:15px padding:5px border:2px #EAEAEA dotted'><table width='100' border='0' cellspacing='0' cellpadding='0'><tr><td align='right'>Foto:"
. $materias['fotografo_materia'] .
"</td></tr><tr><td align='center'><span class='legenda_foto' style='padding-top:15px'><img src='http://www.fifabr.com.br/Sentinela/admin/" 
. $materias['foto'] . 
"' border='2' /></span></td></tr><tr><td align='center'>"
. $materias['legenda_foto_materia'] . "</td> </tr></table></div></td></tr>";


$corpo .= "<tr><td valign='top' style='padding-top:15px padding:5px border:2px #EAEAEA dotted' class='materia'><div align='justify'>"
. $materias['descricao_materia'] .
"</div></td></tr><tr><td height='25' background='http://www.fifabr.com.br/mesa_julgadora/images/site_divisao_materia.gif' style='padding-left:5px padding-right:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='21%' class='por'>por "
. $materias['por'] . 
"</td><td width='79%' align='right'><strong>|</strong> <a href='http://www.fifabr.com.br' class='l_menu_materia'> fifabr.com.br </a> <strong>|</strong> </td></tr></table></td></tr></table>";


include "inc/smtp.class.php";
    $Email = new SendMail;
    $Email->Servidor="ftp.fifabr.com.br."; //Servidor

    $Email->Autenticado=TRUE;  //É autenticado
    $Email->Usuario="fifabr";  //Usuario
    $Email->Senha="cont123brjradm";    //Senha

    $Email->Barra="\\"; //barra pra windows
    
    $Email->EmailDe="Materias@Portalsentinela.com";  //Seu email
    $Email->EmailPara=$_POST['destinatarios'];  //Destino
    $Email->Assunto=$assunto;  //Assunto
    $Email->Corpo=$corpo;  //Corpo


    if($Email->Enviarsmtp())           //Envia o email
        echo "Email enviado";
    else
        echo "Email não pode ser enviado";
		
}

?>
<html>
<head>
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<link href="responsa.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- Início da página original -->
<form name="form_enviar_materia" method="post" action="">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="37" colspan="3" align="right" background="images/bg.jpg" bgcolor="#006600" class="meses" style="padding-right:15px;">Envie esta matéria</td>
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
    <td width="71%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Seu nome </td>
    <td><input name="remetente" type="text" class="caixa" id="remetente" size="50" maxlength="50" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Email do destinat&aacute;rio  </td>
    <td><input name="destinatarios" type="text" class="caixa" id="destinatarios" size="50" maxlength="400" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Coment&aacute;rios</td>
    <td><textarea name="comentarios" cols="51" rows="4" class="caixa" id="comentarios"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="enviar" type="submit" class="botao" id="enviar" value="Enviar" />
    <input name="limpar" type="reset" class="botao" id="limpar" value="Limpar" /></td>
  </tr>
</table>
</form>
</body>
</html>
