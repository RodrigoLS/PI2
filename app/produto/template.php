<html>
<head>
	<meta charset="utf-8">
	<title>ADO PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<?php  
		require('../layout/cabecalho.php');
	?>
		<section class="produto">
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
						$utf_nomeProduto = $dadosProduto['nomeProduto'];
						$utf_nomeProduto = utf8_encode($utf_nomeProduto);
						$utf_descProduto = $dadosProduto['descProduto'];
						$utf_descProduto = utf8_encode($utf_descProduto);
						$img_imagem_base64 = $dadosProduto['imagem'];
						$img_imagem_base64 = base64_encode($img_imagem_base64);
						$img_imagem_base64 = "<img height='200px' weight='200px 'src=\"data:image/jpeg;base64,".$img_imagem_base64."\">";

						//$arquivo = $dadosProduto['imagem'];
						//$imagem = fopen($arquivo, "r");
						//$conteudo = fread($imagem, filesize($arquivo));
						//$img_imagem_base64 = base64_encode($conteudo);
						//$img_imagem_base64 = "<img src=\"data:image/jpeg;base64,".$img_imagem_base64."\">"; 
						echo 
						"<tr>
							<td> $idProduto </td>
							<td> $utf_nomeProduto </td>
							<td> $utf_descProduto </td>
							<td> {$dadosProduto['precProduto']} </td>
							<td> {$dadosProduto['descontoPromocao']} </td>
							<td> {$dadosProduto['idCategoria']} </td>
							<td> {$dadosProduto['ativoProduto']} </td>
							<td> {$dadosProduto['idUsuario']} </td>
							<td> {$dadosProduto['qtdMinEstoque']} </td>
							<td> $img_imagem_base64 </td>
							<td><a href='?editar=$idProduto'> <i class='small material-icons'>edit</i> </a></td>
							<td><a href='?apagar=$idProduto'> <i class='small material-icons'>delete</i></a></td>
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