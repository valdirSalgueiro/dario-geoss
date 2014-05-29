<?php
require 'header.php';
include_once("class.semaforo.php");
include_once("class.bairro.php");
include_once("class.cidade.php");
include_once("class.uf.php");
?>

<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>

<div class="page-header">
    <h1>
        Semáforos
    </h1>
</div>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Cidade</th>
				<th>Bairro</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Número</th>
				<th>Logradouro</th>
                <th>Modo</th>
				<th>Controlador</th>
				<th>Operação</th>
            </tr>        
		</thead> 
        <tbody>  
<?php
		$db = Database::getConnection(); 
		$query = "SELECT id FROM cad_semaforo";
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$semaforo = new semaforo();
				$semaforo->select($obj->id);
				echo "<tr>";
				foreach($semaforo as $key => $value)
				{
					if(is_scalar($value)){
						if(
						$key=="idx_lograd" 
						|| $key=="idx_area"
						|| $key=="id"){
							
						}
						else if($key=="idx_bairro"){
							$bairro = new bairro();
							$bairro->select($semaforo->idx_bairro);
							echo "<td>".utf8_encode($bairro->bai_nome)."</td>";
						}
						else if($key=="idx_cidade"){
							$cidade = new cidade();
							$cidade->select($semaforo->idx_cidade);
							echo "<td>".utf8_encode($cidade->cid_nome)."</td>";
						}
						else if($key=="idx_uf"){
							//$uf = new uf();
							//$uf->select($semaforo->idx_uf);
							//echo "<td>".utf8_encode($cidade->uf_nome)."</td>";
						}							
						else
							echo "<td>".utf8_encode($value)."</td>";
					}						
					
				}	
				echo "</tr>";
			}

			/* free result set */
			$result->close();
		}
?>
        </tbody>
    </table>
	<script>
	$(document).ready(function() {
    $('#example').dataTable();
} );
	</script>
    
<?php
    require 'footer.php'
?>
