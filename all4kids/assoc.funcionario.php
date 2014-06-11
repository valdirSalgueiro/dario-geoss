
<?php
require 'header.php';

include_once("class.funcionario_beneficio.php");

$funcionario_beneficio = new funcionario_beneficio();

if($id){
	$funcionario_beneficio->select($id);
}

$mensagem="$modo".a;

?>						

<div class="conteudo-principal">
    <fieldset>  
						  <form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Associacao <?php echo $mensagem ?> com sucesso');">
						  <input type="hidden" name="type" value="funcionario_beneficio">
						  <div class="form-group col-md-6" style="text-align: left">
							  <select data-placeholder="Escolha os funcionarios" class="chosen-select" multiple style="width:500px;" name="funcionario[]">
									<?php
										$db = Database::getConnection();
										$sql = "SELECT id, nome
												FROM funcionario
												ORDER BY nome";
										$res = $db->query( $sql );
										while ( $row = $res->fetch_assoc() ) {
											$checked=($funcionario_beneficio->idx_funcionario==$row['id'])?"selected":"";
											echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
										}
									?>
							  </select>							  
						 </div>						  
						  <div class="form-group col-md-6" style="text-align: left">
							  <select id="beneficio" data-placeholder="Escolha os beneficios" class="chosen-select" multiple style="width:500px;" name="beneficio[]">
									<?php
										$db = Database::getConnection();
										$sql = "SELECT id, nome, valor
												FROM beneficio
												ORDER BY nome";
										$res = $db->query( $sql );
										while ( $row = $res->fetch_assoc() ) {
											$checked=($funcionario_beneficio->idx_beneficio==$row['id'])?"selected":"";
											echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].' ('.$row['valor'].')</option>';
										}
									?>
							  </select>							  
						</div>						
					
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>						
					  
					  </form>
					</fieldset>
		</div>
  
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Sem resultados!'},
      '.chosen-select-width'     : {width:"95%"}
	  
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }	
	
	

  </script>	
	<?php
           require 'footer.php'
        ?>
