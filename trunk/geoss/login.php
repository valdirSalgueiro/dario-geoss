<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
include_once("class.database.php");
?>
<html lang='pt-br'>
  <head>
    <meta name="generator" content="HTML Tidy for Windows (vers 14 February 2006), see www.w3.org">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/datepicker.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" language="javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <title></title>
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
							location.href="index.php";
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
  <body>
    	  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;</button>
                        <h4 class="modal-title">
                            All4Kids</h4>
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
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              Logar
            </div>
          </div>
          <div style="padding-top:30px" class="panel-body">
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
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
                    Não tenho conta! <a href="#" onclick="$('#loginbox').hide(); $('#signupbox').show()">Cadastrar</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              Cadastrar
            </div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px">
              <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()" name="signinlink">Logar</a>
            </div>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="dao.php" onsubmit="return ajaxSubmit(this,'Usuário cadastrado com sucesso');">
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
                  </option><?php
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
                  </option><?php
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
      </div>
    </div>
  </body>
</html>
