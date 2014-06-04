<?

session_start();

include('conn.php');

?>
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<LINK href="arquivos/estilo.css" type=text/css rel=stylesheet>

<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.gif);
}
.style1 {color: #D6781B}
.style29 {color: #000000}
.style36 {color: #000000; font-size: 10px; font-weight: bold; }
-->
</style>
<?
 include('random.php');
 $foto = gera_foto(); 
?>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td class="style22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1"></td>
      </tr>
    </table>
      <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td height="112"><table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="2"></td>
            </tr>
          </table>
            <table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                 <td width="772" height="150" background="arquivos/<? print $foto; ?>.jpg"><table width="768" border="0" align="center" cellpadding="0" cellspacing="0"><table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="768" height="124" colspan="2">&nbsp;</td>
                  </tr>
                  
                </table></td>
              </tr>
            </table>
            <table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="2"><table width="772" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="3"></td>
                    </tr>
                  <tr>
                    <td height="1" bgcolor="#999999"></td>
                    </tr>
                  <tr>
                    <td height="3"></td>
                    </tr>
                </table>
                  <table width="772" height="17" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="3%" height="17"><div align="center"><img src="arquivos/casa.gif" width="16" height="15" /></div></td>
                    <td width="2%"><img src="arquivos/seta.gif" width="10" height="10" /></td>
                    <td width="42%" class="style11 style1 style25"><span class="style26 style28">&nbsp;<span class="style29">Painel Administrativo </span></span></td>
                    <td width="48%" class="style11 style1"><table width="360" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="6%"><div align="center"><img src="arquivos/calendario.gif" width="14" height="14"></div></td>
                        <td width="94%"><span class="style26"><? $dia_semana = date("w");
						  switch($dia_semana)
   {
      case "0" : echo "Domingo"; break;
      case "1" : echo "Segunda"; break;
      case "2" : echo "Terça"; break;
      case "3" : echo "Quarta"; break;
      case "4" : echo "Quinta"; break;
      case "5" : echo "Sexta"; break;
      case "6" : echo "Sábado"; break;
   }

						   ?>, 
                          <?

    $dia=date('d');

    $mes=date('m');

    $ano=date('Y');

    $hora=date('H');

    $min=date('i');

    $xx="Bom dia";

    $mes2['01']="Janeiro";

    $mes2['02']="Fevereiro";

    $mes2['03']="Mar&ccedil;o";

    $mes2['04']="Abril";

    $mes2['05']="Maio";

    $mes2['06']="Junho";

    $mes2['07']="Julho";

    $mes2['08']="Agosto";

    $mes2['09']="Setembro";

    $mes2['10']="Outubro";

    $mes2['11']="Novembro";

    $mes2['12']="Dezembro";

    if(($hora>=12)and($hora<18))

    {

     $xx="Boa tarde";

    }

    if(($hora>=18)and($hora<=24))

    {

     $xx="Boa noite";

    }

    echo "$dia de ".$mes2[$mes]." de $ano. $xx";

    ?>!                        </span></td>
                        </tr>
                    </table></td>
                    </tr>
                </table>
                  <table width="772" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="3"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8" class="style22"></td>
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
            <td height="35"><div align="center" class="style21">Acessar Administra&ccedil;&atilde;o.<br />
                <br />
				<form name=form1 method=post>
                <table border="0">
                  <tr>
                    <td class="style22"><span class="style36"><font face="verdana">Usu&aacute;rio:</font></span></td>
                    <td><input name="usu" type="text" class="style22" size="20" maxlength="30" /></td>
                  </tr>
                  <tr>
                    <td class="style22"><span class="style36"><font face="verdana">Senha:</font></span></td>
                    <td><input name="senha" type="password" class="style22" size="20" maxlength="30" /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><div align="center">
                      <input name="submit" type="submit" class="Fonte_11_Vermelhoescuro" value="Entrar" />
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

   session_register("usuario_autenticado");

   $_SESSION['usuario_autenticado']=$usu;

   printf("<script>window.location='adm.php'</script>");

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
            <td height="35"><div align="center" class="style21"><span class="style17"><span class="style18">Copyright &copy; Portal Sentinela.com Todos os   direitos reservados<br />
            </span></span><span class="style16"><strong>Proibida a c&oacute;pia</strong> ou qualquer outra forma de   reprodu&ccedil;&atilde;o, integral ou parcial, sem o pr&eacute;vio acordo do autor.</span></div></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1"></td>
          </tr>
      </table></td>
  </tr>
</table>
