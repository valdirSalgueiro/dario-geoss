<?php
function tamanho_img($foto)
{
 $size=@getimagesize($foto);
 $width=$size[0];
 $height=$size[1];
 if($width>$height)
 {
  $dimencao=" width ";
 }
 else
 {
  $dimencao=" height ";
 }
 return $dimencao;
}
?>
