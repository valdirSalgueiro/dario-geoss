<?php
require 'header.php';

include_once("class.acess_equipam.php");

$acess_equipam = new acess_equipam();
if($id){
	$acess_equipam->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Acessório
            </h3>
          </div>
          <div class="panel-body">
            <form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Acessório cadastrado com sucesso');">
			  <input type="hidden" name="type" value="acess_equipam">
              <div class="form-group col-md-12">
                <input type="text" name="acequipam_nome" id="first_name" class="form-control input-sm" placeholder="Descrição" value="<?php echo $acess_equipam->acequipam_nome?>">
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
