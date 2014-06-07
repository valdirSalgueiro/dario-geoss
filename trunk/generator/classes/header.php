
<?php
	error_reporting (E_ALL ^ E_NOTICE); 

	session_start();
	if(!isset($_SESSION["user"])) {
		header("Location:login.php");
	}
	
	function post($key) {
		if (isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		return false;
	}
	
	function startsWith($haystack, $needle)
	{
		return $needle === "" || strpos($haystack, $needle) === 0;
	}
	function endsWith($haystack, $needle)
	{
		return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}
	
	$id = post('id')==0?0:post('id');
	$textoBotao=$id?"Alterar":"Cadastrar";
	$modo=$id?"alterad":"cadastrad";
	
?>
<html lang='pt-br'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no' />
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		var ajaxSubmit = function(formEl,msg) {
			mostrarCarregando();
			// fetch where we want to submit the form to
			var url = $(formEl).attr('action');

			// fetch the data for the form
			var data = $(formEl).serializeArray();

			// setup the ajax request
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(rsp) {
					if(rsp.success) {
					    $(modalbody).html(msg);      
						$(myModal).modal();
					}
					esconderCarregando();
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					alert(textStatus);
					alert(errorThrown);
					esconderCarregando();
					}					
			});

			// return false so the form does not actually
			// submit to the page
			return false;
		}
		
		var tableAjax;
		function apagar(tipo,id) {
			mostrarCarregando();

			// setup the ajax request
			$.ajax({
				url: 'dao.php',
				data: 'mode=deletar&type='+tipo+'&id='+id,
				type: 'POST',
				dataType: 'json',
				success: function(rsp) {
					if(rsp.success) {
					    $(modalbody).html("Removido com sucesso!");      
						$(myModal).modal();
						tableAjax.fnDraw();
					}
					esconderCarregando();
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					alert(textStatus);
					alert(errorThrown);
					esconderCarregando();
					}					
			});

			// return false so the form does not actually
			// submit to the page
			return false;
		}
		
		var pleaseWaitDiv = $("<div class='modal js-loading-bar'><div class='modal-dialog' id='modalLoading'><div class='modal-content'><div class='modal-header'><h3>Carregando...</h3></div><div class='modal-body'><div class='progress progress-striped active'><div class='progress-bar'  role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:70%'><span class='sr-only'>Carregando...</span></div></div></div></div></div></div>");

        function mostrarCarregando(){
            pleaseWaitDiv.modal({ show: true });
            centralizarModal();
			$(window).resize(function () { centralizarModal(); });
        }
		
        function esconderCarregando(){
            pleaseWaitDiv.modal('hide');
        }

		function centralizarModal() {
			var modalH = $(modalLoading).height();
			var windowH = $(window).height();
			$('.modal-dialog').css({ 'top': windowH/2 - modalH});
		}
		
		$(document).ready(function() {
				if(typeof $('.datepicker') != 'undefined')
					$('.datepicker').datepicker();
			}
		);

	</script>

</head>
<body style="background-color: #222">
            <div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index-2.html"><img src="images/logo.gif" alt="Magicreche. Responsive site theme for Creche, Playschool, Preschool and Montessori." class="img-responsive"></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class=""><a href="#home">HOME</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">ALL4KIDS <b class="caret"></b></a>
							<ul class="dropdown-menu">
	<li><a href="cad.alergia.php"> Alergia</a></li>
	
	<li><a href="cad.aluno.php"> Aluno</a></li>
	
	<li><a href="cad.aluno_alergia.php"> Aluno alergia</a></li>
	
	<li><a href="cad.aluno_atividade.php"> Aluno atividade</a></li>
	
	<li><a href="cad.aluno_servico.php"> Aluno servico</a></li>
	
	<li><a href="cad.atividade.php"> Atividade</a></li>
	
	<li><a href="cad.beneficio.php"> Beneficio</a></li>
	
	<li><a href="cad.categoria.php"> Categoria</a></li>
	
	<li><a href="cad.conta.php"> Conta</a></li>
	
	<li><a href="cad.conta_categoria.php"> Conta categoria</a></li>
	
	<li><a href="cad.dia.php"> Dia</a></li>
	
	<li><a href="cad.dia_atividade.php"> Dia atividade</a></li>
	
	<li><a href="cad.dia_servico.php"> Dia servico</a></li>
	
	<li><a href="cad.filho.php"> Filho</a></li>
	
	<li><a href="cad.fornecedor.php"> Fornecedor</a></li>
	
	<li><a href="cad.funcao.php"> Funcao</a></li>
	
	<li><a href="cad.funcionario.php"> Funcionario</a></li>
	
	<li><a href="cad.funcionario_beneficio.php"> Funcionario beneficio</a></li>
	
	<li><a href="cad.funcionario_filho.php"> Funcionario filho</a></li>
	
	<li><a href="cad.horario.php"> Horario</a></li>
	
	<li><a href="cad.horario_atividade.php"> Horario atividade</a></li>
	
	<li><a href="cad.horario_servico.php"> Horario servico</a></li>
	
	<li><a href="cad.intervalo.php"> Intervalo</a></li>
	
	<li><a href="cad.nivel.php"> Nivel</a></li>
	
	<li><a href="cad.nivelescolar.php"> Nivelescolar</a></li>
	
	<li><a href="cad.servico.php"> Servico</a></li>
	
	<li><a href="cad.telefone.php"> Telefone</a></li>
	
	<li><a href="cad.telefone_aluno.php"> Telefone aluno</a></li>
	
	<li><a href="cad.usuario.php"> Usuario</a></li>
						
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Listagens <b class="caret"></b></a>
							<ul class="dropdown-menu">					
	<li><a href="list.alergia.php"> Alergia</a></li>
						
	<li><a href="list.aluno.php"> Aluno</a></li>
						
	<li><a href="list.aluno_alergia.php"> Aluno alergia</a></li>
						
	<li><a href="list.aluno_atividade.php"> Aluno atividade</a></li>
						
	<li><a href="list.aluno_servico.php"> Aluno servico</a></li>
						
	<li><a href="list.atividade.php"> Atividade</a></li>
						
	<li><a href="list.beneficio.php"> Beneficio</a></li>
						
	<li><a href="list.categoria.php"> Categoria</a></li>
						
	<li><a href="list.conta.php"> Conta</a></li>
						
	<li><a href="list.conta_categoria.php"> Conta categoria</a></li>
						
	<li><a href="list.dia.php"> Dia</a></li>
						
	<li><a href="list.dia_atividade.php"> Dia atividade</a></li>
						
	<li><a href="list.dia_servico.php"> Dia servico</a></li>
						
	<li><a href="list.filho.php"> Filho</a></li>
						
	<li><a href="list.fornecedor.php"> Fornecedor</a></li>
						
	<li><a href="list.funcao.php"> Funcao</a></li>
						
	<li><a href="list.funcionario.php"> Funcionario</a></li>
						
	<li><a href="list.funcionario_beneficio.php"> Funcionario beneficio</a></li>
						
	<li><a href="list.funcionario_filho.php"> Funcionario filho</a></li>
						
	<li><a href="list.horario.php"> Horario</a></li>
						
	<li><a href="list.horario_atividade.php"> Horario atividade</a></li>
						
	<li><a href="list.horario_servico.php"> Horario servico</a></li>
						
	<li><a href="list.intervalo.php"> Intervalo</a></li>
						
	<li><a href="list.nivel.php"> Nivel</a></li>
						
	<li><a href="list.nivelescolar.php"> Nivelescolar</a></li>
						
	<li><a href="list.servico.php"> Servico</a></li>
						
	<li><a href="list.telefone.php"> Telefone</a></li>
						
	<li><a href="list.telefone_aluno.php"> Telefone aluno</a></li>
						
	<li><a href="list.usuario.php"> Usuario</a></li>
	
						</ul>
					</li>	
					
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div><!-- Begin page content -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
                        <h4 class="modal-title">
                            All4kids</h4>
                    </div>
                    <div class="modal-body" id="modalbody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Ok</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
