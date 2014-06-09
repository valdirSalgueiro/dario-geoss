<?php
include_once("header.php");

include_once("class.servico.php");


$servico = new servico();

$db = Database::getConnection();
$sql = "SELECT *  FROM  dia_horario_servico";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {						
	$servico->select($row['idx_servico']);
	if(!isset($servicos[$row['idx_dia']][$row['idx_horario']]))
		$servicos[$row['idx_dia']][$row['idx_horario']]=$servico->nome;
	else
		$servicos[$row['idx_dia']][$row['idx_horario']].="<br>".$servico->nome;
}			

$timestamp = strtotime('next Monday');
setlocale(LC_ALL, 'pt_BR.UTF-8', 'Portuguese_Brazil.1252');
$days = array();
for ($i = 0; $i < 7; $i++) {
 $days[] = strftime('%A', $timestamp);
 $timestamp = strtotime('+1 day', $timestamp);
}

?>


<div class="conteudo-principal">
    <fieldset>      	
		<table class="table list" border=1>
			<thead>
				<tr>
				<th></th>
				<?php
				for($i=0;$i<5;$i++){
					echo "<th>".utf8_encode (ucfirst($days[$i]))."</th>";								
				}				
				?>
				</tr>
			</thead>			
			<tbody>				
				<?php				
					for($i=1;$i<11;$i++){
						echo "<tr>";						
						echo "<td>".($i+6).":00h as ".($i+7).":00h</td>";
						for($j=1;$j<6;$j++){
							if(isset($servicos[$j][$i]))
								echo "<td>".$servicos[$j][$i]."</td>";
							else
								echo "<td>-</td>";
						}
						echo "</tr>";
					}
				?>
				
				
				</tr>
			</tbody>
		</table>
    </fieldset>
</div>


<?php
           include_once("footer.php")
        ?>

		