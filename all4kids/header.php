
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
	
?>
<html lang='pt-br'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no' />
    <script type="text/javascript" src="scripts/ReView0.65b.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
    <script type="text/javascript" language="javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/bootstrap.min.js"></script>
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
	</script>
	<style>

    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }

	
	</style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">
                        Toggle
                        navigation
                    </span>
                </button> <a class="navbar-brand" href='index.php'>All4Kids</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Geral<b class="caret"></b></a>
						<ul class="dropdown-menu">
	<li><a href="classes/cad.aluno.php"> Aluno</a></li>
	
	<li><a href="classes/cad.aluno_atividade.php"> Aluno_atividade</a></li>
	
	<li><a href="classes/cad.atividade.php"> Atividade</a></li>
	
	<li><a href="classes/cad.atividade_desconto.php"> Atividade_desconto</a></li>
	
	<li><a href="classes/cad.beneficio.php"> Beneficio</a></li>
	
	<li><a href="classes/cad.desconto.php"> Desconto</a></li>
	
	<li><a href="classes/cad.filho.php"> Filho</a></li>
	
	<li><a href="classes/cad.funcao.php"> Funcao</a></li>
	
	<li><a href="classes/cad.funcionario.php"> Funcionario</a></li>
	
	<li><a href="classes/cad.funcionario_beneficio.php"> Funcionario_beneficio</a></li>
	
	<li><a href="classes/cad.funcionario_filho.php"> Funcionario_filho</a></li>
	
	<li><a href="classes/cad.funcionario_funcao.php"> Funcionario_funcao</a></li>
	
	<li><a href="classes/cad.nivel.php"> Nivel</a></li>
	
	<li><a href="classes/cad.telefone.php"> Telefone</a></li>
	
	<li><a href="classes/cad.telefone_aluno.php"> Telefone_aluno</a></li>
	
	<li><a href="classes/cad.usuario.php"> Usuario</a></li>
						
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>					
	<li><a href="classes/list.aluno.php"> Aluno</a></li>
						
	<li><a href="classes/list.aluno_atividade.php"> Aluno_atividade</a></li>
						
	<li><a href="classes/list.atividade.php"> Atividade</a></li>
						
	<li><a href="classes/list.atividade_desconto.php"> Atividade_desconto</a></li>
						
	<li><a href="classes/list.beneficio.php"> Beneficio</a></li>
						
	<li><a href="classes/list.desconto.php"> Desconto</a></li>
						
	<li><a href="classes/list.filho.php"> Filho</a></li>
						
	<li><a href="classes/list.funcao.php"> Funcao</a></li>
						
	<li><a href="classes/list.funcionario.php"> Funcionario</a></li>
						
	<li><a href="classes/list.funcionario_beneficio.php"> Funcionario_beneficio</a></li>
						
	<li><a href="classes/list.funcionario_filho.php"> Funcionario_filho</a></li>
						
	<li><a href="classes/list.funcionario_funcao.php"> Funcionario_funcao</a></li>
						
	<li><a href="classes/list.nivel.php"> Nivel</a></li>
						
	<li><a href="classes/list.telefone.php"> Telefone</a></li>
						
	<li><a href="classes/list.telefone_aluno.php"> Telefone_aluno</a></li>
						
	<li><a href="classes/list.usuario.php"> Usuario</a></li>
	
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
<div class="container">
	<br><br><br>
