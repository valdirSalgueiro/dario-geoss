<?php
require 'header.php';

include_once("class.tipo_veic.php");

$tipo_veic = new tipo_veic();
if($id){
	$tipo_veic->select($id);
}

?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Tipo de Veículo
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Tipo de Veículo cadastrado com sucesso');">
			  <input type="hidden" name="type" value="tipo_veic">
              <div class="form-group col-md-12">
                <input type="text" name="tipo_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo utf8_encode($tipo_veic->tipo_nome)?>">
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
