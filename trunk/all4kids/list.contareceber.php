<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>


<div class="conteudo-principal">
    <fieldset>  
							<span class="btn btn-success fileinput-button" data-toggle="modal" data-target=".bs-example-modal-lg">
								<i class="glyphicon glyphicon-plus"></i>
								<span>Adicionar</span>
							</span><br><br>

<table id="example" class="table list" cellspacing="0" width="100%">
        <thead>
            <tr>
<th class="sortable">Nome</th>
<th class="sortable">Valor</th>
<th class="sortable">Data vencimento</th>
<th class="sortable">Recebido</th>
<!--th>Repetir</th>
<th>Juros</th>
<th>Descontos</th>
<th>Valor repetir</th-->
				<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
    </table>
	</fieldset>
	</div>

	</section>
	<script>
	$(document).ready(function() {
    tableAjax=$('#example').dataTable({
	"processing": true,
    "serverSide": true,
    "ajax": "server.contareceber.php",
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
