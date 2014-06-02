<?php
require 'header.php';

include_once("class.funcao_funcion.php");

$funcao_funcion = new funcao_funcion();
if($id){
	$funcao_funcion->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Função Funcionário
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Função Funcionário cadastrado com sucesso');">
			  <input type="hidden" name="type" value="funcao_funcion">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="funcao_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo utf8_encode($funcao_funcion->funcao_nome)?>">
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
