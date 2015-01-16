<!doctype html>
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
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no' />
    <meta name="description" content="">
    <meta name="author" content="">
	<title>All4kids</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
	<link href="css/chosen.css" rel="stylesheet">
	<link href="css/contaazul.css" rel="stylesheet" type="text/css">    
	
	<link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/croppic.css" rel="stylesheet">
	
	<link rel="StyleSheet" href="css/ui-lightness/jquery-ui-1.9.2.custom.min.css" type="text/css" media="all"/>
    <link rel="StyleSheet" href="css/jquery.tagedit.css" type="text/css" media="all"/>
	<link href="css/lightbox.css" rel="stylesheet" />

	
	<link rel="stylesheet" href="css/SimpleCalendar.css" />
    <script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
	
	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/Chart.js" type="text/javascript"></script>
	
    <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>	
	
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>		
    
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.autoGrowInput.js"></script>
    <script type="text/javascript" src="js/jquery.tagedit.js"></script>
	

    <script src="js/cep.js" type="text/javascript"></script>   
	<script src="js/lightbox.min.js" type="text/javascript"></script>   
	
	<script type="text/javascript">	
	
		function abrirTermo2(var1){
			var2=$(var22).val();
			var3=$(var23).val();
			var4=$(var24).val();
			var5=$(var25).val();
			window.open("termo.php?var1="+var1+"&var2="+var2+"&var3="+var3+"&var4="+var4+"&var5="+var5);
		}
		
		function abrirTermo1(var1){
			var2=$(var12).val();
			var3=$(var13).val();
			var4=$(var14).val();
			var5=$(var15).val();
			window.open("termo.php?var1="+var1+"&var2="+var2+"&var3="+var3+"&var4="+var4+"&var5="+var5);
		}
		
		function recibo(var1){
			var2=$(var2).val();
			var3=$(var3).val();
			var4=$(var4).val();
			var5=$(var5).val();
			window.open("recibo.php?var1="+var1+"&var2="+var2+"&var3="+var3+"&var4="+var4+"&var5="+var5);
		}
	
		var ajaxSubmit = function(formEl,msg) {	

			mostrarCarregando();
			// fetch where we want to submit the form to
			var url = $(formEl).attr('action');

			// fetch the data for the form
			var data = $(formEl).serializeArray();

			// setup the ajax request
			$.ajax({
				url: url,
				data: new FormData(formEl),
				type: 'POST',
				///*
				processData: false,
				contentType: false,
				dataType: 'json',
				//*/
				//dataType: 'json',
				success: function(rsp) {				
					if(rsp.success) {
					
						if($('#modalCadastro').length>0){
							$('#modalCadastro').modal('hide');
							tableAjax.fnDraw();
						}
						
						if($('#modalCadastro1').length>0){
							$('#modalCadastro1').modal('hide');
							tableAjax.fnDraw();
						}
						
						if($('#modalCadastro2').length>0){
							$('#modalCadastro2').modal('hide');
							tableAjax.fnDraw();
						}
						
						var uri= document.URL.split("/");
						uri=uri[uri.length-1].replace("#","");
						if(uri.indexOf("?")==-1){
							location.href=uri+"?id="+rsp.id;
						}else{
							//location.reload();
						}
						//$(modalbody).html(msg);      
						//$(myModal).modal();
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
		var files=[];
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
					location.reload();
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
		
		var upload_key=0;
		$(document).ready(function() {
		 
			calcular_idade();
		 
			function calcular_idade(){
				if($('.idade').length>0){
					var date=$('.datepicker').val();						
					var dd = new Date().getFullYear();
					var de = new Date().getMonth();
					var res=date.split("-"); 		
					date=res[2];
						if (typeof date != 'undefined'){
							date=dd-res[2];
						if(de<res[1])
							date-=1;
					
						$('.idade').val(Math.max(0, date) +" ano(s)");					
					}
				}
			}
			
		
				$('input[name=cpf]').mask('999.999.999-99'); 
				//$('input[name=rg]').mask('99.999.99-9');
				$('input[name=celular1]').mask('(99)9999-9999');
				$('input[name=celular2]').mask('(99)9999-9999');
				$('input[name=telefone_comercial]').mask('(99)9999-9999');
				$('input[name=telefone_residencial]').mask('(99)9999-9999');			

				
				function dateChanged(ev) {
					$(this).datepicker('hide');							
					calcular_idade();
				}
		

				if($('.datepicker').length>0){
					$.fn.datepicker.defaults.format = "dd-mm-yyyy";
					$('.datepicker').datepicker()
					.change(dateChanged)
					.on('changeDate', dateChanged);
				}
					
				/*	
				$('input[type=file]').on('change', prepareUpload);
				function prepareUpload(event)
				{
					files.push(event.target.files);
					$('<input>').attr('type','hidden').attr('name','file'+upload_key).attr('value',value.name).appendTo('form');
				}
				*/
					
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
								<a href="logout.php"><span class="glyphicon-log-out"></span> Sair </a></li>
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
                                                    <img src="./images/logo.gif" class="menu-novo" id="act-logo-topo-novo"
                                                        align="middle" onclick="">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                            <ul class="big-menu">
                                <li class="top">
									<a href="inicio.php" class="top_link"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                                <li class="top">
								<a href="#"  class="top_link"><span>Aluno</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.aluno.php"><span class="glyphicon glyphicon-user"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.aluno.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li>  
                                <li class="top">
								<a href="#"  class="top_link"><span>Funcionario</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.funcionario.php"><span class="glyphicon glyphicon-user"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.funcionario.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
												
                                                <li>
													<a href="cad.funcao.php"><span class="glyphicon glyphicon-user"></span> Funcao</a>
												</li>
												<li>
													<a href="list.funcao.php"><span class="glyphicon glyphicon-list-alt"></span> Funcao</a>
												</li>	
												
                                                <li>
													<a href="cad.beneficio.php"><span class="glyphicon glyphicon-user"></span> Beneficio</a>
												</li>
												<li>
													<a href="list.beneficio.php"><span class="glyphicon glyphicon-list-alt"></span> Beneficio</a>
												</li>
												
												<li>
													<a href="assoc.funcionario.php"><span class="glyphicon glyphicon-resize-small"></span> Associar a beneficio</a>
												</li>													
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li>
                                <li class="top">
								<a href="#"  class="top_link"><span>Atividade</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.atividade.php"><span class="glyphicon glyphicon-file"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.atividade.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
												<li>
													<a href="assoc.atividade.php"><span class="glyphicon glyphicon-resize-small"></span> Associar ao aluno</a>
												</li>													
												<li>
													<a href="list.aluno_atividade.php"><span class="glyphicon glyphicon-resize-small"></span> Listar Associacoes</a>
												</li>	
												<li  style="width: 300px">
													<a href="view.atividade.php"><span class="glyphicon glyphicon-calendar"></span> Calendario de Atividades</a>
												</li>												
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 
                                <li class="top">
								<a href="#"  class="top_link"><span>Servico</span><b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.servico.php"><span class="glyphicon glyphicon-file"></span> Cadastro</a>
												</li>
												<li>
													<a href="list.servico.php"><span class="glyphicon glyphicon-list-alt"></span> Listagem</a>
												</li>
												<li>
													<a href="assoc.servico.php"><span class="glyphicon glyphicon-resize-small"></span> Associar ao aluno</a>
												</li>	
												<li>
													<a href="list.aluno_servico.php"><span class="glyphicon glyphicon-resize-small"></span> Listar Associacoes</a>
												</li>													
												<li style="width: 300px">
													<a href="view.servico.php"><span class="glyphicon glyphicon-calendar"></span> Calendario de Servicos</a>
												</li>												
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 								
                                <li class="top">
								<a href="#" onclick="$(myModal).modal();" class="top_link">Financeiro<b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
                                                <li>
													<a href="cad.contapagar.php"><span class="glyphicon glyphicon-usd"></span> Contas a pagar</a>
												</li>
												<li>
													<a href="cad.contareceber.php"><span class="glyphicon glyphicon-usd"></span> Contas a receber</a>
												</li>
												<li>
													<a href="cad.fornecedor.php"><span class="glyphicon glyphicon-tags"></span> Fornecedor</a>
												</li>	
												<li>
													<a href="cad.categoria.php"><span class="glyphicon glyphicon-tags"></span> Categoria</a>
												</li>	
												<li>
													<a href="list.categoria.php"><span class="glyphicon glyphicon-tags"></span> Listagem Categoria</a>
												</li>												
                                            </ul>
                                        </li>                                        
                                    </ul>
                                </li> 
								<li class="top">
								<a href="#" onclick="$(myModal).modal();" class="top_link">Administrativo<b class="down"></b> </a>
                                    <ul class="sub-menu" style="width: 380px">
                                        <li>
                                            <ul>
												<li>
													<a href="cad.usuario.php"><span class="glyphicon glyphicon-user"></span> Cadastrar Usuário</a>
												</li>
                                                <li>
													<a href="list.usuario.php"><span class="glyphicon glyphicon-list-alt"></span> Listar Usuários</a>
												</li>												
												<li>
													<a href="cad.empresa.php"><span class="glyphicon glyphicon-tags"></span> Empresa</a>
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
    <div class="content" id="appContent">   
		<div class="container">
            <div class="conteudo"> 				
				<ul style="display: block;" class="breadcrumb ng-scope">
				<?php
				$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
				$url = $crumbs[count($crumbs)-1];
				if($url!="inicio.php"){
					$crumbs = explode(".",$url);
					echo "<li><a href='inicio.php'>Inicio</a></li> <span class='divider ng-scope'>›</span> <li class='ng-scope'> ".ucfirst($crumbs[1])."</li> <span class='divider ng-scope'>›</span>  <li><a href='$url'>";
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