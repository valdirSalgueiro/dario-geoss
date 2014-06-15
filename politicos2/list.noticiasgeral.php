<?php
require 'header.php';
?><div class="conteudo-principal">
	<fieldset>
		<table id="example" class="table list" cellspacing="0" width="100%">
		        <thead>
		            <tr><th>Titulo</th><th>Chamada</th><th>Imagem</th>﻿<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
    </table>
	</div>
	</fieldset>
	<script>
	$(document).ready(function() {
    tableAjax=$('#example').dataTable({
	"processing": true,
    "serverSide": true,
    "ajax": "server.noticiasgeral.php",
	"oLanguage": {
    "sEmptyTable":     "Nenhum registro encontrado na tabela",
    "sInfo": "Mostrar _START_ ate END_ do _TOTAL_ registros",
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
    require 'footer.php'
?>
