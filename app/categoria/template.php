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
		
			<form method="GET">
				<input type="text" name="consulta" placeholder="Insira sua consulta">
				<input type="submit" name="buscar" id="buscar">
			</form> <br><br>
		
			<?php
				if(isset($msg))
					echo "	<br> $msg <br>";
				
				if(isset($erro))
					echo "	<br> $erro <br>";
			?>
			
			<br>			

			<table class="striped responsive-table">
				<caption><b>Categorias Cadastradas</b></caption>
				<thead>
					<td><b>ID</b></td>
					<td><b>Nome</b></td>
					<td><b>Descrição</b></td>
					<td><b>Editar</b></td>
					<td><b>Excluir</b></td>
				</thead>
        
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
				<tfoot>
					<td><a class="btn btn-floating btn-large light-blue darken-1 pulse" href="?cadastrar=1"><i class="material-icons">add</i></a></td>
				</tfoot>

      </table>

		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		