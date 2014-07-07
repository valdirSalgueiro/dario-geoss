<?php
require 'header.php';

$mensagem="$modo"."";

include_once("class.database.php");

$db = Database::getConnection();
$sql = "select SUM(valor*quantidade) as total from viewpedido";
$res = $db->query( $sql );
$data=$res->fetch_assoc();
$pedido=$data['total'];

$sql = "select SUM(valor*quantidade) as total from viewvenda";
$res = $db->query( $sql );
$data=$res->fetch_assoc();
$venda=$data['total'];	

$sql = "SELECT *
		FROM pedido";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {
	$date = new DateTime($row['data']);
	$tipo = $row['tipo'];
	$dados[$tipo][intval($date->format('Y'))][intval($date->format('m'))]=$row['valor']*$row['quantidade'];	
}

$ano = new DateTime();
$ano =$ano->format('Y');
$dado=$dados[1][$ano];
$dado2=$dados[0][$ano];
for($i=1;$i<=12;$i++){
	if(!isset($dado[$i]))
		$dado[$i]=0;
	if(!isset($dado2[$i]))
		$dado2[$i]=0;
}



echo <<<EOT
<script>
		$(document).ready(function() {
				var pieData = [
				{
					value: $pedido,
					color:"#F38630"
					
				},	
				{
					value : $venda,
					color : "blue"
				},				
			];
			
			
			var barChartData = {
				labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
				datasets : [
					{
						fillColor : "#F38630",
						strokeColor : "#000000",
						data : [$dado[1],$dado[2],$dado[3],$dado[4],$dado[5],$dado[6],$dado[7],$dado[8],$dado[9],$dado[10],$dado[11],$dado[12]]
					},
					{
						fillColor : "blue",
						strokeColor : "#000000",
						data : [$dado[1],$dado[2],$dado[3],$dado[4],$dado[5],$dado[6],$dado2[7],$dado[8],$dado[9],$dado[10],$dado[11],$dado[12]]
					}
				]							
			}
			

			var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Bar(barChartData);
			var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);

			//carregarCalendario_('',1,'#calendario');
			//carregarCalendario_('',0,'#calendario2');
		}

		);

</script>
EOT;

?>
 <center>
 <table>
 <tr><td>
<canvas id="canvas" height="200" width="200"></canvas>
		<br><br>		
		<span style="color:#F38630" class="glyphicon glyphicon-stop">Pedidos (<?php echo $pedido ?>)</span>
		<br>
		<span style="color:blue" class="glyphicon glyphicon-stop">Vendas (<?php echo $venda ?>)</span>
</td><td>
<canvas id="canvas2" height="200" width="800"></canvas>
</td></tr>
</table>
</center>
<br><br>

<div class="conteudo-principal">
	<h2>Produtos</h2>
	<?php
    require 'produto.php';
	?>	
</div>	
<br>
<div class="conteudo-principal">
	<h2>Pedidos</h2>
	<?php
    require 'pedido.php';
	?>	
</div>
<br>
<div class="conteudo-principal">
	<h2>Vendas</h2>
	<?php
    require 'venda.php';
	?>	
 </div>
 <br><br>
 
<?php
          require 'footer.php'
?>

