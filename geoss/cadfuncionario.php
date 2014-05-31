<?php
require 'header.php';

include_once("class.funcao_funcion.php");
include_once("class.funcionario.php");

$funcionario = new funcionario();
if($id){
	$funcionario->select($id);
}

?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Funcionário
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Funcionário cadastrado com sucesso');"  enctype="multipart/form-data">
			  <input type="hidden" name="type" value="funcionario">
              <div class="form-group col-md-12">
                <input type="text" name="funcionar_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo utf8_encode($funcionario->funcionar_nome)?>">
              </div>
			  <div class="form-group col-md-12">
			    <input type="hidden" name="foto" value="0"/>
                <input type="file" name="foto_"/>
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_funcao">
					<option value="0">Selecione uma Função</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, funcao_nome
								FROM cad_funcao_funcion
								ORDER BY funcao_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($funcionario->idx_funcao==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['funcao_nome']).'</option>';
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
