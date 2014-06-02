<?php
require 'header.php';

include_once("class.cidade.php");

$cidade = new cidade();
if($id){
	$cidade->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Cidade
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Cidade cadastrada com sucesso');">
			  <input type="hidden" name="type" value="cidade">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="cid_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $cidade->cid_nome?>">
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_uf" id="cod_estados">
					<option value="0">Selecione um estado</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, uf_nome
								FROM cad_uf
								ORDER BY uf_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($cidade->idx_uf==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['uf_nome']).'</option>';
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
