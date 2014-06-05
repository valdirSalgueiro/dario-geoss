<?php
include('conn.php');

function gera_foto()
{
 $fim=0;
 while($fim!=1)
 {
  $foto=rand(1,4);
  $fim=1;  
 }
 return $foto;
}
?>

