<?php
include_once("header.php");

include_once("class.aluno.php");
include_once("class.atividade.php");
include_once("class.servico.php");
include_once("class.horario.php");

$aluno = new aluno();
$atividade = new atividade();
$servico = new servico();


if($id){
	$aluno->select($id);
}

$db = Database::getConnection();
$sql = "SELECT aluno_atividade.idx_atividade, dia_horario_atividade.idx_dia,dia_horario_atividade.idx_horario  FROM  dia_horario_atividade, aluno_atividade WHERE dia_horario_atividade.idx_atividade=aluno_atividade.idx_atividade AND idx_aluno=$aluno->id";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {						
	$atividade->select($row['idx_atividade']);
	if(!isset($atividades[$row['idx_dia']][$row['idx_horario']]))
		$atividades[$row['idx_dia']][$row['idx_horario']]=$atividade->nome;
	else
		$atividades[$row['idx_dia']][$row['idx_horario']].="<br>".$atividade->nome;
}		


$sql = "SELECT aluno_servico.idx_servico, dia_horario_servico.idx_dia,dia_horario_servico.idx_horario  FROM  dia_horario_servico, aluno_servico WHERE dia_horario_servico.idx_servico=aluno_servico.idx_servico AND idx_aluno=$aluno->id";
$res = $db->query( $sql );
while ( $row = $res->fetch_assoc() ) {						
	$servico->select($row['idx_servico']);
	if(!isset($servicos[$row['idx_dia']][$row['idx_horario']]))
		$servicos[$row['idx_dia']][$row['idx_horario']]=$servico->nome;
	else
		$servicos[$row['idx_dia']][$row['idx_horario']].="<br>".$servico->nome;
}

$sql = "SELECT * from horario ORDER BY horario";
$res = $db->query( $sql );
$horarios=array();
while ( $row = $res->fetch_assoc() ) {	
	$horario = new horario();	
	$horario->select($row['id']);
	$horarios[]=$horario;
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
		<h3>Horario de <?php echo "$aluno->nome" ?></h3>
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
					for($i=0;$i<count($horarios);$i++){
						$curHorario=$horarios[$i];
						echo "<tr>";						
						echo "<td>".$curHorario->horario."</td>";
						for($j=1;$j<6;$j++){
							echo "<td>";
							if(isset($atividades[$j][$curHorario->id]))
								echo $atividades[$j][$curHorario->id];
							if(isset($servicos[$j][$curHorario->id]))
								echo $servicos[$j][$curHorario->id];								
							else if(!isset($atividades[$j][$curHorario->id]) && !isset($servicos[$j][$curHorario->id]))
								echo "-";
							echo "</td>";
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

		