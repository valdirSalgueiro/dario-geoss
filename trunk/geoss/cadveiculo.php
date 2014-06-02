<?php
require 'header.php';

include_once("class.model_veic.php");
include_once("class.tipo_veic.php");
include_once("class.veiculo.php");

$veiculo = new veiculo();
if($id){
	$veiculo->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Veículo
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Veículo cadastrado com sucesso');">
			  <input type="hidden" name="type" value="veiculo">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="placa" class="form-control input-sm" placeholder="Placa" value="<?php echo $veiculo->placa?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="ano" class="form-control input-sm" placeholder="Ano" value="<?php echo $veiculo->ano?>">
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_modelo">
					<option value="0">Selecione um Modelo</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, model_nome
								FROM cad_model_veic
								ORDER BY model_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($veiculo->idx_modelo==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['model_nome']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_tipo">
					<option value="0">Selecione um Tipo de Veículo</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, tipo_nome
								FROM cad_tipo_veic
								ORDER BY tipo_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($veiculo->idx_tipo==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['tipo_nome']).'</option>';
						}
					?>
			  </select>
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
