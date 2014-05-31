<?php
require 'header.php';

include_once("class.reclamante.php");

$reclamante = new reclamante();
if($id){
	$reclamante->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Reclamante
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Reclamante cadastrado com sucesso');">
			  <input type="hidden" name="type" value="reclamante">
              <div class="form-group col-md-12">
                <input type="text" name="reclam_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $reclamante->reclam_nome?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="telefone" class="form-control input-sm" placeholder="Telefone" value="<?php echo $reclamante->telefone?>">
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
