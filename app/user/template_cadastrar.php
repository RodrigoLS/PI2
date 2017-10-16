<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<section>
	<?php include('../layout/cabecalho.php') ?>

	<a href="index.php"> Voltar </a>

	<form method="POST">
		<label>Login:</label> <input type="text" name="loginUsuario"> <br>

		<label>Senha:</label> <input type="password" name="senhaUsuario"> <br>

		<label>Nome:</label> <input type="text" name="nomeUsuario"> <br>

		<label>Perfil:</label> 
		<select name="perfilUsuario">
			<option value="">Escolha</option>
			<option value="A">Administrador</option>
			<option value="C">Colaborador</option>
		</select> <br>

		<label>Ativo</label> <input type="checkbox" name="usuarioAtivo"> <br><br>

		<input type="submit" value="Gravar" name="btnGravar">

	</form>
</section>
</body>
</html>