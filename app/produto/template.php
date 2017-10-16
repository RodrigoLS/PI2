<html>
<head>
	<meta charset="utf-8">
	<title>ADO PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<?php  
		require('../layout/cabecalho.php');
	?>
		<section>
			<a href="?cadastrar=1">Adicionar novo produto</a>	<br>
		
			<?php
				if(isset($msg))
					echo "	<br> $msg <br>";
				
				if(isset($erro))
					echo "	<br> $erro <br>";
			?>
			
			<br>			

			<table>
				<tr>
					<td>ID</td>
					<td>Nome</td>
					<td>Descrição</td>
					<td>Preço</td>
					<td>Desconto</td>
					<td>Categoria</td>
					<td>Ativo</td>
					<td>Usuário</td>
					<td>Qtd no Estoque</td>
					<td>Imagem</td>
					<td>Editar</td>
					<td>Excluir</td>
				</tr>
				<?php
					foreach ($produtos as $idProduto => $dadosProduto) {
						echo 
						"<tr>
							<td> $idProduto </td>
							<td> {$dadosProduto['nomeProduto']} </td>
							<td> {$dadosProduto['descProduto']} </td>
							<td> {$dadosProduto['precProduto']} </td>
							<td> {$dadosProduto['descontoPromocao']} </td>
							<td> {$dadosProduto['idCategoria']} </td>
							<td> {$dadosProduto['ativoProduto']} </td>
							<td> {$dadosProduto['idUsuario']} </td>
							<td> {$dadosProduto['qtdMinEstoque']} </td>

							<td><a href='?editar=$idProduto'>e</a></td>
							<td> x </td>
						</tr>";
					} 
// necessário adicionar e tratar <td> {$dadosProduto['imagem']} </td>
				?>
			</table>
		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		