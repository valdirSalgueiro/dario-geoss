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
    <script type="text/javascript" src="scripts/ReView0.65b.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
    <script type="text/javascript" language="javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="scripts/bootstrap.min.js"></script>
	
	<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
	<script src="scripts/footable.js" type="text/javascript"></script>
	<link   href="css/footable.core.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
	
	<title>Geoss</title>
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
		
		var table;
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
                </button> <a class="navbar-brand" href='index.php'>Geosweb</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Geral<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadsemaforo.php"><span class="fa fa-lightbulb-o"></span> Semáforo</a></li>
							<li><a href="cadmaterial.php"><span class="glyphicon glyphicon-tags"></span> Material</a></li>
							<li><a href="cadequipe.php"><span class="fa fa-users"></span> Equipe</a></li>
							<li><a href="cadacessorio.php"><span class="fa fa-wrench"></span> Acessório</a></li>
							<li><a href="cadfornecedor.php"><span class="glyphicon glyphicon-shopping-cart"></span> Fornecedor</a></li>
							<li><a href="cadreclamante.php"><span class="glyphicon glyphicon-tag"></span> Reclamante</a></li>
							<li><a href="cadusuarios.php"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
							<li><a href="cadservico.php"><span class="fa fa-cogs"></span> Serviço</a></li>
							<li><a href="cadvistoria.php"><span class="glyphicon glyphicon-ok"></span> Vistoria</a></li>
							<li><a href="cadfecharvistoria.php"><span class="glyphicon glyphicon-saved"></span> Fechar Vistoria</a></li>
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>
							<li><a href="listarsemaforo.php"><span class="fa fa-lightbulb-o"></span> Semáforo</a></li>
							<li><a href="listarmaterial.php"><span class="glyphicon glyphicon-tags"></span> Material</a></li>
							<li><a href="listarequipe.php"><span class="fa fa-users"></span> Equipe</a></li>
							<li><a href="listaracessorio.php"><span class="fa fa-wrench"></span> Acessório</a></li>
							<li><a href="listarfornecedor.php"><span class="glyphicon glyphicon-shopping-cart"></span> Fornecedor</a></li>
							<li><a href="listarreclamante.php"><span class="glyphicon glyphicon-tag"></span> Reclamante</a></li>
							<li><a href="listarusuarios.php"><span class="glyphicon glyphicon-user"></span> Usuário</a></li>
							<li><a href="listarservico.php"><span class="fa fa-cogs"></span> Serviço</a></li>
							<li><a href="listarvistoria.php"><span class="glyphicon glyphicon-ok"></span> Vistoria</a></li>
							<li><a href="listarfecharvistoria.php"><span class="glyphicon glyphicon-saved"></span> Fechar Vistoria</a></li>							
						</ul>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Veículo<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadmodeloveic.php"><span class="fa fa-taxi"></span> Modelo de Veículo</a></li>
							<li><a href="cadtipoveic.php"><span class="fa fa-truck"></span> Tipo de Veículo</a></li>
							<li><a href="cadveiculo.php"><span class="fa fa-car"></span> Veículo</a></li>	
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>		
							<li><a href="listarmodeloveic.php"><span class="fa fa-taxi"></span> Modelo de Veículo</a></li>
							<li><a href="listartipoveic.php"><span class="fa fa-truck"></span> Tipo de Veículo</a></li>
							<li><a href="listarveiculo.php"><span class="fa fa-car"></span> Veículo</a></li>								
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Localidade<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadlogradouro.php"><span class="fa fa-road"></span> Logradouro</a></li>
							<li><a href="cadbairro.php"><span class="fa fa-bookmark"></span> Bairro</a></li>
							<li><a href="cadcidade.php"><span class="fa fa-map-marker"></span> Cidade</a></li>
							<li><a href="caduf.php"><span class="fa fa-globe"></span> Estado</a></li>	
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>	
							<li><a href="listarlogradouro.php"><span class="fa fa-road"></span> Logradouro</a></li>
							<li><a href="listarbairro.php"><span class="fa fa-bookmark"></span> Bairro</a></li>
							<li><a href="listarcidade.php"><span class="fa fa-map-marker"></span> Cidade</a></li>
							<li><a href="listaruf.php"><span class="fa fa-globe"></span> Estado</a></li>								
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ferramenta<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadferramenta.php"><span class="fa fa-gear"></span> Ferramenta</a></li>
							<li><a href="cadkitferramenta.php"><span class="fa fa-gears"></span> Kit Ferramenta</a></li>
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>	
							<li><a href="listarferramenta.php"><span class="fa fa-gear"></span> Ferramenta</a></li>
							<li><a href="listarkitferramenta.php"><span class="fa fa-gears"></span> Kit Ferramenta</a></li>							
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Funcionário<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadfuncionario.php"><span class="fa fa-male"></span> Funcionário</a></li>
							<li><a href="cadfuncaofuncion.php"><span class="fa fa-pencil"></span> Função Funcionário</a></li>	
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>	
							<li><a href="listarfuncionario.php"><span class="fa fa-male"></span> Funcionário</a></li>
							<li><a href="listarfuncaofuncion.php"><span class="fa fa-pencil"></span> Função Funcionário</a></li>							
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ocorrência<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cadocorrencia.php"><span class="fa fa-check"></span> Ocorrência</a></li>
							<li><a href="cadorigemocorrencia.php"><span class="fa fa-check-circle"></span> Origem Ocorrência</a></li>	
							<li><a href="cadgerarocorrencia.php"><span class="fa fa-check"></span> Gerar Ocorrência</a></li>							
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>		
							<li><a href="listarocorrencia.php"><span class="fa fa-check"></span> Ocorrência</a></li>
							<li><a href="listarorigemocorrencia.php"><span class="fa fa-check-circle"></span> Origem Ocorrência</a></li>								
							<li><a href="listargerarocorrencia.php"><span class="fa fa-check"></span> Gerar Ocorrência</a></li>
						</ul>
					</li>									
				
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Despacho<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cad_despac_sai.php"><span class="fa fa-mail-forward"></span> Despacho Saída</a></li>
							<li><a href="cad_despac_retorn.php"><span class="fa fa-mail-reply"></span> Despacho Retorno</a></li>	
							<li class="divider"></li>
							<li class="nav-header">Editar/Remover</li>	
							<li><a href="listardespac_sai.php"><span class="fa fa-mail-forward"></span> Despacho Saída</a></li>
							<li><a href="listardespac_retorn.php"><span class="fa fa-mail-reply"></span> Despacho Retorno</a></li>								
						</ul>
					</li>	
					
					<li>
						<a href="basedigitalinstalada.php">Mapa Ocorrência</a>
					</li>
					<li>
						<a href="inventario.php">Inventário</a>
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
                            Geosweb</h4>
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
