<?php
function retirar_acentos_caracteres_especiais($string) {
	$palavra = strtr($string, "ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
	$palavranova = str_replace("_", " ", $palavra);
	return $palavranova; 
}

#Exemplo de uso
//echo retirar_acentos_caracteres_especiais("¥µÀÁÂÃÄÅ");
?>
<?php /* FUNÇÃO QUE SUBSTITUI CARCATERES ESPECIAIS 
          MAIUSCULOS PARA MINUSCULOS */ 

  function caracterEsp($string) { 
    for($i = 0; $i < strlen($string); $i++) { 
      $controle='sim'; 
      if($string[$i]=='Á') { 
        $stringRetorno .= "á"; 
        $controle='nao'; 
      } 
      if($string[$i]=='À') { 
        $stringRetorno .= "à"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Â') { 
        $stringRetorno .= "â"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ã') { 
        $stringRetorno .= "ã"; 
        $controle='nao'; 
      } 
      if($string[$i]=='É') { 
        $stringRetorno .= "é"; 
        $controle='nao'; 
      } 
      if($string[$i]=='È') { 
        $stringRetorno .= "è"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ê') { 
        $stringRetorno .= "ê"; 
        $controle='nao'; 
     } 
     if($string[$i]=='Í') { 
        $stringRetorno .= "í"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ì') { 
        $stringRetorno .= "ì"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Î') { 
        $stringRetorno .= "î"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ó') { 
        $stringRetorno .= "ó"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ò') { 
        $stringRetorno .= "ò"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ô') { 
        $stringRetorno .= "ô"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Õ') { 
        $stringRetorno .= "õ"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ú') { 
        $stringRetorno .= "ú"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ù') { 
        $stringRetorno .= "ù"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Û') { 
        $stringRetorno .= "û"; 
        $controle='nao'; 
      } 
      if($string[$i]=='Ç') { 
        $stringRetorno .= "ç"; 
        $controle='nao'; 
      } 
      if($controle=='sim'){ 
        $stringRetorno .= $string[$i]; 
      } 
    } 
    return $stringRetorno; 
  } 

  function limpa_array($arr){  // Função que retira itens em branco de um array 
    for($i=0;$i<=count($arr);$i++){ 
      if($arr[$i]){ 
        $arx[] = $arr[$i]; 
      } 
    } 
    return $arx; 
  } 
   
  $texto = 'áÁéÉíÍóÓúÚ';
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