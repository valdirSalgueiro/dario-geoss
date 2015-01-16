
<?php
require 'header.php';

include_once("class.usuario.php");

$usuario = new usuario();

if($id){
	$usuario->select($id);
}

$mensagem="$modo".o;

?>
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Usuario <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="usuario">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $usuario->email?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="senha" class=" form-control input-sm"  placeholder="Senha" value="<?php echo $usuario->senha?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_nivel">
					<option value="0">Selecione um Nivel</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM nivel
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($usuario->idx_nivel==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>

	<?php
           require 'footer.php'
        ?>
