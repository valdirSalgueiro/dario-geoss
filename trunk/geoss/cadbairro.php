<?php
require 'header.php';

include_once("class.bairro.php");

$bairro = new bairro();
if($id){
	$bairro->select($id);
}
$cidade=$bairro->idx_cid ? $bairro->idx_cid : 0;

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
              Cadastro Bairro
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Bairro cadastrado com sucesso');">
			  <input type="hidden" name="type" value="bairro">
              <div class="form-group col-md-12">
                <input type="text" name="bai_nome" class="form-control input-sm" placeholder="Nome" value="<?php echo $bairro->bai_nome?>">
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
							$checked=($bairro->idx_uf==$row['id'])?"selected":"";
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
