<?php
require 'header.php';

include_once("class.kit_ferramenta.php");

$kit_ferramenta = new kit_ferramenta();
if($id){
	$kit_ferramenta->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Kit Ferramenta
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Kit Ferramenta cadastrada com sucesso');">
			  <input type="hidden" name="type" value="kit_ferramenta">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
			  <div class="form-group col-md-12">
                <input type="text" name="quant_item" class="form-control input-sm" placeholder="Quantidade de itens" value="<?php echo $kit_ferramenta->quant_item?>">
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_ferramenta">
					<option value="0">Selecione uma Ferramenta</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, ferra_nome
								FROM cad_ferramenta
								ORDER BY ferra_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($kit_ferramenta->idx_ferramenta==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['ferra_nome']).'</option>';
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
							$checked=($kit_ferramenta->idx_tipo_equipe==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['tipo_equipe']).'</option>';
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
