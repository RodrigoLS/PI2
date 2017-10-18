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
		<section>
			<a href="?cadastrar=1">Adicionar nova categoria</a>	<br>
		
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
					<td>Editar</td>
					<td>Excluir</td>
				</tr>

				<?php
					foreach ($categorias as $idCategoria => $dadosCategoria) {
						$utf_nomeCategoria = $dadosCategoria['nomeCategoria'];
						$utf_nomeCategoria = utf8_encode($utf_nomeCategoria);
						$utf_descCategoria = $dadosCategoria['descCategoria'];
						$utf_descCategoria = utf8_encode($utf_descCategoria);
						echo 
						"<tr>
							<td> $idCategoria </td>
							<td> $utf_nomeCategoria </td>
							<td> $utf_descCategoria </td>
							<td><a href='?editar=$idCategoria'> <i class='small material-icons'>edit</i> </a></td>
							<td><a href='?apagar=$idCategoria'> <i class='small material-icons'>delete</i></a></td>
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