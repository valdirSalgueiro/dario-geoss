<?php
include_once("header.php");

include_once("class.atividade.php");


$atividade = new atividade();

$db = Database::getConnection();
$sql = "SELECT *  FROM  dia_horario_atividade";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {						
	$atividade->select($row['idx_atividade']);
	if(!isset($atividades[$row['idx_dia']][$row['idx_horario']]))
		$atividades[$row['idx_dia']][$row['idx_horario']]=$atividade->nome;
	else
		$atividades[$row['idx_dia']][$row['idx_horario']].="<br>".$atividade->nome;
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
							if(isset($atividades[$j][$i]))
								echo "<td>".$atividades[$j][$i]."</td>";
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

		