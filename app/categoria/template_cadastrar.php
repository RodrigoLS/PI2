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
		<label>Nome:</label> <input type="text" name="nomeCategoria"> <br>

		<label>Descrição:</label> <input type="text" name="descCategoria"> <br>

<!--PENDENTE Mudar para text area-->

		<input type="submit" value="Gravar" name="btnGravar">

	</form>
</section>
</body>
</html>