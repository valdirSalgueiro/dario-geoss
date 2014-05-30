<?php
require 'header.php';

include_once("class.equipe.php");

$equipe = new equipe();
if($id){
	$equipe->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Equipe
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Equipe cadastrada com sucesso');">
			<input type="hidden" name="type" value="equipe"> 
            <form role="form">
              <div class="form-group col-md-12">
                <input type="text" name="cod_equipe" class="form-control input-sm" placeholder="Código Equipe" value="<?php echo $equipe->cod_equipe?>">
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_tipo_equipe">
                  <option value="0">Selecionar Tipo Equipe</option>				
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, tipo_equipe
								FROM cad_equipe_tipo
								ORDER BY tipo_equipe";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($equipe->idx_tipo_equipe==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['tipo_equipe']).'</option>';
						}
					?>  				  
                </select>
              </div>
			  <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
              </div>	

            </form>
          </div>
        </div>
      </div>
    </div>
	<?php
           require 'footer.php'
        ?>
