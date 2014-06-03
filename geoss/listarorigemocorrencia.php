<?php
require 'header.php';
include_once("class.origem_ocorrenc.php");

$db = Database::getConnection(); 
$query = "SELECT id FROM cad_origem_ocorrenc";
?>

<div class="page-header">
    <h1>
        Origem Ocorrência
    </h1>
</div>
<table id="example" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
		<tbody>     
<?php
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$origem_ocorrenc = new origem_ocorrenc();
				$origem_ocorrenc->select($obj->id);
				echo "<tr>";
				foreach($origem_ocorrenc as $key => $value)
				{				
					if(is_scalar($value) || !$value){
						if(
						$key=="id" 
						|| startsWith($key,"idx_")
						){
								continue;
						}											
						else{
								echo "<td>".utf8_encode($value)."</td>";
						}
					}
				}	
				echo "<td><a href=\"cadorigem_ocorrenc.php?id=$origem_ocorrenc->id\" class=\"glyphicon glyphicon-edit\"></a></td><td><a href=\"#\" onclick='apagar(\"origem_ocorrenc\",$origem_ocorrenc->id)' class=\"glyphicon glyphicon-remove\"></a></td></tr>";
			}

			/* free result set */
			$result->close();
		}
?> 
       
        </tbody>
    </table>
	<script>
	$(document).ready(function() {
    tableAjax=$('#example').dataTable({
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
	$('#example').footable();
} );
	</script>
    
<?php
    require 'footer.php'
?>
