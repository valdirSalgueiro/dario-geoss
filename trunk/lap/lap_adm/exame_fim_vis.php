<?php

session_start();
$id = $_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{

 include('conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}
 $busca_cod="select * from exame where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);
 
  ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome,data_nascimento,ddd_fone1,fone_1 from paciente WHERE id = '".$campo_cod['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_cod['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
   ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_cod['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
    ##Busca do material##
 $busca_mat="SELECT id,nome from material WHERE id = '".$campo_cod['material']."'";
 $res_busca_mat=mysql_query($busca_mat,$conn);
 $num_mat=mysql_num_rows($res_busca_mat);
 $campo_mat=mysql_fetch_array($res_busca_mat);
 ##Até aqui##
       ##Busca do tipo de exame##
 $busca_matex="SELECT id_ex,nome from tipo_exame WHERE id_ex = '".$campo_cod['tipo']."'";
 $res_busca_matex=mysql_query($busca_matex,$conn);
 $campo_matex=mysql_fetch_array($res_busca_matex);
 ##Até aqui##
?>
 <?php if($_POST['corrigir']){  
	   	  printf("<script>
   window.location='laudos.php?id=$_GET[id]';</script>");
	    } ?>
	  <?php if($_POST['imprimir']){  
	   printf("<script>
   window.location='exame_fim_vis.php?id=$_GET[id]&&print=1';</script>"); ?>
     <?php } ?> 

<?php if($_GET['print']==0){  ?>
<p><span class="fonte_link style64"><strong>A&ccedil;ao : 
  </strong>
  </span>
<form name="visualizar" method="post">
  <input name="corrigir" type="submit" id="corrigir" value="Corrigir" />
  <input name="imprimir" type="submit" id="imprimir" value="Imprimir" />
  <span class="atributos_titulo">
  <input name="button" type="button" onClick="history.go(-2);" value="Voltar" />
  </span>
</form>
  <?php } else { ?>
  <script language="JavaScript" type="text/javascript">window.print(); </script>
  <?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
<style type="text/css">
<!--
#Layer1 {	position:absolute;
	left:17px;
	top:1080px;
	width:889px;
	height:24px;
	z-index:1;
}
-->
</style>
<head>
<title>Laudo</title>
<link href="botoes.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="estilomenu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style44 {font-size: 12px}
.style54 {font-family: arial}
.style56 {font-size: 12pt}
.style64 {font-size: 14pt}
.style69 {font-size: 14px}
.style72 {font-size: 20px}
.style73 {font-family: arial; font-size: 20px; }
.style78 {text-decoration: none; font-family: arial; font-style: normal; font-size: 16px; }
.style79 {font-family: arial; font-weight: bold; font-size: 18px; }
.style80 {font-size: 18px}
.style81 {font-family: arial; font-size: 18px; }
.style82 {font-family: arial; font-weight: bold; font-size: 20px; }
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="866" border="0">
  <tr>
    <td width="860" class="fonte_link"><table width="862" border="0">
      <tr>
        <td width="396" class="fonte_link"><img src="Figura1.jpg" width="291" height="86" /></td>
        <td width="456" class="fonte_link style69"><div align="left" class="fonte_link style44"><br />
        <br />
          Rua Frei Matias Tev&ecirc;s, 280 - Sl. 106 - Empresarial Albert Einstein<br />
          Ilha do Leite - Recife - PE - Fone : (81) 3222-0476  / Fax :3222-2097 </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="860" border="0">
  <tr>
    <td width="882"><hr width="860" size="4" color="black" /></td>
  </tr>
</table>
<table width="866" border="0" bordercolor="#331A1C">
  <tr>
    <td width="124" class="style79">Nome :</td>
    <td width="556" class="fonte_link style64"><span class="style80"><?php echo $campo_pac['nome']; ?></span></td>
    <td width="56" class="style73"><span class="style79"> N &ordm;  :</span></td>
    <td width="118" class="style73"><span class="style80"><?php echo $campo_cod['id']; ?></span></td>
  </tr>
  
  <tr>
    <td class="style79">Exame : </td>
    <td colspan="3" class="fonte_link style64"><span class="style80"><?php echo $campo_matex['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="style79">Material :</td>
    <td colspan="3" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="style79">Solicita&ccedil;&atilde;o :</td>
    <td class="fonte_link style56"><span class="style81"><?php echo $campo_med['nome']; ?></span></td>
    <td class="style79">&nbsp;</td>
    <td class="fonte_link style80">&nbsp;</td>
  </tr>
  <tr>
    <td class="style54"><span class="style79">Conv&ecirc;nio :</span></td>
    <td class="fonte_link"><span class="style80"><?php echo $campo_conv['nome']; ?></span></td>
    <td class="style79">Data:</td>
    <td class="fonte_link style64"><span class="style80"><?php echo date ("d/m/Y"); ?></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4" class="style54"><table width="860" border="0">
      <tr>
        <td width="831" class="style80"><hr width="860" size="4" color="black" /></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="31" colspan="4" class="style81">&nbsp;</td>
  </tr>
  <?php if($campo_cod['macroscopia']!=NULL){?>
  <tr>
    <td colspan="4" class="style82">Exame Macrosc&oacute;pico :</td>
  </tr>
  <tr>
    <td height="58" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['macroscopia']; ?></span></td>
  </tr><?php } ?>
   <?php if($campo_cod['microscopia']!=NULL){?><tr>
    <td colspan="4" class="style82"><br />
    <?php if($campo_cod['tipo_cod']=='mc'){ ?>Exame Microsc&oacute;pico e Conclusão :</td><?php } else {?>Exame Microsc&oacute;pico :</td><?php } ?>
  </tr>
  <tr>
    <td height="66" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['microscopia']; ?></span></td>
  </tr><?php } ?>
   <?php if($campo_cod['tipo_cod']!='mc'){ ?><?php if($campo_cod['conclusao']!=NULL){?><tr>
    <td class="style82"><br />
    Conclus&atilde;o :</td>
    <td colspan="3" class="style81">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['conclusao']; ?></span></td>
  </tr>  <?php } ?><?php } ?>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64">&nbsp;</td>
  </tr>
  <tr>
    <td height="177" colspan="4" class="fonte_link style64"><p></p>
      <div id="Layer1"><br />
          <br />
          <br />
        <br />
        <br>
        <table width="860" border="0">
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <tr>
            <td width="831" class="style80"><hr width="860" size="4" color="black" /></td>
          </tr>
        </table>
        <div>
          <table width="889" border="0">
            <tr>
              <td width="363" height="38" class="style78 style44">Denise Camboim<br />
                CRM - 5797 </td>
              <td width="362" class="style78 style44">Ros&acirc;ngela Andrade <br />
                CRM - 8081 </td>
              <td width="150" class="style78 style44">Vivina Figueir&ocirc;a<br />
                CRM - 5609 </td>
            </tr>
          </table>
        </div>
        <span class="style72">
        <script language="JavaScript" type="text/javascript">window.print(); </script>
      </span></div>
      <span class="style72">
<script language="JavaScript" type="text/javascript">window.print(); </script>
      </span></td>
  </tr>


