<?

session_start();
error_reporting (E_ALL ^ E_NOTICE);

include('conn.php');

?>
<title>:: LAP ::</title>
<LINK href="arquivos/estilo.css" type=text/css rel=stylesheet>

<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.gif);
}
.style36 {color: #000000; font-size: 10px; font-weight: bold; }
-->
</style>
<?
 //include('random.php');
 //$foto = gera_foto(); 
?>
<link href="responsa.css" rel="stylesheet" type="text/css">
<link href="botoes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style37 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td class="style22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1"></td>
      </tr>
    </table>
      <table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#CCCCCC">
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1" class="style22"></td>
        </tr>
      </table>
        <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td height="35"><div align="center" class="style21"><br>
                <table width="776" height="93" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="566" valign="top" align="center" bgcolor="#FFFFFF" style="border: 1px dashed #CC0000"><p align="center"><br>
                        <span class="style37"><img src="img/backg.jpg" width="601" height="248" border="2" /><br />
                        LAP</span><br>
                      <br>
                    </p>
                    </td>
                  </tr>
                </table>
                <br>
              Acessar Administra&ccedil;&atilde;o.<br />
                <br />
				<form name=form1 method=post>
                <table border="0">
                  <tr>
                    <td class="style22"><span class="style36"><font face="verdana">Usu&aacute;rio:</font></span></td>
                    <td><input name="usu" type="text" class="botao" size="20" maxlength="30" /></td>
                  </tr>
                  <tr>
                    <td class="style22"><span class="style36"><font face="verdana">Senha:</font></span></td>
                    <td><input name="senha" type="password" class="botao" size="20" maxlength="30" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><div align="center">
                      <input name="submit" type="submit" class="botaooo" value="Entrar" />
                    </div></td>
                  </tr>
                </table>
<?

$usu=$_POST['usu'];

$senha=$_POST['senha'];

if(($usu!=NULL)and($senha!=NULL))

{

 $busca_usu="select * from usu where usu = '".$usu."';";

 $res_busca_usu=mysql_query($busca_usu,$conn);

 $num_usu=mysql_num_rows($res_busca_usu);

 if($num_usu==1)

 {

  $campo_usu=mysql_fetch_array($res_busca_usu);

  if(crypt($senha,$campo_usu[senha])==$campo_usu[senha])

  {

   

   $_SESSION['usuario_autenticado']=$usu;

   printf("<script>window.location='main.php'</script>");

  }

  else

  {

   printf("<script>alert('ERRO: A senha está incorreta.');</script>");

  }

 }

 else

 {

  printf("<script>açert('ERRO: O Usuário $usu não existe.');</script>");

 }

}

?>
</form>
              <br />
              <br /> 
              <span class="style16"></span></div></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1"></td>
          </tr>
      </table></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1" class="style22"></td>
      </tr>
    </table>
        <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td height="35"><div align="center" class="style21"><span class="style17"><span class="style18">Copyright &copy; LAP Todos os   direitos reservados<br />
            </span></span><span class="style16"><strong>Proibida a c&oacute;pia</strong> ou qualquer outra forma de   reprodu&ccedil;&atilde;o, integral ou parcial, sem o pr&eacute;vio acordo do autor.</span><br />
            <span class="texto_copyright style114">Desenvolvido por <a href="http://www.inverte.com.br" target="_blank"><strong>INVERTE </strong></a></span></div></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1"></td>
          </tr>
      </table></td>
  </tr>
</table>
