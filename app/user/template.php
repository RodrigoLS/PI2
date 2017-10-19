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
		
			<?php
				if(isset($msg))
					echo "	<br> $msg <br>";
				
				if(isset($erro))
					echo "	<br> $erro <br>";
			?>
			
			<br>			

			<table class="striped responsive-table">
				<caption>Usuários Cadastrados</caption>
				<tr>
					<td><b>ID</b></td>
					<td><b>Login</b></td>
					<td><b>Nome</b></td>
					<td><b>Perfil</b></td>
					<td><b>Ativo</b></td>
					<td><b>Editar</b></td>
					<td><b>Excluir</b></td>
				</tr>

				<?php
					foreach ($usuarios as $idUsuario => $dadosUsuario) {
						$utf_nomeUsuario = $dadosUsuario['nomeUsuario'];
						$utf_nomeUsuario = utf8_encode($utf_nomeUsuario);
						echo 
						"<tr>
							<td> $idUsuario </td>
							<td> {$dadosUsuario['loginUsuario']} </td>
							<td> $utf_nomeUsuario </td>
							<td> {$dadosUsuario['tipoPerfil']} </td>
							<td> {$dadosUsuario['usuarioAtivo']} </td>
							<td><a href='?editar=$idUsuario'> <i class='small material-icons'>edit</i> </a></td>
							<td><a href='?apagar=$idUsuario'> <i class='small material-icons'>delete</i></a></td>
						</tr>";
					} 

				?>
			</table>
			<center> <a class="btn btn-floating btn-large light-blue darken-1 pulse" href="?cadastrar=1"><i class="material-icons">add</i></a> </center>
		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		