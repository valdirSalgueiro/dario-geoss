<?

session_start();
error_reporting (E_ALL ^ E_NOTICE);
?>

<html>

<head>

	<link rel="StyleSheet" href="dtree.css" type="text/css" />

	<script type="text/javascript" src="dtree.js"></script>

<title>Laborat&oacute;rio de Anatomia Patol&oacute;gica</title>
<link href="responsa.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=white class=fonte>

<?

//include('estilo.css');
include('data.php');
include('common.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');
 

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

<form name=form1 method=post>

<fieldset><legend>Usuário: <b><?echo $usuario_autenticado;?></b></legend>

<center>
  <img src="img/logoff.gif" onClick="window.location='sair.php';" width="97" height="22">
</center>

<div class="dtree">



	<script type="text/javascript">

		<!--

		d = new dTree('d');

		d.add(0,-1,'Menu');

		d.add(1,0,'Usuário','');

		d.add(2,1,'Trocar Senha','trocar_senha.php','','conteudo');

		<?

if($acesso[0]==1)

{

 echo "d.add(3,1,'Cadastrar','cad_usu.php','','conteudo');";

}

if($acesso[1]==1)

{

 echo "d.add(4,1,'Modificar','mod_usu.php','','conteudo');";

}

if($acesso[2]==1)

{

 echo "d.add(5,1,'Remover','rem_usu.php','','conteudo');";

}

if($acesso[3]==1)

{

 echo "d.add(6,0,'Cadastro','');";

 if($acesso[3]==1)

 {

  echo "d.add(7,6,'Pacientes','pac.php','','conteudo');";
  
  echo "d.add(8,6,'Médicos','cad_med.php','','conteudo');";
  
  echo "d.add(9,6,'Tipos de Tabelas','cad_tabelas.php','','conteudo');";
  
  echo "d.add(9,6,'Tabela','cad_tabela.php','','conteudo');";
  
  echo "d.add(9,6,'Convênios','cad_conv.php','','conteudo');";
  
  echo "d.add(9,6,'Laboratório','cad_lab.php','','conteudo');";
  
  echo "d.add(9,6,'Material','cad_material.php','','conteudo');";
  
  echo "d.add(10,6,'Tipo de Exame','cad_tipo.php','','conteudo');";

  //echo "d.add(9,6,'Itens de Exame','cad_itens.php','','conteudo');";
  
  //echo "d.add(10,6,'Achados Colposcópicos','cad_achados.php','','conteudo');";
  
  echo "d.add(10,6,'Código Microscopia','cad_cod.php','','conteudo');";
  
  echo "d.add(10,6,'Código Macroscopia','cad_cod_mac.php','','conteudo');";
   
  echo "d.add(10,6,'Código Conclusão ','cad_cod_conc.php','','conteudo');";
  

 }

}
if($acesso[4]==1)

{

 echo "d.add(33,0,'Alteração','');";

 if($acesso[4]==1)

 {

  echo "d.add(34,33,'Pacientes','mod_pac.php','','conteudo');";
  
  echo "d.add(35,33,'Médicos','mod_med.php','','conteudo');";
  
  echo "d.add(35,33,'Tipo de Tabelas','mod_tipo_tab.php','','conteudo');";
  
  echo "d.add(37,33,'Tabela','mod_tabela.php','','conteudo');";
  
  echo "d.add(36,33,'Convênios','mod_conv.php','','conteudo');";
  
  echo "d.add(36,33,'Laboratório','mod_lab.php','','conteudo');";
  
  echo "d.add(36,33,'Material','mod_mat.php','','conteudo');";
  
  echo "d.add(36,33,'Tipo de Exame','mod_tipo_exame.php','','conteudo');";
  
  //echo "d.add(36,33,'Itens de Exame','mod_itens.php','','conteudo');";
     
   //echo "d.add(37,33,'Achados Colposcópicos','mod_achados_col.php','','conteudo');";
   
   echo "d.add(37,33,'Código Microscopia','mod_mic.php','','conteudo');";
   
   echo "d.add(37,33,'Código Macroscopia','mod_mac.php','','conteudo');";
   
   echo "d.add(37,33,'Código Conclusão','mod_con.php','','conteudo');";
   
   
  //echo "d.add(38,33,'Laboratório','cad_lab.php','','conteudo');";
  
  //echo "d.add(9,6,'Material','cad_material.php','','conteudo');";
  
  //echo "d.add(39,33,'Itens de Exame','cad_itens.php','','conteudo');";
  
  //echo "d.add(40,33,'Tipo de Exame','cad_tipo.php','','conteudo');";
  
  //echo "d.add(41,33,'Achados Colposcópicos','cad_achados.php','','conteudo');";
  
  //echo "d.add(42,33,'Código Microscopia','cad_cod.php','','conteudo');";
  
  //echo "d.add(43,33,'Código Macroscopia','cad_cod_mac.php','','conteudo');";
   
  //echo "d.add(44,33,'Código Conclusão ','cad_cod_conc.php','','conteudo');";
  

 }

}

if($acesso[5]==1)
{

 echo "d.add(13,0,'Exames','');";

if($acesso[5]==1)

 {

  echo "d.add(15,13,'Sistema Antigo','../../lap_antigo','','conteudo');";

 }

 
 if($acesso[5]==1)

 {

  echo "d.add(15,13,'GSL','ent.php','','conteudo');";

 }
 if($acesso[5]==1)

 {

  echo "d.add(14,13,'Listar Exames Previstos','busca_exames.php','','conteudo0');";

 }
if($acesso[5]==1)

 {

  echo "d.add(14,13,'Pendências por Médico','pendencias.php','','conteudo');";

 }
if($acesso[5]==1)

 {

  echo "d.add(15,13,'Livro de Registro','livro.php','','conteudo');";
  
  }
if($acesso[5]==1)

 {

  echo "d.add(15,13,'Substituir','substituir.php','','conteudo');";
  
  }
if($acesso[5]==1)

 {

  echo "d.add(15,13,'Exclusão','exclusao.php','','conteudo');";
  
  }
 if($acesso[5]==1)

 {
    //echo "d.add(14,13,'Etiqueta','etiqueta.php','','conteudo');";
echo "d.add(14,13,'Exames não digitados [ ".countExameNaoDigitados()." ]','ex_naodigitados.php','','conteudo');";  
echo "d.add(14,13,'Em Aberto [ ".countExameAberto()." ]','ex_aberto.php','','conteudo');";
  echo "d.add(14,13,'Em Andamento [ ".countExameAndamento()." ]','ex_andamento.php','','conteudo');";
  echo "d.add(14,13,'Fechados [ ".countExameFechado()." ]','ex_fechado.php','','conteudo');";
 echo "d.add(14,13,'Cancelados [ ".countExameCancelado()." ]','ex_cancelado.php?tipo=histo','','conteudo');";
  

 }
  if($acesso[5]==1)

 {

  echo "d.add(14,13,'Listar Exames Previstos','busca_exames.php','','conteudo');";

 }
   if($acesso[5]==1)

 {

  echo "d.add(58,13,'Pesquisa','pesquisa.php','','conteudo');";

 }
}
 if($acesso[5]==1)

 {

  //echo "d.add(15,13,'Digitação de Laudos','laudos.php','','conteudo');";
  
  }
   if($acesso[5]==1)

 {

  echo "d.add(15,13,'Entrega','entrega.php','','conteudo');";
  
  }
  
   if($acesso[5]==1)

 {

  echo "d.add(16,13,'Impressão','reimp.php','','conteudo');";
  }
  if($acesso[5]==1)

 {

  echo "d.add(16,13,'Tamanho das Fotos','tamanho.php','','conteudo');";
  }

 if($acesso[9]==1)

{
echo "d.add(1322,0,'Convênios','');";

 if($acesso[9]==1)

 {

  echo "d.add(1333,1322,'Prazos para Fechamento','prazos.php','','conteudo');";
   
  echo "d.add(1334,1322,'Fechamentos','fechamento.php','','conteudo');";
  
   
 }
}

if($acesso[6]==1)

{

 echo "d.add(190,0,'Financeiro','');";

 if($acesso[6]==1)

 {
 echo "d.add(191,190,'Impressão de Recibo','recibo.php','','conteudo');";

 echo "d.add(191,190,'Contas a Pagar / Receber','contas.php','','conteudo');";
  
  echo "d.add(191,190,'Contas','todas_contas.php','','conteudo');";

  echo "d.add(191,190,'Impressão de Recibo','recibo.php','','conteudo');";

echo "d.add(192,190,'Faturar','faturar.php','','conteudo');";
  
  echo "d.add(192,190,'Faturamento','faturamento.php','','conteudo');";

  echo "d.add(192,190,'Faturamento por Convênio','fat.php','','conteudo');";
 
 
 }
}
if($acesso[7]==1)

{

 echo "d.add(30,0,'Gestão Laboratorial','');";

 if($acesso[7]==1)

 {
  echo "d.add(31,30,'Documentos','documentos.php','','conteudo');";
 
  echo "d.add(31,30,'Histórico do Paciente','pesq_paciente.php','','conteudo');";

 echo "d.add(31,30,'Fazer Backup','backup.php','','conteudo');";
  
  echo "d.add(31,30,'Backups','backups.php','','conteudo');";
  
  echo "d.add(31,30,'Procurar Paciente','pesq_paciente.php','','conteudo');";

  echo "d.add(31,30,'Procurar Médico','pesq_med.php','','conteudo');";
  
  echo "d.add(32,30,'Pesquisar Microscopia','pesq_cod.php','','conteudo');";

  echo "d.add(32,30,'Pesquisar Microscopia Avançada','pesq_mic_avancado.php','','conteudo');"; 

  
  echo "d.add(32,30,'Pesquisar Macroscopia','pesq_cod_mac.php','','conteudo');";

  echo "d.add(32,30,'Pesquisar Macroscopia Avançada','pesq_mac_avancado.php','','conteudo');"; 

  
  echo "d.add(32,30,'Pesquisar Conclusão','pesq_cod_conc.php','','conteudo');"; 
  
  echo "d.add(32,30,'Pesquisar Conclusão Avançada','pesq_cod_conc_avancado.php','','conteudo');"; 
  
  echo "d.add(32,30,'Pesquisar Achados','pesq_achados.php','','conteudo');"; 
 
 }
}
if($acesso[8]==1)

{

 echo "d.add(200,0,'Agenda','');";

 if($acesso[8]==1)

 {

  echo "d.add(201,200,'Agenda de Telefones','agenda_tels.php','','conteudo');";
   
  echo "d.add(202,200,'Agenda de Lembretes','agenda_lembretes.php','','conteudo');";
  
   
 }
}
if($acesso[8]==1)

{

 echo "d.add(20,0,'Agendamento','');";

 if($acesso[8]==1)

 {

  echo "d.add(21,20,'Agendar','agendamento.php','','conteudo');";
   
  echo "d.add(23,20,'Pesquisar','agendados.php','','conteudo');";
  
   
 }
}
if($acesso[9]==1)

{

 echo "d.add(132,0,'Logs','');";

 if($acesso[9]==1)

 {

  echo "d.add(133,132,'Exames','log_ex.php','','conteudo');";
   
  echo "d.add(134,132,'Agendamentos','log_agend.php','','conteudo');";
  
   
 }
}


        ?>



		d.draw();

		//-->

	</script>



</div>

</fieldset>

</form>

</body>

</html>

