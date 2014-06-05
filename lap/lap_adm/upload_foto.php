<?php

function upload_foto($foto)

{

 $g_foto=str_replace('\\','/',$foto);

 return $g_foto;

 $arquivo=$g_foto;

 $arq=fopen($arquivo,'r');

 $text=fread($arq,filesize($arquivo));

 $bin=urlencode($text);

 fclose($arq);

 return $bin;

}

?>

