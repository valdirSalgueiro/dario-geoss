
<?php
require 'header.php';

include_once("class.conta.php");

$conta = new conta();

if($id){
	$conta->select($id);
}

$mensagem="$modo".a;
?>		

<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: auto;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Conta a Pagar
							</h3>
						  </div>
						  <div class="panel-body">
							<?php include_once("form.contapagar.php");?>
							&nbsp;
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</section>

<?php
    require 'footer.php'
?>
