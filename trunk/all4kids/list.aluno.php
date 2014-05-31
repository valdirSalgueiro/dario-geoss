
	<?php
require 'header.php';
?>

<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>


<div class="page-header">
    <h1>
        Aluno
    </h1>
</div>
<table id="example" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
<th>Nome</th><th>Nome mae</th><th>Nome pai</th><th>Responsavel nome</th><th>Responsavel cpf</th><th>Responsavel rg</th><th>Endereco</th><th>Idade</th><th>Data nasc</th>
				<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
    </table>
	<script>
	$(document).ready(function() {
    tableAjax=$('#example').dataTable({
	"processing": true,
    "serverSide": true,
    "ajax": "server.aluno.php",
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
