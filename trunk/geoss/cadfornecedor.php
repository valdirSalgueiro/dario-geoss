<?php
require 'header.php';

include_once("class.fornecedor.php");

$fornecedor = new fornecedor();
if($id){
	$fornecedor->select($id);
}
$cidade=$fornecedor->idx_cid ? $fornecedor->idx_cid : 0;
$bairro=$fornecedor->idx_bai ? $fornecedor->idx_bai : 0;
$lograd=$fornecedor->idx_lograd ? $fornecedor->idx_lograd : 0;

echo <<<EOT
<script type="text/javascript">
		$(function(){
			$('#cod_estados').change(function(){
				if( $(this).val() ) {
					$('#cod_cidades').hide();
					$.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione uma cidade</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($cidade==j[i].cod_cidades)?"selected":"";
							options += '<option value="' + j[i].cod_cidades + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_cidades').html(options).show();
						if($bairro)
							$('#cod_cidades').change();
					});
				}
				
			});
		});
		
		$(function(){
			$('#cod_cidades').change(function(){
				if( $(this).val() ) {
					$('#cod_bairros').hide();
					$.getJSON('bairros.ajax.php?search=',{cod_bairros: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione um bairro</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($bairro==j[i].cod_bairros)?"selected":"";
							options += '<option value="' + j[i].cod_bairros + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_bairros').html(options).show();
						if($lograd)
							$('#cod_bairros').change();
					});
				}
			});
		});
		
		$(function(){
			$('#cod_bairros').change(function(){
				if( $(this).val() ) {
					$('#cod_logradouros').hide();
					$.getJSON('logradouros.ajax.php?search=',{cod_logradouros: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione um logradouro</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($lograd==j[i].cod_logradouros)?"selected":"";
							options += '<option value="' + j[i].cod_logradouros + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_logradouros').html(options).show();						
					});
				}
				
			});
		});
		
	$(document).ready(function() {
		if($cidade)
			$('#cod_estados').change();
	} );		
</script>
EOT;
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro fornecedor
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Fornecedor cadastrado com sucesso');">
			  <input type="hidden" name="type" value="fornecedor">
              <div class="form-group col-md-12">
                <input type="text" name="fornec_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $fornecedor->fornec_nome?>">
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_uf" id="cod_estados">
					<option value="0">Selecione um estado</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, uf_nome
								FROM cad_uf
								ORDER BY uf_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($fornecedor->idx_uf==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['uf_nome']).'</option>';
						}
					?>
			  </select>
              </div>
              <div class="form-group col-md-12">
				<select class="form-control input-sm" name="idx_cid" id="cod_cidades">
					<option value="0">Selecione uma cidade</option>
				</select>
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_bai" id="cod_bairros">
					<option value="0">Selecione um bairro</option>
				</select>
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_lograd" id="cod_logradouros">
					<option value="0">Selecione um logradouro</option>
				</select>
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="cep" class="form-control input-sm" placeholder="CEP" value="<?php echo $fornecedor->cep?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="telefone" class="form-control input-sm" placeholder="Telefone" value="<?php echo $fornecedor->telefone?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="e_mail" class="form-control input-sm" placeholder="Email" value="<?php echo $fornecedor->e_mail?>">
              </div>   
              <div class="form-group col-md-12">
                <input type="text" name="cnpj" class="form-control input-sm" placeholder="CNPJ" value="<?php echo $fornecedor->cnpj?>">
              </div>       
              <div class="form-group col-md-12">
                <input type="text" name="numero" class="form-control input-sm" placeholder="Número" value="<?php echo $fornecedor->numero?>">
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
