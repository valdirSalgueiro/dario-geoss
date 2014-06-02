<?php
require 'header.php';
include_once("class.usuarios.php");

$usuarios = new usuarios();
if($id){
	$usuarios->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Usuário
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Usuário cadastrado com sucesso');">
			  <input type="hidden" name="type" value="usuarios">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="usuario" class="form-control input-sm" placeholder="Nome" value="<?php echo $usuarios->usuario?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="login_nome" class="form-control input-sm" placeholder="Login" value="<?php echo $usuarios->login_nome?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="contrat_acesso" class="form-control input-sm" placeholder="Contrato de Acesso" value="<?php echo $usuarios->contrat_acesso?>">
				<input type="hidden" name="nivel_acesso" class="form-control input-sm" placeholder="nivel" value="S">
              </div>
			  <div class="form-group col-md-12">
                <input type="password" name="senha" class="form-control input-sm" placeholder="Senha" value="<?php echo $usuarios->senha?>">
              </div>

			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_niv_acesso">
					<option value="0">Nivel de Acesso</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nivaces_nome
								FROM cad_usua_nivaces
								ORDER BY nivaces_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($usuarios->idx_niv_acesso==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['nivaces_nome']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-12">
			    <select class="form-control input-sm" name="idx_empresa_usua">
					<option value="0">Empresa</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, razao_social
								FROM cad_empresa_usua
								ORDER BY razao_social";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($usuarios->idx_empresa_usua==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['razao_social']).'</option>';
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
