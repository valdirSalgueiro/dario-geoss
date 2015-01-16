
	<?php
require 'header.php';
?>


<div class="conteudo-principal">
    <fieldset>   

<table id="example" class="table list" cellspacing="0" width="100%">
        <thead>
            <tr>
<th class="sortable">Nome</th><th class="sortable">Atividade 1</th><th class="sortable">Atividade 2</th><th class="sortable">Servico 1</th><th class="sortable">Servico 2</th>
				<th>Editar</th>
				<th>Remover</th>
				<th>Visualizar</th>
				<th>Contrato</th>
				<th>Calendario</th>
            </tr>
        </thead>
    </table>
	</fieldset>
	</div>


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
} );
	</script>
    
<?php
    require 'footer.php'
?>
