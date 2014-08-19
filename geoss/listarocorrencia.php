<?php
require 'header.php';
include_once("class.ocorrencia.php");
include_once("class.ocorrencia.php");

$db = Database::getConnection(); 
$query = "SELECT id FROM cad_ocorrencia";
?>

<div class="page-header">
    <h1>
        Ocorrência
    </h1>
</div>
<table id="example" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Nome</th>
				<th>Prioridade</th>
				<th>Prazo Atendimento</th>
				<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
		<tbody>     
<?php
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$ocorrencia = new ocorrencia();
				$ocorrencia->select($obj->id);
				echo "<tr>";
				foreach($ocorrencia as $key => $value)
				{				
					if(is_scalar($value) || !$value){
						if(				   $key=="id" 
						|| (startsWith($key,"idx_") && $key!="idx_ocorrenc_prior" )
						){
								continue;
						}											
						else{
							if($key=="idx_ocorrenc_prior"){
								if($value==1)
									echo "<td>ALTA</td>";
								else if($value==2)
									echo "<td>MEDIA</td>";
								else if($value==3)
									echo "<td>BAIXA</td>";
							}
							else{
								echo "<td>".utf8_encode($value)."</td>";
							}
						}
					}
				}	
				echo "<td><a href=\"cadfuncionario.php?id=$ocorrencia->id\" class=\"glyphicon glyphicon-edit\"></a></td><td><a href=\"#\" onclick='apagar(\"ocorrencia\",$ocorrencia->id)' class=\"glyphicon glyphicon-remove\"></a></td></tr>";
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
