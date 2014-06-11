
<?php
require 'header.php';

include_once("class.conta.php");

$conta = new conta();

if($id){
	$conta->select($id);
}

$mensagem="$modo".a;
?>		

<style>
.datepicker{z-index:1151;}
</style>

<div id="modalCadastro" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
                        <h4 class="modal-title">
                            Cadastrar Conta a Pagar</h4>
                    </div>
                    <div class="modal-body">
							<?php include_once("form.contapagar.php");?>
							&nbsp;
                    </div>
		</div>
  </div>
</div>

<?php
include_once("list.contapagar.php");
?>
<?php
    require 'footer.php'
?>
