<?
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];

if($usuario_autenticado!=NULL)

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
 $busca_conve="SELECT id,nome from convenio WHERE id = '".$campo_ex['convenio']."'";
 $res_busca_conve=mysql_query($busca_conve,$conn);
 $num_conve=mysql_num_rows($res_busca_conve);
 $campo_conve=mysql_fetch_array($res_busca_conve);
 ##Até aqui##
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style4 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style7 {color: #000033}
.style8 {color: #FFFFFF}
.style9 {font-weight: bold; font-size: 12px;}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b><br>
  </b></font><font face=verdana><b>    <span class="style7">Exame:</span></b></font></h1>
<hr color=black size=2>

<div align="center"><br>
    <table width="732" bgcolor="" border="0">
      <tr>
        <td width="517">   

                </head>

                
               
                </head>

               
                <div id="tabs">
                                <ul>
                                        <!-- CSS Tabs -->

                                </ul>
        </div></td>
      </tr>
    </table>
    <div align="center"><a href="#"></a>   </div>
  <table border=0 class=fonte>
<tr>
  <td colspan="2" bgcolor="#333333"><div align="center"><a href="#"><span class="style4"><span class="style9">Informa&ccedil;&otilde;es T&eacute;cnicas </span></span></a></div></td>
  </tr>
<tr>
  <td> Status  :</td>
  <td><strong><? echo $campo_exa['nome']; ?></strong></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="174">Laudo N &ordm; :</td>
  <td width="367"><? echo $campo_ex['id']; ?></td>
</tr>
<tr>
  <td>Paciente :</td>
  <td><? echo $campo_pac['nome']; ?>    </td>
</tr>

<tr>
  <td>Data de Entrada :</td>
  <td><? echo date("d-m-Y-H:h",$campo_ex['data_entrada']); ?> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Previs&atilde;o de Saida:</td>
  <td><? echo date("d-m-Y-H:h",$campo_ex['data_previsao']); ?></td>
</tr>
<tr>
  <td>Material :</td>
  <td><? echo $campo_ex['material']; ?></td>
</tr>


<tr>
  <td>Valor :</td>
  <td>R$
    <? echo $campo_ex['valor']; ?></td>
</tr>
<tr>
  <td>Macroscopia : </td>
  <td><? echo $campo_ex['macroscopia']; ?></td>
</tr>
<tr>
  <td>C&oacute;d Microscopia:</td>
  <td><? echo $campo_ex['cod_microscopia']; ?></td>
</tr>
<tr>
  <td>Microscopia :</td>
  <td><? echo $campo_ex['microscopia']; ?></td>
</tr>
<tr>
  <td>C&oacute;d Conclus&atilde;o:</td>
  <td><? echo $campo_ex['cod_conclusao']; ?></td>
</tr>
<tr>
  <td>Conclus&atilde;o :</td>
  <td><? echo $campo_ex['conclusao']; ?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" bgcolor="#333333"><div align="center" class="style8"><span class="style9">Observa&ccedil;&otilde;es</span></div></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Entrada :</td>
  <td><? echo $campo_ex['obs_entrada']; ?></td>
</tr>
<tr>
  <td>Laudo :</td>
  <td><span class="style1">
    <? echo $campo_ex['obs_saida']; ?>
  </span></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" bgcolor="#333333"><div align="center" class="style8"><span class="style9">Outras Informa&ccedil;&otilde;es</span></div></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Solicita&ccedil;&atilde;o :</td>
  <td><? echo $campo_med['nome']; ?></td>
</tr>
<tr>
  <td>M&eacute;dico Execultante :</td>
  <td><? echo $campo_ex['medico_execultante']; ?></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><? echo $campo_conve['nome']; ?></td>
</tr>
<tr>
  <td>Tipo de Tabela  :</td>
  <td><? echo $campo_ex['tipo_tabela']; ?></td>
</tr>
<tr>
  <td>C&oacute;digo de Procedimento   :</td>
  <td><? echo $campo_ex['codigo_procedimento']; ?></td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>
</table>
</form>
<?

if($_POST['fin1']){


  $modificar="update exame set material = '".$_POST['material']."', valor = '".$_POST['valor']."', macroscopia = '".$_POST['macroscopia']."',obs_entrada = '".$_POST['obs_entrada']."',cod_microscopia = '".$_POST['codigo']."',cod_conclusao = '".$_POST['codigo_conc']."',ex_status_id = '".$_POST['id']."', obs_saida = '".$_POST['obs_saida']."', microscopia = '".$_POST['microscopia']."',conclusao = '".$_POST['conclusao']."' where id = '".$id."';";

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

