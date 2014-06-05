<html>

<?php

include('conn.php');

$codigo_noticia=$_GET['codigo_noticia'];

if($codigo_noticia!=NULL)

{

 $busca_foto="select * from foto_noticias where codigo_noticia = '".$codigo_noticia."' order by codigo_foto asc;";

 $res_busca_foto=mysql_query($busca_foto,$conn);

 $num_foto=mysql_num_rows($res_busca_foto);

 $col=2;

 $lin=$num_foto/$col;

}

?>



<body bgcolor="#DDEEFF">

<table border=0>

<?php

if($num_foto>0)

{

 $count=0;

 for($l=0;$l<$lin;$l++)

 {

  echo "<tr>";

  for($c=0;$c<$col;$c++)

  {

   echo "<td>";

   if($count<$num_foto)

   {

    $campo_foto=mysql_fetch_array($res_busca_foto);

    echo "<a href='conteudo_album_noticias.php?codigo_foto=$campo_foto[codigo_foto]&foto=$campo_foto[foto]&dimencao=$campo_foto[dimencao]' target='conteudo_album'><img src='admin/$campo_foto[foto]' $campo_foto[dimencao]=100 border=0></a>";

    $count++;

   }

   echo "</td>";

  }

  echo "</tr>";

 }

}

?>

</table>

</body>

</html>

