<fieldset>
		<table id="venda" class="table list" cellspacing="0" width="100%">
		        <thead>
		            <tr><th>Produto</th><th>Quantidade</th><th>Valor</th><th>Data</th><th>Cliente</th><th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
    </table>
	</fieldset>
	<script>
	$(document).ready(function() {
    venda=$('#venda').dataTable({
	"processing": true,
    "serverSide": true,
    "ajax": "server.venda.php?tableAjax=venda",		
	"oLanguage": {
    "sEmptyTable":     "Nenhum registro encontrado na tabela",
    "sInfo": "Mostrar _START_ ate _END_ do _TOTAL_ registros",
    "sInfoEmpty": "Mostrar 0 ate de 0 Registros",
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
		$total=0;
	    include_once("class.database.php");
		$db = Database::getConnection();
		$sql = "SELECT *
				FROM pedido
				WHERE tipo=0";
		$res = $db->query( $sql );
		while ( $row = $res->fetch_assoc() ) {
			$total+=$row['quantidade']*$row['valor'];
		}
	?>
	<h3>Total: <?php echo $total?> reais</h3>