<script language="javascript" type="text/javascript">
function trocarAction(){
	//document.formBuscaRST.action = '\printRelatorioRST.php';
	document.formBuscaRST.action = '\index.php?t=prst';
	//win.open("http://www.google.com","Google","");
}
	
</script>


<?php


//$supporterp = $_POST[supporter]; 
$projectp =  $_POST[project]; 
$severityp = $_POST[severity]; 
$priorityp = $_POST[priority]; 
$statusp = $_POST[status]; 
$categoryp = $_POST[category]; 
$platformp = $_POST[platform]; 
//$first_namep = $_POST[first_name]; 
//$last_namep = $_POST[last_name]; 
$userp = $_POST[user]; 
$user_groupsp = $_POST[user_groups];	
$officep = $_POST[office]; 
//$keywordsp = $_POST[keywords];

/**
* file:	tsearch.php
*
* 		This file takes care of the ticket search front end.
*
/***************************************************************************
*  This program is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  General Public License for more details.
*
*  You should have received a copy of the GNU General Public
*  License along with This program; if not, write to:
*    Free Software Foundation, Inc.
*    59 Temple Place
*    Suite 330
*    Boston, MA  02111-1307  USA
*
* Copyright 2006 OneOrZero
* info@oneorzero.com
* http://www.oneorzero.com
* Developers: OneOrZero Team / Contributors: OneOrZero Community
****************************************************************************/

require_once "../common/common.php";
require_once "../common/init_server_settings.php";
require_once "../common/$database.class.php";
require_once "../common/init_ooz.php";
require_once "../common/login.php";
$highest_pri= getRPriority(getHighestRank($tpriorities_table)); //set the highest priority rating
$today= getdate();

if (isset ($_POST[search]) || isset ($_GET[s]))
{
	$time= time();
	// lets get the information ready to be passed to the displayTicket table.
	if ($_GET[stmt] == '')
	{
		$sql= "select * from $tickets_table where (";

		if ($_GET[s] == 'tim' || $_GET[s] == 'mit')
		{
			$sql= "select t.*, ($time - t.lastupdate)/p.response_time as a from   $tickets_table t, $tpriorities_table p where p.priority=t.priority and (";
		}
	}
	else
	{
		// Chris Cox (Mar 05) - if using sqlite $_GET[stmt] does not contain the sql string correctly
		// escaped (with slashes) due to the sqlite_escape_string function and so will cause query errors later on
		// we'll work around this.
		if ($database= "sqlite")
		{
			$_GET[stmt]= str_replace("''", "\'", $_GET[stmt]);
		}
		$_POST[query]= stripslashes($_GET[stmt]);

		if ($_GET[s] == 'tim' || $_GET[s] == 'mit')
		{
			$_POST[query]= eregi_replace("select \* from $tickets_table where \(", "select t.*, ($time - t.lastupdate)/p.response_time as a from $tickets_table t,  $tpriorities_table p where p.priority=t.priority and (", $_POST[query]);
			$_POST[query]= ereg_replace(' priority=', ' t.priority=', $_POST[query]);
		}
		else
		{
			$_POST[query]= eregi_replace("select t.*, \([0-9]* - t.lastupdate\)/p.response_time as a from $tickets_table t,  $tpriorities_table p where p.priority=t.priority and \(", "select * from $tickets_table,  where (", $_POST[query]);
			$_POST[query]= eregi_replace(' t.priority=', ' priority=', $_POST[query]);
		}
	}
	// if $sql is set, do not do all of the following checking.  Pass the $sql variable to the displayTicket
	// function right away.
	if (!isset ($_POST[query]) || $_POST[query] == '')
	{
		if (isset ($_POST[supp_group]) && $_POST[supp_group] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " groupid=$_POST[supp_group]";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] groupid=$_POST[supp_group]";
				$flag= 1;
			}
		}

		if (isset ($_POST[supporter]) && $_POST[supporter] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " supporter='$_POST[supporter]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] supporter='$_POST[supporter]'";
				$flag= 1;
			}
		}

		if (isset ($_POST[project]) && $_POST[project] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " project='$_POST[project]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] project='$_POST[project]'";
				$flag= 1;
			}

			$_GET[prset]= 1;
		}

		if (isset ($_POST[severity]) && $_POST[severity] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " severity='$_POST[severity]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] severity='$_POST[severity]'";
				$flag= 1;
			}

			$_GET[sevset]= 1;
		}
		######################################################
		if (isset ($_POST[unidade]) && $_POST[unidade] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " unidade like '$_POST[unidade]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] unidade like '$_POST[unidade]'";
				$flag= 1;
			}

			
		}
		
		
		
		if (isset ($_POST[tombamento]) && $_POST[tombamento] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " n_tombamento = $_POST[tombamento]";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] n_tombamento = $_POST[tombamento]";
				$flag= 1;
			}

			
		}
		
		
		if (isset ($_POST[oscli]) && $_POST[oscli] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " contrato like '$_POST[oscli]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] contrato like '$_POST[oscli]'";
				$flag= 1;
			}

			
		}
		
		if (isset ($_POST[serie]) && $_POST[serie] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " n_serie like '$_POST[serie]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] n_serie like '$_POST[serie]'";
				$flag= 1;
			}

			
		}
		######################################################
		if (isset ($_POST[priority]) && $_POST[priority] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " priority='$_POST[priority]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] priority='$_POST[priority]'";
				$flag= 1;
			}

			$_GET[pset]= 1;
		}

		if (isset ($_POST[status]) && $_POST[status] != '' && $_POST[status] != 'notclosed')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " status='$_POST[status]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] status='$_POST[status]'";
				$flag= 1;
			}
			$_GET[sset]= 1;
		}



		if (isset ($_POST[estado]) && $_POST[estado] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " estado='$_POST[estado]'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] estado='$_POST[estado]'";
				$flag= 1;
			}
			$_GET[sset]= 1;
		}



		
		
		if($_POST[searchr]){
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " status!='RST cancelado pelo cliente' ";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] status!='RST cancelado pelo cliente' ";
				$flag= 1;
			}
			$_GET[sset]= 1;
		}
		

		if (isset ($_POST[status]) && $_POST[status] != '' && $_POST[status] == 'notclosed')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " status!='RST cancelado pelo cliente' and status!='".getRStatus(getHighestRank($tstatus_table))."'";
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor] status!='".getRStatus(getHighestRank($tstatus_table))."' $_POST[andor] status!='RST cancelado pelo cliente' ";
				$flag= 1;
			}

			$_GET[sset]= 1;
		}

		if ($_POST[first_name] != '' && $_POST[last_name] == '')
		{
			$usernamesql = getUserNameFromFullName($_POST[first_name], '','');

			if ($flag != 1 || !isset ($flag))
			{
				$sql .= $usernamesql;
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor]$usernamesql";
				$flag= 1;
			}
		}

		if ($_POST[first_name] == '' && $_POST[last_name] != '')
		{
			$usernamesql = getUserNameFromFullName('', $_POST[last_name],'');

			if ($flag != 1 || !isset ($flag))
			{
				$sql .= $usernamesql;
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor]$usernamesql";
				$flag= 1;
			}
		}

		if ($_POST[first_name] != '' && $_POST[last_name] != '')
		{
			$usernamesql = getUserNameFromFullName($_POST[first_name], $_POST[last_name],$_POST[andor]);

			if ($flag != 1 || !isset ($flag))
			{
				$sql .= $usernamesql;
				$flag= 1;
			}
			else
			{
				$sql .= " $_POST[andor]$usernamesql";
				$flag= 1;
			}
		}




	if (isset ($_POST[id_coordenador]) && $_POST[id_coordenador] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " id_coordenador='$_POST[id_coordenador]'";
			$flag= 1;
		}
		else
		{
			$sql .= " $_POST[andor] id_coordenador='$_POST[id_coordenador]'";
			$flag= 1;
		}
	}





	if (isset ($_POST[user]) && $_POST[user] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " user='$_POST[user]'";
			$flag= 1;
		}
		else
		{
			$sql .= " $_POST[andor] user='$_POST[user]'";
			$flag= 1;
		}
	}
	if (isset ($_POST[user_groups]) && $_POST[user_groups] != '')
	{
		$sqlUserGroups = "SELECT user_name FROM ".$table_prefix."ugroup".$_POST[user_groups];
		$resultUserGroups = $db->query($sqlUserGroups);
		$i=0;
		while($rowUserGroups = $db->fetch_array($resultUserGroups)){
			if ($flag != 1 || !isset ($flag))
			{
				if ($i==0) {
					$sql .= " user='$rowUserGroups[0]'";
				}else{
					$sql .= " OR user='$rowUserGroups[0]'";
				}
				$flag= 1;
			}
			else
			{
				if ($i==0) {
					$sql .= " $_POST[andor] user='$rowUserGroups[0]'";
				}else{
					$sql .= " OR user='$rowUserGroups[0]'";
				}
				$flag= 1;
			}
			$i++;
			} // while

	}

	if (isset ($_POST[office]) && $_POST[office] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " office='$_POST[office]'";
			$flag= 1;
		}
		else
		{
			$sql .= " $_POST[andor] office='$_POST[office]'";
			$flag= 1;
		}
	}

	if (isset ($_POST[category]) && $_POST[category] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " category='$_POST[category]'";
			$flag= 1;
		}
		else
		{
			$sql .= " $_POST[andor] category='$_POST[category]'";
			$flag= 1;
		}
	}

	if (isset ($_POST[platform]) && $_POST[platform] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " platform='$_POST[platform]'";
			$flag= 1;
		}
		else
		{
			$sql .= " $_POST[andor] platform='$_POST[platform]'";
			$flag= 1;
		}
	}
	// lets create the timestamp information first.
	if (isset ($_POST[syear]) && isset ($_POST[smonth]) && isset ($_POST[sday]))
	{
		$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
		$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);

		if ($flag != 1 || !isset ($flag))
		{
		if($_POST[status] == 'Fechado'){
			$sql .= " (data_resolu > $stimestamp and data_resolu < $etimestamp)";
		}else{
			$sql .= " (create_date > $stimestamp and create_date < $etimestamp)";
			}
			$flag= 1;
		}
		else
		{
			if($_POST[status] == 'Fechado'){
			$sql .= " $_POST[andor] (data_resolu > $stimestamp and data_resolu < $etimestamp)";
			}else{
			$sql .= " $_POST[andor] (create_date > $stimestamp and create_date < $etimestamp)";
			}
			$flag= 1;
		}
	}

	if (isset ($_POST[keywords]) && $_POST[keywords] != '')
	{
		if ($flag != 1 || !isset ($flag))
		{
			//$sql .= " (short regexp '$_POST[keywords]' or description regexp '$_POST[keywords]')";
			$sql .= " (short LIKE '%$_POST[keywords]%' or description LIKE '%$_POST[keywords]%')";
			$flag= 1;
		}
		else
		{
			//$sql .= " $_POST[andor] (short regexp '$_POST[keywords]' or description regexp '$_POST[keywords]')";
			$sql .= " $_POST[andor] (short LIKE '%$_POST[keywords]%' or description LIKE '%$_POST[keywords]%')";
			$flag= 1;
		}
	}
}
else
{
	$sql= stripslashes($_POST[query]);

}

if (!isset ($_POST[query]) || $_POST[query] == '')
{
	$sql .= ")";
}

if (isset ($_POST[input]) && $_POST[input] != '')
{
	$sql= "select * from $tickets_table  where ".$_POST[input];
}

 
		$sql .= " order by id asc";
		
//die ($sql);
// set up the sql statement for inclusion in the link for sorting and execute the current
// sql statement for displaying the proper tickets.
$sql2= eregi_replace(" order(.*)", "", $sql);
$sql2= eregi_replace(" ", "%20", $sql2);

if ($sql == "select * from $tickets_table  where ()")
{
	printerror("$lang_searchcriteria");
}
else
{
	createHeader("$lang_searchresults");

if($statusp == 'notclosed'){
$statusp = "Não Fechado";
}
	echo "
	
	<TABLE class=border cellSpacing=1 cellPadding=5 width=100% border=0>
	<tr>
		<td class=hf  align=center><b>Equipamento</b></td>
		<td class=hf  align=center><b>Nivel de Falha</b></td>
		<td class=hf  align=center><b>Prioridade</b></td> 
		<td class=hf  align=center><b>Estado</b></td> 
		<td class=hf  align=center><b>Categoria</b></td> 
		<td class=hf  align=center><b>Plataforma</b></td> 
		<td class=hf  align=center><b>Usuario</b></td> 
		<td class=hf  align=center><b>Empresa</b></td>
	</tr>
	<tr>
		<td class=hf  align=center>$projectp</td>
		<td class=hf  align=center>$severityp</td>
		<td class=hf  align=center>$priorityp</td> 
		<td class=hf  align=center>$statusp</td> 
		<td class=hf  align=center>$categoryp</td> 
		<td class=hf  align=center>$platformp</td> 
		<td class=hf  align=center>$userp</td> 
		<td class=hf  align=center>$officep</td>
	</tr>
	</table>
	
			"."<br>".'
	
	<TABLE class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
				<TR>
				<TD>
					<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>';
	echo ' <tr> ';
	echo '<td class=hf  align=center>
									<b>RST</b></td>';

	if($_POST['criadock']){
	echo '<td class=hf  align=center>
									<b>Criado em</b></td>';
	}
	if($_POST['tecnicock']){
	echo '<td class=hf  align=center>
									<b>Tecnico</b></td>';
	}
	if($_POST['emck']){
	echo '<td class=hf  align=center>
									<b>Equipamento / Modelo</b></td>';
	}
	if($_POST['defeitock']){
	echo '<td class=hf  align=center>
									<b>Defeito</b></td>';
	}
	if($_POST['pecapendck']){
	echo '<td class=hf  align=center>
									<b>Peça Pendente</b></td>';
	}
	if($_POST['clienteck']){
	echo '<td class=hf  align=center>
									<b>Cliente</b></td>';
	}
	if($_POST['unidadeck']){
	echo '<td class=hf  align=center>
									<b>Unidade</b></td>';
	}
	if($_POST['cidadeck']){
	echo '<td class=hf  align=center>
									<b>Cidade</b></td>';
	}
	if($_POST['statusck']){
	echo '<td class=hf  align=center>
									<b>Status</b></td>';
	}
	if($_POST['tombamentock']){
	echo '<td class=hf  align=center>
									<b>Tombamento</b></td>';
	}
	if($_POST['solucaock']){
	echo '<td class=hf  align=center>
									<b>Solu&ccedil;&acirc;o</b></td>';
	}
	
	/* if ($_GET[s] == 'id')
	{
		echo '<td class=hf  align=center>
								<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=di&stmt='.htmlentities($sql2).'><b>Nº RST</b></a></td>';
	}
	else
	{
		echo '<td class=hf align=center>
								<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=id&stmt='.htmlentities($sql2).'><b>Nº RST</b></a></td>';
	}

	if ($_GET[s] == 'sup')
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=pus&stmt='.htmlentities($sql2).'><b>'.$lang_Supporter.' </b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=sup&stmt='.htmlentities($sql2).'><b>'.$lang_Supporter.'</b></a></td>';
	}

	if ($_GET[s] == 'sho')
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=ohs&stmt='.htmlentities($sql2).'><b>Defeito reclamado</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=sho&stmt='.htmlentities($sql2).'><b>Defeito reclamado</b></a></td>';
	}

if ($_GET[s] == 'usr')
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=rsu&stmt='.htmlentities($sql2).'><b>Empresa</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=usr&stmt='.htmlentities($sql2).'><b>Empresa</b></a></td>';
	}

	echo '<td class=hf  align=center><b>Unidade </b</td>';

	if ($_GET[s] == 'pri' && $_GET[pset] != 1)
	{
		echo '<td class=hf  align=center>
								<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=irp&stmt='.htmlentities($sql2).'><b>'.$lang_priority.'</b></a></td>';
	}
	elseif ($_GET[pset] != 1)
	{
		echo '<td class=hf  align=center><b>Cidade</b></a></td>';
		echo '<td class=hf  align=center>
								<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=pri&stmt='.htmlentities($sql2).'><b>Peça Pendente</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center><b>Cidade</b></a></td>';
		echo '<td class=hf  align=center>
								<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=&stmt='.htmlentities($sql2).'><b>Peça Pendente</b></a></td>';
	}

	if ($_GET[s] == 'cre')
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=erc&stmt='.htmlentities($sql2).'><b>'.$lang_created.'</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=cre&stmt='.htmlentities($sql2).'><b>'.$lang_created.'</b></a></td>';
	}

	if ($_GET[s] == 'sta' && $_GET[sset] != 1)
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=ats&stmt='.htmlentities($sql2).'><b>'.$lang_status.'</b></a></td>';
	}
	elseif ($_GET[sset] != 1)
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=sta&stmt='.htmlentities($sql2).'><b>'.$lang_status.'</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=&stmt='.htmlentities($sql2).'><b>'.$lang_status.'</b></a></td>';
	}

	if ($_GET[s] == 'tim')
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=mit&stmt='.htmlentities($sql2).'><b>'.$lang_time.'</b></a></td>';
	}
	else
	{
		echo '<td class=hf  align=center>
									<a class=hf href=index.php?t=tsrc&pset='.$_GET[pset].'&sset='.$_GET[sset].'&s=tim&stmt='.htmlentities($sql2).'><b>'.$lang_time.'</b></a></td>';
	}
	echo '<td class=hf  align=center>
									<b> Orçamento</b></a></td>';
	echo '<td class=hf  align=center>
									<b> Tombamento</b></td>';
 */

	echo '</tr>';

	$searchresults= 0;
	switch ($_GET[s])
	{
		case ("pri") :
			for ($i= 0; $i < $num_prios; $i ++)
			{
				$statement= $sql." and priority='".$prios[$i]."'";
				$result= $db->query($statement);
				relatorioRST($result);
				$searchresults += $db->num_rows($result);
			}
			break;
		case ("irp") :
			for ($i= 0; $i < $num_prios; $i ++)
			{
				$statement= $sql." and priority='".$prios[$i]."'";
				$result= $db->query($statement);
				relatorioRST($result);
				$searchresults += $db->num_rows($result);
			}
			break;
		case ("sta") :
			for ($i= 0; $i < $num_status; $i ++)
			{
				$statement= $sql." and status='".$status[$i]."'";
				$result= $db->query($statement);
				relatorioRST($result);
				$searchresults += $db->num_rows($result);
			}
			break;
		case ("ats") :
			for ($i= 0; $i < $num_status; $i ++)
			{
				$statement= $sql." and status='".$status[$i]."'";
				$result= $db->query($statement);
				relatorioRST($result);
				$searchresults += $db->num_rows($result);
			}
			break;
		default :
			$result= $db->query($sql);
			relatorioRST($result);
			$searchresults += $db->num_rows($result);
			break;
	}

	endTable();
	print ("<p>$lang_searchresults: <b>$searchresults</b> $lang_tickets</p>");
}
}
else
{
	echo " <form method=post name = formBuscaRST>";
	createHeader("$lang_ticketsearch");

	echo '
			<TABLE class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
					
					<TR>
					
					<TD>
					
						<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_searchtype.': </td>
							<td class=back>
								<select name=andor><option value=and>'.$lang_and.'</option><option value=or>'.$lang_or.'</option></select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_supportergroup.': </td>
							<td class=back><select name=supp_group>';
	createGroupMenu(2);
	echo '
							</select>
							</td>
							</tr> 
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_Supporter.': </td>
							<td class=back>
								<select name=supporter>';
	createSupporterMenu();
	echo '
	                        </select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_ticket.' '.$lang_project.': </td>
							<td class=back><select name=project>';
	createProjectMenu(1);					
	echo '
							</select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_ticket.' '.$lang_severity.': </td>
							<td class=back><select name=severity>';
	createSeverityMenu(1);   

	echo '
	                        </select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_ticket.' '.$lang_priority.': </td>
							<td class=back><select name=priority>';
	createPriorityMenu(2);				
	echo '
							</select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_ticket.' '.$lang_status.': </td>
							<td class=back><select name=status>';
	createStatusMenu(1); 
	echo '
								<option value=notclosed>'.$lang_notclosed.'</option>
								</select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_ticket.' '.$lang_category.': </td>
							<td class=back><select name=category>';
	createCategoryMenu(1);		
	echo '				</select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_platform.': </td>
							<td class=back><select name=platform>';
	createPlatformMenu(1);			
	echo '				</select>
							</td>
							</tr>';
							/*<TR>
							<TD class=back2 align=right width=27%>'.$lang_firstname.': </td>
							<td class=back>
								<input type=text name=first_name>
							</td>	
							</tr>		
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_lastname.': </td>
							<td class=back>
								<input type=text name=last_name>
							</td>	
							</tr>*/
							
							
							
							
							
							echo"\n<tr>\n";
							echo"<td class=back2 align=right width=27%>Coordenador: </td>\n";
							echo"<td class=back>\n";
							echo"<select name=id_coordenador>\n";
							echo"\t<option value='0'>&nbsp;</option>\n";							
							$sql = "SELECT id, user_name FROM ooz_users WHERE admin = 1";
							$sql = $db->query($sql);
							while($row = $db->fetch_array($sql)){
								echo"\t<option value='$row[id]'>$row[user_name]</option>\n";
							}
							echo"</select>\n";
							echo"</td>\n";
							echo"</tr>\n";

							
							
							
							
							
							

							echo '<TR>
							<TD class=back2 align=right width=27%>'.$lang_User.': </td>
							<td class=back>';
	if ($pubpriv == "Public" || $enable_ulist == 'Off')
	{
		echo '             <input type=text name=user>';
	}
	else	
	{
		echo '              <select name=user>';
		createUserMenu();
		echo '              </select>';
	}
	echo '
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_usergroups.': </td>
							<td class=back><select name=user_groups>';
	createUserGroupMenu();		
	echo '				</select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>Nº Tombamento: </td>
							<td class=back>
								<input type=text size=25% name=tombamento>
							</td>	
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>Nº Serie: </td>
							<td class=back>
								<input type=text size=25% name=serie>
							</td>	
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>O.S - Cliente: </td>
							<td class=back>
								<input type=text size=25% name=oscli>
							</td>	
							</tr>
							
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_office.': </td>
							<td class=back>';
							
							echo "<select name = office>";
							echo "<option></option>";
						$consulta = "select * from empresa order by nome_emp";
						$confirmacao = mysql_query( $consulta );
						while( $registro = mysql_fetch_row( $confirmacao ) ){
							$codigo = $registro[0];
							$unidade = $registro[1];
						echo "<option value = \"$unidade\">" . $unidade . "</option>";
				}
				echo "</select>";
							
							
							echo'	
							</td>	
							</tr>
							<TD class=back2 align=right width=27%>Unidade: </td>
							<td class=back>
								<input type=text size=25% name=unidade>
							</td>	
							</tr>
	
	
							<tr>						
							<TD class=back2 align=right width=27%>Estado: </td>
							<td class=back>
							<select name="estado">
								<option></option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="AP">AP</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MG">MG</option>
								<option value="MS">MS</option>
								<option value="MT">MT</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="PR">PR</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="RS">RS</option>
								<option value="SC">SC</option>
								<option value="SE">SE</option>
								<option value="SP">SP</option>
								<option value="TO">TO</option>
							</select>
							</td>	
							</tr>
							
							
							
							
							<TR>
							<TD class=back2 align=right width=27%>'.$lang_betweendates.': </td>
							<td class=back>
								<select name=smonth>';
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								<select name=sday>';
	for ($i= 1; $i < 32; $i ++)
	{
		echo "<option value=$i";
		if ($i == $today['mday'])
			echo " selected";
		echo ">$i</option>\n";
	}
	echo '
								</select>
								<select name=syear>
 <option value=2001';
	if ($today['year'] == 2001)
		echo ' selected';
	echo '>2001</option>
	                                <option value=2002';
	if ($today['year'] == 2002)
		echo ' selected';
	echo '>2002</option>
	                                <option value=2003';
	if ($today['year'] == 2003)
		echo ' selected';
	echo '>2003</option>
	                                <option value=2004';
	if ($today['year'] == 2004)
		echo ' selected';
	echo '>2004</option>
	                                <option value=2005';
	if ($today['year'] == 2005)
		echo ' selected';
	echo '>2005</option>
	                                <option value=2006';
	if ($today['year'] == 2006)
		echo ' selected';
	echo '>2006</option>
	                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option> 
									<option value=2008';
	
	
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>
							<option value=2009';
	
	
	if ($today['year'] == 2009)
		echo ' selected';
	echo '>2009</option>
							<option value=2010';
	
	
	if ($today['year'] == 2010)
		echo ' selected';
	echo '>2010</option>
							<option value=2011';
	
	
	if ($today['year'] == 2011)
		echo ' selected';
	echo '>2011</option>
							<option value=2012';
	
	
	if ($today['year'] == 2012)
		echo ' selected';
	echo '>2012</option>
							<option value=2013';
	
	
	if ($today['year'] == 2013)
		echo ' selected';
	echo '>2013</option>
							<option value=2014';
	
	
	if ($today['year'] == 2014)
		echo ' selected';
	echo '>2014</option>
							<option value=2015';
	
	
	if ($today['year'] == 2015)
		echo ' selected';
	echo '>2015</option>
	                            </select>
								'.$lang_and.'&nbsp;
								<select name=emonth>';
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								<select name=eday>
									<option></option>';
	for ($i= 1; $i < 32; $i ++)
	{
		echo "<option value=$i";
		if ($i == $today['mday'])
			echo " selected";
		echo ">$i</option>\n";
	}
	echo '
								</select>
	                            </select>
	                            <select name=eyear>
	                                <option value=2001';
	if ($today['year'] == 2001)
		echo ' selected';
	echo '>2001</option>
	                                <option value=2002';
	if ($today['year'] == 2002)
		echo ' selected';
	echo '>2002</option>
	                                <option value=2003';
	if ($today['year'] == 2003)
		echo ' selected';
	echo '>2003</option>
	                                <option value=2004';
	if ($today['year'] == 2004)
		echo ' selected';
	echo '>2004</option>
	                                <option value=2005';
	if ($today['year'] == 2005)
		echo ' selected';
	echo '>2005</option>
	                                <option value=2006';
	if ($today['year'] == 2006)
		echo ' selected';
	echo '>2006</option>
	                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option>
	
									<option value=2008';
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>
									<option value=2009';
	
	
	if ($today['year'] == 2009)
		echo ' selected';
	echo '>2009</option>
							<option value=2010';
	
	
	if ($today['year'] == 2010)
		echo ' selected';
	echo '>2010</option>
							<option value=2011';
	
	
	if ($today['year'] == 2011)
		echo ' selected';
	echo '>2011</option>
							<option value=2012';
	
	
	if ($today['year'] == 2012)
		echo ' selected';
	echo '>2012</option>
							<option value=2013';
	
	
	if ($today['year'] == 2013)
		echo ' selected';
	echo '>2013</option>
							<option value=2014';
	
	
	if ($today['year'] == 2014)
		echo ' selected';
	echo '>2014</option>
							<option value=2015';
	
	
	if ($today['year'] == 2015)
		echo ' selected';
	echo '>2015</option>
	                            </select>
							</td>
							</tr>
							<TR>
							<TD class=back2 align=right width=27%>Selecione os campos que vão ser exibidos:</td>
							<td class=back>
								<input type="checkbox" name="criadock" id="criadock" checked="checked"/>Criado em <br>
								<input type="checkbox" name="tecnicock" id="tecnicock" checked="checked"/>Tecnico <br>
								<input type="checkbox" name="emck" id="emck" checked="checked"/>Equipamento / Modelo <br>
								<input type="checkbox" name="defeitock" id="defeitock" checked="checked"/>Defeito <br>
								<input type="checkbox" name="pecapendck" id="pecapendck" checked="checked"/>Peça Pendente <br>
								<input type="checkbox" name="clienteck" id="clienteck" checked="checked"/>Cliente <br>
								<input type="checkbox" name="cidadeck" id="cidadeck" checked="checked"/>Cidade <br>
								<input type="checkbox" name="unidadeck" id="unidadeck" checked="checked"/>Unidade <br>
								<input type="checkbox" name="statusck" id="statusck" checked="checked"/>Status <br>
								<input type="checkbox" name="tombamentock" id="tombamentock" checked="checked"/>Tombamento <br>
								<input type="checkbox" name="solucaock" id="solucaock" checked="checked"/>Soluçâo <br>
							</td>	
							</tr>
							


							</tr>
						</table>
					</td>
					</tr>
				</table><br>

				<input type=submit value=\''.$lang_searchforticket.'\' name=search>
				<input type=submit value=\'Imprimir Relatório\' name=search  onClick = \'trocarAction();\'>
								
				<input type=hidden value='.$_POST[query].' name=query>

				</form>';
}
// returns an array containing the priority names
function sqlByPriority($query, $order)
{
	global $tpriorities_table, $tickets_table, $db;

	$sql= "select priority from $tpriorities_table order by rank $order";
	$result= $db->query($sql);

	$i= 0;
	while ($row= $db->fetch_array($result))
	{
		$array[$i]= $row[0];
		$i ++;
	}

	return $array;
}

function getNumberPriorities()
{
	global $tpriorities_table, $db;

	$sql= "select id from $tpriorities_table";
	$result= $db->query($sql);
	$total= $db->num_rows($result);

	return $total;
}
// returns an array containing the status names
function sqlByStatus($query, $order)
{
	global $tstatus_table, $tickets_table, $db;

	$sql= "select status from $tstatus_table order by rank $order";
	$result= $db->query($sql);

	$i= 0;
	while ($row= $db->fetch_array($result))
	{
		$array[$i]= $row[0];
		$i ++;
	}

	return $array;
}

function getNumberStatus()
{
	global $tstatus_table, $db;

	$sql= "select id from $tstatus_table";
	$result= $db->query($sql);
	$total= $db->num_rows($result);

	return $total;
}

function createSupporterMenu()
{
	global $users_table, $db;

	$sql= "select user_name from $users_table where (supporter=1 OR admin=1) "."AND (viewer=1 AND user=1) order by user_name asc";
	$result= $db->query($sql);
	echo "<option></option>";
	while ($row= $db->fetch_array($result))
	{
		echo "<option value=\"$row[0]\"> $row[0] </option>";
	}
}

?>

