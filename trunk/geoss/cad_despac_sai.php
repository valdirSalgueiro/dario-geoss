<?php
require 'header.php';

include_once("class.despac_sai.php");
include_once("class.material.php");

$despac_sai = new despac_sai();
if($id){
	$despac_sai->select($id);
}

if($despac_sai->id){
	$db = Database::getConnection();
	$sql = "SELECT *
			FROM cad_despac_mat_selec
			WHERE idx_despac_sai=$despac_sai->id";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$quantidade.=$row['quantidade'].",";
		$temp=new material();
		$temp->select(28);
		$temp=$temp->mat_nome;
		$material.=utf8_encode($temp).",";
		$materialid.=$row['idx_material'].",";
	}
}
?>

<script type="text/javascript" language="javascript" src="scripts/bootstrap-datepicker.js"></script>

<script type="text/javascript" language="javascript">
var id=0;

function adicionarMaterial(){
	var materialVal=$(materialCampo).val();
	var materialText=$("#materialCampo option:selected").text();
	var quantidade=$(quantidadeCampo).val();
	adicionar(materialVal,materialText,quantidade);
}

function adicionar(materialVal,materialText,quantidade){
	$(materialConteudo).append("<div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" class=\"form-control input-sm\" value=\""+materialText+"\" disabled><input type=\"hidden\" name=\"idx_material[]\" class=\"form-control input-sm\" value=\""+materialVal+"\"></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"text\" name=\"quantidade[]\" class=\"form-control input-sm\" value=\""+quantidade+"\" readonly></div><div id=\"mat"+id+"\" class=\"form-group col-md-4\"><input type=\"button\" onclick=\"removerMaterial(mat"+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>");
	id++;
}

function removerMaterial(removerId){
  $(removerId).remove();
}

</script>

<?php

$desp_id=$despac_sai->id==0?0:$despac_sai->id;
echo <<<EOT
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('.datepicker').datepicker();
	if($desp_id){
		var array="$materialid".split(",");
		var arrayText="$material".split(",");
		var arrayQtd="$quantidade".split(",");
		for (var i=0;i<array.length-1; i++) {
			adicionar(array[i],arrayText[i],arrayQtd[i]);
		}			
	}
} 
);
</script>
EOT;
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Despacho Saída
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Despacho Saída cadastrado com sucesso');">
			  <input type="hidden" name="type" value="despac_sai">
              <div class="form-group col-md-12">
                <input type="text" name="num_ordem" class="form-control input-sm" placeholder="Número da Ordem" value="<?php echo utf8_encode($despac_sai->num_ordem)?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="data_hora" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data Hora Saída" value="<?php echo utf8_encode($despac_sai->data_hora)?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="situac_veic_equipam" class="form-control input-sm" placeholder="Situação do veículo/equipamento" value="<?php echo utf8_encode($despac_sai->situac_veic_equipam)?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="motorista" class="form-control input-sm" placeholder="Motorista" value="<?php echo utf8_encode($despac_sai->motorista)?>">
              </div>	
			  <div class="form-group col-md-12">
                <input type="text" name="kilom_inicial" class="form-control input-sm" placeholder="Kilometragem inicial" value="<?php echo utf8_encode($despac_sai->kilom_inicial)?>">
				<input type="hidden" name="status_atual" class="form-control input-sm" value="F" placeholder="Status Atual">
              </div>			  
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_veiculo">
					<option value="0">Selecione um Veículo</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, placa
								FROM cad_veiculo
								ORDER BY placa";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($despac_sai->idx_veiculo=$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['placa']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_equipe">
					<option value="0">Selecione uma Equipe</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, cod_equipe
								FROM cad_equipe
								ORDER BY cod_equipe";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($despac_sai->idx_equipe=$row['id'])?"selected":"";	
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['cod_equipe']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_equipam_acess">
					<option value="0">Selecione um Equipamento/Acessório</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, acequipam_nome
								FROM cad_acess_equipam
								ORDER BY acequipam_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($despac_sai->idx_equipam_acess=$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['acequipam_nome']).'</option>';
						}
					?>
			  </select>
			  </div>		
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_resp_tecnic">
					<option value="0">Selecione um responsável técnico</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, funcionar_nome
								FROM cad_funcionario
								ORDER BY funcionar_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($despac_sai->idx_resp_tecnic=$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['funcionar_nome']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-4">
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
			  <div class="form-group col-md-4">
			  <input id="quantidadeCampo" type="text" class="form-control input-sm" placeholder="Quantidade">
			  </div>
			  <div class="form-group col-md-4">
			  <input type="button" value="Adicionar" onclick="adicionarMaterial();" class="btn btn-success btn-block">
			  </div>		
			  <br><br>
			  <div id="materialConteudo">
			  </div>
              <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
              </div>              			  
            </form>
          </div>
        </div>
      </div>
    </div>
	<?php
           require 'footer.php'
        ?>
