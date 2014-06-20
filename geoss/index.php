<?php
include_once('class.database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Geoss</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
	<script type="text/javascript">
		var ajaxSubmit = function(formEl, msg) {
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
						if(msg){
							$(modalbody).html(msg);      
							$(myModal).modal();
						}else{
							location.href="cadsemaforo.php";
						}
					}else{
						$(modalbody).html("Erro ao logar");      
						$(myModal).modal();
					}
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					alert(textStatus);
					alert(errorThrown);
					}					
			});

			// return false so the form does not actually
			// submit to the page
			return false;
		}
	</script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Geosweb</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Controlador de semáforos</a>
                    </li>
					<li class="page-scroll">
                        <a href="#download">Sistema de monitoramento</a>
                    </li>
					<li class="page-scroll">
                        <a href="#login">Login</a>
                    </li>					
                    <li class="page-scroll">
                        <a href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Geosweb</h1>
                        <p class="intro-text">Controlador de Semáforos <em>RealTime.</em></p>
                        <div class="page-scroll">
                            <a href="#about" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>Controlador de semáforos</h2>
                <p> Sinalvida Dispositivos de Segurança Viária Ltda, buscando continuamente a excelência na prestação de Serviços de Tecnologia da Informação e controle semafórico de ruas e avenidas em todo País, tem como tradição a excelência no bem-estar e segurança de nossos colaboradores. A importância que atribuímos a esta iniciativa obtendo o resultado do nosso comprometimento em manter um estilo de vida saudável dos nossos profissionais, clientes e a sociedade.</p>
				<p>	As estratégias, instruções e os procedimentos da empresa devem suportar nosso compromisso ao bem-estar do colaborador, assegurando a continuidade dos seguintes objetivos da SINALVIDA: Atender aos requisitos legais e corporativos; Comprometer-se com o Bem Estar, Segurança e Saúde do Trabalho dos colaboradores; Incentivar a participação de todos os colaboradores, dos nossos Parceiros, Fornecedores e Clientes nos Programas de Bem Estar, Segurança do Trabalho e Saúde Ocupacional da SINALVIDA; Gerenciar os custos, riscos e qualidade de saúde e segurança no ambiente de trabalho; Assegurar melhoria continua e excelência na qualidade e execução das atividades relativas ao Bem Estar, Segurança do Trabalho e Saúde Ocupacional da SINALVIDA
.</p>
            </div>
        </div>
    </section>
	
	<section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Sistema de monitoramento</h2>
                    <p>Utilizando câmeras de ultima geração é possível fazer a detecção, sentido de deslocamento e contagem dos veículos na via em tempo real, possibilitando uma alteração AUTOMÁTICA nos tempos de acionamento dos semáforos, conforme a quantidade de veículos trafegando. Através de um link dedicado, todo o trafego pode ser acompanhado em Tempo Real, em uma central remota de monitoramento, com a possibilidade de conectar câmeras para monitoramento das vias.</p>
                </div>
            </div>
        </div>
    </section>

	<section id="login" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Login</h2>				
				<!-- /.modal -->				
				<form id="loginform" action="logar.php" onsubmit="return ajaxSubmit(this);" class="form-horizontal" role="form" name="loginform">
				  <div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="login-username" type="text" class="form-control" name="user" value="" placeholder="Login">
				  </div>
				  <div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="login-password" type="password" class="form-control" name="password" placeholder="Senha">
				  </div>
				  <div style="margin-top:10px" class="form-group">
					<!-- Button -->
					<div class="col-sm-12 controls">
						<input type="submit" value="Entrar" class="btn btn-success btn-block">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-12 control">
					  <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
						Não tenho conta! <a href="javascript:void(0);" onclick="$('#loginform').hide(); $('#signupbox').show()">Cadastrar</a>
					  </div>
					</div>
				  </div>
				</form>
				<form role="form" style="display:none; margin-top:50px" id="signupbox" method="post" action="dao.php" onsubmit="return ajaxSubmit(this,'Usuário cadastrado com sucesso');">
				  <input type="hidden" name="type" value="usuarios">
				  <div class="form-group col-md-12">
					<input type="text" name="usuario" class="form-control input-sm" placeholder="Nome">
				  </div>
				  <div class="form-group col-md-12">
					<input type="text" name="login_nome" class="form-control input-sm" placeholder="Login">
				  </div>
				  <div class="form-group col-md-12">
					<input type="text" name="contrat_acesso" class="form-control input-sm" placeholder="Contrato de Acesso"> <input type="hidden" name=
					"nivel_acesso" class="form-control input-sm" placeholder="nivel" value="S">
				  </div>
				  <div class="form-group col-md-12">
					<input type="password" name="senha" class="form-control input-sm" placeholder="Senha">
				  </div>
				  <div class="form-group col-md-12">
					<select class="form-control input-sm" name="idx_niv_acesso">
					  <option value="0">
						Nivel de Acesso
					  </option>
					  <?php
						  $db = Database::getConnection();
						  $sql = "SELECT id, nivaces_nome
										  FROM cad_usua_nivaces
										  ORDER BY nivaces_nome";
						  $res = $db->query( $sql );
						  while ( $row = $res->fetch_assoc() ) {
								  echo '<option value="'.$row['id'].'">'.utf8_encode($row['nivaces_nome']).'</option>';
						  }
					  ?>
					</select>
				  </div>
				  <div class="form-group col-md-12">
					<select class="form-control input-sm" name="idx_empresa_usua">
					  <option value="0">
						Empresa
					  </option>
					  <?php
						 $db = Database::getConnection();
					     $sql = "SELECT id, razao_social
									  FROM cad_empresa_usua
									ORDER BY razao_social";
						  $res = $db->query( $sql );
						  while ( $row = $res->fetch_assoc() ) {
							echo '<option value="'.$row['id'].'">'.utf8_encode($row['razao_social']).'</option>';
						  }
					  ?>
					</select>
				  </div>
				  <div class="form-group col-md-6 col-md-offset-3">
					<input type="submit" value="Cadastrar" class="btn btn-success btn-block">
				  </div>
				</form>
            </div>
        </div>
    </section>
	
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Entre em contato</h2>
                <ul class="list-inline banner-social-buttons">
                    <li><a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li><a href="http://www.facebook.com" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li><a href="https://plus.google.com/" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
					aria-hidden="true" style="color:black">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title">
						Geoss</h4>
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
   

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
