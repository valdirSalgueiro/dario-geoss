<?

include('estilo.css');

extract($HTTP_GET_VARS);

extract($HTTP_POST_VARS);

$log_file = "log.txt";

$log_lenght = 30;

$max_file_size = $log_lenght;

//$file_size= filesize($log_file);

if ($file_size > $max_file_size) {

$lines = file($log_file);

$a = count($lines);

$u = $a - $log_lenght;

for($i = $a; $i >= $u ;$i--){

$stats_old =  $lines[$i] . $stats_old;

}

$deleted = unlink($log_file);

$fp = fopen($log_file, "a+");

$fw = fwrite($fp, $stats_old);

fclose($fp);

}

$ip = getenv(REMOTE_ADDR);

$date = date("d");

$today = date("d/m/Y");

$user = file("counter.txt");

$lis = 0;

	for($x=0;$x<sizeof($user);$x++) {

	$temp = explode(";",$user[$x]);

	$opp[$x] = "$temp[0];$temp[1];$temp[2];";

	$such = stristr($temp[0],$ip);

//	$such = strchr($temp[0],$ip);

	if($such) {

			$list[$lis] = $opp[$x];

			$lis++; 

		}

if($temp[1] != $date) {

$fp = fopen ("log.txt", "a+");

$fw = fwrite ($fp, sizeof($user));

$fw = fwrite ($fp, ";");

$fw = fwrite ($fp, "$temp[2]");

$fw = fwrite ($fp, "\n");

fclose ($fp);

$fq = fopen ("counter.txt", "w");

$fy = fwrite ($fq,"");

fclose ($fq);

break;

}

}

if(sizeof($list) != "0") {

}else{

$fp = fopen ("counter.txt", "a+");

$fw = fwrite ($fp, $ip);

$fw = fwrite ($fp, ";");

$fw = fwrite ($fp, $date);

$fw = fwrite ($fp, ";");

$fw = fwrite ($fp, $today);

$fw = fwrite ($fp, ";");

$fw = fwrite ($fp, "\n");

fclose ($fp);

}

$action=$_GET['action'];

if($action == "stats"){

$db_file = "counter.txt";

$latest_max = 30;

$lines = file($db_file);

$a = count($lines)-1;

$u = $a - $latest_max;

?>

<font face=arial><U><B>Estatisticas dos ultimos 30 Dias.</B></U> (dias com 0 visitantes não são mostrados) <table border=0 class=fonte cellspacing=10><td border=1 ><B>Data</B></td><td  border=1><B>IP</B></td>

<?php

$count_acesso=0;

for($i = $a; $i >= $u ;$i--){

$temp = explode(";",$lines[$i]);

 if($temp[0]!=NULL)

 {

  $count_acesso++;

  echo "<tr><td border=1>$temp[2]</td><td border=1>$temp[0]</td></tr>";

 }

}

echo "<tr><td><td><b>Total: $count_acesso</b></td><td></td></tr>";

?>

</table></font>

<?php

}

?> 

