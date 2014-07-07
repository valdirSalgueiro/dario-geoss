<?php
	error_reporting (E_ALL ^ E_NOTICE); 


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
	
?><!doctype html><html lang='en'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no' />
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Daedo Nordeste</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
	<link href="css/chosen.css" rel="stylesheet">
	<link href="css/contaazul.css" rel="stylesheet" type="text/css">    
	<link rel="stylesheet" href="css/SimpleCalendar.css" />
    <script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/Chart.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>	
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.form.min.js"></script>
	
	<script type="text/javascript">
		(function() {			
		$('form').ajaxForm({
					beforeSend: function() {
						mostrarCarregando();
					},
					success: function() {
					},
					complete: function(xhr) {
						$(modalbody).html($(msg).html());      
						$(myModal).modal();
						esconderCarregando();
					}
			}); 
		})(); 		
		
		var tableAjax;
		function apagar(tipo,id,tabela) {
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
						window[tabela].fnDraw();
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
				//$('form').validate();
				if($('.datepicker').length>0)
					$('.datepicker').datepicker();
					
			}
		);
		

	</script>
	<style>
.chosen-container * {
box-sizing: content-box;
}
	</style>
</head>
<body class="">
    <div class="container-header sem-mensagem-pagamento">
        <div class="ng-scope">
            <div class="header header-top ng-scope">
                <div class="container">                    
                    <div class="navbar nav-collapse menu-novo">
                        <ul class="nav pull-right">
                            <li class="dropdown pull-right ">
								<a href="javascript:void(0);"><span class="glyphicon-log-out"></span> Sair </a></li>
                            <li class="divider-vertical"></li>
                            <li class="dropdown pull-right">
								<a href="javascript:void(0);"><span class="glyphicon glyphicon-cog"></span>  Admin</a>                                
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>        
        
        <div class="ng-scope">
            <div class="navbar navbar-static-top ng-scope">
                <div class="header-menu" id="topo">
                    <div class="navbar-inner">
                        <div class="container">
                            <div class="container-company-logo">
                                <table class="company-logo" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a class="link-empresa-edit" onclick="" href="javascript:void(0)">
                                                    <img src="./images/logo.png" class="menu-novo" id="act-logo-topo-novo"
                                                        align="middle" onclick="" width="120" height="54">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                            <ul class="big-menu">
                                <li class="top">
									<a href="index.php" class="top_link"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                                <li class="top">
								<a href="#"  class="top_link"><span>Produto</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.produto.php"><span class="glyphicon glyphicon-user"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.produto.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 
								<li class="top">
								<a href="#"  class="top_link"><span>Venda</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.venda.php"><span class="glyphicon glyphicon-user"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.venda.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 
								<li class="top">
								<a href="#"  class="top_link"><span>Pedido</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.pedido.php"><span class="glyphicon glyphicon-user"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.pedido.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 								
                            </ul>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"   aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
                        <h4 class="modal-title">
                            Daedo Nordeste</h4>
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
    <div class="content" id="appContent">   
		<div class="container">
            <div class="conteudo"> 				
				<ul style="display: block;" class="breadcrumb ng-scope">
				<?php
				$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
				$url = $crumbs[count($crumbs)-1];
				if($url!="inicio.php"){
					$crumbs = explode(".",$url);
					echo "<li><a href='inicio.php'>Inicio</a></li> <span class='divider ng-scope'>></span> <li class='ng-scope'> ".ucfirst($crumbs[1])."</li> <span class='divider ng-scope'>></span>  <li><a href='$url'>";
					switch ($crumbs[0])
					{
						case "cad":
							echo "Editar";
							break;
						case "view":
							echo "Visualizar";	
							break;						
						case "list":
							echo "Listar";												
							break;
						case "assoc":
							echo "Associar";												
							break;						
						default:
							echo "Editar";
							break;
					}				
					echo "</a></li>";
				}
				?>
				</ul>				
			</div>
		</div>
		<div class="container angular-app">	
			<div class="conteudo">