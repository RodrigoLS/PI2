<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php include('cabecalho.php') ?>

<form method="POST">
	<label>Login:</label> <input type="text" name="loginUsuario"> <br>

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

</body>
</html>