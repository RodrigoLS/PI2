<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php') ?>

<section>
	<div class="main grey lighten-3 center-align">
	<form method="POST">
		<fieldset>
			<legend><b>NOVO USUÁRIO</b></legend>
			<label>Login:</label> <input type="text" name="loginUsuario"> <br>

			<label>Senha:</label> <input type="password" name="senhaUsuario"> <br>

			<label>Nome:</label> <input type="text" name="nomeUsuario"> <br>

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