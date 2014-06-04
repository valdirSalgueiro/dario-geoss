<?php

/**
 * file:	common.php
 *
 * 	This file contains common functions for the helpdesk program.
 *
 * /***************************************************************************
 *     This program is free software; you can redistribute it and/or
 *     modify it under the terms of the GNU General Public
 *     License as published by the Free Software Foundation; either
 *     version 2.1 of the License, or (at your option) any later version.
 *<strong></strong>
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *     General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public
 *     License along with This program; if not, write to:
 *       Free Software Foundation, Inc.
 *       59 Temple Place
 *       Suite 330
 *       Boston, MA  02111-1307  USA
 *
 * Copyright 2006 OneOrZero
 * info@oneorzero.com
 * http://www.oneorzero.com
 * Developers: OneOrZero Team / Contributors: OneOrZero Community
 */
/**
 * function isEmpty():
 * 		Takes a table name as an argument.  Selects everything from that table.  Returns true if the number
 * 	of rows is greater than 0, otherwise false.
 */
 
 
 function CPF($cpf)
{
    if(preg_match("/^(\d{3}\.){2}\d{3}-\d{2}$/",$cpf) || preg_match("/\d{11}$/",$cpf))
    {
        $cpf = preg_replace("/[.-]/","",$cpf);
        if(substr_count($cpf,substr($cpf,0,1)) >= 11)
        {
            return false;
        }
        else
        {
            $cpf_temp = substr($cpf,0,9);
            $soma1 = 0;
            $soma2 = 0;
            for($i = 1; $i<= 9; $i++)
            {
                $soma1 += intval(substr($cpf,$i-1,1)) * $i;
            }
            $dv1 = $soma1 % 11;
            if($dv1 == 10) { $dv1 = 0; }
            $cpf_temp = $cpf_temp.$dv1;
            for($i = 0; $i<=9;$i++)
            {
                $soma2 += intval(substr($cpf_temp,$i,1)) * $i;
            }
            $dv2 = $soma2 % 11;
            if($dv2 == 10) { $dv2 = 0; }
            $cpf_final = $cpf_temp.$dv2;
            if(strcmp($cpf,$cpf_final))
            {
                return false;
            }
            else
            {
                return true;
            }
        }       
    }
    else
    {
        return false;
    }
}

 
function empresas4mapbrasil($uf){
	
	global $db;
	
	$sql = "
	SELECT DISTINCT (e.nome_emp), e.id_emp
	FROM unidade u, empresa e
	WHERE u.id_emp = e.id_emp
	AND `estado_unidade` LIKE '$uf'
	ORDER BY e.nome_emp ASC";
	
	$sql = $db->query($sql);
	while($row = $db->fetch_array($sql)){
		$return .= "<a href=?t=det&id=$row[1]><b>$row[0]</b></a><br>";
	}
	return $return;
}

function fieldate($today=NULL, $sday="sday", $smonth="smonth", $syear="syear"){
	
	if(!$today){
		$today = time();
	}
	$today = getdate($today);
	
	echo"<select name='$sday'>\n";
		for ($i= 1; $i <= 31; $i ++){
			echo "<option value='$i'";
			if ($i == $today["mday"]) echo " selected='selected'";
			echo ">".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>\n";
		}
	echo "</select>\n";

	echo"<select name='$smonth'>\n";
		for ($i= 1; $i <= 12; $i ++){
			echo "<option value='$i'";
			if ($today["mon"] == $i) echo " selected='selected'";
			echo ">".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>\n";
		}
	echo "</select>\n";
	
	echo"<select name='$syear'>\n";
	$tyear = getdate(time() + 315360000);
		for ($i= 2000; $i <= $tyear["year"]; $i ++){
			echo "<option value='$i'";
			if ($today["year"] == $i) echo " selected='selected'";
			echo ">".str_pad($i, 4, "0", STR_PAD_LEFT)."</option>\n";
		}
	echo"</select>\n";
	
}


function fieldtime($now=NULL, $shor="shor", $smin="smin", $ssec="ssec"){
	
	if(!$now){
		$now = time();
	}
	$now = getdate($now);
	
	echo"<select name='$shor'>\n";
		for ($i= 0; $i <= 23; $i ++){
			echo "<option value='$i'";
			if ($i == $now["hours"]) echo " selected='selected'";
			echo ">".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>\n"
;
		}
	echo "</select>\n";

	echo"<select name='$smin'>\n";
		for ($i= 0; $i <= 59; $i ++){
			echo "<option value='$i'";
			if ($now["minutes"] == $i) echo " selected='selected'";
			echo ">".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>\n"
;
		}
	echo "</select>\n";
	
	echo"<select name='$ssec'>\n";
		for ($i= 0; $i <= 59; $i ++){
			echo "<option value='$i'";
			if ($now["seconds"] == $i) echo " selected='selected'";
			echo ">".str_pad($i, 2, "0", STR_PAD_LEFT)."</option>\n"
;
		}
	echo"</select>\n";
	
}


function count_aten($dia = 0, $uf = NULL){
	$sql = "SELECT COUNT(`create_date`)
	FROM `ooz_tickets`
	WHERE `status` <> 'Fechado'
	AND `status` <> 'Em Laboratorio'
	AND `status` <> 'Laudo Externo'
	AND `status` <> 'Pendente por peça'
	AND `status` <> 'RST cancelado pelo cliente'
	AND FLOOR(`create_date`/86400) <= $dia";

	switch($uf){
		case "pe":
			$sql .= " AND estado = 'PE'";
			break;
		case "not":
			$sql .= " AND estado <> 'PE'";
			break;
	}	

	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	
	return $sql[0];
}

function count_peca($dia = 0, $uf = NULL){
	$sql = "SELECT COUNT(`create_date`)
	FROM `ooz_tickets`
	WHERE `status` <> 'Fechado'
	AND `status` <> 'RST cancelado pelo cliente'
	AND `status` = 'Pendente por peça'
	AND FLOOR(`create_date`/86400) <= $dia";
	
	
	switch($uf){
		case "pe":
			$sql .= " AND estado = 'PE'";
			break;
		case "not":
			$sql .= " AND estado <> 'PE'";
			break;
	}
	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	return $sql[0];
}

function count_labo($dia = 0, $uf = NULL){
	$sql = "SELECT COUNT(`create_date`)
	FROM `ooz_tickets`
	WHERE `status` <> 'Fechado'
	AND `status` <> 'RST cancelado pelo cliente'
	AND (`status` = 'Laudo Externo'
	OR `status` = 'Pendente por peça')
	AND FLOOR(`create_date`/86400) <= $dia";
	
	
	switch($uf){
		case "pe":
			$sql .= " AND estado = 'PE'";
			break;
		case "not":
			$sql .= " AND estado <> 'PE'";
			break;
	}
	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	return $sql[0];
}

function count_aber($dia = 0, $uf = NULL){
	$sql = "SELECT COUNT(`create_date`)
	FROM `ooz_tickets` 
	WHERE `status` <> 'Fechado'
	AND `status` <> 'RST cancelado pelo cliente'
	AND FLOOR(`create_date`/86400) = $dia";
	
	
	switch($uf){
		case "pe":
			$sql .= " AND estado = 'PE'";
			break;
		case "not":
			$sql .= " AND estado <> 'PE'";
			break;
	}
	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	return $sql[0];
}

function count_fec($dia = 0, $uf = NULL){
	$sql = "SELECT COUNT(`data_resolu`)
	FROM `ooz_tickets` 
	WHERE `status` = 'Fechado'
	AND FLOOR(`data_resolu`/86400) = $dia";
	
	
	switch($uf){
		case "pe":
			$sql .= " AND estado = 'PE'";
			break;
		case "not":
			$sql .= " AND estado <> 'PE'";
			break;
	}
	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	return $sql[0];
}

function count_avg($dia = 0, $uf = NULL){
	switch($uf){
		case "pe":
			$sql = "SELECT AVG(raber)";
			break;
		case "not":
			$sql = "SELECT AVG(naber)";
			break;
		default:
			$sql = "SELECT AVG(gaber)";
			break;
	}
	
	$sql .= "FROM pendencia 
	WHERE 
	FLOOR(`data`/86400) > ($dia-30)
	AND
	FLOOR(`data`/86400) < ($dia)
	AND raber <> 0 
	AND naber <> 0 
	AND gaber <> 0";
	
	/*
	switch($uf){
		case "pe":
			$sql .= "AND raber <> 0"; 
			break;
		case "not":
			$sql .= "AND naber <> 0";
			break;
		default:
			$sql .= "AND gaber <> 0";
			break;
	}
	*/

	$sql = mysql_query($sql);
	$sql = mysql_fetch_array($sql);
	return $sql[0];
	
}


function time2dia($time = NULL){
	if(!$time){
		$time = time();
	}
	$dia = 86400;
	settype($time,"Integer");
	return floor($time / $dia);
}


function dia2time($dia){
	$tdia = 86400;
	settype($dia,"Integer");
	return floor($dia * $tdia);
}



function validaCNPJ($cnpj) {

	if (strlen($cnpj) <> 14)
		return false;
	
	$soma = 0;
	
	$soma += ($cnpj[0] * 5);
	$soma += ($cnpj[1] * 4);
	$soma += ($cnpj[2] * 3);
	$soma += ($cnpj[3] * 2);
	$soma += ($cnpj[4] * 9);
	$soma += ($cnpj[5] * 8);
	$soma += ($cnpj[6] * 7);
	$soma += ($cnpj[7] * 6);
	$soma += ($cnpj[8] * 5);
	$soma += ($cnpj[9] * 4);
	$soma += ($cnpj[10] * 3);
	$soma += ($cnpj[11] * 2);
	
	$d1 = $soma % 11;
	$d1 = $d1 < 2 ? 0 : 11 - $d1;
	
	$soma = 0;
	$soma += ($cnpj[0] * 6);
	$soma += ($cnpj[1] * 5);
	$soma += ($cnpj[2] * 4);
	$soma += ($cnpj[3] * 3);
	$soma += ($cnpj[4] * 2);
	$soma += ($cnpj[5] * 9);
	$soma += ($cnpj[6] * 8);
	$soma += ($cnpj[7] * 7);
	$soma += ($cnpj[8] * 6);
	$soma += ($cnpj[9] * 5);
	$soma += ($cnpj[10] * 4);
	$soma += ($cnpj[11] * 3);
	$soma += ($cnpj[12] * 2);
	
	
	$d2 = $soma % 11;
	$d2 = $d2 < 2 ? 0 : 11 - $d2;
	
	if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
		return true;
	}else{
		return false;
	}
} 




function chekValidade(){
$hoje = mktime();
$sql = "UPDATE 
			ooz_users , empresa 
		SET 
			viewer = 0, user = 0 , supporter = 0, admin = 0, lastactive = 0 
		WHERE 
			empresa.nome_emp = ooz_users.office and
			empresa.contrato_fim < $hoje ";
		 mysql_query($sql);
			//die($sql);
}
function notificarAdmin(){
 	$assunto = "RST(s) excedidos";
	$sql = "SELECT id, priority, lastupdate, office FROM ooz_tickets WHERE notificado = 0 ORDER BY office";
	$resp = mysql_query($sql);
	$corpo = "RST(s)\n";
	$n = 0;
	while($linha = mysql_fetch_array($resp)){
		if(setResponse($linha['lastupdate'], $linha['priority'], $linha['id']) == 4){
			$n++;
			$id = $linha['id'];
			$office = $linha['office'];
			if(empty($office)){
				$office = "(Nenhuma Empresa)";
			}
			if($office != $current_office){
				$current_office = $office;
				$corpo .= "$current_office\n";
			}
			$corpo .= "\t#$id\n";
			//mysql_query("UPDATE ooz_tickets SET notificado = 1 WHERE id = $id");
		}
	}
	if($n){
		//die(nl2br($corpo));
		$user = $_SESSION['user'];
		$sql = "SELECT email FROM ooz_users WHERE admin = 1";
		$resp = mysql_query($sql);
		while($linha = mysql_fetch_array($resp)){ 
			$destinatario = $linha['email'];
			@mail($destinatario, $assunto, $corpo);
		}
	}
}


function verificaSLA(){
global $stimestamp, $etimestamp;
 
	$sql = "SELECT 
					id, priority, lastupdate FROM ooz_tickets 
			WHERE 	
					office = '$_POST[office]' 
					and (create_date > $stimestamp and create_date < $etimestamp)
					and  status <> '".getRStatus(getHighestRank(ooz_tstatus))."'";
	
	
	$resp = mysql_query($sql);
	$rows = mysql_num_rows($resp);
	$qtd = 0;
	while($linha = mysql_fetch_array($resp)){
		if(setResponse($linha['lastupdate'], $linha['priority'], $linha['id']) == 4){
			$id = $linha['id'];
			$qtd = $qtd + 1;
				
		}
	}
	
	$array = array();
	$array['exedidas'] = $qtd;
	$array['certa'] = $rows - $qtd;
	
	return $array;
}


// Tranforma uma string em uma expressão regular para ser usada em 
function stringParaBusca($str) {
	//Transformando tudo em minúsculas
	$str = trim(strtolower($str));
	//Tirando espaços extras da string... "tarcila  almeida" ou "tarcila   almeida" viram "tarcila almeida"
	while ( strpos($str,"  ") )
		$str = str_replace("  "," ",$str);
	//Agora, vamos trocar os caracteres perigosos "ã,á..." por coisas limpas "a"
	$caracteresPerigosos = array("ã","á","à","ä","â","é","è","ë","ê","í","ì","ï","î","õ","ó","ò","ö","ô","ú","ù","ü","û","ç");
	$caracteresLimpos = array("a","a","a","a","a","e","e","e","e","i","i","i","i","o","o","o","o","o","o","o","o","o","c");
	$str = str_replace($caracteresPerigosos,$caracteresLimpos,$str);
	//Agora que não temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
	//vamos montar a expressão regular para o MySQL
	$caractresSimples = array("a","e","i","o","u","c");
	$caracteresParaRegExp = array(
		"(a|ã|á|à|ä|â|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|Ã|Á|À|Ä|Â|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
		"(e|é|è|ë|ê|&eacute;|&egrave;|&euml;|&ecirc;|É|È|Ë|Ê|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
		"(i|í|ì|ï|î|&iacute;|&igrave;|&iuml;|&icirc;|Í|Ì|Ï|Î|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
		"(o|õ|ó|ò|ö|ô|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|Õ|Ó|Ò|Ö|Ô|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
		"(u|ú|ù|ü|û|&uacute;|&ugrave;|&uuml;|&ucirc;|Ú|Ù|Ü|Û|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
		"(c|ç|Ç|&ccedil;|&Ccedil;)" );
	$str = str_replace($caractresSimples,$caracteresParaRegExp,$str);
	//Trocando espaços por .*
	$str = str_replace(" ",".*",$str);
	//Retornando a String finalizada!
	return $str;
}




//função que monta uma query baseada em um array de checkboxes

function queryAdmin($table ,$ArrayCk = null){
	$sql = "SELECT * FROM $table WHERE 0 ";
	$fim = count($ArrayCk)-1;
	for($i = 0; $i <= $fim; $i++){
		if($ArrayCk[$i]){
			if(!$OR){
				$sql = $sql." OR ";
				$OR = true;
			}else{
				$sql = $sql." AND ";
			}
			$sql = $sql.$ArrayCk[$i];
		}
	}
	return  stripslashes(chop($sql));
}

// Funções de Formatação de Dadas

function data()
{
	$data = date("d/m/Y" );
	echo $data;
}


function hora()
{
	$hora = date("H:i:s" );
	echo $hora;
}

function data_extenso()
{
	$hora = date("H:i:s");
	$data = date("d/m/Y" );
	$dia = substr($data,0,2);
	$mes = substr($data,3,2);
	$ano = substr($data,6,4);
	
	switch( $mes ) {
		case 01:
			$mes = "01";
			break;
		case 02:
			$mes = "02";
			break;
		case 03:
			$mes = "03";
			break;
		case 04:
			$mes = "04";
			break;
		case 05:
			$mes = "05";
			break;
		case 06:
			$mes = "06";
			break;
		case 07:
			$mes = "07";
			break;
		case 08:
			$mes = "08";
			break;
		case 09:
			$mes = "09";
			break;
		case 10:
			$mes = "10";
			break;
		case 11:
			$mes = "11";
			break;
		case 12:
			$mes = "12";
			break;
	}

	return $dia . "/" . $mes . "/" . $ano . " - " . $hora;
}




function isEmpty($table)
{
    global $db;

    $sql = "select * from $table";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows > 0) {
        return false;
    } else {
        return true;
    }
}

/**
 * function checkPassword():
 * 		Takes two arguments, both strings.  If strings are equal to each other, return boolean true.  Else,
 * 	return boolean false.
 */
function checkPwd($pwd1, $pwd2)
{
    if ($pwd1 == $pwd2)
        return true;
    else
        return false;
}

/**
 * function userExists():
 * 		Takes one string as an argument.  Queries the user table and returns true if the user name is found.
 * 	Else, returns false.
 */
function userExists($name)
{
    global $users_table, $db;

    $sql = "select user_name from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows != 0)
        return true;
    else
        return false;
}

/**
 * function isCookieSet():
 * 		Takes no arguments.  Returns boolean true or false if the presence of the cookie is detected.
 * 	References checkUser();
 */
function isCookieSet()
{
    if (checkUser($_SESSION["user"], $_SESSION["enc_pwd"]) && $_SESSION["user"] != '')
        return true;
    else
        return false;
}

/**
 * function checkUser():
 * 		Takes two string arguments.  Name is the user name, pwd is the md5 encoded password.  Connects to the
 * 	database and checks to see if the specified user exists.  If so, the password in the database is
 * 	compared to the pwd argument.  If those match, then return boolean true.  All other cases, return boolean
 * 	false.
 * 	References checkPassword(), connect(), disconnect();
 */
// Brilliant LDAP Hack Modified Line
// function checkUser($name, $pwd) {
function checkUserDB($name, $pwd)
{
    global $users_table, $db;
    // compare $name to what's in the database.
    // return true if the name is found in the database and the password matches.
    $sql = "select * from " . $users_table . " where user_name='" . $name . "'";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows != 1)
        return false;

    $row = $db->fetch_array($result);

    if (!checkPwd($pwd, $row['password']))
        return false;

    if ($row[user] == 0 && $name != '' and $row[viewer] != 1) {
        require_once "common/style.php";
        printerror("Your account is not active.");
        exit;
    }
    // if user the password for the given user is correct, return true
    return true;
}
// Brilliant LDAP Hack Start
function checkUserLDAP($name, $pwd)
{
    global $users_table, $db, $auth_method, $default_language;
    global $ldap_host, $ldap_binddn, $ldap_bindpwd, $ldap_rootdn, $ldap_searchattr, $ldap_domain, $default_language, $lang_please_set_me;;
    global $ldap_fname, $ldap_lname, $ldap_uname, $ldap_email_add, $pass, $ldap_office, $ldap_phone, $ldap_context, $ldap_default_level, $default_theme, $helpdesk_name;
    global $lang_err_modfname, $lang_err_modlname, $lang_err_modemail, $lang_err_crefname, $lang_err_crelname, $lang_err_creemail, $lang_err_noauth, $lang_err_nopass, $lang_err_nouser, $lang_err_nosearch, $lang_err_nobind;
    // compare $name to what's in the database.
    // return true if the name is found in the database and the password matches.
    $sql = "select * from " . $users_table . " where user_name='" . $name . "'";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    $row = $db->fetch_array($result);

    $ldapconn = ldap_connect($ldap_host);
    if (!$ldapconn) {
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_noconnect);
        }

        return false;
    }
    $ldapbind = @ ldap_bind($ldapconn, $ldap_binddn, $ldap_bindpwd);
    if (!$ldapbind) {
        ldap_close($ldapconn);
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_nobind);
        }
        return false;
    }
    $filter = "($ldap_searchattr=$name)";
    $justthese = array ($ldap_fname, $ldap_lname, $ldap_uname, $ldap_email_add, $ldap_office, $ldap_phone, $ldap_context);

    $sr = ldap_search($ldapconn, $ldap_rootdn, $filter, $justthese);
    if (!sr) {
        ldap_close($ldapconn);
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_nosearch);
        }
        return false;
    }
    $info = ldap_get_entries($ldapconn, $sr);
    if ($info["count"] < 1) {
        ldap_close($ldapconn);
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_nouser);
        }
        return false;
    }
    if (!isset ($pwd) || $pwd == '') {
        ldap_close($ldapconn);
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_nopass);
        }
        return false;
    }
    if ($auth_method == 'AD') {
        $userbind = $name . "@" . $ldap_domain;
    } else
        $userbind = $info[0]["$ldap_context"];
    if (!@ ldap_bind($ldapconn, $userbind, $pwd)) {
        ldap_close($ldapconn);
        if (isset ($_POST[login])) {
            require_once "common/style.php";
            printerror($lang_err_noauth);
        }
        return false;
    }
    $fname = $info[0]["$ldap_fname"][0];
    $lname = $info[0]["$ldap_lname"][0];
    $uname = $info[0]["$ldap_uname"][0];
    $email_add = $info[0]["$ldap_email_add"][0];
    $pass = md5($_SESSION[enc_pwd]);
    $office = $info[0]["$ldap_office"][0];
    $phone = $info[0]["$ldap_phone"][0];

    if ($num_rows != 1) {
        if (isset ($fname) && isset ($lname) && isset ($uname) && isset ($email_add) && $fname != "" && $lname != "" && $uname != "" && $email_add != "") {
            // Insert the user info into the OZH DB
            $sql = "INSERT into $users_table values(NULL,'$fname','$lname', '$uname', '$email_add','', '$pass', '$office','$phone', 1, 1, 0, 0,'$default_theme','$lang_please_set_me','$lang_please_set_me', 0,'$default_language', 0, '', '','', '', '', '','', '', '')";
            $result = $db->query($sql);
            // Populates the result var with the new datas....
            $sql = "select * from " . $users_table . " where user_name='" . $name . "'";
            $result = $db->query($sql);
            $row = $db->fetch_array($result);
        } else {
            require_once "common/style.php";
            if (!isset ($fname))
                printerror($lang_err_crefname);
            if (!isset ($lname))
                printerror($lang_err_crelname);
            if (!isset ($email_add))
                printerror($lang_err_creemail);
            return false;
        }
    }
    if ($num_rows == 1) {
        if (isset ($fname) && isset ($lname) && isset ($uname) && isset ($email_add) && $fname != "" && $lname != "" && $uname != "" && $email_add != "") {
            // Update the user info into the OZH DB
            $sql = "update $users_table set first_name='" . $fname . "',last_name='" . $lname . "',user_name='" . $uname . "',email='" . $email_add . "',password='" . $pass . "',office='" . $office . "',phone='" . $phone . "' where user_name='" . $name . "'";
            $result = $db->query($sql);
            // Populates the result var with the new datas....
            $sql = "select * from " . $users_table . " where user_name='" . $name . "'";
            $result = $db->query($sql);
            $row = $db->fetch_array($result);
        } else {
            require_once "common/style.php";
            if (!isset ($fname))
                printerror($lang_err_modfname);
            if (!isset ($lname))
                printerror($lang_err_modlname);
            if (!isset ($email_add))
                printerror($lang_err_modemail);
            return false;
        }
    }
    ldap_close($ldapconn);

    if ($row[user] == 0 && $name != '') {
        require_once "common/style.php";
        printerror("Your account is not active.");
        exit;
    }
    // if user the password for the given user is correct, return true
    return true;
}
function getMD5()
{
    global $auth_method, $pass;
    if ($auth_method == "LDAP" || "AD")
        $pass = $_POST[password];
    if ($auth_method == "DB")
        $pass = md5($_POST[password]);

    return $pass;
}

function checkUser($name, $pwd)
{
    global $auth_method;

    switch ($auth_method) {
        case "DB" :
            return checkUserDB($name, $pwd);
            break;

        case "LDAP":
            return checkUserLDAP($name, $pwd);
            break;
        case "AD":
            return checkUserLDAP($name, $pwd);
            break;
    }

    return false;
}
// Brilliant LDAP Hack Stop
/**
 * function getTotalUsers():
 * 		Takes no arguments.  Queries the user table and returns the number of different users there are as
 * 	an integer value.
 */
function getTotalUsers()
{
    global $users_table, $db;

    $sql = "select id from $users_table";
    $result = $db->query($sql);
    // $row = $db->fetch_array($result);
    $total_users = $db->num_rows($result);

    return $total_users;
}
// Brilliant LDAP Hack Start
function encPwd($pwd)
{
    global $auth_type;

    if ($auth_type == "ldap")
        return $pwd;

    return md5($pwd);
}
// Brilliant LDAP Hack Stop
/**
 * function getTotalAdmins():
 * 		Takes no arguments.  Queries the user table and returns the number of different users there are as
 * 	an integer value.
 */
function getTotalAdmins()
{
    global $users_table, $db;

    $sql = "select id from $users_table where admin=1";
    $result = $db->query($sql);
    // $row = $db->fetch_array($result);
    $num_admins = $db->num_rows($result);

    return $num_admins;
}

/**
 * function getTotalSupporters():
 * 		Takes no arguments.  Queries the user table and returns the number of different users there are as
 * 	an integer value.
 */
function getTotalSupporters()
{
    global $users_table, $db;

    $sql = "select id from $users_table where supporter=1";
    $result = $db->query($sql);
    // $row = $db->fetch_array($result);
    $num_supps = $db->num_rows($result);

    return $num_supps;
}

/**
 * function getUserInfo():
 * 		Takes one integer value as an input.  Queries the user table and returns an array containing all of
 * 	the information that the database contains about the user with the id specified.
 */
function getUserInfo($id)
{
    global $users_table, $db;

    $sql = "select * from $users_table where id=$id";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row;
}

/**
 * function listMembers():
 * 		Takes a user id and a category as an input.  The category determines whether the data is queried
 * 	from all users or from only supporters.  It simply lists the members of the particular group along
 * 	with a link to delete that particular user.
 */
function listMembers($id, $cat)
{
    global $sgroups_table, $ugroups_table, $db, $lang_delete, $table_prefix;

    if ($cat == 'users')
        $group_table = $table_prefix . "ugroup" . $id;
    if ($cat == 'supporters')
        $group_table = $table_prefix . "sgroup" . $id;

    $sql = "select * from $group_table where user_name != 'support_pool' order by user_name asc";
    $result = $db->query($sql);

    echo "<tr><td class=back>";
    while ($row = $db->fetch_array($result)) {
        echo "<LI>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row[2]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        if ($cat == 'users')
            echo "<a href=control.php?t=users&act=uopt&table=$group_table&rm=delete&gid=$row[0]&g=$id>$lang_delete</a>?</LI>";
        if ($cat == 'supporters')
            echo "<a href=control.php?t=users&act=sopt&table=$group_table&rm=delete&gid=$row[0]&g=$id>$lang_delete</a>?</LI>";
    }

    echo "</td></tr>";
}

/**
 * function getAnnouncements():
 * 		Takes no arguments.  Prints out the announcements from the announcement table in the database in
 * 	an easy to read format.
 */
function getAnnouncements($flag)
{
    global $announcements_limit, $announcement_table, $a, $db, $lang_delete, $lang_edit, $lang_dateformat, $delimiter;
    global $enable_announcement_security_filtering;

    if ($a == 1) {
        $sql = "select * from $announcement_table order by id desc";
    } else {
        $sql = "select * from $announcement_table order by id desc limit $announcements_limit";
    }

    $result = $db->query($sql);
    $i = 0;
    $uGroupArray = getUGroupsID($_SESSION[user]);
    if ($flag == 'user' || $flag == 'supporter') {
        while ($row = $db->fetch_array($result)) {
            if ($flag = 'user') {
                if (strstr($row[allowed_groups], $delimiter)) {
                    $groups = explode($delimiter, $row[allowed_groups]);
                } else {
                    $groups = array($row[allowed_groups]);
                }
                if (is_array($uGroupArray)) {
                		foreach($uGroupArray as $a) {
                    if (in_array($a, $groups)) {
                        $visible = true;
                    }
                }
                }

            }
            if ($flag == 'supporter' OR $visible == true OR $row[allowed_user] == $_SESSION[user] OR $row[allowed_user] == 'All Users'
			or $enable_announcement_security_filtering == 'Off') {
                echo "\n<td class=date><b>" . date("$lang_dateformat G:i", $row[1]) . "</b>";
                if ($i == $announcements_limit -1) {
                    echo "<a name=place></a>";
                }

                echo "\n</td></tr>";
                echo "\n<tr><td class=back2>&nbsp;&nbsp;&nbsp;&nbsp;" . nl2br($row[2]) . "\n</td></tr>";
            }
            $visible = false;
            $i ++;
        }
    }

    if ($flag == 'admin') {
        while ($row = $db->fetch_array($result)) {
            echo "<td class=date><b>" . date("$lang_dateformat G:i", $row[1]) . "</b>";
            if ($i == $announcements_limit -1) {
                echo "<a name=place></a>";
            }
            echo "&nbsp;&nbsp;&nbsp;&nbsp; ";
            echo "<a href=\"index.php?t=delete&id=$row[0]\">$lang_delete</a>";

            echo ", <a href=\"index.php?m=update&id=$row[0]\">";
            echo " $lang_edit</a>?";

            echo "</td></tr>";
            echo "<tr><td class=back2>&nbsp;&nbsp;&nbsp;&nbsp;" . nl2br($row[2]) . "</td></tr>";
            $i ++;
        }
    }
}

/**
 * function getUserList():
 * 		Takes a sting, integer, and string as inputs.  The order variable contains the keyword which
 * 	determines the order in which the users are listed.  Offset is the variable that is passed around which
 * 	helps determine what position we are at in the database (makes Next/Previous buttons work the way they
 * 	should).  Group variable signifies whether we are querying all users or just supporters.  This function
 * 	prints out the table with options to edit/delte/and view history links.
 */
function getUserList($order, $offset, $group)
{
    global $users_table, $users_limit, $db, $admin_site_url, $lang_email, $lang_office, $lang_realname, $lang_username, $lang_infoforuser, $lang_edit, $lang_delete, $lang_stats;

    if (!isset ($offset))
        $offset = 0;

    $low = $offset;
    // if the group is only supporters, grab only information about supporters and not all users.
    if ($group == "admins") {
        switch ($order) {
            case ("user_name") :
                $sql = "select * from $users_table where admin=1 and user_name != 'support_pool' order by user_name asc limit $low, $users_limit";
                break;
            case ("office") :
                $sql = "select * from $users_table where admin=1 and user_name != 'support_pool' order by office, user_name asc limit $low, $users_limit";
                break;
            default :
                $sql = "select * from $users_table where admin=1 and user_name != 'support_pool' order by id asc limit $low, $users_limit";
                break;
        }
    }

    if ($group == "supporters") {
        switch ($order) {
            case ("user_name") :
                $sql = "select * from $users_table where supporter=1 and user_name != 'support_pool' order by user_name asc limit $low, $users_limit";
                break;
            case ("office") :
                $sql = "select * from $users_table where supporter=1 and user_name != 'support_pool' order by office, user_name asc limit $low, $users_limit";
                break;
            default :
                $sql = "select * from $users_table where supporter=1 and user_name != 'support_pool' order by id asc limit $low, $users_limit";
                break;
        }
    }
    // grab the information for all users.
    if ($group == "users") {
        switch ($order) {
            case ("user_name") :
                $sql = "select * from $users_table where user_name != 'support_pool' order by user_name asc limit $low, $users_limit";
                break;
            case ("office") :
                $sql = "select * from $users_table where user_name != 'support_pool' order by office asc limit $low, $users_limit";
                break;
            default :
                $sql = "select * from $users_table where user_name != 'support_pool' order by id asc limit $low, $users_limit";
                break;
        }
    }

    $result = $db->query($sql);
    // get all of the data into readable variables.
    while ($row = $db->fetch_array($result)) {
        $id = $row['id'];
        $first = ucwords($row['first_name']);
        $last = ucwords($row['last_name']);
        $user_name = $row['user_name'];
        $email = $row['email'];
        if ($email == '')
            $email = '&nbsp;';
        $pager = $row['pager_email'];
        if ($pager == '')
            $pager = '&nbsp;';
        $office = $row['office'];
        if ($office == '')
            $office = '&nbsp;';
        $user = $row['user'];
        $supp = $row['supporter'];
        $admin = $row['admin'];
        // print out the html crap...this is ugly.
        echo '	<table class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
																												<tr>
																												<td>
																													<table cellSpacing=1 cellPadding=5 width="100%" border=0>
																														<tr>
																															<td class=info align=left align=center><b>' . $lang_infoforuser . ' ' . $id . '</b></td>
																															<td class=info align=left align=center>';
        echo "<a class=info href=\"" . $admin_site_url . "/control.php?t=users&act=uedit&id=$id\">$lang_edit</a>,
																																<a class=info href=index.php?t=";
        switch ($group) {
            case ("admins") :
                echo "a";
                break;
            case ("supporters") :
                echo "s";
                break;
            case ("users") :
                echo "u";
                break;
            default :
                echo "u";
                break;
        }

        echo 'list&m=delete&id=' . $id . '>' . $lang_delete . '</a>, or
																																		<a class=info href=index.php?t=tstats&id=' . $id . '>' . $lang_stats . '</a>?</td>
																														</tr>

																														<tr>
																															<td width=27% class=back2 align=right>' . $lang_username . ':</td><td class=back>' . $user_name . '</td>
																														</tr>
																														<tr>
																															<td width=27% class=back2 align=right>' . $lang_realname . ':</td><td class=back>' . $first . ' ' . $last . '</td>
																														</tr>
																														<tr>
																															<td width=27% class=back2 align=right>' . $lang_email . '</td><td class=back><a href=mailto:' . $email . '>' . $email . '</td>
																														</tr>
																														<tr>
																															<td width=27% class=back2 align=right>' . $lang_office . ':</td><td class=back>' . $office . '</td>
																														</tr>
																													</table>
																												</td>
																												</tr>
																											</table>
																										<br>';
    } //end while
}

/**
 * function getUserId():
 * 		Takes a string as an argument.  Takes the user name and returns the id of that user in the user
 * 	table in the database.
 */
function getUserID($name)
{
    global $users_table, $db;

    $sql = "select id from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}
/**
 * function getUserIDFromFullName():
 * Takes first and/or last name as string. Takes the first and/or last name and
 * returns the id of that user
 */
function getUserNameFromFullName($firstName, $lastName, $andor)
{
    global $users_table, $db;

    if ($firstName != '' && $lastName != '') {
        $sql = "select user_name from $users_table where first_name='$firstName' $andor last_name = '$lastName'";
    } elseif ($firstName != '' && $lastName == '') {
        $sql = "select user_name from $users_table where first_name='$firstName'";
    } else {
        $sql = "select user_name from $users_table where last_name='$lastName'";
    }

    $result = $db->query($sql);
    $numrows = $db->num_rows($result);

    if ($numrows > 1) {
        $a = 1;
        $sql2 = "(";
        while ($row = $db->fetch_array($result)) {
            if ($a == $numrows) {
                $sql2 = $sql2 . " user='" . $row[0] . "'";
            } else {
                $sql2 = $sql2 . " user='" . $row[0] . "' or";
            }
            $a ++;
        }
        $sql2 = $sql2 . ")";
        return $sql2;
    } else {
        while ($row = $db->fetch_array($result)) {
            $sql2 = " user='" . $row[0] . "'";
        }
        return $sql2;
    }
}
/**
 * function getFullNameFromUsername():
 * Takes name as string. Takes the user name and returns the first and last name
 * of the user user
 */
function getFullNameFromUsername($name)
{
    global $users_table, $db;

    $sql = "select first_name, last_name from $users_table where user_name = '$name'";
    $result = $db->query($sql);

    while ($row = $db->fetch_array($result)) {
        $name = $row[0] . ' ' . $row[1];
    }
    return $name;
}
/**
 * function getGroupId():
 * 		Takes a string as an argument.  Takes the group name and returns the id of that group in the group
 * 	table in the database.
 */
function getGroupID($name)
{
    global $sgroups_table, $db;

    $sql = "select id from $sgroups_table where group_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getGroupName():
 * 		Takes an integer as an argument.  Takes the group id and returns the name of that group in the group
 * 	table in the database.
 */
function getGroupName($id)
{
    global $sgroups_table, $db;

    $sql = "select group_name from $sgroups_table where id=$id";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function groupExists():
 * 		Takes an integer as an argument.  Takes the group id and returns true if that group exists,
 * 	otherwise returns false.
 */
function groupExists($id)
{
    global $sgroups_table, $db;

    $sql = "SELECT group_name from $sgroups_table where id=$id";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows == 0) {
        return false;
    } else {
        return true;
    }
    // can't get here, but...
    return false;
}

/**
 * function getPriority():
 * 		Takes an integer as an argument.  Takes the integer and returns the value of that id in the priority
 * 	table in the database.
 */
function getPriority($id)
{
    global $tpriorities_table, $db;

    $sql = "select priority from $tpriorities_table where id='$id'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getStatus():
 * 		Takes an integer as an argument.  Takes the integer and returns the value of that id in the status
 * 	table in the database.
 */
function getStatus($id)
{
    global $tstatus_table, $db;

    $sql = "select status from $tstatus_table where id='$id'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function isSupporter():
 * 		Takes a string as an argument.  Queries the database and returns true if the supporter flag is set
 * 	to 1.  Else, returns false.
 */
function isSupporter($name)
{
    global $users_table, $db;

    $sql = "select usu from usu where usu='$name'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);

    if ($row['usu'] != NULL) {
        return true;
    } else {
        return false;
    }
    return false; //just in case.
}

/**
 * function isAdministrator():
 * 		Takes a string as an argument.  Queries the database and returns true if the admin flag is set
 * 	to 1.  Else, returns false.
 */
function isAdministrator($name)
{
    global $users_table, $db;

    $sql = "select admin from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    if ($row[0] == 1) {
        return true;
    } else {
        return false;
    }
}
function isAdmSuper($name)
{
    global $users_table, $db;

    $sql = "select super from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    if ($row[0] == 1) {
        return true;
    } else {
        return false;
    }
}
/**
 * function isViewer(): 	Takes a string as an argument.  Queries the database and
 * returns true if the user flag is set to 0.  Else, returns false.
 */
function isViewer($name)
{
    global $users_table, $db;

    $sql = "select user from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    if ($row[0] == 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * function getsGroup():
 * 		Takes an integer as input.  Queries the supporter groups table and returns the group name associated
 * 	with the id that is given.
 */
function getsGroup($id)
{
    global $sgroups_table, $db;

    $sql = "select group_name from $sgroups_table where id=$id";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getGroupList():
 * 		Takes two arguments.  Queries the supporter group tables and gets a list of all sgroups in an array.
 * 	If the flag is not set, prints out the members of each group if the name given is in that particular
 * 	group.  If the flag is set, group members are not listed.  In both cases, the array of sgroups is
 * 	returned.
 */
function getGroupList($name, $flag = 1)
{
    global $sgroups_table, $db, $table_prefix;

    $sql = "select id from $sgroups_table where id != 1";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $group[$i] = $table_prefix . "sgroup" . $row[0];
        $i ++;
    }
    // now list contains a list of all the groups....now we have to cycle through that list
    // and determine whether the logged in user is in each group.
    if ($name != '' && $flag != 1) {
        for ($i = 0; $i < sizeof($group); $i ++) {
            if (inGroup($name, $group[$i])) {
                listGroupMembers($group[$i]);
            }
        }
    }

    return $group;
}

function getGroupListID($name, $flag = 1)
{
    global $sgroups_table, $db, $table_prefix;

    $sql = "select id from $sgroups_table where id != 1";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $group[$i] = $table_prefix . "sgroup" . $row[0];
        $gid[$i] = $row[0];
        $i ++;
    }
    // now list contains a list of all the groups....now we have to cycle through that list
    // and determine whether the logged in user is in each group.
    if ($name != '') {
        for ($i = 0; $i < sizeof($group); $i ++) {
            if (!inGroup($name, $group[$i])) {
                $gid[$i] = false;
            }
        }

        if (count($gid) > 0) {
            $grid = array_filter($gid);
            $value = $grid[0];
        }
    }

    return $value;
}

/**
 * function getUGroupList():
 * 		Takes no arguments.  Queries the user group tables and gets a list of all ugroups in an array.
 * 	The array of ugroups is returned.
 */
function getUGroupList()
{
    global $ugroups_table, $db, $table_prefix;

    $sql = "select id from $ugroups_table where id != 1";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $group[$i] = $table_prefix . "ugroup" . $row[0];
        $i ++;
    }
    // now list contains a list of all the groups
    return $group;
}
/**
 * function getUGroups():
 *
 * Takes		 the username and returns an array containing the list of
 * user groups
 */
function getUGroups($user)
{
    global $ugroups_table, $db, $table_prefix;

    $sql = "select id, group_name from $ugroups_table";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $sql = "select id from " . $table_prefix . "ugroup" . $row[0] . " WHERE user_name = '$user'";
        $resultGroup = $db->query($sql);
        $count = $db->num_rows($resultGroup);
        if ($count > 0) {
            $groupArray[$i] = $row[1];
        }
        $i ++;
    }
    // now list contains a list of all the groups
    return $groupArray;
}

/**
 * function getUGroups():
 *
 * Takes		 the username and returns an array containing the list of
 * user groups id number
 */
function getUGroupsID($user)
{
    global $ugroups_table, $db, $table_prefix;

    $sql = "select id, group_name from $ugroups_table";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $sql = "select id from " . $table_prefix . "ugroup" . $row[0] . " WHERE user_name = '$user'";
        $resultGroup = $db->query($sql);
        $count = $db->num_rows($resultGroup);
        if ($count > 0) {
            $groupArray[$i] = $row[0];
        }
        $i ++;
    }
    // now list contains a list of all the groups
    return $groupArray;
}
/**
 * function getSGroups():
 * Takes		 the username and returns an array containing the list of
 * task manager groups
 */
function getSGroups($user)
{
    global $sgroups_table, $db, $table_prefix;

    $sql = "select id, group_name from $sgroups_table WHERE id !=1";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $sql = "select id from " . $table_prefix . "sgroup" . $row[0] . " WHERE user_name = '$user'";
        $resultGroup = $db->query($sql);
        $count = $db->num_rows($resultGroup);
        if ($count > 0) {
            $groupArray[$i] = $row[1];
        }
        $i ++;
    }
    // now list contains a list of all the groups
    return $groupArray;
}
/**
 * function inGroup():
 * 		Takes two arguments.  Takes the group id, and the user name.  Returns true if the user name given is
 * 	a member of the group given.  Otherwise, returns false.
 */
function inGroup($user_name, $group_id)
{
    global $db;

    $sql = "SELECT * from " . $group_id . " where user_name='$user_name'";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows == 0)
        return false;
    else
        return true;
}

/**
 * function getuGroup():
 * 		Takes an integer as input.  Queries the user groups table and returns the group name associated
 * 	with the id that is given.
 */
function getuGroup($id)
{
    global $ugroups_table, $db;

    $sql = "select group_name from $ugroups_table where id=$id";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getMessage():
 * 		Takes an integer value as input.  Queries the announcement table and returns the announcement
 * 	associated with the given id number.
 */
function getMessage($id)
{
    global $announcement_table, $db;

    $sql = "select message from $announcement_table where id=$id";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function printError():
 * 		Takes a string as input.  Outputs the error message in a nice table format.
 */
function printError($error, $width = 100, $url = '')
{
    global $lang_error, $lang_click_here;

    echo '<TABLE class=border cellSpacing=0 cellPadding=0 width=' . $width . '%" align=center border=0>
															<TR>
															<TD>
															<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
																<TR>
																<TD class=info align=center><B>' . $lang_error . '</B></TD>
																</TR>

					<tr><td class=error><br><b><font color=red>';
    if ($url == '') {
        echo $error . "</font></b><br><br>";
    } else {
        echo $error . "<br><br><a href=$url>$lang_click_here</a></font></b><br><br>";
    }
    echo '</td></tr>
															</table>
															</td>
															</tr>
															</table>';
}

/**
 * function printSuccess():
 * 		Takes a string as input.  Outputs the message in a nice table format.
 */

function printSuccess($msg, $width = 100, $url = '')
{
    global $lang_success, $lang_click_here;

    echo '<TABLE class=border cellSpacing=0 cellPadding=0 width=' . $width . '%" align=center border=0>
															<TR>
															<TD>
															<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
																<TR>
																<TD class=info align=center><B>' . $lang_success . '</B></TD>
																</TR>

																<tr><td class=error><br><b><font color=green>';
    if ($url == '') {
        echo $msg . "</font></b><br><br>";
    } else {
        echo $msg . "<br><br><a href=$url>$lang_click_here</a></font></b><br><br>";
    }
    echo '</td></tr>
															</table>
															</td>
															</tr>
															</table>';
}

/**
 * function getRank():
 * 		Takes a two strings as input.  Second string is the table to query.  First string is the text to
 * 	query the table for.  Returns the rank value of the given text.
 */
function getRank($string, $table)
{
    global $tpriorities_table, $tstatus_table, $db, $lang_tableerror;

    switch ($table) {
        case ($tpriorities_table) :
            $sql = "select rank from $table where priority=\"$string\"";
            break;
        case ($tstatus_table) :
            $sql = "select rank from $table where status=\"$string\"";
            break;
        default :
            printError("$lang_tableerror");
            exit;
    }

    $result = $db->query($sql);
    $row = $db->fetch_array($result);
    return $row[0];
}

/**
 * function getRPriority():
 * 		Takes an integer as input.  The integer value is the rank.  Select the name of the priority based on
 * 	the rank and return the string.
 */
function getRPriority($rank)
{
    global $tpriorities_table, $db;

    $sql = "select priority from $tpriorities_table where id=$rank";

    $result = $db->query($sql);
    $row = $db->fetch_array($result);
    return $row[0];
}

/**
 * function getRStatus():
 * 		Takes an integer as input.  The integer value is the rank.  Select the name of the status based on
 * 	the rank and return the string.
 */
function getRStatus($rank)
{
    global $tstatus_table, $db;

    $sql = "select status from $tstatus_table where id=$rank";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getHighestRank():
 * 		Takes one argument.  If the table is the ticket status table, the ranking is reversed so there is a
 * 	different sql statement.  Selects the item in the table that has the highest rank and returns the id.
 */
function getHighestRank($table)
{
    global $tstatus_table, $db;

    if ($table == $tstatus_table) {
        $sql = "select id from $table order by rank desc";
    } else {
        $sql = "select id from $table order by rank asc";
    }

    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getLowestRank():
 * 		Takes one argument.  If the table is the ticket status table, the ranking is reversed so there is a
 * 	different sql statement.  Selects the item in the table that has the highest rank and returns the id.
 */
function getLowestRank($table)
{
    global $tstatus_table, $db;

    if ($table == $tstatus_table) {
        $sql = "select id from $table order by rank asc";
    } else {
        $sql = "select id from $table order by rank desc";
    }

    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}

/**
 * function getSecondStatus():
 * 		Takes no arguments.  Selects the second item in the table that has the lowest rank and returns the
 * 	status.
 */
function getSecondStatus()
{
    global $tstatus_table, $db;

    $sql = "select status from $tstatus_table order by rank asc";
    $result = $db->query($sql);
    for ($i = 0; $i < 2; $i ++) {
        $row = $db->fetch_array($result);
    }
    return $row[0];
}

/**
 * function getSecondStatus():
 * 		Takes no arguments.  Selects the second item in the table that has the lowest rank and returns the
 * 	status.
 */
function getSecondPriority()
{
    global $tpriorities_table, $db;

    $sql = "select priority from $tpriorities_table order by rank asc";
    $result = $db->query($sql);
    for ($i = 0; $i < 2; $i ++) {
        $row = $db->fetch_array($result);
    }
    return $row[0];
}

/**
 * function getPriorityList():
 * 		Takes no arguments.  Queries the ticket priority table and returns an array containing each element
 * 	in the table orderd by rank.
 */
function getPriorityList()
{
    global $tpriorities_table, $db;

    $sql = "select priority from $tpriorities_table order by rank asc";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $list[$i] = $row[0];
        $i ++;
    }

    return $list;
}

/**
 * function getCategoryList():
 * 		Takes no arguments.  Queries the ticket categories table and returns an array containing each element
 * 	in the table orderd by rank.
 */
function getCategoryList()
{
    global $tcategories_table, $db;

    $sql = "select category from $tcategories_table order by rank asc";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $list[$i] = $row[0];
        $i ++;
    }

    return $list;
}

/**
 * function getStatusList():
 * 		Takes no arguments.  Queries the ticket status table and returns an array containing each element
 * 	in the table orderd by rank.
 */
function getStatusList()
{
    global $tstatus_table, $db;

    $sql = "select status from $tstatus_table order by rank asc";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $list[$i] = $row[0];
        $i ++;
    }

    return $list;
}

/**
 * function createHeader():
 * 		Takes one argument.  Creates the html associated with the header.
 */
function createHeader($msg)
{
    echo '
													<TABLE class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
															<TR>
															<TD>
																<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
																	<TR>
																	<TD class=info align=center><B>';
    echo $msg;
    echo '				</td>
																	</TR>
																</table>
															</td>
															</tr>
														</table><br>';
}

/**
 * function createGroupMenu():
 * 		Takes one argument.  Creates the group drop down menu based on the data in the sgroups table.  If
 * 	the flag is set to 0, or not set, the value of each group is set for the ticket creation.  If the flag
 * 	is set to 1, the value of each group is set for ticket updating.
 */
function createGroupMenu($flag = 0, $user_name = '')
{
    global $sgroups_table, $info, $id, $db, $ugroup_meta_security_table, $delimiter, $enable_task_field_filtering;
    // we do have the information for info here.  In the case of creating a ticket, info array is empty.
    // in the case of updating a ticket, info array is full of stuff.
    // Handle user filtered groups
    if ($user_name == '' or $user_name == 'guest123' or $enable_task_field_filtering == 'Off') {
        $sql = "select id, group_name from $sgroups_table order by rank, group_name asc";
    } else {
		$uGroupArray = getUGroupsID($user_name);
		if (!is_array($uGroupArray)) {
        	$uGroupArray = array(99999999999);
        }
		$i = 0;
        foreach($uGroupArray as $a) {
            if ($i == 0) {
                $sql2 = "user_id=$a";
            } else {
                $sql2 .= " OR user_id=$a";
            }
            $i++;
        }

        $sql1 = "select task_manager_groups from $ugroup_meta_security_table WHERE ";
        $sql = $sql1 . $sql2;
        $result = $db->query($sql);
        $sql1 = "select id, group_name from $sgroups_table WHERE ";
	$i = 0;
		while($row = $db->fetch_array($result)){
        if (strstr($row[0], $delimiter)) {
            $groupArray = explode($delimiter, $row[0]);

            foreach($groupArray as $a) {
                if ($i == 0) {
                    $sql2 = "id=$a";
                } else {
                    $sql2 .= " OR id=$a";
                }
                $i++;
            }
        } else {
			if ($i == 0) {
                    $sql2 = "id=$row[0]";
                } else {
                    $sql2 .= " OR id=$row[0]";
                }
                $i++;
		}
		} // while
		//Handle no group option
		if ($sql2 == '') {
			$sql2 = "id=0";
		}

        $sql = $sql1 . $sql2 . " order by rank, group_name asc";
	}
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($flag == 0 || !isset ($flag)) {
        while ($row = $db->fetch_array($result)) {
            if ($num_rows == 1 || $row[id] != 1) {
                if ($_GET[t] == "tcre" && $_SESSION[userform] != 1) {
                    // default the session if it's not set.
                    // just might as well be the first one.
                    if ($_SESSION[autofill_sg] == "") {
                        $_SESSION[autofill_sg] = $row[id];
                    }
                    echo "<option value=\"index.php?t=tcre&sg=$row[id]\"";
                } else {
                    echo "<option value=\"$row[id]\"";
                }
                if ($_SESSION[autofill_sg] == $row[id] || $info[groupid] == $row[id]) {
                    echo " selected";
                }
                echo ">" . $row[group_name] . "</option>";
            }
        }
    }
    // flag is 1 is being called from tupdate.php
    if ($flag == 1) {
        while ($row = $db->fetch_array($result)) {
            if ($num_rows == 1 || $row[id] != 1) {
                echo "<option value=\"index.php?t=tupd&sg=$row[id]&id=$_GET[id]&groupid=change\"";
                if ($sg == $row[id] || $info['groupid'] == $row[id]) {
                    echo " selected";
                }
                echo ">" . $row[group_name] . "</option>";
            }
        }
    }
    // flag is 2 if being called from tsearch.php
    if ($flag == 2) {
        echo "<option></option>";
        while ($row = $db->fetch_array($result)) {
            if ($num_rows == 1 || $row[0] != 1) {
                echo "<option value=\"$row[0]\"";
                if ($sg == $row[0] || $info['groupid'] == $row[0]) {
                    echo " selected";
                }
                echo ">" . $row[1] . "</option>";
            }
        }
    }
}
/**
 * function createPriorityMenu():
 * 		Takes no arguments.  Creates the drop down menu for the list of priorities.
 */
function createPriorityMenu($flag = 0)
{
    global $tpriorities_table, $info, $db;

    $sql = "select priority from $tpriorities_table order by rank asc";
    $result = $db->query($sql, $tpriorities_table);
    $num_rows = $db->num_rows($result);

    if ($info['priority'] == '' && $flag != 2) {
        $select = floor($num_rows / 2);
        $i = 0;
    }
    // calling from search so select blank priority by default for wildcard search
    if ($flag == 1 || $flag == 2)
        echo "<option selected></option>";
    while ($row = $db->fetch_array($result)) {
        // catch the tcre from users ticket entry we don't want that mucking
        // things up since autofill was for supporters only.
        $testuser = isSupporter($_SESSION[user]);

        if ($_GET[t] == "tcre" && $testuser != "") {
            echo "<option value='$row[0]' ";
        } else {
            echo "<option value='$row[0]' ";
        }

        if ($info['priority'] == '' && $i == $select && isset ($i) && $_SESSION[autofill_pri] == "") {
            // catch the defaulting for the tupdate
            if ($_GET[t] != "tupd") {
                echo "selected";
            }
            // set and unset the autofillstuff based on location
            if ($_GET[t] == "tcre") {
                $_SESSION[autofill_pri] = $row[0];
            } else {
                unset ($_SESSION[autofill_pri]);
            }
        } else {
            // calling from search and do not want priority to be selected
            if ($flag != 2) {
                if ($info['priority'] == $row[0] || $_POST[priority] == $row[0] || $_SESSION[autofill_pri] == $row[0]) {
                    echo "selected";
                    // default the priority.
                }
            }
        }

        echo "> $row[0] </option>";
        $i ++;
    }
}

/**
 * function createStatusMenu():
 * 		Takes no arguments.  Creates the drop down menu for the status list.
 */
function createStatusMenu($flag = 0)
{
    global $tstatus_table, $info, $db;

    $sql = "select status from $tstatus_table order by rank asc";
    $result = $db->query($sql);
    // calling from search so select blank status by default for wildcard search
    if ($flag == 1)
        echo "<option selected></option>";

    while ($row = $db->fetch_array($result)) {
        // default the session if it's not set.
        // just might as well be the first one.
        if ($_SESSION[autofill_status] == "") {
            $_SESSION[autofill_status] = $row[0];
        }
        // if we are tcreate build a special option val
        if ($_GET[t] == "tcre") {
            echo "<option value='$row[0]' ";
        } else {
            echo "<option value='$row[0]' ";
        }
        // calling from search and do not want status to be selected
        if ($flag != 1) {
            if ($info['status'] == $row[0] || $_POST['status'] == $row[0] || $_SESSION[autofill_status] == $row[0]) {
                echo "selected";
                // catch it here just in case
                $_SESSION[autofill_status] = $row[0];
            }
        }

        echo "> $row[0] </option>";
    }
}
/**
 * function createSeverityMenu():
 * Takes no arguments.  Creates the drop
 * down menu for the severity list.
 */
 // mudei o value
function createSeverityMenu($flag = 0)
{
    global $tseverity_table, $info, $db;

    $sql = "select severity from $tseverity_table order by rank asc";
    $result = $db->query($sql);
    // calling from search so select blank severity by default for wildcard search
    if ($flag == 1)
        echo "<option selected></option>";

    while ($row = $db->fetch_array($result)) {
        // default the session if it's not set.
        // just might as well be the first one.
        if ($_SESSION[autofill_severity] == "") {
            $_SESSION[autofill_severity] = $row[0];
        }
        // if we are tcreate build a special option val
        if ($_GET[t] == "tcre" AND isSupporter($_SESSION[user])) {
            echo "<option value='$row[0]' ";
        } else {
            echo "<option value='$row[0]' ";
        }
        // calling from search and do not want severity to be selected
        if ($flag != 1) {
            if ($info['severity'] == $row[0] || $_POST['severity'] == $row[0] || $_SESSION[autofill_severity] == $row[0]) {
                echo "selected";
                // catch it here just in case
                $_SESSION[autofill_severity] = $row[0];
            }
        }

        echo "> $row[0] </option>";
    }
}
/**
 * function createThemeMenu():
 * 		Takes no arguments.  Creates the drop down menu for the theme list.
 */
function createThemeMenu($flag = 0)
{
    global $themes_table, $user_info, $default_theme, $db;

    $sql = "select name from $themes_table";

    $result = $db->query($sql);

    if ($flag == 1) {
        while ($row = $db->fetch_array($result)) {
            echo "<option value=\"$row[0]\" ";
            if ($default_theme == $row[0])
                echo "selected";
            echo "> $row[0] </option>";
        }
    } else {
        echo "<option value=\"default\"> Default </option>";
        while ($row = $db->fetch_array($result)) {
            echo "<option value=\"$row[0]\" ";
            if ($user_info['theme'] == $row[0])
                echo "selected";
            echo "> $row[0] </option>";
        }
    }

    return $row;
}

/**
 * function createLanguageMenu():
 * 		Takes no arguments.  Creates the drop down menu for the language list.
 */
function createLanguageMenu($flag = 0)
{
    // scan the lang directory and create the menu based on the language files present
    global $language, $default_language;

    if ($flag == 0)
        $path = "../lang";
    elseif ($flag == 1) $path = "lang";
    else
        $path = "../lang";

    if ($flag == 2)
        $language = $default_language;

    echo "<select name=\"default_language\">\n";

    $dir = opendir("$path");
    while ($thafile = readdir($dir)) {
        if (is_file("$path/$thafile") && ereg("\.lang\.php$", "$path/$thafile")) {
            $thafile = str_replace(".lang.php", "", $thafile);
            echo $thafile . "<br>";
            if ($thafile == $language) {
                echo "<option value=\"$thafile\" selected=\"selected\">$thafile</option>\n";
            } else {
                echo "<option value=\"$thafile\">$thafile</option>\n";
            }
        }
    }

    echo "</select>";
}

/**
 * function createTimeOffsetMenu():
 * 		Takes no arguments.  Creates the drop down menu for the language list.
 */
function createTimeOffsetMenu($selected)
{
    global $lang_timezone1, $lang_timezone2, $lang_timezone3, $lang_timezone4, $lang_timezone5, $lang_timezone6, $lang_timezone7, $lang_timezone8, $lang_timezone9, $lang_timezone10, $lang_timezone11, $lang_timezone12, $lang_timezone13, $lang_timezone14, $lang_timezone15, $lang_timezone16, $lang_timezone17, $lang_timezone18, $lang_timezone19, $lang_timezone20, $lang_timezone21, $lang_timezone22, $lang_timezone23, $lang_timezone24, $lang_timezone25, $lang_timezone26, $lang_timezone27, $lang_timezone28, $lang_timezone29, $lang_timezone30, $lang_timezone31, $lang_timezone32, $lang_timezone33, $db, $users_table, $time_offset;

    $j = 1;
    for ($i = -12; $i < 20; $i ++) {
        $zone = "lang_timezone" . $j;
        echo "<option value=\"$i\" ";
        if ($time_offset == $i)
            echo "selected";
        echo ">" . $$zone . "</option>";
        $j ++;
    }
}

/**
 * function displayUserTicket():
 * 		Takes one argument.  Takes the result of a sql query that searches the tickets table and displays
 * 	all pertinent information about the ticket in a nice table format.
 */
function displayUserTicket($result)
{
    global $lang_last_ticket_action, $tpriorities_table, $highest_pri, $theme, $db, $admin_site_url, $lang_dateformat;
    $current_time = time();

    $second = getSecondPriority();

    while ($row = $db->fetch_array($result)) {
        // added $row[index] support for cross db functionality
        $last_update = $row[17]; //last update timestamp.
        echo "<tr>
																												<td class=back2>" . str_pad($row[0], 5, "0", STR_PAD_LEFT) . "</td>";
        echo "<td class=back>$row[3]</td>";
        echo "<td class=\"back2\">";
        echo "<a href=\"?t=tinf&id=" . $row[0] . "\">";
        echo $row[13] . "</a></td>

																												<td class=back>" . $row[7] . "</td>
																												<td class=back2>";

        switch ($row[5]) {
            case ("$highest_pri") :
                echo "<font color=red><b>" . $row[5] . "</b></font>";
                break;
            case ($second) :
                echo "<b>" . $row[5] . "</b>";
                break;
            default :
                echo $row[5];
                break;
        }

        echo "</td>
																												<td class=back> " . date("$lang_dateformat", $row[1]) . "</td>
																												<td class=back2>";
        echo $row[6] . "</a></td>";

        echo "</tr>";
    }
}

/**
 * function displayTicket():
 * 		Takes one argument.  Takes the result of a sql query that searches the tickets table and displays
 * 	all pertinent information about the ticket in a nice table format.
 */
 
 
 
 
function displayFat($result)
{
	$n = 0;
	//$result = mysql_query("select * from ooz_tickets , faturamento where ( (create_date > 1180839600 and create_date < 1186714799) and ooz_tickets.id = faturamento.id_fatura and ooz_tickets.status = 'Fechado')");
    while ($row = mysql_fetch_array($result)) {
		echo "<tr>";
        echo "<td class=back>". date("d/m/Y", $row['data_exe']) ."</td>";
		echo "<td class=back2>". $row['contrato'] ."</td>";
        echo "<td class=back>". str_pad($row['id'] , 5, "0", STR_PAD_LEFT). "</td>";
		echo "<td class=back2>". $row['project'] ."</td>";
        echo "<td class=back>". $row['n_tombamento'] ."</td>";
		echo "<td class=back2>". $row['unidade'] ."</td>";
        echo "<td class=back>". $row['servico_exe'] ."</td>";
		echo "<td class=back2>". $row['peca_apli'] . "</td>";
        echo "<td class=back>". $row['valor_sevic'] ."</td>";
		echo "<td class=back2>". $row['valor_peca'] ."</td>";
		echo "</tr>";
		$n+=1;		
	}
	return $n;
		
}



 
 
 
 
 
function displayTicket($result)
{
    global $lang_last_ticket_action, $tpriorities_table, $highest_pri, $theme, $db, $admin_site_url, $lang_dateformat, $last_update_limit, $lang_more, $last_update_enable, $lang_task_count;
    $current_time = time();

    $second = getSecondPriority();

    while ($row = $db->fetch_array($result)) {
        // added $row[index] support for cross db functionality
        //$last_update = $row[17]; //last update timestamp.
		$create_date = $row['create_date'];
        echo "<tr>
		<td class=back2>" . str_pad($row[0], 5, "0", STR_PAD_LEFT) . "</td>";

		
		
        if (isAdministrator($_SESSION[user])) {
			if ($row[3]=='support_pool'){
            echo "<td class=back><a href=\"" . $admin_site_url . "/control.php?t=users&act=uedit&id=" . getUserID($row[3]) . "\"></td>";
			}else{
			echo "<td class=back><a href=\"" . $admin_site_url . "/control.php?t=users&act=uedit&id=" . getUserID($row[3]) . "\">" . $row[3] . "</td>";}
        } else {
				if ($row[3]=='support_pool'){
            echo "<td class=back><a href=\"index.php?t=memb&mem=" . $row[3] . "\"></td>";			}else{echo "<td class=back><a href=\"index.php?t=memb&mem=" . $row[3] . "\">" . $row[3] . "</td>";}
        }


        echo "<td class=\"back2\">";
		echo "<a href=\"?t=tupd&id=" . $row[0] . "\">";
		echo $row['project']." / ".$row['modelo'];
        echo " / ".$row[13] . "</a></td>";
        echo "</td>";


		
        echo "<td class=back>" . $row[9] . "</td>";
		
		
		echo "<td class=back2>" . $row['unidade'] . "</td>";
		
		
        if ($_GET['t'] == 'tsrc') {
            $name = $row[26];
			$estado = $row['estado'];
			$cidade = $row['cidade'];
            echo "<td class=back2>" . $name . "</td>";
			echo "<td class=back>" . $cidade . "-".$estado."</td>";
            // <td class=back>".$name[1]."</td>";
        }
		
		
		

        echo "<td class=back>";
        switch ($row[33]) {
            case ("$highest_pri") :
                echo "<font color=red><b>" . $row[33] . "</b></font>";
                break;
            case ($second) :
                echo "<b>" . $row[33] . "</b>";
                break;
            default :
                echo $row[33];
                break;
        }
        echo "</td>";
		

		
		//<td class=back2> " . date("$lang_dateformat", $row[1]) . "</td>
	echo" <td class=back2> " .$row[29]. "</td>

		
		<td class=back>";
        // cookie_name='.$_SESSION[user].'
        echo '<a href="updatelog.php?&id=' . $row[0] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')">';
        echo $row[6] . "</a></td>";



		
        //$response = setResponse($last_update, $row[5], $row[0]);
		$response = setResponse($create_date, $row[5], $row[0]);
        switch ($response) {
            case ('1') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass1.gif\"></td>";
                break;
            case ('2') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass2.gif\"></td>";
                break;
            case ('3') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass3.gif\"></td>";
                break;
            case ('4') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass4.gif\"></td>";
                break;
            default :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass1.gif\"></td>";
                break;
        }

       // echo "</tr>";
	   $precodis = $row['preco'];
        if ($last_update_enable == "On") {
            // Display last log entry in search output, open tickets, closed tickets and recent tickets
            $lastLogEntry = trim($row['15'], "--//--"); // get rid of the last --//-- entry mainly
            // change the seperator for something easier to position at
            $lastLogEntry = str_replace('--//--', '|', $lastLogEntry);
            // replace the $lang_blah with stuff we understand not perfect but very close without having
            // to make all language variables globally aware in function
            $lastLogEntry = str_replace('$lang_', '', strrchr($lastLogEntry, '|'));
           // echo "<tr>";
            if ($_GET['t'] == 'tsrc') {
                $columnSpan = 9;
            } else {
                $columnSpan = 8;
            }





            // antigo echo '<td colspan=' . $columnSpan . ' class=back><Strong>' . $precodis . ': </Strong>' . substr($lastLogEntry, 1, $last_update_limit);
			echo '<td class=back><Strong>' . $precodis . ' </Strong>';
			// if the last update exceeds the limit we have set to show display a more link to the whole update log
            if (strlen($lastLogEntry) >= $last_update_limit) {
                echo '<a href="updatelog.php?&id=' . $row[0] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',' . '\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')"> (....' . $lang_more . ')</a>';
            }
            echo "</td>";
		
			echo "<td class=back2 align=center>" . $row['n_tombamento'] . "</td>";#Tombamento
		
            echo "</tr>";
        }
    }
    // return for the display at the bottom of pages that use this function
    return $task_count;
}


function displayHistEquip($result){
    global  $db;

    while ($row = $db->fetch_array($result)) {
		$id = str_pad($row['id'], 5, "0", STR_PAD_LEFT);
		$data_rst = $row['data_rst'];
		$solucao = $row['solucao'];
		$short = $row['short'];
		$supporter = $row['supporter'];
		echo"<tr>";
		echo"<td class=back>$id</td>";
		echo"<td class=back2>$data_rst</td>";
		echo"<td class=back>$solucao</td>";
		echo"<td class=back2>$short</td>";
		echo"<td class=back>$supporter</td>";
		echo"</tr>";
		
	}

}



/*
function displayTicket($result)
{
    global $lang_last_ticket_action, $tpriorities_table, $highest_pri, $theme, $db, $admin_site_url, $lang_dateformat, $last_update_limit, $lang_more, $last_update_enable, $lang_task_count;
    $current_time = time();

    $second = getSecondPriority();

    while ($row = $db->fetch_array($result)) {
        // added $row[index] support for cross db functionality
        $last_update = $row[17]; //last update timestamp.
        echo "<tr>
																												<td class=back2>" . str_pad($row[0], 5, "0", STR_PAD_LEFT) . "</td>";
        if (isAdministrator($_SESSION[user])) {
            echo "<td class=back><a href=\"" . $admin_site_url . "/control.php?t=users&act=uedit&id=" . getUserID($row[3]) . "\">" . $row[3] . "</td>";
        } else {
            echo "<td class=back><a href=\"index.php?t=memb&mem=" . $row[3] . "\">" . $row[3] . "</td>";
        }

        echo "<td class=\"back2\">";
        echo "<a href=\"?t=tupd&id=" . $row[0] . "\">";
        echo $row[13] . "</a></td>";
        echo "<td class=back>" . $row[7] . "</td>";
        if ($_GET['t'] == 'tsrc') {
            $name = getFullNameFromUsername($row[7]);
            echo "<td class=back2>" . $name . "</td>";
            // <td class=back>".$name[1]."</td>";
        }
        echo "<td class=back>";

        switch ($row[5]) {
            case ("$highest_pri") :
                echo "<font color=red><b>" . $row[5] . "</b></font>";
                break;
            case ($second) :
                echo "<b>" . $row[5] . "</b>";
                break;
            default :
                echo $row[5];
                break;
        }

        echo "</td><td class=back2> " . date("$lang_dateformat", $row[1]) . "</td>
								<td class=back>";
        // cookie_name='.$_SESSION[user].'
        echo '<a href="updatelog.php?&id=' . $row[0] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',
																													\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')">';

        echo $row[6] . "</a></td>";

        $response = setResponse($last_update, $row[5], $row[0]);

        switch ($response) {
            case ('1') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass1.gif\"></td>";
                break;
            case ('2') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass2.gif\"></td>";
                break;
            case ('3') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass3.gif\"></td>";
                break;
            case ('4') :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass4.gif\"></td>";
                break;
            default :
                echo "<td class=back2 align=center><img height=20 src=\"../" . $theme[image_dir] . "hourglass1.gif\"></td>";
                break;
        }

       // echo "</tr>";
        if ($last_update_enable == "On") {
            // Display last log entry in search output, open tickets, closed tickets and recent tickets
            $lastLogEntry = trim($row['15'], "--//--"); // get rid of the last --//-- entry mainly
            // change the seperator for something easier to position at
            $lastLogEntry = str_replace('--//--', '|', $lastLogEntry);
            // replace the $lang_blah with stuff we understand not perfect but very close without having
            // to make all language variables globally aware in function
            $lastLogEntry = str_replace('$lang_', '', strrchr($lastLogEntry, '|'));
           // echo "<tr>";
            if ($_GET['t'] == 'tsrc') {
                $columnSpan = 9;
            } else {
                $columnSpan = 8;
            }

            echo '<td colspan=' . $columnSpan . ' class=back><Strong>' . $lang_last_ticket_action . ': </Strong>' . substr($lastLogEntry, 1, $last_update_limit);
            // if the last update exceeds the limit we have set to show display a more link to the whole update log
            if (strlen($lastLogEntry) >= $last_update_limit) {
                echo '<a href="updatelog.php?&id=' . $row[0] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',' . '\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')"> (....' . $lang_more . ')</a>';
            }
            echo "</td>";
            echo "</tr>";
        }
    }
    // return for the display at the bottom of pages that use this function
    return $task_count;
}
 */
function relatorioRST($result)
{
	global $cidade,$estado,$lang_last_ticket_action, $tpriorities_table, $highest_pri, $theme, $db, $admin_site_url, 
	$lang_dateformat, $last_update_limit, $lang_more, $last_update_enable, $lang_task_count;
	
	$current_time = time();
	
	$second = getSecondPriority();
	$task_count = 0;
	while ($row = $db->fetch_array($result)) {
		$task_count += 1;
		$create_date = $row['create_date']; 

		echo "<tr>";
		
		echo"<td class=back2>" . str_pad($row['id'], 5, "0", STR_PAD_LEFT) . "</td>"; #RST

		if($_REQUEST['criadock']){
			echo "</td><td class=back2> " . date("$lang_dateformat", $row['create_date']) . "</td>"; #criado
		}
		
		if($_REQUEST['tecnicock']){
			if (isAdministrator($_SESSION[user])) {  #tecnico
				if ($row['supporter']=='support_pool'){
					echo "<td class=back></td>";
				}else{
					echo "<td class=back> " . $row['supporter'] . "</td>";
				}
			} else {
				if ($row['supporter']=='support_pool'){
					echo "<td class=back></td>";
				}else{
					echo "<td class=back>" . $row['supporter'] . "</td>";
				}
			}
		}
		
		if($_REQUEST['emck']){
			echo "<td class=\"back2\">";
			echo $row['project']." / ".$row['modelo']; #equipamento/modelo
			echo "</td>";
		}
		
		if($_REQUEST['defeitock']){
			echo "<td class=\"back\">";
			echo "<a href=\"?t=tupd&id=" . $row['id'] . " \"  >" . $row['short'] . "</a>"; #problema
			echo "</td>";
		}
		
		if($_REQUEST['pecapendck']){
			echo "<td class=\"back2\">". $row['desc_peca_pendente'] . "</td>"; #Peça Pendente
		}
		
		if($_REQUEST['clienteck']){
			echo "<td class=back>" . $row['office'] . "</td>"; #Cliente
		}
		
		if($_REQUEST['unidadeck']){
			echo "<td class=back2 align=center>" . $row['unidade'] . "</td>"; #Unidade
		}
		
		if($_REQUEST['cidadeck']){
			echo "<td class=back>" . $row['cidade'] . "-" . $row['estado'] . "</td>"; #Cidade
		}
		
		if($_REQUEST['statusck']){
			//if($_POST['status']=='' || $_POST['status']=='notclosed'){
				echo "<td class=back2>".$row[6] . "</td>"; #STATUS
			//}
		}
		
		if($_REQUEST['tombamentock']){
			echo "<td class=back align=center>" . $row['n_tombamento'] . "</td>"; #Tombamento
		}
		
		if($_REQUEST['solucaock']){
			echo "<td class=back2 align=center>" . $row['solucao'] . "</td>"; #Solução
		}
		
		echo "</tr>";
	}
	return $task_count;
}

/**
 * function createTicketInfo():
 * 		Takes no arguments.  Html code for displaying the information about a particular ticket.
 */
 
 
function createTicketInfo($flag = 'allow')
{
    global $lang_dateformat, $lang_format_2, $lang_format_1, $lang_override_logged_date, $lang_resolution_date;
    global $theme, $db, $lang_ticketinfo, $lang_platform, $lang_shortdesc, $info, $enable_smtp;
    global $lang_category, $lang_desc, $lang_email, $lang_user, $lang_update;
    global $lang_attachment, $enable_tattachments, $max_attachment_size, $enable_loggeddateoverride;
    global $lang_supporter_update, $lang_client_update, $lang_client_update_email;
    global $show_update_log_in_task, $lang_project, $lang_ticket,$admin,$supporter_com,$user_usu,$serie_retirada_1, $serie_colocada_1, $serie_retirada_2, $serie_colocada_2, $serie_retirada_3, $serie_colocada_3, $serie_retirada_4, $serie_colocada_4;
	global $data_1o_atendimento, $modelo;

	
	$ver2 = "";
	if ($admin == 0 && $supporter_com == 1 && $user_usu == 1){
		
		$ver2 ="disabled=\"disabled\"";
	}
	
	
	
    // hack the shortdescription field name since 'short' is illegal in js
    // adn disrupts the autofill. see the if flag for tcre below... for
    // the actual change.
    $shortname = "short";
    // if we call this function from tcreate we want to be able store
    // and pass around the vars as we wish. So we'll create some
    // vars based the flag.
    if ($flag == 'tcre') {
        // set the short description form element name to avoide
        // illegal js name
        $shortname = "shortdesc";
        // we are calling from tcreate so lets use javascript to make
        // sure we have the stuff we need.
        $tcre_project = 'onChange="refresh_project()"';
        $tcre_description = 'onChange="refresh_desc()"';
        $tcre_short = 'onChange="refresh_short()"';
        // set and massage the vars for proper display.
        // the ereg replace is a hack to compensate for js thing.
        $info['project'] = ereg_replace("''", "'", $_SESSION[autofill_project]);
        $info['description'] = ereg_replace("''", "'", $_SESSION[autofill_desc]);
        $info['short'] = ereg_replace("''", "'", $_SESSION[autofill_short]);
        // if we are on tcreate turn the platform and category into
        // jump menus.
        $tcrejump = 'onChange="MM_jumpMenu(\'parent\', this, 0)"';

        $flag = 'allow'; // make sure we allow attachments

    }

	echo '	<table class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
	<tr>
	<td>
	<table cellSpacing=1 cellPadding=5 width="100%" border=0>
	<tr>
	<td class=info align=left colspan=4 align=center><b>' . $lang_ticketinfo . '</b></td>
	</tr>
	<tr>
	<td class=back2 width=27% align=right>' . $lang_platform . ':</td><td width=20% class=back><select name=platform ' . $tcrejump . ' '.$ver2.'>';
	if (isSupporter($_SESSION[user])) {
	createPlatformMenu(0, '');
	} else {
	createPlatformMenu(0, '', $_SESSION[user]);
	}
	echo '	</select></td><td class=back2 width=100 align=right>' . $lang_category . ':</td>
	<td class=back><select name=category ' . $tcrejump . ' '.$ver2.'>';
	
	if (isSupporter($_SESSION[user])) {
	createCategoryMenu(0);
	} else {
	createCategoryMenu(0, $_SESSION[user]);
	}
	echo '	</select></td>
	</tr>
	<tr>
	<td class=back2 width=27% align=right>' . $lang_project . ':</td><td width=20% class=back>
	<select name=project ' . $tcrejump . ' '.$ver2.'>';
	
	if (isSupporter($_SESSION[user])) {
	createProjectMenu(0);
	} else {
	createProjectMenu(0, $_SESSION[user]);
	}
	echo '	</select></td>
	
	<td class=back2 width=100 align=right>Modelo:<font color=red>*</font></td>
	<td class=back><input name=modelo type=text value = "'.$modelo.'"></td>
		
	</tr>
	';
	echo'													<tr>
	<td width=27% class=back2 align=right>Descrição do problema:<font color=red>*</font></td>
	<td class=back colspan=3>
	';
	// if ($_POST[short] != ""){
	// $info['short'] = $_POST[short];
	// }
	echo '															Numero m&aacute;ximo de cacteres:<div id="Qtd">80</div>
	<textarea name=' . $shortname . ' rows=6 cols=60 ' . $tcre_short . ' '.$ver2.' onkeypress="Contar(this)">' . $info['short'] . '</textarea>
	</td>
	
	</tr>';
															//<tr>
												
    // if ($_POST[description] != ""){
    // $info['description'] = $_POST[description];
    // }
    /*echo '
																<td class=back2 align=right valign=top width=27%>' . $lang_desc . ': <font color=red>*</font></td>
																<td class=back colspan=3><textarea name=description rows=5 cols=60 ' . $tcre_description . ' '.$ver2.'>' . $info['description'] . '</textarea></td>


															</tr>';*/
    // determines if we are in the task update section
    if (isset ($info) and isset ($_GET[id])) {
        // if ($enable_smtp == "win" || $enable_smtp == "lin") {
        // echo '
        // <tr>
        // <td class=back2 align=right valign=top width=27> '.$lang_email.' '.$lang_user.': </td>
        // <td class=back colspan=3 valign=bottom> <textarea name=email_msg rows=5 cols=60></textarea> </td>
        // </tr>';
        // }
		
		$sql = "
			SELECT contrato, n_tombamento, n_serie, nome_rede, endereco, solucao,diagnostico   
			FROM ooz_tickets 
			WHERE id='$_GET[id]'";
			
	$query = mysql_query($sql);
	$linha = mysql_fetch_array($query);
		
		
		$solucao = $linha['solucao'];
		$diagnostico  = $linha['diagnostico'];
        echo '
																				<tr>
																					<td class=back2 align=right valign=top width=27%> Diagnóstico: </td>
																					<td class=back colspan=3 valign=bottom><textarea name=diagnostico rows=5 cols=60>'.$diagnostico.'</textarea><br>
																				<tr>

																					<td class=back2 align=right valign=top width=27%> Solucao: </td>
																					<td class=back colspan=3 valign=bottom><textarea name=solucao rows=5 cols=60>'.$solucao.'</textarea><br>
																					<tr>';
																					echo '			
								<td width=27% class=back2 align=right>Nº serie peça retirada 1:</td>
								<td class=back width=20%>
								
								<input type=text name=pcc1 size=25% value = "'.$serie_retirada_1.'">
								
									
								</td>     
	 
								<td width=20% class=back2 align=right>Nº serie peça colocada 1:</td>
								<td class=back width=20%>
								<input type=text name=pcr1 size=25% value = "'.$serie_colocada_1.'" >
								
								<tr>
								<td width=27% class=back2 align=right>Nº serie peça retirada 2:</td>
								<td class=back width=20%>
								
								<input type=text name=pcc2 size=25% value = "'.$serie_retirada_2.'">
								
									
								</td>
								<td width=20% class=back2 align=right>Nº serie peça colocada 2:</td>
								<td class=back width=20%>
								<input type=text name=pcr2 size=25% value = "'.$serie_colocada_2.'">
								</tr>
								
								<tr>
								<td width=27% class=back2 align=right>Nº serie peça retirada 3:</td>
								<td class=back width=20%>
								
								<input type=text name=pcc3 size=25% value = "'.$serie_retirada_3.'">
								
									
								</td>
								<td width=20% class=back2 align=right>Nº serie peça colocada 3:</td>
								<td class=back width=20%>
								<input type=text name=pcr3 size=25% value = "'. $serie_colocada_3.'">
								</tr>
								
								<tr>
								<td width=27% class=back2 align=right>Nº serie peça retirada 4:</td>
								<td class=back width=20%>
								
								<input type=text name=pcc4 size=25% value = "'.$serie_retirada_4.'">
								
									
								</td>
								<td width=20% class=back2 align=right>Nº serie peça colocada 4:</td>
								<td class=back width=20%>
								<input type=text name=pcr4 size=25% value = "'.$serie_colocada_4.'">
								</tr>
								
								';
								
									echo '
								</td>

							</tr>';
																					
																					
																					echo'

																					<td class=back2 align=right valign=top width=27%> ' . $lang_update . ': </td>
																					<td class=back colspan=3 valign=bottom> <textarea name=update_log rows=5 cols=60></textarea><br>';
       
	    echo '													<select size="1" name="updatetype">
				    																<option  value="supporter" selected>' . $lang_supporter_update . '</option>
				    																<option value="client">' . $lang_client_update . '</option>';
        if ($enable_smtp == "win" || $enable_smtp == "lin") {
            echo '                                                  <option value="clientemail">' . $lang_client_update_email . '</option>';
            // }else{
            // echo '<input type=hidden name=updatetype value=supporter>';
        }
		
		
		
        echo '</select>';
		
		
		
		
        // only display the link to the update log if show_update_log_in_task is disabled
        if ($show_update_log_in_task != 'On') {
            echo '<a href="updatelog.php?user=' . $_SESSION[user] . '&id=' . $info['id'] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')">';
            echo '<img border=0 src="../' . $theme['image_dir'] . 'log_button.jpg"></a>';
        }
        echo '</td></tr>';
    }
    if ($enable_tattachments == 'On' && $flag == 'allow') {
        echo '<tr>
																						<td class=back2 align=right valign=top width=27%>' . $lang_attachment . ': </td>';

        echo "<td class=back colspan=3 valign=bottom>";
        echo '<input type=hidden name="MAX_FILE_SIZE" value="' . $max_attachment_size . '">';
        // echo "<input type=\"file\" name=\"the_file\" size=35>";
        echo '<input type="file" name="SelectedFile" size=35>';
        echo '</td></tr>';
    }
    // Only display these fields if the user is a supporter
    if (isSupporter($_SESSION[user]) && ($_GET[t] == 'tupd')) {
        if ($enable_loggeddateoverride == 'On') {
	
			if(empty($data_1o_atendimento)){
				echo '</td></tr>
						<tr>
							<td class=back2 align=right valign=top width=27%>Data do primeiro atendimento: </td>
							<td class=back colspan=3>
								<strong>
									<input type=text name=prim_dia size=2 maxlength=2 onkeyup="if(this.value.length > 1) prim_mes.focus()">&nbsp;:&nbsp;
									<input type=text name=prim_mes size=2 maxlength=2 onkeyup="if(this.value.length > 1) prim_ano.focus()">&nbsp;:&nbsp;
									<input type=text name=prim_ano size=4 maxlength=4 onkeyup="if(this.value.length > 3) prim_hor.focus()">&nbsp;&nbsp;&nbsp;
									<input type=text name=prim_hor size=2 maxlength=2 onkeyup="if(this.value.length > 1) prim_min.focus()">&nbsp;:&nbsp;
									<input type=text name=prim_min size=2 maxlength=2>
								</strong>
								<br>';
			}
            if ($lang_dateformat == 'd/m/y') {
                
            } elseif ($lang_dateformat == 'm/d/y') {
                echo $lang_format_2 . '</td>';
            }
        }
        echo '</tr>
									<tr>
										<td class=back2 align=right valign=top width=27%>' . $lang_resolution_date . ': </td>
										<td class=back colspan=3><strong><input type=text name=resolutiondate_1 size=2 maxlength=2 onkeyup="if(this.value.length > 1) resolutiondate_2.focus()">&nbsp;:&nbsp;<input type=text name=resolutiondate_2 size=2 maxlength=2 onkeyup="if(this.value.length > 1) resolutiondate_3.focus()">&nbsp;:&nbsp;<input type=text name=resolutiondate_3 size=4 maxlength=4 onkeyup="if(this.value.length > 3) resolutiondate_4.focus()">&nbsp;&nbsp;&nbsp;
										<input type=text name=resolutiondate_4 size=2 maxlength=2 onkeyup="if(this.value.length > 1) resolutiondate_5.focus()">&nbsp;:&nbsp;<input type=text name=resolutiondate_5 size=2 maxlength=2></strong><br>';
        if ($lang_dateformat == 'd/m/y') {
            echo $lang_format_1 . '</td>';
        } elseif ($lang_dateformat == 'm/d/y') {
            echo $lang_format_2 . '</td>';
        }
        echo "</tr>
									</tr>";
    }
    echo '
														</table>
													</td>
													</tr>
												</table>
											<br>';
}

function createUsersMenu()
{
    global $users_table, $db, $enable_ulist, $lang_please_select_user;
    global $username_fullname;

    if ($enable_ulist == "Users") {
        $sql = "select user_name, first_name, last_name from $users_table where supporter='0' order by user_name asc";
    } else {
        $sql = "select user_name, first_name, last_name from $users_table order by user_name asc";
    }
    $result = $db->query($sql);
    // spit out a default select
    echo "<option value=index.php?t=tcre&usern=unset>$lang_please_select_user</option>";
    while ($row = $db->fetch_array($result)) {
        // we need to default the username if we already chose it
        // most likely from supporter/tcreate
        if ($_SESSION[autofill_user] == $row[0]) {
            $chosen = 'selected';
        } else {
            $chosen = '';
        }
        if ($username_fullname == 'Username') {
            echo "<option value=index.php?t=tcre&usern=" . urlencode($row[0]) . " $chosen>$row[0]";
        } else {
            echo "<option value=index.php?t=tcre&usern=" . urlencode($row[0]) . " $chosen>$row[1] $row[2]";
        }
    }
}
/**
 * function createCategoryMenu():
 * 		Takes no arguments.  Creates the drop down menu for the list of categories.
 */
function createCategoryMenu($flag, $user_name = '')
{
    global $tcategories_table, $info, $db, $ugroup_meta_security_table, $delimiter, $enable_task_field_filtering;
    // Create list for tcreate and tsearch
    if ($user_name == '' OR $user_name == 'guest123' or $enable_task_field_filtering == 'Off') {
        $sql = "select category from $tcategories_table order by rank, category asc";
    } else {
        $uGroupArray = getUGroupsID($user_name);
        if (!is_array($uGroupArray)) {
        	$uGroupArray = array(99999999999);
        }
		$i = 0;
        foreach($uGroupArray as $a) {
            if ($i == 0) {
                $sql2 = "user_id=$a";
            } else {
                $sql2 .= " OR user_id=$a";
            }
            $i++;
        }

        $sql1 = "select categories from $ugroup_meta_security_table WHERE ";
        $sql = $sql1 . $sql2;

          $result = $db->query($sql);
        $sql1 = "select category from $tcategories_table WHERE ";
	$i = 0;
		while($row = $db->fetch_array($result)){
        if (strstr($row[0], $delimiter)) {
            $groupArray = explode($delimiter, $row[0]);

            foreach($groupArray as $a) {
                if ($i == 0) {
                    $sql2 = "id=$a";
                } else {
                    $sql2 .= " OR id=$a";
                }
                $i++;
            }
        } else {
			if ($i == 0) {
                    $sql2 = "id=$row[0]";
                } else {
                    $sql2 .= " OR id=$row[0]";
                }
                $i++;
		}
		} // while
		//Handle no group option
		if ($sql2 == '') {
			$sql2 = "id=0";
		}

        $sql = $sql1 . $sql2 . " order by rank, category asc";
	}

    $result = $db->query($sql);
    // default as calling from search
    if ($flag == 1)
        echo "<option selected></option>\n";
    // catch the tcre from users ticket entry we don't want that mucking
    // things up since autofill was for supporters only.
    $testuser = isSupporter($_SESSION[user]);

    while ($row = $db->fetch_array($result)) {
        if ($_GET[t] == "tcre" && $testuser != "") {
            // default the category
            if ($_SESSION[autofill_category] == "") {
                $_SESSION[autofill_category] = $row[0];
            }
			// Alterei o seguinte código <option value=\"$row[0]\" " pelo código abaixo
            echo "<option value=\"$row[0]\" ";
        } else {
            echo "<option value=\"$row[0]\" ";
        }
        if (($info['category'] == $row[0] || $_POST[category] == $row[0] || $_SESSION[autofill_category] == $row[0]) && $flag != 1)
            echo "selected";
        echo ">$row[0]</option>\n";
    }
}

/**
 * function createProjectMenu():
 * 	  Creates the drop down menu for the list of projects and if a username is
 * specified filters the projects.
 */
 // mudei o value
function createProjectMenu($flag, $user_name = '')
{
    global $tprojects_table, $info, $db, $delimiter, $ugroup_meta_security_table, $enable_task_field_filtering;
    // Create list for tcreate and tsearch
    if ($user_name == '' OR $user_name == 'guest123' or $enable_task_field_filtering == 'Off') {
        $sql = "select project from $tprojects_table order by rank, project asc";
    } else {
        $uGroupArray = getUGroupsID($user_name);
        if (!is_array($uGroupArray)) {
        	$uGroupArray = array(99999999999);
        }
		$i = 0;
        foreach($uGroupArray as $a) {
            if ($i == 0) {
                $sql2 = "user_id=$a";
            } else {
                $sql2 .= " OR user_id=$a";
            }
            $i++;
        }

        $sql1 = "select projects from $ugroup_meta_security_table WHERE ";
        $sql = $sql1 . $sql2;
        $result = $db->query($sql);
        $sql1 = "select project from $tprojects_table WHERE ";
	$i = 0;
		while($row = $db->fetch_array($result)){
        if (strstr($row[0], $delimiter)) {
            $groupArray = explode($delimiter, $row[0]);

            foreach($groupArray as $a) {
                if ($i == 0) {
                    $sql2 = "id=$a";
                } else {
                    $sql2 .= " OR id=$a";
                }
                $i++;
            }
        } else {
			if ($i == 0) {
                    $sql2 = "id=$row[0]";
                } else {
                    $sql2 .= " OR id=$row[0]";
                }
                $i++;
		}
		} // while
		//Handle no group option
		if ($sql2 == '') {
			$sql2 = "id=0";
		}
		$sql = $sql1 . $sql2 . " order by rank, project asc";
	}
    $result = $db->query($sql);
    // default as calling from search
    if ($flag == 1)
        echo "<option selected></option>\n";
    // catch the tcre from users ticket entry we don't want that mucking
    // things up since autofill was for supporters only.
    $testuser = isSupporter($_SESSION[user]);


    while ($row = $db->fetch_array($result)) {
        if ($_GET[t] == "tcre" && $testuser != "") {
            // default the category
            if ($_SESSION[autofill_project] == "") {
                $_SESSION[autofill_project] = $row[0];
            }
            echo "<option value=\"$row[0]\" ";
        } else {
            echo "<option value=\"$row[0]\" ";
        }
        if (($info['project'] == $row[0] || $_POST[project] == $row[0] || $_SESSION[autofill_project] == $row[0]) && $flag != 1)
            echo "selected";
        echo ">$row[0]</option>\n";
    }
}
/**
 * function createKCategoryMenu():
 * 		Takes no arguments.  Creates the drop down menu for the list of knowledge base categories.
 */
function createKCategoryMenu($flag = 0, $category = '')
{
    global $kcategories_table, $info, $db;

    $sql = "select category from $kcategories_table order by category asc";
    $result = $db->query($sql);

    if ($flag == 1)
        echo "<OPTION></OPTION>\n";

    if ($category == '') {
        while ($row = $db->fetch_array($result)) {
            echo "<OPTION value=\"$row[0]\"";
            if ($info['category'] == $row[0])
                echo " selected";
            echo ">$row[0]</OPTION>\n";
        }
    } else {
        while ($row = $db->fetch_array($result)) {
            echo "<OPTION value=\"$row[0]\"";
            if ($row[0] == $category)
                echo " selected";
            echo ">$row[0]</OPTION>\n";
        }
    }
}

/**
 * function createPlatformMenu():
 * 		Takes no arguments.  Creates the drop down menu for the list of platforms.
 */
function createPlatformMenu($flag = 0, $platform = '', $user_name = '')
{
    global $platforms_table, $info, $db, $ugroup_meta_security_table, $delimiter, $enable_task_field_filtering;
    // Create list for tcreate and tsearch
    if ($user_name == '' OR $user_name == 'guest123' or $enable_task_field_filtering == 'Off') {
        $sql = "select platform from $platforms_table order by rank, platform asc";
    } else {
        $uGroupArray = getUGroupsID($user_name);
        if (!is_array($uGroupArray)) {
        	$uGroupArray = array(99999999999);
        }
	    $i = 0;
        foreach($uGroupArray as $a) {
            if ($i == 0) {
                $sql2 = "user_id=$a";
            } else {
                $sql2 .= " OR user_id=$a";
            }
            $i++;
        }
        $sql1 = "select task_groups from $ugroup_meta_security_table WHERE ";
        $sql = $sql1 . $sql2;
        $result = $db->query($sql);
        $sql1 = "select platform from $platforms_table WHERE ";
	$i = 0;
		while($row = $db->fetch_array($result)){
        if (strstr($row[0], $delimiter)) {
            $groupArray = explode($delimiter, $row[0]);

            foreach($groupArray as $a) {
                if ($i == 0) {
                    $sql2 = "id=$a";
                } else {
                    $sql2 .= " OR id=$a";
                }
                $i++;
            }
        } else {
			if ($i == 0) {
                    $sql2 = "id=$row[0]";
                } else {
                    $sql2 .= " OR id=$row[0]";
                }
                $i++;
		}
		} // while
		//Handle no group option
		if ($sql2 == '') {
			$sql2 = "id=0";
		}

        $sql = $sql1 . $sql2 . " order by rank, platform asc";
}
    $result = $db->query($sql);
    // set if calling from search
    if ($flag == 1)
        echo "<option selected></option>\n";
    // catch the tcre from users ticket entry we don't want that mucking
    // things up since autofill was for supporters only.
    $testuser = isSupporter($_SESSION[user]);

    if ($platform == '') {
        while ($row = $db->fetch_array($result)) {
            // handle the output if we are at tcreate
            if ($_GET[t] == "tcre" && $testuser != "") {
                // default the platform
                if ($_SESSION[autofill_platform] == "") {
                    $_SESSION[autofill_platform] = $row[0];
                }
                echo "<option value=\"$row[0]\" ";
            } else {
                echo "<option value=\"$row[0]\" ";
            }
            if (($info['platform'] == $row[0] || $_POST[platform] == $row[0] || $_SESSION[autofill_platform] == $row[0]) && $flag != 1)
                echo "selected";
            echo "> $row[0] </option>\n";
        }
    } else {
        while ($row = $db->fetch_array($result)) {
            echo "<option value=\"$row[0]\" ";
            if ($row[0] == $platform)
                echo "selected";
            echo "> $row[0] </option>\n";
        }
    }
}

/**
 * function updateLog():
 * 		Takes an integer and a string as input.  The integer value is the ticket id number.  The string is
 * 	the message to append to the update log along with a timestamp.
 */
function updateLog($ticket_id, $msg)
{
    global $tickets_table, $delimiter, $helpdesk_name, $db, $lang_transferred, $lang_statuschange, $lang_prioritychange, $lang_by, $lang_createdbyweb, $time_offset, $lang_webuser;
    $time = time(); //get the current time to put in the message
    // grab the current update log from the tickets table.
    $log = getCurrentLog($ticket_id);
    // stripslashes from log so we don't multiple add slashes each time we add log messages
    // $log = stripslashes($log);
    // add italics for the transferred/status change/priority change message.
    if (ereg("^\$lang_transferred", $msg) || ereg("^\$lang_statuschange", $msg) || ereg("^\$lang_prioritychange", $msg)) {
        $msg = "<i>" . $msg . "</i>";
    }

    if ($msg != '') { // only if the message actually contains text do we want to add it to the update log.
        if (eregi("lang_createdbyweb", $msg)) {
            $log .= "$time \$lang_createdbyweb $delimiter" . stripslashes($msg) . "$delimiter";
        } else {
            if (isset ($_SESSION[user])) {
                $log .= "$time \$lang_by $_SESSION[user] $delimiter" . stripslashes($msg) . "$delimiter";
            } else {
                $log .= "$time \$lang_by $lang_webuser $_SESSION[user] $delimiter" . stripslashes($msg) . "$delimiter";
            }
        }
    }
    return customAddSlashes($log);
}

/**
 * function getCurrentLog():
 * 		Takes one argument.  Gets the current update log string of the ticket given the id and returns it.
 */
function getCurrentLog($id)
{
    global $tickets_table, $db;

    $sql = "select update_log from $tickets_table where id=$id";
    $result = $db->query($sql);

    $row = $db->fetch_array($result);
    // returns the entire contents of the update log as a string.
    return $row[0];
}

/**
 * function deleteFromGroups():
 * 		Takes one argument.  Cycles through the list of supporter groups that the use is a member of and
 * 	deletes that user from the group.  This is called when a user is deleted so that user is not left in
 * 	each group.
 */
function deleteFromGroups($id)
{
    global $sgroups_table, $db, $table_prefix;
    // first, create an array that contains all of the user groups the user is in.
    $sql = "select id from $sgroups_table where id!= 1";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $sgroups_list[$i] = $row[0];
        $i ++;
    }

    $sql = "select id from " . $table_prefix . "ugroups";
    $result = $db->query($sql);
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        $ugroups_list[$i] = $row[0];
        $i ++;
    }
    // now both the sgroups list is filled and the ugroups list is filled.
    // now we can cycle through the array and delete the user from each table if they are a member.
    for ($i = 0; $i < sizeof($sgroups_list); $i ++) {
        $sql = "delete from " . $table_prefix . "sgroup" . $sgroups_list[$i] . " where user_id=$id";
        $db->query($sql);
    }

    for ($i = 0; $i < sizeof($ugroups_list); $i ++) {
        $sql = "delete from " . $table_prefix . "ugroup" . $ugroups_list[$i] . " where user_id=$id";
        $db->query($sql);
    }
}

/**
 * function getTotalNumOpenTickets():
 * 		Takes one argument.  If the id is not set, this returns the total number of open tickets in the
 * 	database.  If the id is set, it returns the total number of tickets that are open and assigned to the
 * 	user with the given id.
 */
function getTotalNumOpenTickets($id)
{
    global $tickets_table, $tstatus_table, $status, $db;

    if (!isset ($id) || $id == '') {
        $sql = "select id from $tickets_table where status!='$status'";
    } else {
        $sql = "select id from $tickets_table where status!='$status' and supporter_id=$id";
    }

    $result = $db->query($sql);
    $count = $db->num_rows($result);

    return $count;
}

function getTotalNumOpenTicketsSLA($id)
{

    global $etimestamp, $stimestamp, $tickets_table, $tstatus_table, $status, $db;
	
    if (!isset ($id) || $id == '') {
        $sql = "select id from $tickets_table where status!='$status' and  office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    } else {
        $sql = "select id from $tickets_table where status!='$status' and supporter_id=$id and  office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    }
	//die($sql);
    $result = $db->query($sql);
    $count = $db->num_rows($result);

    return $count;
}

/**
 * function getTotalNumClosedTickets():
 * 		Takes one argument.  If the id is not set, this returns the total number of closed tickets in the
 * 	database.  If the id is set, it returns the total number of tickets that are closed and assigned to the
 * 	user with the given id.
 */
function getTotalNumClosedTickets($id)
{
    global $tickets_table, $tstatus_table, $status, $db;

    if (!isset ($id) || $id == '') {
        $sql = "select id from $tickets_table where status='$status'";
    } else {
        $sql = "select id from $tickets_table where status='$status' and supporter_id=$id";
    }

    $result = $db->query($sql);
    $count = $db->num_rows($result);

    return $count;
}

function getTotalNumClosedTicketsSLA($id)
{
    global $etimestamp, $stimestamp, $tickets_table, $tstatus_table, $status, $db;

    if (!isset ($id) || $id == '') {
        $sql = "select id from $tickets_table where status='$status' and  office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    } else {
        $sql = "select id from $tickets_table where status='$status' and supporter_id=$id and  office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    }
	//die($sql);
    $result = $db->query($sql);
    $count = $db->num_rows($result);

    return $count;
}

/**
 * function getTotalNumTickets():
 * 		Takes one argument.  If the id is not set, this returns the total number of tickets in the
 * 	database.  If the id is set, it returns the total number of tickets that are assigned to the
 * 	user with the given id.
 */
function getTotalNumTickets($id)
{
    global $tickets_table, $tstatus_table, $db;

    if (!isset ($id) || $id == '') {
        $sql = "select count(id) from $tickets_table";
    } else {
        $sql = "select count(id) from $tickets_table where supporter_id=$id";
    }

    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}
function getTotalNumTicketsSLA($id)
{
    global $etimestamp, $stimestamp, $tickets_table, $tstatus_table, $db;

    if (!isset ($id) || $id == '') {
        $sql = "select count(id) from $tickets_table where office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    } else {
        $sql = "select count(id) from $tickets_table where supporter_id=$id and  office = '$_POST[office]' and (create_date > $stimestamp and create_date < $etimestamp)";
    }

    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[0];
}
/**
 * function getTotalNumOpenTickets():
 * 		Takes one argument.  Returns true if the email address given is valid (of the form a@b.c).
 * 	Otherwise returns false.
 */
function validEmail($address)
{
    if (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+' . '@' . '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' . '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $address))
        return true;
    else
        return false;
}

/**
 * function startTable():
 * Takes five arguments. Starts the html table with a header included and the
 * alignment of that header.
 */
function startTable($msg, $align, $width = 100, $colspan = 1, $border = 0)
{
    if ($width == '')
        $width = '100';

    echo '<TABLE class=border cellSpacing=0 cellPadding=0 width="' . $width . '%" align=center border=' . $border . '>
								<TR>
									<TD>
										<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
											<TR>
												<TD class=info colspan=' . $colspan . ' align=' . $align . '><B>';
    echo $msg;
    echo '				</B></td>
																		</TR>	';
}

/**
 * function endTable():
 * 		Takes no arguments.  Html code that ends the table started with startTable().
 */
function endTable()
{
    echo '
														</table>
															</td>
															</tr>
														</table><br>';
}

/**
 * function sendmail():
 * 		Takes five arguments.  The To address, from address, return path, ticket id number, and a message.
 * 	This is used for the *nix mail function.  By using this over the mail function provided with php, we can
 * 	override some header functions and set a return-to path that cannot be done otherwise.  This allows for
 * 	bogus email addresses not to choke the system.  Windows users will have this problem if there are invalid
 * 	(not in syntax) email addresses used.
 * 	Note:	This is all in English . . . for other languages, text must be modified manually.
 *
 *      Note: This is no longer used post 1.6, but left for backward compatibility
 */
function sendmail($to, $from, $return, $id, $msg, $subject = "")
{
    global $admin_email, $sendmail_path;

    $msg = stripslashes($msg);
    $mailprog = $sendmail_path . "sendmail -r '$admin_email' -t";

    $fd = popen($mailprog, "w");
    fputs($fd, "To: $to\n");
    if ($subject == '') {
        fputs($fd, "Subject: Ticket $id\n");
    } else {
        fputs($fd, "Subject: $subject\n");
    }
    fputs($fd, "From: $from <$return>\n");
    fputs($fd, "Reply-To: $return\n");
    fputs($fd, "Return-Path: $return\n");
    fputs($fd, "$msg\n");
    pclose($fd);
}

/**
 * function sendEmail():
 * 		Takes five arguments and sends an email based on the method chosen in control panel
 * 		The reply address is optional
 */
function sendEmail($to, $from, $msg, $subject, $reply = '')
{
    global $enable_smtp, $admin_email, $sendmail_path;
    global $helpdesk_name;
    // check we are enabled first
    if ($enable_smtp == 'win' || $enable_smtp == 'lin') {
        // cleanse the variables
        if ($reply == '')
            $reply = $from;
        $msg = stripScripts($msg);
        $msg = stripslashes($msg);
        // if the helpdesk name contains & or '
        $helpdesk_name = ereg_replace("&amp;", "&", $helpdesk_name);
        $helpdesk_name = ereg_replace("&#039;", "'", $helpdesk_name);
        if ($enable_smtp == 'win') {
            // use the php mail function
            $from = "From: " . $helpdesk_name . "<" . $from . ">\nReply-To: " . $reply . "\n";
            mail($to, $subject, $msg, $from);
        }
        // use sendmail
        if ($enable_smtp == 'lin') {
            $mailprog = $sendmail_path . "sendmail -r '$admin_email' -t";
            $fd = popen($mailprog, "w");
            fputs($fd, "To: $to\n");
            fputs($fd, "Subject: $subject\n");
            fputs($fd, "From: $helpdesk_name <$reply>\n");
            fputs($fd, "Reply-To: $reply\n");
            fputs($fd, "Return-Path: $reply\n");
            fputs($fd, "$msg\n");
            pclose($fd);
        }
    }
}

/**
 * function getEmailAddress():
 * 		Takes one argument.  Returns the email address of the user name specified.
 */
function getEmailAddress($name)
{
    global $users_table, $db;

    $sql = "select email from $users_table where user_name='$name'";
    $result = $db->query($sql);

    $row = $db->fetch_array($result);
    return $row[0];
}
// this function takes an integer value (the number of seconds) and prints out the days, hours, minutes, and seconds.
function showFormattedTime($seconds, $flag = 0)
{
    global $lang_na, $lang_day, $lang_days, $lang_hour, $lang_hours, $lang_minute, $lang_minutes, $lang_second, $lang_seconds;

    if ($seconds <= 0) {
        echo "<b>$lang_na</b>";
    } else {
        $days = (int) ($seconds / (24 * 60 * 60));
        $remainder = $seconds % (24 * 60 * 60);

        $hours = (int) ($remainder / (60 * 60));
        $remainder = $remainder % (60 * 60);

        $minutes = (int) ($remainder / 60);
        $seconds = $remainder % 60;

        if ($days != 0) {
            echo "$days";
            if ($days != 1)
                echo " $lang_days";
            else
                echo " $lang_day";
            echo ", ";
        }

        if ($hours != 0) {
            echo "$hours";
            if ($hours != 1)
                echo " $lang_hours";
            else
                echo " $lang_hour";
            echo ", ";
        }

        if ($minutes != 0) {
            echo "$minutes";
            if ($minutes != 1)
                echo " $lang_minutes";
            else
                echo " $lang_minute";
            // comment all of these lines if you don't want to keep track of seconds as well.
            if ($flag == 0)
                echo ", ";
        }

        if ($flag == 0 && $minutes != 0) {
            echo " and $seconds";
            if ($seconds != 1)
                echo " $lang_seconds";
            else
                echo " $lang_second";
        } elseif ($flag == 0) {
            echo "$seconds";
            if ($seconds != 1)
                echo " $lang_seconds";
            else
                echo " $lang_second";
        }
    }
}

function listPlatforms()
{
    global $platforms_table, $db, $lang_delete, $lang_rank;

    $sql = "select * from $platforms_table order by rank asc";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows != 0) {
        $i = 0;
        while ($row = $db->fetch_array($result)) {
            echo "<input type=hidden name=id$i value='$row[id]'></input>";
            echo "<tr><td class=back>";
            echo "<input type=text name=platform$i value=\"" . htmlspecialchars($row['platform']) . "\">";
            echo "&nbsp;&nbsp; $lang_rank: <input type=text size=2 value='$row[rank]' name=rank" . $i . ">";

            if (!eregi("kbase", $_SERVER[HTTP_REFERER]))
                echo "&nbsp;&nbsp;<a href=control.php?t=topts&act=tpla&rm=delete&id=$row[id]>$lang_delete</a>?";
            else
                echo "&nbsp;&nbsp;<a href=control.php?t=kbase&act=plat&rm=delete&id=$row[id]>$lang_delete</a>?";
            echo "</td>";
            echo "</tr>";
            $i ++;
        }
    }

    return $num_rows;
}

function getNumPlatforms()
{
    global $platforms_table, $db;

    $sql = "select count(platform) from $platforms_table";
    $result = $db->query($sql);
    $total = $db->fetch_array($result);

    return $total[0];
}

function listKCategories()
{
    global $kcategories_table, $db, $lang_delete;

    $sql = "select * from $kcategories_table order by category asc";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    if ($num_rows != 0) {
        $i = 0;
        while ($row = $db->fetch_array($result)) {
            echo "<input type=hidden name=id$i value='" . htmlspecialchars($row['id']) . "'></input>";
            echo "<tr><td class=back>";
            echo "<input type=text name=category$i value=\"" . htmlspecialchars($row['category']) . "\">";
            // echo "&nbsp;&nbsp; Rank: <input type=text size=2 value='$row[1]' name=rank".$i.">";
            echo "&nbsp;&nbsp;<a href=control.php?t=kbase&act=cate&rm=delete&id=" . $row['id'] . ">$lang_delete</a>?";
            echo "</td>";
            echo "</tr>";
            $i ++;
        }
    }

    return $num_rows;
}

function getNumKCategories()
{
    global $kcategories_table, $db;

    $sql = "select count(category) from $kcategories_table";
    $result = $db->query($sql);
    $total = $db->fetch_array($result);

    return $total[0];
}

function createKBMenu()
{
    global $lang_category, $lang_platform, $kcategories_table, $platforms_table, $lang_searchfor, $lang_searchcriteria, $lang_incategory, $lang_under;

    echo "<b>$lang_searchfor </b><input type=text name=item> </select> $lang_category <select name=category>";
    createKCategoryMenu(1);
    echo "</select> $lang_platform ";
    echo "<select name=platform>";
    createPlatformMenu(1);
    echo "</select><br>" . "<font size=\"1\">% = wildcard search</font>  ";
}

function makeClickable($text)
{
    $ret = eregi_replace("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])", "<a href=\"\\1://\\2\\3\" target=\"_blank\" target=\"_new\">\\1://\\2\\3</a>", $text);
    $ret = eregi_replace("(([a-z0-9_]|\\-|\\.)+@([^[:space:]]*)([[:alnum:]-]))", "<a href=\"mailto:\\1\" target=\"_new\">\\1</a>", $ret);
    return ($ret);
}

function setResponse($last, $prio, $tid)
{
    global $tpriorities_table, $db, $time_table;

    $sql = "SELECT closed_date from $time_table where ticket_id=$tid order by id desc;";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);
    $closed_time = $row[closed_date];

    if ($closed_time == '' || $closed_time == '0')
        $curr_time = time();
    else
        $curr_time = $closed_time;

    $sql = "SELECT response_time from $tpriorities_table where priority='$prio'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);
    $time_allowed = $row['response_time'];

    $time_since_update = $curr_time - $last; //time since last update in seconds
    if ($time_since_update >= $time_allowed)
        $response = 4;
    if ($time_since_update < ($time_allowed))
        $response = 3;
    if ($time_since_update <= ($time_allowed * 0.667))
        $response = 2;
    if ($time_since_update <= ($time_allowed * 0.333))
        $response = 1;

    return $response;
}

/**
 * function createViewableByMenu():
 *                       Takes no arguments.  Creates the drop down menu for the list of knowledge base categories.
 */
function createViewableByMenu($flag = 0)
{
    global $info, $lang_allusers, $lang_onlysupporters;

    if ($flag == 1)
        echo "<option></option>";
    // option 1: viewable by all users
    echo "<option value='all'";
    if ($info['viewable_by'] == 'all') {
        echo "selected";
    }
    echo "> $lang_allusers </option>";
    // option 2: viewable by only supporters
    echo "<option value='supporters'";
    if ($info['viewable_by'] == 'supporters') {
        echo "selected";
    }
    echo "> $lang_onlysupporters </option>";
}

function convertFileSize($attachsize)
{
    global $lang_unknown;

    if ($attachsize >= 1073741824) {
        $attachsize = round(($attachsize / 1073741824 * 100) / 100) . 'gb';
    } elseif ($attachsize >= 1048576) {
        $attachsize = round(($attachsize / 1048576 * 100) / 100) . 'mb';
    } elseif ($attachsize >= 1024) {
        $attachsize = round(($attachsize / 1024 * 100) / 100) . 'kb';
    } else {
        $attachsize = $attachsize . "b";
    }

    if ($attachsize == 'b') {
        $attachsize = "$lang_unknown";
    }
    return $attachsize;
}

function getLanguage($name)
{
    global $users_table, $db;

    $sql = "SELECT language from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $language = $db->fetch_array($result);
    return $language[language];
}

function createSGroupCheckboxes($id)
{
    global $sgroups_table, $db, $table_prefix;
    $sql = "SELECT id, group_name from $sgroups_table where id != 1 order by group_name asc";
    $result = $db->query($sql);

    echo "<tr>";

    $i = 1;
    while ($row = $db->fetch_array($result)) {
        if ($row[id] != '' && $id != '') {
            $sql = "select user_id from " . $table_prefix . "sgroup" . $row[id] . " where user_id=$id";
            $result2 = $db->query($sql);
            $num_rows = $db->num_rows($result2);
        }
        if ($i % 4 == 0) {
            echo "<td class=subcat width=25%><b>
																																									<input class=box type=checkbox";
            if ($num_rows > 0) {
                echo " checked";
            }
            echo " name=sbox" . $i . " value=" . $row['id'] . ">&nbsp;&nbsp;&nbsp;" . $row['group_name'] . "</b><br></td></tr><tr>";
        } else {
            echo "<td class=subcat width=25%><b>
																																									<input class=box type=checkbox";
            if ($num_rows > 0) {
                echo " checked";
            }
            echo " name=sbox" . $i . " value=" . $row['id'] . ">&nbsp;&nbsp;&nbsp;" . $row['group_name'] . "</b><br></td>";
        }
        $i ++;
    }

    $num_boxes = $i -1;
    echo "<input type=hidden name=num_sboxes value=$num_boxes>";

    while ($i % 4 != 1) {
        echo "<td class=subcat>&nbsp;</td>";
        $i ++;
    }

    echo "</tr>";
}

function createUGroupCheckboxes($id)
{
    global $ugroups_table, $db, $table_prefix;

    $sql = "SELECT id, group_name from $ugroups_table order by group_name asc";
    $result = $db->query($sql);

    echo "<tr>";

    $i = 1;
    while ($row = $db->fetch_array($result)) {
        if ($row[id] != '' && $id != '') {
            $sql = "select user_id from " . $table_prefix . "ugroup" . $row[id] . " where user_id=$id";
            $result2 = $db->query($sql);
            $num_rows = $db->num_rows($result2);
        }
        if ($i % 4 == 0) {
            echo "<td class=subcat width=25%><b>
																																									<input class=box type=checkbox";
            if ($num_rows > 0) {
                echo " checked";
            }
            echo " name=ubox" . $i . " value=" . $row['id'] . ">&nbsp;&nbsp;&nbsp;" . $row['group_name'] . "</b><br></td></tr><tr>";
        } else {
            echo "<td class=subcat width=25%><b>
																																									<input class=box type=checkbox";
            if ($num_rows > 0) {
                echo " checked";
            }
            echo " name=ubox" . $i . " value=" . $row['id'] . ">&nbsp;&nbsp;&nbsp;" . $row['group_name'] . "</b><br></td>";
        }
        $i ++;
    }

    $num_boxes = $i -1;
    echo "<input type=hidden name=num_uboxes value=$num_boxes>";

    while ($i % 4 != 1) {
        echo "<td class=subcat>&nbsp;</td>";
        $i ++;
    }

    echo "</tr>";
}

function getTimeOffset($name)
{
    global $db, $users_table;

    $sql = "SELECT time_offset from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    if ($row[0] == '')
        return 0;
    else
        return $row[0];
}

function getLastActiveTime($name)
{
    global $db, $users_table;

    $sql = "SELECT lastactive from $users_table where user_name='$name'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    if ($row[lastactive] == '0')
        return "Never";
    else
        return $row[lastactive];
}

function stripScripts($text)
{
    $text = eregi_replace("<script>", "(not allowed)", $text);
    $text = eregi_replace("</script>", "(/not allowed)", $text);
    // $text = htmlentities($text, ENT_NOQUOTES);
    return $text;
}

function getDefaultSupporterGroupID()
{
    global $sgroups_table, $db;

    $sql = "SELECT id from $sgroups_table where default_group='Yes'";
    $result = $db->query($sql);
    $row = $db->fetch_array($result);

    return $row[id];
}
/**
 * A Hall
 * uploadAttachment takes 3 arguments - $max_attachment_size, $_form_field_name
 * and $time and uses the global variable $file_upload_directory . It takes files
 * uploaded using the POST method, adds them to the upload directory .FileNames
 * are appended with epoch time ($time) and an underscore to confirm uniqueness,
 * and whitespaces are replaced with underscores for filesystem and browser
 * compliance.  $new_filename is returned with epoch time appended.
 */
function uploadAttachment($max_attachment_size, $form_field_name, $time)
{
    global $file_upload_directory, $compress_attachments;
    // Lets fix up whitespace re linux and browser incompatibilities
    $new_filename = preg_replace('/[^a-zA-Z0-9\.\$\%\'\`\-\@\{\}\~\!\#\(\)\&\_\^]/', '', str_replace(array (' ', '%20', '\'', '"'), array ('_', '_', '_', '_'), $_FILES[$form_field_name]['name']));
    $uploadfile = $file_upload_directory . $time . '_' . $new_filename;
    // File array aliases
    $filename = $_FILES[$form_field_name]['name'];
    $filesize = $_FILES[$form_field_name]['size'];
    $filetype = $_FILES[$form_field_name]['type'];
    $file_tmp = $_FILES[$form_field_name]['tmp_name'];
    $file_err = $_FILES[$form_field_name]['error'];
    $file_ext = strrchr($filename, '.');
    // If no error exists lets go (0 means OK)
    if ($file_err == 0) {
        $result = move_uploaded_file($file_tmp, $uploadfile);
        if (!$result) {
            printError('There is a problem moving the uploaded file to ' . $file_upload_directory . '.  Please check the directory exists and permissions are set as per the install documentation.');
            die;
        }
    } else {
        // Delete temp file if any, and display errors.
        if ($file_tmp != '') {
            unlink($file_tmp);
        }
        switch ($file_err) {
            case '1' :
                printError('Attachment ' . $filename . ' exceeds the maximum allowed file size as set in php.ini. ' . 'Please contact your system admin.');
                die;
                break;
            case '2' :
                printError('Attachment ' . $filename . ' exceeds the maximum allowed file size as set in your  ' . 'webserver configuration file. Please contact your system admin.');
                die;
                break;
            case '3' :
                printError('The file was only partially uploaded. This could be the result of your connection ' . 'being dropped in the middle of the upload.');
                die;
            case '4' :
                printError('You did not upload anything... Please go back and select a file to upload.');
                die;
                break;
            case '5' :
                printError('The file is 0 kilobytes in length. Is it an empty file?');
                break;
                die;
        }
    }
    // return new filename
    return $time . '_' . $new_filename;
    // compress our attachment if we have enabled it
    // if ($compress_attachments == "Off"){
    // //return new filename
    // return $time.'_'.$new_filename;
    // }else{
    // compressAttachment($uploadfile, $uploadfile.'.gz');
    // return $time.'_'.$new_filename.'.gz';
    // }
}

/**
 * A Hall
 * compressAttachment takes 2 arguments - $srcName and $dstName and compresses
 * the upload using the php gzip functions
 */
function compressAttachment($srcName, $dstName)
{
    $fp = fopen($srcName, "r");
    $data = fread($fp, filesize($srcName));
    fclose($fp);

    $zp = gzopen($dstName, "wb9");
    if (gzwrite($zp, $data)) {
        unlink($srcName);
    }
    gzclose($zp);
}

/**
 * A Hall
 * $filename takes 1 arguments - $srcName and uncompresses the file
 * ready for download
 */
function uncompressAttachment($filename)
{
    $zd = gzopen($filename, "rb9");
    $contents = gzread($zd, buf, len);
    gzclose($zd);

    return $contents;
}

/**
 * A Hall
 * customAddSlashes takes 1 argument - $text and handles slashes, ', ", \ etc
 * depending on the database being used.  Required for cross db compatibility
 */
function customAddSlashes($text)
{
    global $database;
    // mysql specific addslashes
    if ($database == "mysql"  OR $database == 'mysql5') {
        $text = addslashes($text);
    } elseif ($database == "sqlite") {
        $text = sqlite_escape_string($text);
    }

    return $text;
}

/**
 * A Hall
 * stripMagicQuotes takes 1 argument - $arr and undoes what magic_quotes does if
 * it is enabled in the php.ini file
 */
function stripMagicQuotes($arr)
{
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $arr[$k] = stripMagicQuotes($v);
        } else {
            $arr[$k] = htmlspecialchars($v);
            $arr[$k] = stripslashes($v);
        }
    }

    return $arr;
}

/**
 * A Hall
 * convertQuotes takes 1 arguments - $arr and converts " and ' into html special
 * entities
 */
function convertQuotes($arr)
{
    // $flag = 1 means convert to entities, or decode entities
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $arr[$k] = htmlentities($v, ENT_QUOTES);
        } else {
            $arr[$k] = htmlentities($v, ENT_QUOTES);
        }
    }
    return $arr;
}
/**
 * A Hall
 * addslashesRecursive takes 1 argument - $arr and adds slashes
 * depending on database type using customAddSlashes
 */
function addslashesRecursive($arr)
{
    if (is_array($arr)) {
        foreach ($arr as $index => $val) {
            $arr[$index] = addslashesRecursive($val);
        }
        return $arr;
    } else {
        return customAddSlashes($arr);
    }
}
/**
 * A Hall
 * secureInputRecursive takes 1 argument - $arr and converts html using
 * htmlentities and replaces $ with &#36; so eval() doesnt run inline code !
 */
function secureInputRecursive($arr)
{
    foreach ($arr as $index => $val) {
        $arr[$index] = str_replace('$', '&#36;', htmlentities($val));
    }
    return $arr;
}

/**
 * A Hall
 * reverseSecureInputRecursive takes 1 argument - $arr and reverses what
 * secureInputRecursive does
 */
function reverseSecureInputRecursive($arr)
{
    foreach ($arr as $index => $val) {
        $arr[$index] = str_replace('&#36;', '$', html_entity_decode($val));
    }
    return $arr;
}

/**
 * Function getFeedbackRating
 * Takes one argument which is the id of the task and returns the integer value
 * of the rating (the rank)
 */
function getFeedbackRating($id)
{
    global $db, $survey_table;

    $sql = "SELECT rating FROM $survey_table WHERE tid = $id";
    $result = $db->query($sql);
    $rating = $db->fetch_array($result);

    return $rating[0];
}

/**
 * Function showFeedbackRating
 * Takes one argument which is the integer rating and returns the associated
 * rating name
 */
function showFeedbackRating($id)
{
    global $db, $tratings_table;

    if ($id != 0) {
        $sql = "SELECT rating FROM $tratings_table WHERE id = $id";
        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        return $row[0];
    } else {
        return "<strong>N/A</strong>";
    }
}

/**
 * Function writeConfigFile
 * writeConfigFile takes three arguments, the path to
 * the config file and an associative array and a file header.  We use this to
 * write config files.
 */
function writeConfigFile($path, $file_header, $assoc_array)
{
    // Add PHP wrappers and an exit incase someone tries to view this in
    // a browser from the web server (extra security)
    $content = "; <?php exit; ?>\n\n" . $file_header . "\n\n";

    foreach ($assoc_array as $key => $item) {
        if (is_array($item)) {
            $content .= "\n[{$key}]\n";
            foreach ($item as $key2 => $item2) {
                if (is_numeric($item2) || is_bool($item2))
                    $content .= "{$key2} = {$item2}\n";
                else
                    $content .= "{$key2} = \"{$item2}\"\n";
            }
        } else {
            if (is_numeric($item) || is_bool($item))
                $content .= "{$key} = {$item}\n";
            else
                $content .= "{$key} = \"{$item}\"\n";
        }
    }

    if (!$handle = fopen($path, 'w')) {
        return false;
    }
    // write the file and close the php tag
    if (!fwrite($handle, $content . "\n\n")) {
        return false;
    }

    fclose($handle);
    return true;
}

/**
 * Function unsetautofill()
 * takes no arguments but waxes any autofill vars set by tcreate.
 */
function unsetautofill()
{
    // wax those vars!!! ah yeah
    unset ($_SESSION[autofill_sg]);
    unset ($_SESSION[autofill_supp]);
    unset ($_SESSION[autofill_user]);
    unset ($_SESSION[autofill_email]);
    unset ($_SESSION[autofill_office]);
    unset ($_SESSION[autofill_phone]);
    unset ($_SESSION[autofill_pri]);
    unset ($_SESSION[autofill_status]);
    unset ($_SESSION[autofill_platform]);
    unset ($_SESSION[autofill_category]);
    unset ($_SESSION[autofill_short]);
    unset ($_SESSION[autofill_desc]);
    unset ($_SESSION[autofill_severity]);
    unset ($_SESSION[autofill_project]);
}

/**
 * Function genCount()
 * takes 1 argument which is based on which
 * type of task we are looking at.
 */
function gencount($type)
{
    global $tickets_table, $tstatus_table, $tpriorities_table, $db, $table_prefix, $ugroups_table;
    $highest = getRStatus(getHighestRank($tstatus_table)); //set the highest priority rating

    // a few things break if we are doing this from the users side
    // of things so just special case these against the 'user stuff'
    if ($type != "tclo" && $type != "tmopc") {
        $supporter_id = getUserID($_SESSION[user]);
        $num_groups = getNumberGroups();
        $groups = getSGroupList($supporter_id);
        $gcount = count($groups);

        if (sizeof($groups) == 0 && $num_groups != 1) {
            // printerror("$lang_nogroups");
            $no_groups = 1;
        }
    }
    // handle the supporters open tickets.
	##
	if ($type == "rec") {
        $sql = "select ooz_tickets.id 
		from $tickets_table 
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'PE'";
		
		
    }
	if ($type == "mg") {
        $sql = "select ooz_tickets.id 
		from $tickets_table 
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'MG'";
		
		
    }


	if ($type == "df") {
        $sql = "select ooz_tickets.id 
		from $tickets_table 
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'DF'";
		
		
    }


	
	
	if ($type == "nat") {
	 $sql = "select ooz_tickets.id 
		from $tickets_table 
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'RN'";
    }
	if ($type == "mac") {
	 $sql = "select ooz_tickets.id 
		from $tickets_table 
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'AL'";
	}
	
	if ($type == "fo") {
	 $sql = "select ooz_tickets.id 
		from $tickets_table
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'CE'";
    }
	if ($type == "jp") {
	 $sql = "select ooz_tickets.id 
		from $tickets_table
		where status!='$highest' and 
		status!='RST cancelado pelo cliente' and
		ooz_tickets.supporter='support_pool' and 
		ooz_tickets.estado = 'PB'";
    }
	###
    if ($type == "tmop") {
        $sql = "select id from $tickets_table where status!='$highest' and status!='RST cancelado pelo cliente' and supporter_id='$supporter_id'";
    }
    // handle the clients open tickets
    if ($type == "tmopc") {
        $sql = "select id from $tickets_table where user='$_SESSION[user]' and status != '$highest' and status!='RST cancelado pelo cliente' ";
    }
    // handle the groups open tickets.
    if ($type == "tmgo") {
        if ($num_groups == 1 || $gcount < 1) {
            $sql = "select id from $tickets_table where status!='RST cancelado pelo cliente' and status!='" . getRStatus(getHighestRank($tstatus_table)) . "' and (groupid=1";
        } else {
            $sql = "select id from $tickets_table where status!='RST cancelado pelo cliente' and status!='" . getRStatus(getHighestRank($tstatus_table)) . "' and (groupid=";
            // finsih setting up the sql2 statement.
            for ($i = 0; $i < sizeof($groups); $i ++) {
                // special case:  sgroup1 is in the list means no other groups are present at all.
                if ($groups[$i] == $table_prefix . 'sgroup1') {
                    $sql = "select count id from $tickets_table where status!='RST cancelado pelo cliente' and status!='" . getRStatus(getHighestRank($tstatus_table));
                } else {
                    if (inGroup($_SESSION[user], $groups[$i])) {
                        $group_id = eregi_replace($table_prefix . "sgroup", "", $groups[$i]);
                        if ($flag != 1) {
                            $sql .= $group_id;
                            $flag = 1;
                        } else {
                            $sql .= " or groupid=" . $group_id;
                            $flag = 1;
                        } //end else statement
                    }
                }
            } //end for loop
        } //end else
        $sql .= ")";
    }
    // handle closed tasks
    if ($type == "tclo") {
        $sql = "select id from $tickets_table where user='$_SESSION[user]' and status!='RST cancelado pelo cliente' and status = '$highest'";
    }
    // handle the unassigned tickets.
    if ($type == "tunn") {
        $sql = "select id from $tickets_table where status!='RST cancelado pelo cliente' and status!='" . getRStatus(getHighestRank($tstatus_table)) . "' and supporter='support_pool'";
    }
    // handle client group open tickets
    if ($type == "tmgroup" OR $type == "tmgroupc") {
        $groups = getUGroups($_SESSION[user]);
        // Handle no groups
        if (is_array($groups)) {
		// Get all groups the user is in then return all users in those groups
        $i = 0;
        foreach ($groups as $a) {
            $sql = "SELECT id FROM $ugroups_table WHERE group_name = '$a'";
            $result = $db->query($sql);
            $row = $db->fetch_array($result);
            $sql = "SELECT user_name FROM " . $table_prefix . "ugroup" . $row[0];
            $result = $db->query($sql);
            while ($row = $db->fetch_array($result)) {
                $userArray[$i] = $row[0];
                $i++;
            }
        }
        // Only want unique user names
        $userArray = array_unique($userArray);
        $highest = getRStatus(getHighestRank($tstatus_table)); //set the highest priority rating
        $sql1 = "select id from $tickets_table where ";
        $i = 0;
        foreach($userArray as $a) {
            if ($i == 0) {
                $sql2 = "user='$a'";
            } else {
                $sql2 .= " OR user='$a'";
            }
            $i++;
        }
        if ($type == "tmgroup") {
            $sql = $sql1 . "($sql2) and status != '$highest'";
        } elseif ($type == "tmgroupc") {
            $sql = $sql1 . "($sql2) and status = '$highest'";
        }
        }else{
        $sql = "select id from $tickets_table where user = 'no users found'";
		}
		}
    // process and return.
	//echo "</SQL $sql>";
	$result = $db->query($sql);
    // $row = $db->fetch_row($result);
    $count = $db->num_rows($result);
    return $count;
}
/**
 * Gets the number of groups the task manager is in
 */
function getNumberGroups()
{
    global $sgroups_table, $db;

    $sql = "select id from $sgroups_table";
    $result = $db->query($sql);
    $num_rows = $db->num_rows($result);

    return $num_rows;
}

/**
 * *	Takes the task manager id and returns an array containing the list of group ids that the user is in.	*
 */
function getSGroupList($id)
{
    global $sgroups_table, $num_groups, $db, $table_prefix;

    if ($num_groups == 1)
        $sql = "select id from $sgroups_table";
    else
        $sql = "select id from $sgroups_table where id != 1";

    $result = $db->query($sql);
    // now we have the list of all the supporter groups.
    $i = 0;
    while ($row = $db->fetch_array($result)) {
        if ($num_groups != 1) {
            $sql2 = "select id from " . $table_prefix . "sgroup" . $row[0] . " where user_id=$id";
            $result2 = $db->query($sql2);
            if ($db->num_rows($result2) != 0) {
                $grouplist[$i] = $table_prefix . "sgroup" . $row[0];
                $i ++;
            }
        }
    }
    // returns a list of strings (group table names).
    return $grouplist;
}

/**
 * * function user_intro()
 * 		Creates User Introduction Text
 */
function user_intro()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_intro . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <p><b>' . $lang_welcome . ',</b></p>

					                            <p>' . $lang_intro_p1 . '</p>

					                            <ol>
					                                <li>' . $lang_intro_p2 . '</li>

					                                <li>' . $lang_intro_p3 . '</li>
					                            </ol>

					                            <p>' . $lang_intro_p4 . '&nbsp;</p>

					                            <p>
					                            <b>' . $lang_intro_p5 . '</b></font></p>

					                            <p>' . $lang_intro_p6 . '</p>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls User Features Text
function user_features()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '
					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table class="border"
					                       cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_features . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <p><b>' . $lang_feat_p1 . '</b></p>

					                            <p><b>' . $lang_create . '
					                            ' . $lang_ticket . '</b><br>
					                            ' . $lang_feat_p2 . '</p>

					                            <p><b>' . $lang_myopen . '</b><br>
					                            ' . $lang_feat_p3 . '</p>

					                            <p><b>' . $lang_myclosed . '</b><br>
					                            ' . $lang_feat_p4 . '</p>

					                            <p><b>' . $lang_searchforticket . '</b><br>
					                            ' . $lang_feat_p5 . '</p>

					                            <p><b>' . $lang_feedback . '</b><br>
					                            ' . $lang_feat_p6 . '</p>

					                            <p><b>' . $lang_kbase . '</b><br>
					                            ' . $lang_feat_p7 . '</p>

					                            <p><b>' . $lang_announcements . '</b><br>
					                            ' . $lang_feat_p8 . '</p>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls User Ticket Options Text
function user_toptions()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					  <head>

					    <style type="text/css">

					       #table2 { border-collapse: collapse; border-style: none }
					       #table2 td, #table2 tr { border-style: solid; border-color: #000099; border-width: 1px }

					    </style>

					    <title></title>
					</head>

					<body>
					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_ticketoptions . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <p><b>' . $lang_create . '
					                            ' . $lang_ticket . '</b></p>

					                            <p>' . $lang_toptions_p1 . '</p>

					                            <ol>
					                                <li>' . $lang_toptions_p2 . '
					                                   <a href="index.php?t=tcre">' . $lang_create . '
					                                   ' . $lang_ticket . '</a>.</li>

					                                <li>' . $lang_toptions_p3 . '</li>

					                                <li>' . $lang_toptions_p4 . '</li>
					                            </ol>

					                            <table id="table2"
					                                   cellspacing="0"
					                                   cellpadding="4"
					                                   width="90%"
					                                   align="center">
					                                <tr>
					                                    <td class="info">
					                                    <b>' . $lang_priority . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_target . '
					                                    ' . $lang_responsetime . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_target . '
					                                    ' . $lang_resolution_time . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_example . '</b></td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_critical . '</b></td>
					                                    <td>' . $lang_15m . '</td>
					                                    <td>' . $lang_1h . '</td>
					                                    <td>' . $lang_critical_example . '</td>
					                                </tr>
								    <!--<tr>
					                                    <td class=cat><b>Urgent</b></td>
					                                    <td>' . $lang_30m . '</td>
					                                    <td>' . $lang_2h . '</td>
					                                </tr>-->

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_high . '</b></td>
					                                    <td>' . $lang_30m . '</td>
					                                    <td>' . $lang_2h . '</td>
					                                    <td>' . $lang_high_example . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_medium . '</b></td>
					                                    <td>' . $lang_2h . '</td>
					                                    <td>' . $lang_4h . '</td>
					                                    <td>' . $lang_medium_example . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_low . '</b></td>
					                                    <td>' . $lang_1d . '</td>
					                                    <td>' . $lang_xw . '</td>
					                                    <td>' . $lang_low_example . '</td>
					                                </tr>
					                            </table><p>

					                            <table id="table2"
					                                   cellspacing="0"
					                                   cellpadding="4"
					                                   width="90%"
					                                   align="center">
					                                <tr>
					                                    <td colspan="2"
					                                        class="info">
					                                        <b>' . $lang_toptions_p5 . '</b></td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_critical . '</b></td>

					                                    <td>' . $lang_toptions_p6 . '</td>
					                                </tr>

								    <!--<tr>
					                                    <td class=cat>
					                                    <b>Urgent</b></td>
					                                    <td>
					                                     Prevents a number of people from doing
					                                     necessary work (e.g.. Network / Server
					                                     failure) or poses a security threat
					                                     (Virus etc)</td>
					                                </tr>-->

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_high . '</b></td>

					                                    <td>' . $lang_toptions_p7 . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_medium . '</b></td>

					                                    <td>' . $lang_toptions_p8 . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_low . '</b></td>

					                                    <td>' . $lang_toptions_p9 . '</td>
					                                </tr>
					                            </table>

					                            <ol start="4">
					                                <li>' . $lang_toptions_p10 . '</li>

					                                <li>' . $lang_toptions_p11 . '</li>

					                                <li>' . $lang_toptions_p12 . '</li>

					                                <li>' . $lang_toptions_p13 . '</li>

					                                <li>' . $lang_toptions_p14 . '</li>

					                                <li>' . $lang_toptions_p15 . '</li>

					                                <li>' . $lang_toptions_p16 . '</li>

					                                <li>' . $lang_toptions_p17 . '
					                                   <a href="index.php?t=tmop">' . $lang_myopen . '</a></li>
					                            </ol><b>' . $lang_myopen . '</b><br>
					                            ' . $lang_toptions_p18 . ' <a href=
					                            "index.php?t=tmop">' . $lang_myopen . '</a>


					                            <p>' . $lang_toptions_p19 . '</p>

					                            <p><b>' . $lang_myclosed . '</b><br>
					                            ' . $lang_toptions_p20 . '</p>

					                            <p><b>' . $lang_ticketsearch . '</b><br>
					                            ' . $lang_toptions_p21 . '</p>

					                            <p><b>' . $lang_feedback . '</b><br>
					                            ' . $lang_toptions_p22 . '</p>

					                            <p>' . $lang_clickon . ' <a href=
					                            "index.php?t=tclo">' . $lang_myclosed . '</a>
					                            ' . $lang_toptions_p23 . '.</p>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls User FAQ Text
function user_faq()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_faqopts . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <b>' . $lang_kbase . '</b><br>
					                            ' . $lang_faq_p1 . '<br>


					                            <p>' . $lang_faq_p2 . '</p>

					                            <p>' . $lang_faq_p3 . '</p>

					                            <p>' . $lang_faq_p4 . '</p>
					                        </td>

					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls No User Options Text
function public_options()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_useroptions . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <p><b>' . $lang_editprofile . '</b><br>
					                            ' . $lang_public_options . '</p>

					                            <p>
					                            <b>' . $lang_password_retrieval . '</b><br>
					                            ' . $lang_uoptions_p2 . '</p>

					                            <p>' . $lang_uoptions_p3 . '</p>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls User Options Text
function user_options()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_useroptions . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">
					                            <p><b>' . $lang_editprofile . '</b><br>
					                            ' . $lang_uoptions_p1 . '</p>

					                            <p>
					                            <b>' . $lang_password_retrieval . '</b><br>
					                            ' . $lang_uoptions_p2 . '</p>

					                            <p>' . $lang_uoptions_p3 . '</p>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Create User Menu Text
function create_user_menu()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }
    echo '
					        <tr>
					            <td class="cat"><b>' . $lang_User . ' ' . $lang_documentation . '</b></td>
					        </tr>

					        <tr>
					            <td class="subcat">
					                    <li><a href=
					                    "index.php?t=intro">' . $lang_intro . '</a></li>

					                    <li><a href=
					                    "index.php?t=features">' . $lang_features . '</a></li>

					                    <li><a href=
					                    "index.php?t=toptions">' . $lang_ticket . '
					                    ' . $lang_options . '</a></li>

					                    <li><a href=
					                    "index.php?t=faq">' . $lang_faqopts . '</a></li>

					                    <li><a href=
					                    "index.php?t=uoptions">' . $lang_useroptions . '</a></li>';

    echo '
							    <li><a href=
					                    "index.php?t=print_help">' . $lang_printer_friendly . '</a></li>
					            </td>
					        </tr>';
}
// Create Supporter Menu Text
function create_supporter_menu()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '
						<tr>
					            <td class="cat"><b>' . $lang_supporter . '
					            ' . $lang_documentation . '</b></td>
					        </tr>

					        <tr>
					            <td class="subcat">
					                <ul class="noindent">
					                    <li><a href=
					                    "index.php?t=coming_soon">Introduction</a></li>
					                </ul>
					            </td>
					        </tr>';
}

function coming_soon()
{
    echo '
					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_supporter . '
					                            ' . $lang_documentation . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">Coming Soon</td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
// Calls all doc functions in printable format
function print_help()
{
    global $default_language, $pubpriv, $profile_editing, $helpdesk_name, $theme, $lang_edition, $version, $lang_powered, $enable_kbase, $enable_forum;
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '
					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width="100%"
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><font size="4">' . $helpdesk_name . '
											</font>
								    </td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
								    align="center"
					                            width="100%"><font size="4">' . $lang_User . ' ' . $lang_documentation . '</font></td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';

    user_intro();
    user_features();
    user_toptions();

    if ($enable_kbase == "On") {
        user_faq();
    }

    if ($pubpriv == "Public") {
        public_options();
    } elseif ($profile_editing == "Off") {
    } elseif ($pubpriv == "Private") {
        user_options();
    }

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../common/footer.php";
    } else {
        require "common/footer.php";
    }
}

function examples()
{
    global $language;

    if (eregi("supporter", $_SERVER[PHP_SELF]) || eregi("admin", $_SERVER[PHP_SELF])) {
        require "../lang/" . $language . ".lang.php";
    } else {
        require "lang/" . $language . ".lang.php";
    }

    echo '

					  <head>

					    <style type="text/css">

					       #table2 { border-collapse: collapse; border-style: none }
					       #table2 td, #table2 tr { border-style: solid; border-color: #000099; border-width: 1px }

					    </style>

					    <title></title>
					</head>

					<body>
					    <table class="border"
					           cellspacing="0"
					           cellpadding="0"
					           width=""
					           align="center"
					           border="0">
					        <tr>
					            <td>
					                <table cellspacing="1"
					                       cellpadding="5"
					                       width="100%"
					                       border="0">
					                    <tr>
					                        <td class="info"
					                            align="center"
					                            width="100%"><b>' . $lang_documentation . '
					                            - ' . $lang_pexamples . '</b></td>
					                    </tr>

					                    <tr>
					                        <td class="back2"
					                            width="100%">

					                            <table id="table2"
					                                   cellspacing="0"
					                                   cellpadding="4"
					                                   width="90%"
					                                   align="center">
					                                <tr>
					                                    <td class="info">
					                                    <b>' . $lang_priority . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_target . '
					                                    ' . $lang_responsetime . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_target . '
					                                    ' . $lang_resolution_time . '</b></td>

					                                    <td class="info">
					                                    <b>' . $lang_example . '</b></td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_critical . '</b></td>
					                                    <td>' . $lang_15m . '</td>
					                                    <td>' . $lang_1h . '</td>
					                                    <td>' . $lang_critical_example . '</td>
					                                </tr>
								    <!--<tr>
					                                    <td class=cat><b>Urgent</b></td>
					                                    <td>' . $lang_30m . '</td>
					                                    <td>' . $lang_2h . '</td>
					                                </tr>-->

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_high . '</b></td>
					                                    <td>' . $lang_30m . '</td>
					                                    <td>' . $lang_2h . '</td>
					                                    <td>' . $lang_high_example . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_medium . '</b></td>
					                                    <td>' . $lang_2h . '</td>
					                                    <td>' . $lang_4h . '</td>
					                                    <td>' . $lang_medium_example . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_low . '</b></td>
					                                    <td>' . $lang_1d . '</td>
					                                    <td>' . $lang_xw . '</td>
					                                    <td>' . $lang_low_example . '</td>
					                                </tr>
					                            </table><p>

					                            <table id="table2"
					                                   cellspacing="0"
					                                   cellpadding="4"
					                                   width="90%"
					                                   align="center">
					                                <tr>
					                                    <td colspan="2"
					                                        class="info">
					                                        <b>' . $lang_toptions_p5 . '</b></td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_critical . '</b></td>

					                                    <td>' . $lang_toptions_p6 . '</td>
					                                </tr>

								    <!--<tr>
					                                    <td class=cat>
					                                    <b>Urgent</b></td>
					                                    <td>
					                                     Prevents a number of people from doing
					                                     necessary work (e.g.. Network / Server
					                                     failure) or poses a security threat
					                                     (Virus etc)</td>
					                                </tr>-->

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_high . '</b></td>

					                                    <td>' . $lang_toptions_p7 . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_medium . '</b></td>

					                                    <td>' . $lang_toptions_p8 . '</td>
					                                </tr>

					                                <tr>
					                                    <td class="cat">
					                                    <b>' . $lang_low . '</b></td>

					                                    <td>' . $lang_toptions_p9 . '</td>
					                                </tr>
					                            </table><p><center><b><i><u>NOTE:</u></i>    Hit the  \'Back\'  button on your browser to return to your ticket.</b></center>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table><p>';
}
function createUserMenu($default = '', $user = '')
{
    global $users_table, $db, $lang_all_users, $lang_no_users;

    $sql = "select user_name from $users_table where (supporter=0 AND admin=0) " . "AND (viewer=1 OR user=1) order by user_name asc";
    $result = $db->query($sql);
    if ($user != '') {
        echo "<option selected>$user</option>";
    }
    if ($default == $lang_all_users) {
        // Add no user optioin to offset all users
        echo "<option>$lang_no_users</option>";
    }
    echo "<option>$default</option>";

    while ($row = $db->fetch_array($result)) {
        echo "<option value=\"$row[0]\"> $row[0] </option>";
    }
}
function createUserGroupMenu()
{
    global $ugroups_table, $db;

    $sql = "select id, group_name from $ugroups_table order by group_name asc";
    $result = $db->query($sql);
    echo "<option></option>";

    while ($row = $db->fetch_array($result)) {
        echo "<option value=\"$row[0]\"> $row[1] </option>";
    }
}

?>
