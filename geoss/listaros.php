<?php
require 'header.php';
include_once("class.os.php");
?>

<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>

<div class="page-header">
    <h1>
        OS
    </h1>
</div>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
				<th>Status</th>
				<th>Data hora</th>
				<th>Laudo Técnico</th>
				<th>Data hora fecha</th>
				<th>Editar</th>
				<th>Remover</th>
            </tr>        
		</thead> 
        <tbody>  
<?php
		$db = Database::getConnection(); 
		$query = "SELECT id FROM cad_os";
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$os = new os();
				$os->select($obj->id);
				echo "<tr>";
				foreach($os as $key => $value)
				{
					if(is_scalar($value)){
						if(
						startsWith($key,"idx_")){							
							continue;
						}
						else if($key=="idx_bairro"){
							//$bairro = new bairro();
							//$bairro->select($semaforo->idx_bairro);
							//echo "<td>".utf8_encode($bairro->bai_nome)."</td>";
						}						
						else
							echo "<td>".utf8_encode($value)."</td>";
					}						
					
				}	
				echo "<td><a href=\"cados.php?id=$os->id\" class=\"glyphicon glyphicon-edit\"></a></td><td><a href=\"remover.php?type=os&id=$os->id\" class=\"glyphicon glyphicon-remove\"></a></td></tr>";
			}

			/* free result set */
			$result->close();
		}
?>
        </tbody>
    </table>
	<script>
	$(document).ready(function() {
    $('#example').dataTable({
	"oLanguage": {
    "sEmptyTable":     "Nenhum registro encontrado na tabela",
    "sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
    "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
    "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ".",
    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
    "sLoadingRecords": "Carregando...",
    "sProcessing":     "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Proximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast":"Ultimo"
    },
    "oAria": {
        "sSortAscending":  ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
	});
} );
	</script>
    
<?php
    require 'footer.php'
?>
