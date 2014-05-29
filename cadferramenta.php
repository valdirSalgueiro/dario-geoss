<?php
require 'header.php';

include_once("class.ferramenta.php");

$ferramenta = new ferramenta();
if($id){
	$ferramenta->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Ferramenta
            </h3>
          </div>
          <div class="panel-body">
            <form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Ferramenta cadastrada com sucesso');">
			  <input type="hidden" name="type" value="ferramenta">
              <div class="form-group col-md-12">
                <input type="text" name="ferra_nome" class="form-control input-sm" placeholder="Descrição" value="<?php echo $ferramenta->ferra_nome?>">
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
