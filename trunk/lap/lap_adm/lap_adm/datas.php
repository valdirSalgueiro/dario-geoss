<?php
$data = mktime(13,20,0,10,14,2006);
echo $data;

//$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
//$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);
echo "----------";
$dataex = date("j/n/Y",$data );
echo $dataex;

?>