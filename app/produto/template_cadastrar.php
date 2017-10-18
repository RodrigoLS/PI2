<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<section>
	<?php include('../layout/cabecalho.php') ?>

	<a href="index.php"> Voltar </a>

	<form method="POST" enctype="multipart/form-data">
		<label>Nome:</label> <input type="text" name="nomeProduto"> <br>

		<label>Descrição:</label> <input type="text" name="descProduto"> <br>

		<label>Preço:</label> <input type="number" name="precProduto"> <br>

		<label>Desconto:</label> <input type="number" name="descontoPromocao"> <br>

		<label>Categoria</label> <input type="number" name="idCategoria"> <br>

		<label>Ativo:</label> <input type="checkbox" name="ativoProduto"> <br>

		<label>Usuário:</label> <input type="checkbox" name="idUsuario"> <br>

		<label>Qtd no Estoque:</label> <input type="number" name="qtdMinEstoque"> <br>

		<label>Imagem:</label> <input type="file" name="imagem"/> <br>

<!--PENDENTE arrumar Categoria e inserir campo para imagem-->

		<input type="submit" value="Gravar" name="btnGravar">

	</form>
</section>
</body>
</html>