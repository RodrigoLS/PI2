<html>
<head>
	<meta charset="utf-8">
	<title>ADO PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
<header>
	<div class="corpo-header">
		<nav>
			<div class="nav-wrapper">
				<ul  class="left">
					<li><a href="../user">Usuario</a></li>
					<li><a href="../categoria">Categoria</a></li>
					<li class="active_menu" ><a>Produto</a></li>
				</ul>
				<img src="../img/LogoHippo.jpg" alt="Logo Loja" class="brand-logo center" id="LogoMenu">
				<ul class="right">
					<li><?php echo "<p> Olá <b>".$_SESSION['nomeUsuario']."</b></p>" ?></li>
					<li><a href="sair.php"><i class="large material-icons">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>
		<section class="produto">

			<form method="GET" name="produtosFiltragem">
				
				<label>Nome Produto:</label>
				<input type="text" name="fNomeProduto" placeholder="Insira o nome do produto">
				
				<label>Preço máximo:</label>
				<input type="number" name="fPreco" placeholder="Valor máximo">

				<label>Categoria:</label>
		
				<select name="idCategoria">
					<option value="">Escolha</option>
					<?php

						$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria
						 FROM Categoria');

						while($cat = odbc_fetch_array($c)){
							$cat['nomeCategoria'] = utf8_encode($cat['nomeCategoria']);
							$categorias[$cat['idCategoria']] = $cat;
						}

						foreach ($categorias as $idCategoria => $dadosCategoria) {
							$utf_nomeCategoria = $dadosCategoria['nomeCategoria'];
								echo "<option value='$idCategoria'>$utf_nomeCategoria</option> ";
							}
						
					?>

		</select><br>

				<input type="submit" name="filtrar" id="buscar">
			</form> <br><br>

			<a href="?cadastrar=1">Adicionar novo produto</a>	<br>
		
			<?php
				if(isset($msg))
					echo "<br>
						  <div class='center-align'>
							<p class='green-text text-darken-3'> <i class='small material-icons'>done</i> $msg </p> 
						  </div>
						  <br>";
				
				if(isset($erro))
					echo "	<br>
							<div class='center-align'>
								<p class='red-text text-accent-4'> <i class='small material-icons'>error</i> $erro </p>
							</div>	
							<br>";
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
							<td>";  
							
								include('../db/bancodedados.php');
							
								$query = odbc_exec($db, 'SELECT idCategoria, nomeCategoria FROM Categoria');
							
								$info_categoria = array();
								
									while ($resul = odbc_fetch_array($query)) {
										
										$resul['nomeCategoria'] = utf8_encode($resul['nomeCategoria']);
										$info_categoria[$resul['idCategoria']] = $resul['nomeCategoria']; 
											
									}
									
									foreach ($info_categoria as $id => $valor) {
										
										if ($dadosProduto['idCategoria'] == $id) {
											
											echo $valor;
											
										}
									}
							
						echo 
						"</td>
							<td> {$dadosProduto['ativoProduto']} </td>
							<td>";
							
								$query = "";
								
								$query = odbc_exec($db, 'SELECT idUsuario, nomeUsuario FROM Usuario');
								
								$info_usuario = array();
								
								$resul = "";
								
									while ($resul = odbc_fetch_array($query)) {
										
										$resul['nomeUsuario'] = utf8_decode($resul['nomeUsuario']);
										$info_usuario[$resul['idUsuario']] = $resul['nomeUsuario'];
										
									}
									
									$id = "";
									
									foreach ($info_usuario as $id => $nome) {
										
										if ($dadosProduto['idUsuario'] == $id) {
											
											echo $nome;
											
										}
										
									}	
							
						echo 
						"</td>
							<td> {$dadosProduto['qtdMinEstoque']} </td>
							<td> $img_imagem_base64 </td>
							<td><a href='?editar=$idProduto'> <i class='small material-icons'>edit</i> </a></td>
							<td><a href='?apagar=$idProduto'> <i class='small material-icons'>delete</i></a></td>
						</tr>";
					} 
				?>
				<tfoot>
					<td><a class="btn btn-floating btn-large light-blue darken-1 pulse" href="?cadastrar=1"><i class="material-icons">add</i></a></td>
					<td colspan="11">
					<div class="nav-abas">	
						<ul class="pagination">
								<?php
								if($pagina_anterior > 0){ ?>
							<li>
									<a href="index.php?pagina=<?php echo $pagina_anterior; ?>">
										<i class="material-icons">chevron_left</i>
									</a>
							</li>
								<?php }else{ ?>
							<li class="disabled">
										<i class="material-icons">chevron_left</i>
							<?php }  ?>
							</li>
							<?php 
							//Apresentar a paginacao
							for($i = 1; $i < $num_aba+1; $i++){ ?>
								<li class="waves-effect">
									<?php 
									if($i == $pagina){ ?>
									<a class="active_aba" href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
									<?php
									}else{ ?> 
									<a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>	
									<?php } ?>
								</li>
							<?php } ?>
								<?php
								if($pagina_posterior <= $num_aba){ ?>
							<li class="waves-effect">
									<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
										<i class="material-icons">chevron_right</i></a></li>
									</a>
							</li>
								<?php }else{ ?>
							<li class="disabled">
										<i class="material-icons">chevron_right</i></a></li>
							<?php }  ?>
							</li>
						</ul>
					</div>						
					</td>				
				</tfoot>				
			</table>
			
		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
	<script>
       	$(document).ready(function() {
    	$('select').material_select();
        });
    </script>	
</body>
</html>		