<?php
require 'header.php';

include_once("class.material.php");

$material = new material();
if($id){
	$material->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Material
            </h3>
          </div>
          <div class="panel-body">
            <form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Material cadastrado com sucesso');">
			  <input type="hidden" name="type" value="material">
			  <input type="hidden" name="id" value="0"> 
              <div class="form-group col-md-12">
                <input type="text" name="mat_nome" id="first_name" class="form-control input-sm" placeholder="Descrição" value="<?php echo utf8_encode($material->mat_nome)?>">
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_unidade">
                  <option value="0">
                    Selecionar Unidade de Medida
                  </option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, unid_nome
								FROM cad_unidade
								ORDER BY unid_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($material->idx_unidade==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['unid_nome']).'</option>';
						}
					?>                 
                </select>
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="quant_estoque" id="password" class="form-control input-sm" placeholder="Quantidade" value="<?php echo $material->quant_estoque?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="modelo" class="form-control input-sm" placeholder="Modelo" value="<?php echo utf8_encode($material->modelo)?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="vida_util" class="form-control input-sm" placeholder="Vida Util/Mes" value="<?php echo $material->vida_util?>">
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_fornecedor">
                  <option value="0">
                    Selecione um Fornecedor
                  </option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, fornec_nome
								FROM cad_fornecedor
								ORDER BY fornec_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($material->idx_fornecedor==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['fornec_nome']).'</option>';
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
