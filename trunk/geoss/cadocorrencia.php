<?php
require 'header.php';
include_once("class.ocorrencia.php");

$ocorrencia = new ocorrencia();
if($id){
	$ocorrencia->select($id);
}
?>
<script type="text/javascript" language="javascript" src="scripts/jquery.mask.min.js"></script>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
  $('.time').mask('00:00:00');
  }
);
</script>

    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Ocorrência
            </h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Ocorrência cadastrada com sucesso');">
			  <input type="hidden" name="type" value="ocorrencia">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="tipo_ocorrenc" class="form-control input-sm" placeholder="Nome" value="<?php echo utf8_encode($ocorrencia->tipo_ocorrenc)?>">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="prazo_atend" class="time form-control input-sm" placeholder="Prazo" value="<?php echo utf8_encode($ocorrencia->prazo_atend)?>">
              </div>			 

			  <div class="form-group col-md-12">
			  <select name="idx_ocorrenc_prior">
					<option value="0">Priodidade</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, priorid_nome
								FROM cad_ocor_priorid
								ORDER BY priorid_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($ocorrencia->idx_ocorrenc_prior==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['priorid_nome']).'</option>';
						}
					?>
			  </select>
			  </div>
			  <div class="form-group col-md-12">
			    <select class="form-control input-sm" name="idx_tipo_veic">
					<option value="0">Tipo de Veículo</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, tipo_nome
								FROM cad_tipo_veic
								ORDER BY tipo_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($ocorrencia->idx_tipo_veic==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['tipo_nome']).'</option>';
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
