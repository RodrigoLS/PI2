<html>
	<body>
		<a href="../produto">Voltar</a> 
		Usuario 
		Categoria
		<b>Produto</b> 
		<a href="/?logout=1">Sair</a>
		<br><br>
		
		<form method="post">
		<label>Nome:</label> <input type="text" name="nomeProduto" value="<?php echo $dados_produtos['nomeProduto']; ?>"> <br>

		<label>Descrição:</label> <input type="text" name="descProduto" value="<?php echo $dados_produtos['descProduto']; ?>"> <br>

		<label>Preço:</label> <input type="number" name="precProduto"> <br>

		<label>Desconto:</label> <input type="number" name="descontoPromocao"> <br>

		<label>Categoria</label> <input type="number" name="idCategoria"> <br>

		<label>Ativo:</label> <input type="checkbox" name="ativoProduto"> <br>

		<label>Usuário:</label> <input type="checkbox" name="idUsuario"> <br>

		<label>Qtd no Estoque:</label> <input type="number" name="qtdMinEstoque"> <br>

<!--PENDENTE arrumar Categoria e inserir campo para imagem-->

		<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
	</body>
</html>