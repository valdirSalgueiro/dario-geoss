<?php
function retirar_acentos_caracteres_especiais($string) {
	$palavra = strtr($string, "���������������������������������������������������������������������", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
	$palavranova = str_replace("_", " ", $palavra);
	return $palavranova; 
}

#Exemplo de uso
//echo retirar_acentos_caracteres_especiais("��������");
?>
<?php /* FUN��O QUE SUBSTITUI CARCATERES ESPECIAIS 
          MAIUSCULOS PARA MINUSCULOS */ 

  function caracterEsp($string) { 
    for($i = 0; $i < strlen($string); $i++) { 
      $controle='sim'; 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
     } 
     if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($string[$i]=='�') { 
        $stringRetorno .= "�"; 
        $controle='nao'; 
      } 
      if($controle=='sim'){ 
        $stringRetorno .= $string[$i]; 
      } 
    } 
    return $stringRetorno; 
  } 

  function limpa_array($arr){  // Fun��o que retira itens em branco de um array 
    for($i=0;$i<=count($arr);$i++){ 
      if($arr[$i]){ 
        $arx[] = $arr[$i]; 
      } 
    } 
    return $arx; 
  } 
   
  $texto = '����������';
  $array1 = explode('.',trim($texto)); 
  $array1 = limpa_array($array1); 

  $textox = ''; 
   
  for($x1=0;$x1<count($array1);$x1++){ 
    $array2 = explode(' ',$array1[$x1]); 
    $array2 = limpa_array($array2); 

    $z2 = 0; 
    for($x2=0;$x2<count($array2);$x2++){ 
      if($z2 == 0){ 
        if($array2[$x2]){ 
          $z2++; 
        } 
        $textox1 = ucwords(strtolower($array2[$x2])); 
        $textox .= caracterEsp($textox1); 
      } else { 
        $textox1 = strtolower($array2[$x2]); 
        $textox .= caracterEsp($textox1); 
      } 
      if($x2 != count($array2)-1){ 
        $textox .= ' '; 
      } 
    } 
    $textox .= '. '; 
  } 

  //echo '<pre>'.$textox.'</pre>'; 

?>