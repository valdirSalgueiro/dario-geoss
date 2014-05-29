<?php
require 'header.php';

include_once("class.semaforo.php");
include_once("class.bairro.php");
include_once("class.cidade.php");
include_once("class.uf.php");

include_once("class.os.php");

include_once("class.vistoria.php");

$vistoria = new vistoria();
if($id){
	$vistoria->select($id);
}

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

?>
<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
<script type="text/javascript">
		function selecionarSemaforo(id, valor){
			$(filtrar).val(valor);
			$(semaforo).val(id);
		}
		
		function selecionarOS(id, valor){
			$(filtrarOS).val(valor);
			$(os).val(id);
		}
/*
		$(document).ready(function(){
				buscarSemaforos("");
			}
		);

		function buscarSemaforos(filtro){
			$('#cod_semaforos').hide();
			$.getJSON('semaforos.ajax.php?search=',{cod_semaforos: filtro, ajax: 'true'}, function(j){
				var options = '<option value="0">Selecione um semáforo</option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].cod_semaforos + '">' + j[i].nome + '</option>';
				}	
				$('#cod_semaforos').html(options).show();
			});
		}
		$(function(){
			$('#filtrar').keypress(function(){
				if( $(this).val() ) {
					buscarSemaforos($(this).val());
				}
			});
		});
		*/
</script>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-0">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Vistoria
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Vistoria cadastrada com sucesso');">
			  <input type="hidden" name="type" value="vistoria">
			  <div class="form-group col-md-12">
				<input id="semaforo" name="idx_semaforo" class="form-control input-sm" type="hidden" value="<?php echo $vistoria->idx_semaforo?>">
				<input id="filtrar" class="form-control input-sm" type="text" value="<?php echo $vistoria->idx_semaforo ? $vistoria->idx_semaforo : "Selecione um semáforo"?>" disabled>
              </div>			  
              <!--div class="form-group col-md-12">
				<select class="form-control input-sm" name="idx_semaforo" id="cod_semaforos">
					<option value="0">Selecione um semáforo</option>
				</select>
				</div-->

<div class="form-group col-md-12">

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Cidade</th>
				<th>Bairro</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Número</th>
				<th>Logradouro</th>
                <th>Modo</th>
				<th>Controlador</th>
				<th>Operação</th>
            </tr>        
		</thead> 
        <tbody>  
<?php
		$db = Database::getConnection(); 
		$query = "SELECT id FROM cad_semaforo";
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$semaforo = new semaforo();
				$semaforo->select($obj->id);
				$logradouro="[".$semaforo->num_semaforo."] ".utf8_encode($semaforo->lograd_transver);
				echo "<tr onclick=\"selecionarSemaforo($semaforo->id,'$logradouro')\">";
				foreach($semaforo as $key => $value)
				{
					if(is_scalar($value)){
						if(
						$key=="idx_lograd" 
						|| $key=="idx_area"
						|| $key=="id"){
							
						}
						else if($key=="idx_bairro"){
							$bairro = new bairro();
							$bairro->select($semaforo->idx_bairro);
							echo "<td>".utf8_encode($bairro->bai_nome)."</td>";
						}
						else if($key=="idx_cidade"){
							$cidade = new cidade();
							$cidade->select($semaforo->idx_cidade);
							echo "<td>".utf8_encode($cidade->cid_nome)."</td>";
						}
						else if($key=="idx_uf"){
							//$uf = new uf();
							//$uf->select($semaforo->idx_uf);
							//echo "<td>".utf8_encode($cidade->uf_nome)."</td>";
						}							
						else
							echo "<td>".utf8_encode($value)."</td>";
					}						
					
				}	
				echo "</tr>";
			}

			/* free result set */
			$result->close();
		}
?>
        </tbody>
    </table>
				
			  </div>
			  
			  <div class="form-group col-md-12">
				<input id="os" name="idx_cad_os" class="form-control input-sm" type="hidden" value="<?php echo $vistoria->idx_cad_os?>">
				<input id="filtrarOS" class="form-control input-sm" type="text" value="<?php echo $vistoria->idx_cad_os ? $vistoria->idx_cad_os:"Selecione uma OS"  ?>" disabled>
              </div>	
			  <div class="form-group col-md-12">			  
				<!--select class="form-control input-sm" name="idx_ocorrenc_prior">
					<option value="0">Selecionar OS</option>
					<?php
					/*
						$db = Database::getConnection();
						$sql = "SELECT id, data_hora_os
								FROM cad_os
								ORDER BY data_hora_os DESC";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							echo '<option value="'.$row['id'].'">'.utf8_encode("[".$row['id']."] Hora: ".$row['data_hora_os']).'</option>';
						}
					*/
					?>
				</select-->	
<table id="listaros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
				<th>Status</th>
				<th>Data hora</th>
				<th>Laudo Técnico</th>
				<th>Data hora fecha</th>
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
				$valor = "[$obj->id] ".$os->data_hora_os;
				echo "<tr onclick=\"selecionarOS($os->id,'$valor')\">";
				foreach($os as $key => $value)
				{
					if(is_scalar($value) || $value==NULL){
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
				echo "</tr>";
			}

			/* free result set */
			$result->close();
		}
?>
        </tbody>
    </table>				
			  </div>
			  
              <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
              </div>     			  
            </form>
          </div>
        </div>
      </div>
    </div>
	<script>
	$(document).ready(function() {
    $('#example').dataTable({
		"lengthMenu": [[3, 25, 50, -1], [3, 25, 50, "All"]],
		"lengthChange": false,
		"info": false,
		
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
	
	    $('#listaros').dataTable({
		"lengthMenu": [[3, 25, 50, -1], [3, 25, 50, "All"]],
		"lengthChange": false,
		"info": false,
		
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
