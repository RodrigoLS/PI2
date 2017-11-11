<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Cadastro Usuario |HIPPO|</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php') ?>

<section>
	<div class="main grey lighten-4 center-align">
	<form method="POST">
		<fieldset>
			<legend><b>NOVO USUÁRIO</b></legend>
			<div class="input-field">
			<input id="in-login" type="text" name="loginUsuario"><label for="in-login">Login:</label><br></div>
			
			<div class="input-field">
			<input id="in-senha" type="password" name="senhaUsuario"><label for="in-senha">Senha:</label><br></div>

			<div class="input-field">
			<input id="in-nome" type="text" name="nomeUsuario"><label for="in-nome">Nome:</label><br></div>

			<label>Perfil:</label> 
			<select name="perfilUsuario">
				<option value="">Escolha</option>
				<option value="A">Administrador</option>
				<option value="C">Colaborador</option>
			</select> <br>
	
			<input type="checkbox" id="ativo" name="usuarioAtivo"> 
			<label for="ativo">Status Ativo</label>
			<br><br>
			<input type="submit" value="Gravar" name="btnGravar" class="waves-effect waves-light btn-large">
		</fieldset>
	</form>
	</div>
</section>
	<?php  
		require('../layout/rodape.php');
	?>

      <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script>
       	  $(document).ready(function() {
    	  $('select').material_select();
          });
      </script>
</body>
</html>