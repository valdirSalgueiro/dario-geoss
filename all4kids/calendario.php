<?php
include_once('class.database.php');
include_once('SimpleCalendar.php');
include_once("class.conta.php");

$db = Database::getConnection();

function post($key) {
    if (isset($_REQUEST[$key]))
        return $_REQUEST[$key];
    return false;
}

$pagar=post('pagar');
$dataInicio=post('dataInicio')?post('dataInicio'):"";

$calendar = new donatj\SimpleCalendar($dataInicio);

$calendar->setStartOfWeek('Sunday');

$sql = "SELECT * FROM `conta` WHERE pagar=$pagar";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {
	$conta=new conta();
	$conta->select($row['id']);
	$calendar->addDailyHtml_( $conta->nome." (R$ ".$conta->valor.")", $conta->data_vencimento, $conta->repeat_interval, $conta->valor_repetir );	
}



$calendar->show(true);
?>