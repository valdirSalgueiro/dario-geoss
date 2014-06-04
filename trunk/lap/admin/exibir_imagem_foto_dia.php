<?

include("../conn.php");

session_start();

$codigo_foto_dia=$_GET['codigo_foto_dia'];

$codigo_foto=$_GET['codigo_foto'];

$busca="select * from foto_foto_dia where codigo_foto_dia='".$codigo_foto_dia."' and codigo_foto = '".$codigo_foto."';";

$res_busca=mysql_query($busca,$conn);

$campo_foto=mysql_fetch_array($res_busca);

header('Content-Type: image/jpeg');

$foto=urldecode($campo_foto[foto]);

echo $foto;

flush();

mysql_close($conn);

?>
