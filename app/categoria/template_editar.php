<html>
	<body>
		<a href="../categoria">Voltar</a> 
		Usuario 
		<b>Categoria</b> 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		
		<form method="post">
		
			<label> Nome: </label> <input type="text" name="nomeCategoria" value="<?php echo $dados_categorias['nomeCategoria']; ?>"><br><br>
			<label> Descrição: </label> <input type="text" name="descCategoria" value="<?php echo $dados_categorias['descCategoria']; ?>" ><br><br>
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
	</body>
</html>