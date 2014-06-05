<?php
session_start();
include "conn.php";

if ($_POST['enviar']) {
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	$data = $dia."/".$mes."/".$ano;
	
	$h = date("H");
	$m = date("i");
	$hora = $h.":".$m;
	mysql_query("INSERT INTO tab_perguntas (nome_cmt, email_cmt, texto_cmt, data_cmt, hora_cmt, autorizado) VALUES ('".$_POST['nome']."', '".$_POST['email']."', '".$_POST['comentario']."', '".$data."', '".$hora."', '0') ") or die(mysql_error());
?>
<script>
alert('Sua pergunta foi enviada.')
window.opener.location = '<?php echo "sugestoes.php" ?>';
window.close();
</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<link href="responsa.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td style="padding:10px"><div align="center" class="titulo">CADASTRAR SUGEST&Atilde;O </div></td>
  </tr>
</table><br />
<br />
<form name="form_comentarios" action="" method="post">
<table width="362" height="85" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="comentarios_responsabilidade" style="padding:5px;">
      
      <div align="center">Insira aqui a sua Sugest&atilde;o. Seja claro, evite rodeios e v&aacute; direto ao assunto.  A pergunta &eacute; de total responsabilidade   do membro que o inseriu. O&nbsp;<strong><a href="http://www.portalsentinela.com" target="_blank">Portal Sentinela </a></strong>&nbsp;reserva-se o direito de intervir em  mensagens contendo palavras de baixo escal&atilde;o, publicidade, cal&uacute;nia, inj&uacute;ria,   difama&ccedil;&atilde;o ou qualquer conduta que possa ser considerada criminosa. </div></td></tr>
  <tr>
    <td width="93"><strong>Nome</strong></td>
    <td width="269"><input name="nome" type="text" class="caixa" id="nome" size="48" maxlength="50" /></td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><input name="email" type="text" class="caixa" id="email" size="48" maxlength="50" /></td>
  </tr>
  <tr>
    <td><strong>Pergunta</strong></td>
    <td><textarea name="comentario" cols="50" rows="6" class="caixa" id="comentario"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><input name="enviar" type="submit" class="botao" id="enviar" value="Enviar" />
      <input name="limpar" type="submit" class="botao" id="limpar" value="Limpar" /></td>
  </tr>
</table>
<p>&nbsp;</p>

<p align="center">
</p>
</form>
</body>
</html>

