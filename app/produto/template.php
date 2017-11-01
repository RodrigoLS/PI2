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

			<form method="GET">
				<input type="text" name="consulta" placeholder="Insira sua consulta">
				<input type="submit" name="buscar" id="buscar">
			</form> <br><br>

			<a href="?cadastrar=1">Adicionar novo produto</a>	<br>
		
			<?php
				if(isset($msg))
					echo "	<br> $msg <br>";
				
				if(isset($erro))
					echo "	<br> $erro <br>";
			?>
			
			<br>			
			<table class="tableProdutos striped responsive-table">
				<thead>
					<td><b>ID</b></td>
					<td><b>Nome</b></td>
					<td><b>Descrição</b></td>
					<td><b>Preço(R$)</b></td>
					<td><b>Desconto(%)</b></td>
					<td><b>Categoria</b></td>
					<td><b>Ativo</b></td>
					<td><b>Usuário</b></td>
					<td><b>Qtd no Estoque</b></td>
					<td><b>Imagem</b></td>
					<td><b>Editar</b></td>
					<td><b>Excluir</b>	</td>
				</thead>
				<?php
					foreach ($produtos as $idProduto => $dadosProduto) {
						$utf_nomeProduto = $dadosProduto['nomeProduto'];
						
						$utf_descProduto = $dadosProduto['descProduto'];
						
						$mod_dadosProduto = $dadosProduto['precProduto'];
						$mod_dadosProduto = number_format($mod_dadosProduto,2);
						$mod_descontoProduto = $dadosProduto['descontoPromocao'];
						$mod_descontoProduto = number_format($mod_descontoProduto,0);
						$img_imagem_base64 = $dadosProduto['imagem'];
						$img_imagem_base64 = base64_encode($img_imagem_base64);
						$img_imagem_base64 = "<img height='200px' weight='200px 'src=\"data:image/jpeg;base64,".$img_imagem_base64."\">";
						echo 
						"<tr>
							<td> $idProduto </td>
							<td> $utf_nomeProduto </td>
							<td> $utf_descProduto </td>
							<td> $mod_dadosProduto </td>
							<td> $mod_descontoProduto </td>
							<td> {$dadosProduto['idCategoria']} </td>
							<td> {$dadosProduto['ativoProduto']} </td>
							<td> {$dadosProduto['idUsuario']} </td>
							<td> {$dadosProduto['qtdMinEstoque']} </td>
							<td> $img_imagem_base64 </td>
							<td><a href='?editar=$idProduto'> <i class='small material-icons'>edit</i> </a></td>
							<td><a href='?apagar=$idProduto'> <i class='small material-icons'>delete</i></a></td>
						</tr>";
					} 
				?>
			</table>
			
		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		