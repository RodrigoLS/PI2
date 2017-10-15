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
			<a href="?cadastrar=1">Adicionar novo usuário</a>	<br>
		
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
					<td>Login</td>
					<td>Nome</td>
					<td>Perfil</td>
					<td>Ativo</td>
					<td>Editar</td>
					<td>Excluir</td>
				</tr>

				<?php
					foreach ($usuarios as $idUsuario => $dadosUsuario) {
						echo 
						"<tr>
							<td> $idUsuario </td>
							<td> {$dadosUsuario['loginUsuario']} </td>
							<td> {$dadosUsuario['nomeUsuario']} </td>
							<td> {$dadosUsuario['tipoPerfil']} </td>
							<td> {$dadosUsuario['usuarioAtivo']} </td>
							<td> e </td>
							<td> x </td>
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