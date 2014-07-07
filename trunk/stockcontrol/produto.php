<fieldset>
		<table id="produto" class="table list" cellspacing="0" width="100%">
		        <thead>
		            <tr><th width="10%">Codigo</th><th>Nome</th><th width="10%">Quantidade</th><th width="10%">Valor</th><th width="10%">Editar</th>
            </tr>
        </thead>
    </table>
	
	</fieldset>
	<script>
	$(document).ready(function() {
    produto=$('#produto').dataTable({
	"processing": true,
    "serverSide": true,
    "ajax": "server.produto.php?tableAjax=produto",
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
	    include_once("class.database.php");
		$total=0;
		$db = Database::getConnection();
		$sql = "SELECT *
				FROM produto";
		$res = $db->query( $sql );
		while ( $row = $res->fetch_assoc() ) {
			$total+=$row['quantidade']*$row['valor'];
		}
	?>
	<h3>Total: <?php echo $total?> reais</h3><br>