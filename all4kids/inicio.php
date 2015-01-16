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

			carregarCalendario_('',1,'#calendario');
			carregarCalendario_('',0,'#calendario2');
		}

		);

</script>
EOT;

?>
<script type="text/javascript">		
	var countData=0;
	function carregarCalendario_(countStr,pagar,where){
			//mostrarCarregando();
			$.ajax({
				url: 'calendario.php',
				data: {'dataInicio': countStr,'pagar':pagar},
				type: 'POST',
				success: function(data) {
				    $(where).html(data);      
					//esconderCarregando();
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					//alert(textStatus);
					//alert(errorThrown);
					//esconderCarregando();
				}					
			});
	}
	
	function carregarCalendario(right,pagar,where) {

			if(right)
				countData++;
			else
				countData--;			
			
			var countStr=countData>0?'+'+countData:countData;	
			carregarCalendario_(countStr+' month',pagar,where);
		}
</script
<div class="conteudo-principal">
	<table>
	<tr>
	<td>
 	
		
		<canvas id="canvas" height="450" width="450"></canvas>
		<br><br>
		<span style="color:#F38630" class="glyphicon glyphicon-stop">Contas a pagar (<?php echo $contaspagar ?>)</span>
		<br>
		<span style="color:#E0E4CC" class="glyphicon glyphicon-stop">Contas a receber (<?php echo $contasreceber ?>)</span>

	</td>
		<td >   	
		
		<canvas id="canvas2" height="450" width="450" style="float:right"></canvas>
		<span style="color:lightblue;float:right" class="glyphicon glyphicon-stop">Atividades cadastradas por dia</span>
	</td>
	</tr>
	<tr>
	<td height="700px">
	<h3 align="center"><a href="javascript:void(0);" onclick="carregarCalendario(false,1,'#calendario');"><</a> Contas a pagar <a href="javascript:void(0);" onclick="carregarCalendario(true,1,'#calendario');">></a> </h3>
	<div id="calendario">
	</div>
	</td>
	<td height="700px" >
	
	<div >
	<h3 align="center"><a href="javascript:void(0);" onclick="carregarCalendario(false,0,'#calendario2');"><</a> Contas a receber <a href="javascript:void(0);" onclick="carregarCalendario(true,0,'#calendario2');">></a> </h3>
	<div id="calendario2">
	</div>
	</div>
	</td>	
	</tr>
	</table>
</div>


<?php
           include_once("footer.php")
        ?>

		