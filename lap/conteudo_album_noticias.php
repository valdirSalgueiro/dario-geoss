<?

include('estilo.css');

include('conn.php');

?>

<html>

<head><meta http-equiv="Page-Enter" content="blendTrans(Duration=1)"></head>

<body bgcolor="white" class="fundo">

<?

$codigo_foto=$_GET['codigo_foto'];

$foto=$_GET['foto'];

$dimencao=$_GET['dimencao'];

if(($codigo_foto!=NULL)and($foto!=NULL)and($dimencao!=NULL))

{

 $busca_foto="select * from foto_noticias where codigo_foto = '".$codigo_foto."';";

 $res_busca_foto=mysql_query($busca_foto,$conn);

 $campo_foto=mysql_fetch_array($res_busca_foto);

 echo "<center><img src='admin/$foto' $dimencao=500></center><BR>

 <table border=0 class=fonte width=100% cellspading=20>

 <tr><td>$campo_foto[descricao_foto]</td></tr>

 </table>";

}



?>

</body>

</html>

