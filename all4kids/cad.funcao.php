
<?php
require 'header.php';

include_once("class.funcao.php");

$funcao = new funcao();

if($id){
	$funcao->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Funcao
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcao cadastrado com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="funcao">

	<div class="form-group col-md-12">
                <input type="text" name="nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $funcao->nome?>">
			                
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
