<?php
require 'header.php';

include_once("class.despac_sai.php");
include_once("class.despac_retorn.php");

include_once("class.material.php");

$despac_retorn = new despac_retorn();
if($id){
	$despac_retorn->select($id);
}

if($despac_retorn->id){
	$db = Database::getConnection();
	$sql = "SELECT *
			FROM cad_despac_mat_retirad
			WHERE idx_despac_retorn=$despac_retorn->id";
	$res = $db->query( $sql );

	while ( $row = $res->fetch_assoc() ) {
		$quantidade.=$row['quantidade'].",";
		$temp=new material();
		$temp->select(28);
		$temp=$temp->mat_nome;
		$material.=utf8_encode($temp).",";
		$materialid.=$row['idx_material'].",";
	}

	$sql = "SELECT *
			FROM cad_despac_mat_devolv
			WHERE idx_despac_retorn=$despac_retorn->id";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$quantidadeDevolvido.=$row['quantidade'].",";
		$temp=new material();
		$temp->select(28);
		$temp=$temp->mat_nome;
		$materialDevolvido.=utf8_encode($temp).",";
		$materialidDevolvido.=$row['idx_material'].",";
	}
}

?>

<script type="text/javascript" language="javascript" src="scripts/bootstrap-datepicker.js"></script>
<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>

<script type="text/javascript" language="javascript">
	var id=0;
	
	function selecionarDespachoSaida(id, valor){
		$(filtrar).val(valor);
		$(despachoSaida).val(id);
	}
	
	function adicionarMaterial(){
		var materialVal=$(materialCampo).val();
		var materialText=$("#materialCampo option:selected").text();
		var quantidade=$(quantidadeCampo).val();
		adicionar(materialVal,materialText,quantidade);
	}
	
	function adicionarMaterialDevolvido(){
		var materialVal=$(materialCampoDevolvido).val();
		var materialText=$("#materialCampoDevolvido option:selected").text();
		var quantidade=$(quantidadeCampoDevolvido).val();
		adicionarDevolvido(materialVal,materialText,quantidade);
	}
	
	function adicionar(materialVal,materialText,quantidade){
		$(materialConteudo).append("<div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" class=\"form-control input-sm\" value=\""+materialText+"\" disabled><input type=\"hidden\" name=\"idx_material[]\" class=\"form-control input-sm\" value=\""+materialVal+"\"></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" name=\"quantidade[]\" class=\"form-control input-sm\" value=\""+quantidade+"\" readonly></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"button\" onclick=\"removerMaterial(mat"+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>");
		id++;
	}
	
	function adicionarDevolvido(materialVal,materialText,quantidade){
		$(materialConteudoDevolvido).append("<div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" class=\"form-control input-sm\" value=\""+materialText+"\" disabled><input type=\"hidden\" name=\"idx_materialDevolvido[]\" class=\"form-control input-sm\" value=\""+materialVal+"\"></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" name=\"quantidadeDevolvido[]\" class=\"form-control input-sm\" value=\""+quantidade+"\" readonly></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"button\" onclick=\"removerMaterial(mat"+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>");
		id++;
	}

	function removerMaterial(removerId){
		$(removerId).remove();
	}
</script>

<?php
echo <<<EOT
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('.datepicker').datepicker();
	if($despac_retorn->id){
		var array="$materialid".split(",");
		var arrayText="$material".split(",");
		var arrayQtd="$quantidade".split(",");
		var arrayDevolvido="$materialidDevolvido".split(",");
		var arrayTextDevolvido="$materialDevolvido".split(",");
		var arrayQtdDevolvido="$quantidadeDevolvido".split(",");		
		for (var i=0;i<array.length-1; i++) {
			adicionar(array[i],arrayText[i],arrayQtd[i]);
			adicionarDevolvido(arrayDevolvido[i],arrayTextDevolvido[i],arrayQtdDevolvido[i]);
		}			
	}
} 
);
</script>
EOT;
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-0">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Despacho Retorno
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Despacho Retorno cadastrado com sucesso');">
			  <input type="hidden" name="type" value="despac_retorn">
              <div class="form-group col-md-12">
                <input type="text" name="data_hora_ret" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data Hora Retorno" value="<?php echo utf8_encode($despac_retorn->data_hora_ret)?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="situac_veic_equipam" class="form-control input-sm" placeholder="Situação do veículo/equipamento" value="<?php echo utf8_encode($despac_retorn->situac_veic_equipam)?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="kilom_final" class="form-control input-sm" placeholder="Kilometragem final" value="<?php echo utf8_encode($despac_retorn->kilom_final)?>">
              </div>	
			  <div class="form-group col-md-12">
                <input type="text" name="obs" class="form-control input-sm" placeholder="Observação" value="<?php echo utf8_encode($despac_retorn->obs)?>">
              </div>			  
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_equipam_devolv">
					<option value="0">Selecione Equipamento/Acessório Devolvido</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, acequipam_nome
								FROM cad_acess_equipam
								ORDER BY acequipam_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($despac_retorn->idx_equipam_devolv=$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['acequipam_nome']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="well">
			  <div class="form-group col-md-12">
                	<input id="despachoSaida" name="idx_despac_sai" class="form-control input-sm" type="hidden"  value="<?php echo utf8_encode($despac_retorn->idx_despac_sai)?>">
					<input id="filtrar" class="form-control input-sm" type="text" value="Selecione um despacho de saída" disabled>
              </div>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Número da Ordem</th>
				<th>Data hora</th>
				<th>Situação Veículo/Equipamento</th>
				<th>Motorista</th>
				<th>Status</th>
				<th>Km Inicial</th>
            </tr>        
		</thead> 
        <tbody>  
<?php
		$db = Database::getConnection(); 
		$query = "SELECT id FROM cad_despac_sai";
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$despac_sai = new despac_sai();
				$despac_sai->select($obj->id);
				$logradouro="[".$despac_sai->num_ordem."] ".utf8_encode($despac_sai->data_hora);
				echo "<tr onclick=\"selecionarDespachoSaida($despac_sai->id,'$logradouro')\">";
				foreach($despac_sai as $key => $value)
				{
					if(is_scalar($value)){
						if(
						startsWith($key,"idx_") || $key=="id"){							
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
							<div class="form-group col-md-3">
					Material Retirado
				</div>
			  
			  <div class="form-group col-md-3">
			  <select id="materialCampo" class="form-control input-sm">
					<option value="0">Selecione um Material</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, mat_nome
								FROM cad_material
								ORDER BY mat_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							echo '<option value="'.$row['id'].'">'.utf8_encode($row['mat_nome']).'</option>';
						}
					?>
			  </select>
			  </div>			  
			  <div class="form-group col-md-3">
			  <input id="quantidadeCampo" type="text" class="form-control input-sm" placeholder="Quantidade">
			  </div>
			  <div class="form-group col-md-3">
			  <input type="button" value="Adicionar" onclick="adicionarMaterial();" class="btn btn-success btn-block">
			  </div>		
			  <br><br>
			  <div id="materialConteudo">
			  </div>

			
			  <div class="form-group col-md-3">
				Material Devolvido
			  </div>
			  <div class="form-group col-md-3">
			  <select id="materialCampoDevolvido" class="form-control input-sm">
					<option value="0">Selecione um Material</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, mat_nome
								FROM cad_material
								ORDER BY mat_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							echo '<option value="'.$row['id'].'">'.utf8_encode($row['mat_nome']).'</option>';
						}
					?>
			  </select>
			  </div>			  
			  <div class="form-group col-md-3">
			  <input id="quantidadeCampoDevolvido" type="text" class="form-control input-sm" placeholder="Quantidade">
			  </div>
			  <div class="form-group col-md-3">
			  <input type="button" value="Adicionar" onclick="adicionarMaterialDevolvido();" class="btn btn-success btn-block">
			  </div>		
			  <br><br>
			  <div id="materialConteudoDevolvido">
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
} );
	</script>		
	<?php
           require 'footer.php'
        ?>
