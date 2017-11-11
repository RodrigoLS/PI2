<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Edição Usuario |HIPPO|</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php') ?>

<section>
	<div class="main grey lighten-4 center-align">
		<form method="post">
			<fieldset>
			<legend><b>EDIÇÃO USUÁRIO</b></legend>

			<div class="input-field">
			<input id="in-login" type="text" name="loginUsuario" value="<?php echo $dados_usuario['loginUsuario']; ?>"><label for="in-login">Login:</label><br></div>

			<div class="input-field">
			<input id="in-senha" type="password" name="senhaUsuario"><label for="in-senha">Senha:</label><br></div>

			<div class="input-field">
			<input id="in-nome" type="text" name="nomeUsuario" value="<?php echo $dados_usuario['nomeUsuario']; ?>"><label for="in-nome">Nome:</label><br></div>
			<label> Perfil: </label> <select name="perfilUsuario">
						<option value="">Escolha</option>
						<option value="A" 
						<?php if($dados_usuario['tipoPerfil'] == 'A') echo "selected"; ?>>Administrador</option>
						<option value="C"
						<?php if($dados_usuario['tipoPerfil'] == 'C') echo "selected"; ?>>Colaborador</option>
					</select><br>
			<input type="checkbox" name="usuarioAtivo" id="ativo" 
					<?php if($dados_usuario['usuarioAtivo'] == 1) echo "checked"; ?>>
			<label for="ativo"> Status Ativo </label> <br><br>
			<input type="hidden" name="idUsuario" value="<?php echo $dados_usuario['idUsuario']; ?>">		
			<input type="submit" value="Atualizar" name="btnAtualizar" class="waves-effect waves-light btn-large">
			</fieldset>
		</form>
	</div>
</section>
	<?php  
		require('../layout/rodape.php');
	?>
     
      <script>
       	  $(document).ready(function() {
    	  $('select').material_select();
          });
      </script>		
	</body>
</html>