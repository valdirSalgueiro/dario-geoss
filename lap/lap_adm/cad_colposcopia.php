<?php
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];

if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('tab.css');
 include('conn.php');
 include('data.php');
 ##Busca o id do exame##
 
 $busca_ex="select * from exame where id = '".$id."';";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);
 if($num_ex>0)
 {
  $campo_ex=mysql_fetch_array($res_busca_ex);
 }
 
 ##Até aqui
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_ex['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_ex['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
 
   ##Busca do nome do exame##
 $busca_exa="SELECT id,nome from ex_status WHERE id = '".$campo_ex['ex_status_id']."'";
 $res_busca_exa=mysql_query($busca_exa,$conn);
 $num_exa=mysql_num_rows($res_busca_exa);
 $campo_exa=mysql_fetch_array($res_busca_exa);
 ##Até aqui##
 
  ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_ex['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
 
   ##Busca do tipo do exame##
 $busca_tipo="SELECT * from tipo_exame WHERE id_ex = '".$campo_ex['tipo']."'";
 $res_busca_tipo=mysql_query($busca_tipo,$conn);
 $num_tipo=mysql_num_rows($res_busca_tipo);
 $campo_tipo=mysql_fetch_array($res_busca_tipo);
 ##Até aqui##
    ##Busca da colposcopia##
 $busca_co="SELECT * from colposcopias WHERE id = '".$id."'";
 $res_busca_co=mysql_query($busca_co,$conn);
 $num_co=mysql_num_rows($res_busca_co);
 $campo_co=mysql_fetch_array($res_busca_co);
 ##Até aqui##
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<html>
<link href="estilo.css" rel="stylesheet" type="text/css">
<link href="botoes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {color: #000033}
.style9 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style11 {color: #000000; font-weight: bold; font-size: 12px; }
-->
</style>
<link href="responsa.css" rel="stylesheet" type="text/css">
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b><br>
  </b></font><font face=verdana><b>    <span class="style7">Cadastro de Colposcopia:</span></b></font></h1>
<hr color=black size=2>

<div align="center">
<br>
<br>
<br>
<table width="659" border="1">
  <tr>
    <td width="232"><img src="colposcopia.PNG" width="176" height="213"></td>
    <td width="411"><table width="407" border="1" align="center">
      <tr>
        <td colspan="2" bgcolor="#333333"><div align="center"><span class="style9">CADASTRO</span></div></td>
        </tr>
      <tr>
        <td><span class="style11">TESTE SCHILLER </span></td>
        <td><select name="schiller" class="caixa" id="schiller" onChange="submitar()">
            <?php
$busca_atendimentos="select * from schiller order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum Teste de Schiller encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo]'>$campo_atendimentos[codigo]</option>");
  

 }

}

?>
          </select>
            <?php
    if( $_POST['schiller']!=''){
	//die('entrou');
		$sql2="select * from schiller where codigo  = ".$_POST['schiller']."";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	$_POST['schiller'] = $row2['descricao'];
    $_SESSION["schiller"]=$_POST['schiller'];
	}
	
	
	
	?>
          &nbsp;&nbsp;<a href="cad_schiller.php">Cadastrar ?</a></td>
      </tr>
      <tr>
        <td><span class="style11">DESCRI&Ccedil;&Atilde;O</span></td>
        <td><textarea name="descricao" id="descricao" cols="30" rows="4"><?php echo $_SESSION["schiller"]; ?></textarea></td>
      </tr>
      <tr>
        <td width="134"><span class="style11">JEC ANTERIOR </span></td>
        <td width="257"><input name=jec_anterior type=text class=botao id="jec_anterior" value="<?php echo $campo_co['jec_anterior']; ?>" size=5></td>
      </tr>
      <tr>
        <td><span class="style11">JEC POSTERIOR </span></td>
        <td><input name=jec_posterior type=text class=botao id="jec_posterior" value="<?php echo $campo_co['jec_posterior']; ?>" size=5></td>
      </tr>
      <tr>
        <td><span class="style11">&Uacute;LTIMA GLANDULA </span></td>
        <td><input name=ultima_glandula type=text class=botao id="ultima_glandula" value="<?php echo $campo_co['ultima_glandula']; ?>" size=5></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<br>

<tr>
  <td colspan="2"><div align="center">
  
<tr><td><input name="print" type=submit class=botaooo id="print" value='Imprimir Gr&aacute;fico'> 
    <input name="print2" type=submit class=botaooo id="print2" value='Imprimir o laudo'>
    <input type=submit value='Cancelar' class=botaooo> 
<input type=submit value='Reiniciar' class=botaooo>
<span class="atributos_titulo">
<input name="button" type=button class="botaooo" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>
</form>
<?php

if($_POST['fin1']){

  ##Busca do valor do exame##
  
 $busca_valor="SELECT * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."'";
 $res_busca_valor=mysql_query($busca_valor,$conn);
 $num_valor=mysql_num_rows($res_busca_valor);
 $campo_valor=mysql_fetch_array($res_busca_valor);
 ##Até aqui##


  $modificar="update exame set material = '".$_POST['material']."', codigo_procedimento = '".$_POST['codigo_procedimento']."', valor = '".$campo_valor['valor']."', macroscopia = '".$_SESSION["macroscopia"]."',obs_entrada = '".$_POST['obs_entrada']."',cod_microscopia = '".$_POST['codigo']."',cod_conclusao = '".$_POST['codigo_conc']."',ex_status_id = '".$_POST['id']."', obs_saida = '".$_POST['obs_saida']."', microscopia = '".$_SESSION["microscopia"]."',conclusao = '".$_POST['conclusao']."' where id = '".$id."';";

  $ok=mysql_query($modificar,$conn);


  if($ok==1)

  {

   printf("<script>alert('Atualizado.');
   window.location='laudos.php?id=$id';</script>");
  }   
                   }
				 
?>
</body>

</html>
