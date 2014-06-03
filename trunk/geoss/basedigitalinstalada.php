<?php
require 'header.php';
include_once('class.database.php');
include_once('class.gerar_ocorrencia.php');

$db = Database::getConnection(); 
$query = "SELECT id FROM cad_gerar_ocorrencia";
$todos ="";
?>
<script src="http://maps.google.com/maps?file=api&;amp;v=2.x&amp;key=ABQIAAAAtOjLpIVcO8im8KJFR8pcMhQjskl1-YgiA_BGX2yRrf7htVrbmBTWZt39_v1rJ4xxwZZCEomegYBo1w" type="text/javascript"></script>

<script type="text/javascript">		
	function carregarBase(ids) {
			mostrarCarregando();

			// setup the ajax request
			$.ajax({
				url: 'base.php',
				data: {'ids': ids},
				type: 'POST',
				success: function(data) {
				    $(mapaDigital).html(data);      
					esconderCarregando();
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					alert(textStatus);
					alert(errorThrown);
					esconderCarregando();
					}					
			});

			// return false so the form does not actually
			// submit to the page
			return false;
		}
</script>


<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
<script src="scripts/footable.js" type="text/javascript"></script>
<link   href="css/footable.core.css" rel="stylesheet" type="text/css">

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Data</th>
				<th>Protocolo</th>
				<th>Status</th>
				<th>Observação</th>
            </tr>
        </thead>
		<tbody>     
<?php
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {						
				$gerar_ocorrencia = new gerar_ocorrencia();
				$gerar_ocorrencia->select($obj->id);
				$todos.=$gerar_ocorrencia->idx_semaforo.",";
				echo "<tr onclick='carregarBase($gerar_ocorrencia->idx_semaforo)'>";
				foreach($gerar_ocorrencia as $key => $value)
				{				
					if(is_scalar($value) || !$value){
						if(
						$key=="id" 
						|| startsWith($key,"idx_")
						){
								continue;
						}											
						else{
							if($value=="F"){
								echo "<td>Fechada</td>";
							}else if($value=="T"){
								echo "<td>Atendimento</td>";
							}else if($value=="A"){
								echo "<td>Aberta</td>";
							}
							else{
								echo "<td>".utf8_encode($value)."</td>";
							}
						}
					}
				}	
			}

			/* free result set */
			$result->close();
		}
?> 
       
        </tbody>
    </table>
	
	<input type="submit" value="Mostrar Todas" onclick="carregarBase('<?php echo $todos?>');" class="btn btn-success btn-block">
	
	<div id="mapaDigital">
	</div>
	
	<br><br>
	
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
	carregarBase();
} );
</script>

<?php
    require 'footer.php'
?>
