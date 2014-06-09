<?php
include_once("header.php");
include_once("class.database.php");

$db = Database::getConnection();
$sql = "SELECT count(*) as total  FROM contapagar";
$res = $db->query( $sql );
$data=$res->fetch_assoc();
$contaspagar=$data['total'];	

$sql = "SELECT count(*) as total  FROM contapagar";
$res = $db->query( $sql );
$data=$res->fetch_assoc();
$contasreceber=$data['total'];	

$sql = "SELECT count(*) as total,idx_dia FROM `dia_horario_atividade` where idx_dia in (1,2,3,4,5) group by idx_dia";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {
	$dias[$row['idx_dia']]=$row['total'];
}

for($i=1;$i<6;$i++){
	if(!isset($dias[$i]))
		$dias[$i]=0;
}
	


echo <<<EOT
<script>
		$(document).ready(function() {
				var pieData = [
				{
					value: $contaspagar,
					color:"#F38630"
					
				},	
				{
					value : $contasreceber,
					color : "#E0E4CC"
				},				
			];
			
			var barChartData = {
			labels : ["Segunda","Terca","Quarta","Quinta","Sexta"],
			datasets : [
				{
					fillColor : "lightblue",
					strokeColor : "#000000",
					data : [$dias[1],$dias[2],$dias[3],$dias[4],$dias[5]]
				}
			]
			
		}

			var myLine = new Chart(document.getElementById("canvas2").getContext("2d")).Bar(barChartData);
			var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);

			
		}

		);

</script>
EOT;

?>
<div class="conteudo-principal">
	<table>
	<tr>
	<td>
    <fieldset>      	
		
		<canvas id="canvas" height="450" width="450"></canvas>
		<br><br>
		<span style="color:#F38630" class="glyphicon glyphicon-stop">Contas a pagar (<?php echo $contaspagar ?>)</span>
		<br>
		<span style="color:#E0E4CC" class="glyphicon glyphicon-stop">Contas a receber (<?php echo $contasreceber ?>)</span>
    </fieldset>
	</td>
		<td>
		<fieldset>      	
		
		<canvas id="canvas2" height="450" width="450"></canvas>
		<span style="color:lightblue" class="glyphicon glyphicon-stop">Atividades cadastradas por dia</span>
    </fieldset>
	</td>
	</tr>
	</table>
</div>


<?php
           include_once("footer.php")
        ?>

		