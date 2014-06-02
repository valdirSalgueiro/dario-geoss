<?php
require 'header.php';

include_once("class.semaforo.php");
include_once("class.bairro.php");
include_once("class.cidade.php");
include_once("class.uf.php");

include_once("class.gerar_ocorrencia.php");

$gerar_ocorrencia = new gerar_ocorrencia();
if($id){
	$gerar_ocorrencia->select($id);
}

?>
<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
<script type="text/javascript">
		function selecionarSemaforo(id, valor){
			$(filtrar).val(valor);
			$(semaforo).val(id);
		}		
</script>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-0">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Gerar Ocorrência
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Ocorrência gerada com sucesso');">
			  <input type="hidden" name="type" value="gerar_ocorrencia">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
			  <div class="form-group col-md-12">
				<input id="semaforo" name="idx_semaforo" class="form-control input-sm" type="hidden" value="<?php echo $gerar_ocorrencia->idx_semaforo?>">
				<input id="filtrar" class="form-control input-sm" type="text" value="<?php echo $gerar_ocorrencia->idx_semaforo ? $gerar_ocorrencia->idx_semaforo : "Selecione um semáforo"?>" disabled>
              </div>			  
			  <div class="form-group col-md-12">
                <input type="text" name="data_hora_ocorr" class="form-control input-sm" placeholder="Data hora" value="<?php echo $gerar_ocorrencia->data_hora_ocorr?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="protocolo" class="form-control input-sm" placeholder="Protocolo" value="<?php echo $gerar_ocorrencia->protocolo?>">			
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="obs" class="form-control input-sm" placeholder="Observação" value="<?php echo $gerar_ocorrencia->obs?>">			
				<input type="hidden" name="status" class="form-control input-sm" placeholder="Observação" value="F">			
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_origem_ocorr">
					<option value="0">Selecione uma Origem Ocorrência</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, origem_nome
								FROM cad_origem_ocorrenc
								ORDER BY origem_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($gerar_ocorrencia->idx_origem_ocorr==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['origem_nome']).'</option>';
						}
					?>
			  </select>			  
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_reclamante">
					<option value="0">Selecione um Reclamante</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, reclam_nome
								FROM cad_reclamante
								ORDER BY reclam_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($gerar_ocorrencia->idx_reclamante==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['reclam_nome']).'</option>';
						}
					?>
			  </select>			  
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_tipo_equipe">
					<option value="0">Selecione um Tipo Equipe</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, tipo_equipe
								FROM cad_equipe_tipo
								ORDER BY tipo_equipe";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($gerar_ocorrencia->idx_tipo_equipe==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['tipo_equipe']).'</option>';
						}
					?>
			  </select>		
			  <input type="hidden" name="idx_tipo_ocorr" value="7">
              </div>		
			  
  			  <!--div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_tipo_ocorr">
					<option value="0">Selecione um Tipo Equipe</option>
					<?php
					/*
						$db = Database::getConnection();
						$sql = "SELECT id, reclam_nome
								FROM cad_reclamante
								ORDER BY reclam_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($gerar_ocorrencia->idx_tipo_ocorr==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['reclam_nome']).'</option>';
						}
						*/
					?>
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
              <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
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
	    
	
} );
	</script>	
	<?php
           require 'footer.php'
        ?>
