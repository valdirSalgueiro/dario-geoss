<?php
require 'header.php';

include_once("class.logradouro.php");

$logradouro = new logradouro();
if($id){
	$logradouro->select($id);
}
$cidade=$logradouro->idx_cid ? $logradouro->idx_cid : 0;
$bairro=$logradouro->idx_bai ? $logradouro->idx_bai : 0;

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
              Cadastro Logradouro
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Logradouro cadastrado com sucesso');">
			  <input type="hidden" name="type" value="logradouro">
              <div class="form-group col-md-12">
                <input type="text" name="lograd_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $logradouro->lograd_nome?>">
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
							$checked=($logradouro->idx_uf==$row['id'])?"selected":"";
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
